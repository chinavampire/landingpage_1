<?php

print <<<EOT


            <section class=" contact section-padding" id="contact">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-7 col-12 mx-auto">

                            <form action="index.php?action=login" method="post" class="contact-form" role="form" data-aos="fade-up" id="thisform" onSubmit="return checkpwd(this);">
                                                                        <input type="hidden" name="account" value="$account">

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-6">
                                        <label for="original" class="form-label">Password </label>

                                        <input type="password" name="original" id="original" class="form-control" required maxlength="20">
                                    </div>
<br>
                                    <div class="col-lg-6 col-6">
                                        <label for="newpass" class="form-label">New Password </label>

                                        <input type="password" name="newpass" id="newpass" class="form-control" required maxlength="20">
                                    </div>
<br>
                                    <div class="col-lg-6 col-6">
                                        <label for="repass" class="form-label">Re-type New Password </label>

                                        <input type="password" name="repass" id="repass" class="form-control" required maxlength="20">
                                    </div>
<br>


                                </div>

                                <div class="col-lg-5 col-12 mx-auto mt-5">
                                            <input type="submit" name="submitpassword" class="btn btn-primary mt-3 float-right" value="save">

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>



EOT;

?>
