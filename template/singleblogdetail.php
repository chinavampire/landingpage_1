<?php


$thissn=$_GET['thissn'];
$showpic=$currenturl.'\images\blog/'.$thissn.'.jpg';;

$get = "select * from $blogtable where `sn`='$thissn'";
$get = mysqli_query($conn,$get);
$get = mysqli_fetch_array($get);
$thisname=$get['title'];
$thisdate=$get['date'];
$thislocation=$get['location'];
$thistext=$get['content'];



print <<<EOT

            <section class="news-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-10 mx-auto">
                            <h2 class="mb-3" data-aos="fade-up">$thislocation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$thisdate</h2>

                                        <p >$thistext</p>

                            <div class="clearfix my-4 mt-lg-0 mt-5">
                                        <img src="$showpic" class="img-fluid news-image" alt="$thisname" style="width:100%;">

                            </div>

                        </div>

                    </div>
                </div>
            </section>



EOT;

?>
