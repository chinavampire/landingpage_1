function confirmurl(url,showalert) {
if (showalert)
{
var conf = confirm(showalert);
}
else
{
var conf = true;
}
if(conf)
{
window.location.href=url;
return true;
} 


else
{
return false;
}
                                   }
//confirm url



function previewvideo(sourceId) {  

var source  =document.getElementById(sourceId);
var targetId="preview"+sourceId;
var target  =document.getElementById(targetId);

            var file = source.files[0];
            console.log(source.files);
            if (window.FileReader) {
                var fr = new FileReader();
                fr.onloadend = function (e) {
                    target.src= e.target.result;
                };
                fr.readAsDataURL(file);
            }
}  
//view new video


function previewImg(sourceId) {  
var targetId="preview"+sourceId;
    if (typeof FileReader === 'undefined') {  
        alert('Your browser does not support FileReader...');  
        return;  
    }  
    var reader = new FileReader();  
    reader.onload = function(e) {  
        var img = document.getElementById(targetId);  
        img.src = this.result;  
    }  
    reader.readAsDataURL(document.getElementById(sourceId).files[0]);  

}  
//view new picture

function preImg(sourceId, i) {  
var targetId="imgPre"+i;
var hiddenindex=parseInt(document.getElementById('imgindex').value);
    if (typeof FileReader === 'undefined') {  
        alert('Your browser does not support FileReader...');  
        return;  
    }  
    var reader = new FileReader();  
    reader.onload = function(e) {  
        var img = document.getElementById(targetId);  
        img.src = this.result;  
    }  
    reader.readAsDataURL(document.getElementById(sourceId).files[0]);  


if (document.getElementById('deletepic'+i).style.display==="none")
{
document.getElementById('deletepic'+i).style.display="block";
document.getElementById('file'+i).style.display="none";
document.getElementById('newormodify'+i).innerHTML=
'<i class="fa fa-pen" aria-hidden="true" onclick="file'+i+'.click()"></i>';

var addivclassName=document.getElementById('img'+hiddenindex).className;
hiddenindex++;
var addiv="img"+hiddenindex;
document.getElementById('imgindex').value=hiddenindex;


var html='<img id="imgPre'+hiddenindex+'" style="width:100%;" src="">'+
'<input type="hidden" name="thisstaffsn[]" value="'+hiddenindex+'" />'+



'<div class="form-group" style="width:50%;">'+
'<input type="text" class="form-control" name="staff_fullname_'+hiddenindex+'" maxlength="100" placeholder="Fullname" value="">'+
'</div>'+
'<div class="form-group" style="width:50%;">'+
'<input type="text" class="form-control" name="staff_post_'+hiddenindex+'" maxlength="100" placeholder="Post" value="">'+
'</div>'+




'<div style="width:50%;text-align:left;">'+
'<div id="newormodify'+hiddenindex+'"></div>'+
'<input type="file" name="file'+hiddenindex+'" id="file'+hiddenindex+'" accept="image/jpg,image/gif,image/pjpeg" onchange="preImg(this.id,\''+hiddenindex+'\');" />'+
'</div>'+
'<div style="width:50%;text-align:right;display:none;" id="deletepic'+hiddenindex+'">'+
'<i class="fa fa-trash" aria-hidden="true" onclick="deletepic(\''+hiddenindex+'\')"></i>'+
'</div><hr>';				
    var top1 = document.getElementById("uploadimg");
    var div = document.createElement("div");
    div.innerHTML=html;
    div.id=addiv;
    div.className=addivclassName;
    top1.appendChild(div);
}
else
{
var html='<input type="hidden" name="del[]" value="'+i+'" />';
    var top1 = document.getElementById("uploadimg");
    var div = document.createElement("div");
    div.innerHTML=html;
    top1.appendChild(div);

}
}  

//view new picture and modify




function deletepic(v) {  

var html='<input type="hidden" name="del[]" value="'+v+'" />';
    var top1 = document.getElementById("uploadimg");
    var div = document.createElement("div");
    div.innerHTML=html;
    top1.appendChild(div);
$("#img"+v).remove();
}  

//delete pic


function deletediv(div_word,thissn,showalert) {  
var res=confirm(showalert);
if (res)
{
var html='<input type="hidden" name="del[]" value="'+thissn+'" />';
    var top1 = document.getElementById("form0");
    var div = document.createElement("div");
    div.innerHTML=html;
    top1.appendChild(div);
$("#"+div_word+thissn).remove();



            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ajax/delete.php?table="+div_word+"&thissn="+thissn,
                async:false,
                success: function (result) {

                    console.log(result);
                    if (result.resultCode == 200) {
                        alert("SUCCESS");
                    }
                    ;
                },
                error : function() {
                    alert("ERROR！");
                }
            });








}
}  

//delete div









    function checkpwd(thisform) {
var thisresult="";

var input_original_alert="Please input the original password";
var input_new_alert="Please input the new password";
var retype_alert="Please retype the password";
var not_match_alert="Passwords do not match";
var invalid_original_alert="invalid original password";





        var original = document.getElementById("original").value;  
        var newpass = document.getElementById("newpass").value;  
        var repass = document.getElementById("repass").value;  



     if(original=='') {
      alert(input_original_alert);
      thisform.original.focus();
      return false;
      }
     if(newpass=='') {
      alert(input_new_alert);
      thisform.newpass.focus();
      return false;
      }
     if(repass=='') {
      alert(retype_alert);
      thisform.repass.focus();
      return false;
      }
     if(newpass!=repass) {
      alert(not_match_alert);
      thisform.repass.focus();
      return false;
      }



            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ajax/chgpassword.php",
                async:false,
                data: $("#"+thisform.id).serialize(),
                success: function (result) {
                    thisresult=result;
                    console.log(result);
                    if (result.resultCode == 200) {
                        alert("SUCCESS");
                    }
                    ;
                },
                error : function() {
                    alert("ERROR！");
                }
            });





     if(thisresult!='') {
      alert(invalid_original_alert);
      thisform.original.focus();
      return false;
      }


}
//check password




    function checklogin(thisfrm) {

            var showalert="";
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ajax/chklogin.php",
                async:false,
                data: $("#"+thisfrm.id).serialize(),
                success: function (result) {
                    showalert=result;
                    console.log(result);
                    if (result.resultCode == 200) {
                        alert("SUCCESS");
                    }
                    ;
                },
                error : function() {
                    alert("ERROR！");
                }
            });
if ($.trim(showalert)!=="") {
alert (showalert);
return (false);
}
}
//checklogin



