<?php

function str_between($str,$start,$end) {
$substr=substr($str,strlen($start)+strpos($str,$start),(strlen($str)-strpos($str,$end))*(-1));
return $substr;
}

function max_number($thisarray,$lstr,$rstr) {
$result=0;
foreach($thisarray as $key=>$value){
$getnumber=str_between($value,$lstr,$rstr);
if ($getnumber>$result)
{
$result=$getnumber;
}
}
return $result;
}


function ismobile(){ 
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
 
    if (isset ($_SERVER['HTTP_VIA'])) {
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            return true;
    }
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}


class uploadimg
{
    public $id; 
    public $selectedfile;
    public $picpath;
public function __construct($selectedfile,$picpath){
$this->selectedfile=$selectedfile;
$this->picpath     =$picpath;
}


public function doit($id) {

$this->id=$id;
if (isset($id))
{
$this->path    =$this->picpath.$this->id.".jpg";
$this->type    =$this->selectedfile["type"][$id];
$this->size    =$this->selectedfile["size"][$id];
$this->error   =$this->selectedfile["error"][$id];
$this->tmp_name=$this->selectedfile["tmp_name"][$id];
}
else
{
$this->path    =$this->picpath;
$this->type    =$this->selectedfile["type"];
$this->size    =$this->selectedfile["size"];
$this->error   =$this->selectedfile["error"];
$this->tmp_name=$this->selectedfile["tmp_name"];
}

if ((($this->type == "image/gif")
|| (  $this->type == "image/jpeg")
|| (  $this->type == "image/pjpeg")
|| (  $this->type == "video/mp4"))
&& (  $this->size < 50000000))
  {
  if ($this->error > 0)
    {
    echo "Return Code: " . $this->error . "<br />";
    }
  else
    {
    if (file_exists($this->path))
      {
unlink($this->path);

      }

      move_uploaded_file($this->tmp_name,$this->path);


    }
  }
else
  {
exit('error：invalid size...<a href="javascript:history.back(-1);">go back</a>');
  }

    }
 




}








function sql_multiply_write($sql) {
global $conn;
global $conn_bak;
$sql_result=mysqli_query($conn,$sql);

$sql_starting=substr($sql,0,6);
if (strcasecmp($sql_starting,'insert')<>0)
{
$thisresult=$sql_result;
}
else
{
$thisresult=mysqli_insert_id($conn);
}


if ($conn_bak)
{
mysqli_query($conn_bak,$sql);
}
return $thisresult;
}




?>