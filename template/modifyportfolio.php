<?php


print <<<EOT
            <section class="news section-padding" id="news">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?action=changepassword"><i class="fa fa-lock"></i></a></h2>
                        </div>

EOT;



$get = "select * from $portfoliotable";
$get = mysqli_query($conn,$get);


while($got = mysqli_fetch_array($get)){
$thissn      =$got['sn'];
$thistitle   =$got['title'];
$thispicpath =$currenturl.'/images/portfolio/'.$thissn.'.jpg';
$thisfilepath=$currentpath.'/images/portfolio/'.$thissn.'.jpg';
if (!file_exists($thisfilepath))
{
$thispicpath=$currenturl.'/images/default.jpg';
}

$div_id=$portfoliotable.$thissn;
$showalert='Are you sure to delete it ?';
$symbol=
'
<div class="button-group">
<a href="index.php?action=singleportfoliopage&operate=modify&thissn='.$thissn.'"><i class="fa fa-pen" style="color:white;"></i></a>
<br><br>
<a><i class="fa fa-trash" style="color:white;" onclick="deletediv(\''.$portfoliotable.'\',\''.$thissn.'\',\''.$showalert.'\')"></i></a>
</div>				
';



print <<<EOT
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0" id="$portfoliotable$thissn" >
                            <div class="news-thumb" data-aos="fade-up">
                                    <img src="$thispicpath" class="img-fluid large-news-image news-image" alt="$thistitle">

                                <div class="news-category bg-primary text-white">
                                $symbol
                                </div>
                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">$thistitle</h4>
                                </div>
                                

                            </div> 
                        </div>



EOT;






}




print <<<EOT

                            <form action="index.php?action=singleportfoliopage&operate=new" method="post" class="contact-form" role="form" data-aos="fade-up" id="form0">

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
