<?php


print <<<EOT
            <section class="section-padding" id="portfolio">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio</h2>
                        </div>

EOT;



$get = "select * from $portfoliotable";
$get = mysqli_query($conn,$get);
$pic_sn=0;


while($got = mysqli_fetch_array($get)){
$thissn=$got['sn'];
$thistitle=$got['title'];
$thispicpath=$currenturl.'\images/portfolio/'.$thissn.'.jpg';


print <<<EOT
                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="portfolio-thumb mb-5" data-aos="fade-up">
                                <a href="$thispicpath" class="image-popup">
                                    <img src="$thispicpath" class="img-fluid portfolio-image" alt="$thistitle" style="width:100%">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">$thistitle</h4>
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
