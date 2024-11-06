<?php


print <<<EOT
            <section class="news section-padding" id="news">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Events&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=changepassword"><i class="fa fa-lock"></i></a></h2>
                        </div>

EOT;



$get = "select * from $blogtable";
$get = mysqli_query($conn,$get);


while($got = mysqli_fetch_array($get)){
$thissn      =$got['sn'];
$thistitle   =$got['title'];
$thiscontent =$got['content'];
$thislocation=$got['location'];
$thisdate    =$got['date'];
$thispicpath =$currenturl.'/images/blog/'.$thissn.'.jpg';
$thisfilepath=$currentpath.'/images/blog/'.$thissn.'.jpg';
if (!file_exists($thisfilepath))
{
$thispicpath=$currenturl.'/images/default.jpg';
}

$div_id=$blogtable.$thissn;
$showalert='Are you sure to delete it ?';
$symbol=
'
<div class="button-group">
<a href="index.php?action=singleblogpage&operate=modify&thissn='.$thissn.'"><i class="fa fa-pen" style="color:white;"></i></a>
<br><br>
<a><i class="fa fa-trash" style="color:white;" onclick="deletediv(\''.$blogtable.'\',\''.$thissn.'\',\''.$showalert.'\')"></i></a>
</div>				
';



print <<<EOT
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0" id="$blogtable$thissn" >
                            <div class="news-thumb" data-aos="fade-up">
                                    <img src="$thispicpath" class="img-fluid large-news-image news-image" alt="$thistitle">

                                <div class="news-category bg-primary text-white">
                                $symbol
                                </div>
                                
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a class="news-title-link">$thistitle</a>
                                    </h5>


                                        <div class="d-flex flex-wrap">
                                            <span class="text-muted me-2">
                                                <i class="fa fa-map-marker"></i>
                                                $thislocation
                                            </span>
                                            <span class="text-muted">$thisdate</span>
                                        </div>


                                </div>

                            </div> 
                        </div>



EOT;






}




print <<<EOT

                            <form action="index.php?action=singleblogpage&operate=new" method="post" class="contact-form" role="form" data-aos="fade-up" id="form0">

<br><br>
                                <div class="col-lg-2 col-12 mt-5" style="text-align:left;">
                                    <button type="submit" class="form-control">new</button>
                                </div>
                            </form>




                    </div>
                </div>
            </section>

EOT;


?>
