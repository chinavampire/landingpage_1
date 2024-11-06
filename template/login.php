<?php

print <<<EOT


            <section class=" contact section-padding" id="contact">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-7 col-12 mx-auto">

                            <form action="index.php?action=manage" method="post" class="contact-form" role="form" data-aos="fade-up" id="loginform" onSubmit="return checklogin(this);">

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-6">
                                        <label for="account" class="form-label">Account </label>

                                        <input type="text" name="account" id="account" class="form-control" required>
                                    </div>

                                    <div class="col-lg-6 col-6">
                                        <label for="name" class="form-label">Password </label>

                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>


                                </div>

                                <div class="col-lg-5 col-12 mx-auto mt-5">
                                    <button type="submit" class="form-control" name="check_login">Login</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>



EOT;

?>
