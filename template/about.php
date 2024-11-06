<?php



$get = "select * from $abouttable";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$slogan=$get['slogan'];
$content=$get['content'];
$content=str_replace("\r\n","<br>",$content);

$home_video_path=$currentpath."/videos/0.mp4";

    if (file_exists($home_video_path))
{
$home_video_html=
'
            <section class="hero" id="hero">
                <div class="heroText">
                    <h1 class="text-white mt-5 mb-lg-4" data-aos="zoom-in" data-aos-delay="800">
                        '.$home_video_title.'
                    </h1>
                </div>

                <div class="videoWrapper">
                    <video autoplay="" loop="" muted="" class="custom-video" >
                        <source src="videos/0.mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="overlay"></div>
            </section>

';
}
else
{
$home_video_html=
'
            <section id="hero">
            </section>
';
}




print <<<EOT

{$home_video_html}


            <nav class="navbar navbar-expand-lg bg-light shadow-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <strong>$home_name</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#hero">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#portfolio">Portfolio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#news">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>









            <section class="section-padding pb-0" id="about">
                <div class="container mb-5 pb-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-3" data-aos="fade-up">$slogan</h2>
                        </div>

                        <div class="col-lg-12 col-12 mt-3 mb-lg-5">
                            <p class="me-4" data-aos="fade-up" data-aos-delay="300">$content</p>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-12 p-0">      
                            <img src="images/about/0.jpg" alt="" style="width:100%;height: 100%;">
                        </div>


                        <div class="col-lg-6 col-12 p-0">  
                            <section id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">




EOT;



$get = "select * from $stafftable";
$get = mysqli_query($conn,$get);
$firstpic=0;
$active='';
while($got = mysqli_fetch_array($get)){
$thissn=$got['sn'];
$thisfullname=$got['fullname'];
$thispost=$got['post'];
$thispicpath=$currenturl.'/images/staff/'.$thissn.'.jpg';


if ($firstpic===0)
{
$active='active';
}
else
{
$active='';
}



$firstpic++;

print <<<EOT

                                    <div class="carousel-item $active">
                                        <img src="$thispicpath" alt="$thisfullname" style="width:100%;height: 100%;">

                                        <div class="team-thumb bg-warning">
                                            <h3 class="text-white mb-0">$thisfullname</h3>

                                            <p class="text-secondary-white-color mb-0">$thispost</p>
                                        </div>
                                    </div>

EOT;
}




print <<<EOT
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                                      <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                      <span class="visually-hidden">Next</span>
                                </button>
                            </section>

                        </div>
                    </div>
                </div>
            </section>

EOT;

?>
