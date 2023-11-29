<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->

        <div class="col-md-8">
            <section class="panel">
                <header class="panel-heading">
                    Google ReCaptcha V3 Settings
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="settings/updateGoogleRecaptcha" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Site Key </label>

                                    <input type="text" class="form-control" name="site_key" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($captcha->site_key)) {
                                                                                                                                echo $captcha->site_key;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Secret Key </label>

                                    <input type="text" class="form-control" name="secret_key" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($captcha->secret_key)) {
                                                                                                                                    echo $captcha->secret_key;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">

                                </div>

                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($captcha->id)) {
                                                                            echo $captcha->id;
                                                                        }
                                                                        ?>'>


                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </div>
                                <code>
                                Without Site Key and Secret Key Frontend contact form will not work. <br>
                                 Create Google ReCaptcha Key Here By selecting reCAPTCHA v3
: <a target="_blank" href="https://www.google.com/recaptcha/admin/create">https://www.google.com/recaptcha/admin/create</a>
                            </code>

                            </form>
                           
                        </div>





                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
<script src="common/extranal/js/email/settings.js"></script>