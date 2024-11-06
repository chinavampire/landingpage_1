<?php


print <<<EOT
            <section class="news section-padding" id="news">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Events</h2>
                        </div>

EOT;



$get = "select * from $blogtable";
$get = mysqli_query($conn,$get);
$pic_sn=0;


while($got = mysqli_fetch_array($get)){

$thissn      =$got['sn'];
$thistitle   =$got['title'];
$thiscontent =$got['content'];
$thislocation=$got['location'];
$thisdate    =$got['date'];
$thispicpath=$currenturl.'\images/blog/'.$thissn.'.jpg';

print <<<EOT
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="news-thumb" data-aos="fade-up">
                                    <img src="$thispicpath" class="img-fluid large-news-image news-image" alt="$thistitle">

                                <div class="news-category bg-primary text-white">Events</div>
                                
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="index.php?action=singleblogdetail&thissn=$thissn" class="news-title-link">$thistitle</a>
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






$pic_sn++;
}




print <<<EOT

                    </div>
                </div>
            </section>

EOT;


?>
