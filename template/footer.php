<?php


$currentyear = date("Y");

//Social Links
$link_social = '';
if ($home['home_facebook'])
{
$thisurl       ="https://www.facebook.com/".$home['home_facebook'];
$link_social  .=
'
<li><a href="'.$thisurl.'" class="fa-brands fa-facebook"></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
';
}

if ($home['home_twitter'])
{
$thisurl       ="https://www.twitter.com/".$home['home_twitter'];
$link_social  .=
'
<li><a href="'.$thisurl.'" class="fa-brands fa-twitter"></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
';
}

if ($home['home_whatsapp'])
{
$thisurl       ="https://www.whatsapp.com/".$home['home_whatsapp'];
$link_social  .=
'
<li><a href="'.$thisurl.'" class="fa-brands fa-whatsapp"></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
';
}

if ($home['home_instagram'])
{
$thisurl       ="https://www.instagram.com/".$home['home_instagram'];
$link_social  .=
'
<li><a href="'.$thisurl.'" class="fa-brands fa-instagram"></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
';
}

if ($home['home_youtube'])
{
$thisurl       ="https://www.youtube.com/".$home['home_youtube'];
$link_social  .=
'
<li><a href="'.$thisurl.'" class="fa-brands fa-youtube"></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
';
}

//Social Links

//Info
if ($home_address)
{
$home_address          =
'
                        <h5 class="text-white">
                            <i class="fa fa-map-marker"></i>
                            '.$home_address.'
                        </h5>
';
}
else
{
$home_address          ="";
}

if ($home_email)
{
$home_email          =
'
                        <a href="mailto:'.$home_email.'" class="custom-link mt-3 mb-5">
                            '.$home_email.'
                        </a>
';
}
else
{
$home_email          ="";
}


if ($home_name)
{
$home_copyright        =
'
                    <div class="col-6">
                        <p class="copyright-text mb-0">Copyright © '.$home_name.$currentyear.'</p>
                    
                    </div>
';
}
else
{
$home_copyright        ="";
}
//Info


print <<<EOT

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
					{$home_address}
					{$home_email}
     				</div>
                    {$home_copyright}

                    <div class="col-lg-3 col-5 ms-auto">
                        <ul class="social-icon">
                        {$link_social}
                        </ul>
                    </div>

                </div>
            </section>
        </footer>

        <!-- JAVASCRIPT FILES -->
    <script type="text/javascript" src="function/myfunction.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>



EOT;

?>
