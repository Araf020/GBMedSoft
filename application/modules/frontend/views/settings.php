<link href="common/extranal/css/frontend/settings.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-gear"></i> <?php echo lang('website'); ?> <?php echo lang('settings'); ?>
            </header>




            <div class="panel-body">
                <div class="clearfix">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="frontend/update" method="post" enctype="multipart/form-data">


                                    <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('general_settings'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('title'); ?> &ast;</label>
                                                        <input type="text" class="form-control" name="title" value='<?php
                                                                                                                    if (!empty($settings->title)) {
                                                                                                                        echo $settings->title;
                                                                                                                    }
                                                                                                                    ?>' placeholder="system name" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('logo'); ?></label>
                                                        <input type="file" class="form-control" name="img_url" value='<?php
                                                                                                                        if (!empty($settings->invoice_logo)) {
                                                                                                                            echo $settings->invoice_logo;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                                        <span class="help-block"><?php echo lang('recommended_size'); ?>: 200x100</span>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('address'); ?> &ast;</label>
                                                        <input type="text" class="form-control" name="address" value='<?php
                                                                                                                        if (!empty($settings->address)) {
                                                                                                                            echo $settings->address;
                                                                                                                        }
                                                                                                                        ?>' placeholder="address" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &ast;</label>
                                                        <input type="number" class="form-control" name="phone" value='<?php
                                                                                                                        if (!empty($settings->phone)) {
                                                                                                                            echo $settings->phone;
                                                                                                                        }
                                                                                                                        ?>' placeholder="phone" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('emergency'); ?></label>
                                                        <input type="text" class="form-control" name="emergency" value='<?php
                                                                                                                        if (!empty($settings->emergency)) {
                                                                                                                            echo $settings->emergency;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('support_number'); ?></label>
                                                        <input type="text" class="form-control" name="support" value='<?php
                                                                                                                        if (!empty($settings->support)) {
                                                                                                                            echo $settings->support;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('hospital_email'); ?> &ast;</label>
                                                        <input type="email" class="form-control" name="email" value='<?php
                                                                                                                        if (!empty($settings->email)) {
                                                                                                                            echo $settings->email;
                                                                                                                        }
                                                                                                                        ?>' placeholder="email" required="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('currency'); ?> &ast;</label>
                                                        <input type="text" class="form-control" name="currency" value='<?php
                                                                                                                        if (!empty($settings->currency)) {
                                                                                                                            echo $settings->currency;
                                                                                                                        }
                                                                                                                        ?>' placeholder="currency" required="">
                                                    </div>

                                                    <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?> 
                                                        <div class="form-group col-md-3">
                                                            <label for="exampleInputEmail1"> <input type="checkbox" class="" name="google_translation_switch_in_frontend" value='<?php
                                                                                                                                                                                                if (!empty($settings->google_translation_switch_in_frontend)) {
                                                                                                                                                                                                    echo $settings->google_translation_switch_in_frontend;
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo 'yes';
                                                                                                                                                                                                }
                                                                                                                                                                                                ?>' placeholder="codec_purchase_code" <?php
                                                                                                                                                                                                    if ($settings->google_translation_switch_in_frontend == 'yes') {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    }
                                                                                                                                                                                                    ?>> <?php echo lang('google_translation_switch_in_frontend') ?>
                                                            </label>

                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('block_text_settings'); ?> </h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('announcement'); ?> </label>
                                                        <input type="text" class="form-control" name="block_1_text_under_title" value='<?php
                                                                                                                                        if (!empty($settings->block_1_text_under_title)) {
                                                                                                                                            echo $settings->block_1_text_under_title;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('service_block_text_under_title'); ?> </label>
                                                        <input type="text" class="form-control" name="service_block__text_under_title" value='<?php
                                                                                                                                                if (!empty($settings->service_block__text_under_title)) {
                                                                                                                                                    echo $settings->service_block__text_under_title;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('package_block__text_under_title'); ?></label>
                                                        <input type="text" class="form-control" name="doctor_block__text_under_title" value='<?php
                                                                                                                                                if (!empty($settings->doctor_block__text_under_title)) {
                                                                                                                                                    echo $settings->doctor_block__text_under_title;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('registration_block_text'); ?> </label>
                                                        <input type="text" class="form-control" name="registration_block_text" value='<?php
                                                                                                                                        if (!empty($settings->registration_block_text)) {
                                                                                                                                            echo $settings->registration_block_text;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('contact'); ?> </label>
                                                        <input type="text" class="form-control" name="contact_us" value='<?php
                                                                                                                            if (!empty($settings->contact_us)) {
                                                                                                                                echo $settings->contact_us;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('social_settings'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">


                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('facebook_id'); ?></label>
                                                        <input type="text" class="form-control" name="facebook_id" value='<?php
                                                                                                                            if (!empty($settings->facebook_id)) {
                                                                                                                                echo $settings->facebook_id;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('twitter_id'); ?></label>
                                                        <input type="text" class="form-control" name="twitter_id" value='<?php
                                                                                                                            if (!empty($settings->twitter_id)) {
                                                                                                                                echo $settings->twitter_id;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('twitter_username'); ?></label>
                                                        <input type="text" class="form-control" name="twitter_username" value='<?php
                                                                                                                                if (!empty($settings->twitter_username)) {
                                                                                                                                    echo $settings->twitter_username;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('google_id'); ?></label>
                                                        <input type="text" class="form-control" name="google_id" value='<?php
                                                                                                                        if (!empty($settings->google_id)) {
                                                                                                                            echo $settings->google_id;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('youtube_id'); ?></label>
                                                        <input type="text" class="form-control" name="youtube_id" value='<?php
                                                                                                                            if (!empty($settings->youtube_id)) {
                                                                                                                                echo $settings->youtube_id;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputEmail1"><?php echo lang('skype_id'); ?></label>
                                                        <input type="text" class="form-control" name="skype_id" value='<?php
                                                                                                                        if (!empty($settings->skype_id)) {
                                                                                                                            echo $settings->skype_id;
                                                                                                                        }
                                                                                                                        ?>' placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('section_1_settings'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">

                                                    <div class="form-group col-md-12">

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                                                            <input type="text" class="form-control" name="market_title" value='<?php
                                                                                                                                if (!empty($settings->market_title)) {
                                                                                                                                    echo $settings->market_title;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_1'); ?> </label>
                                                            <input type="text" class="form-control" name="market_description" value='<?php
                                                                                                                                        if (!empty($settings->market_description)) {
                                                                                                                                            echo $settings->market_description;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_2'); ?> </label>
                                                            <input type="text" class="form-control" name="market_button_link" value='<?php
                                                                                                                                        if (!empty($settings->market_button_link)) {
                                                                                                                                            echo $settings->market_button_link;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_cover_image'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->market_image)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->market_image)) {
                                                                                    } else {
                                                                                        echo $settings->market_image;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="market_image" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('section_2_setting'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">

                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('comment_1'); ?></label>
                                                            <input type="text" class="form-control" name="comment_1" value='<?php
                                                                                                                            if (!empty($settings->comment_1)) {
                                                                                                                                echo $settings->comment_1;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('left_text'); ?></label>
                                                            <input type="text" class="form-control" name="verified_1" value='<?php
                                                                                                                                if (!empty($settings->verified_1)) {
                                                                                                                                    echo $settings->verified_1;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('comment_logo_1'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->comment_logo_1)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->comment_logo_1)) {
                                                                                    } else {
                                                                                        echo $settings->comment_logo_1;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?> </span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="comment_logo_1" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('comment_2'); ?></label>
                                                            <input type="text" class="form-control" name="comment_2" value='<?php
                                                                                                                            if (!empty($settings->comment_2)) {
                                                                                                                                echo $settings->comment_2;
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('left_text'); ?>t</label>
                                                            <input type="text" class="form-control" name="verified_2" value='<?php
                                                                                                                                if (!empty($settings->verified_2)) {
                                                                                                                                    echo $settings->verified_2;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('comment_logo_2'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->comment_logo_2)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->comment_logo_2)) {
                                                                                    } else {
                                                                                        echo $settings->comment_logo_2;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i><?php echo lang('select_image'); ?> </span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i><?php echo lang('change'); ?> </span>
                                                                            <input type="file" class="default" name="comment_logo_2" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('remove'); ?> </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('section_3_settings'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('header_section'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('header_title'); ?> Header Title</label>
                                                            <input type="text" class="form-control" name="partner_header_title" value='<?php
                                                                                                                                        if (!empty($settings->partner_header_title)) {
                                                                                                                                            echo $settings->partner_header_title;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('header_description'); ?> </label>
                                                            <input type="text" class="form-control" name="partner_header_description" value='<?php
                                                                                                                                                if (!empty($settings->partner_header_description)) {
                                                                                                                                                    echo $settings->partner_header_description;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('section_1'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                                                            <input type="text" class="form-control" name="section_title_1" value='<?php
                                                                                                                                    if (!empty($settings->section_title_1)) {
                                                                                                                                        echo $settings->section_title_1;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('description'); ?> </label>
                                                            <input type="text" class="form-control" name="section_description_1" value='<?php
                                                                                                                                        if (!empty($settings->section_description_1)) {
                                                                                                                                            echo $settings->section_description_1;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_1'); ?> </label>
                                                            <input type="text" class="form-control" name="section_1_text_1" value='<?php
                                                                                                                                    if (!empty($settings->section_1_text_1)) {
                                                                                                                                        echo $settings->section_1_text_1;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_2'); ?> </label>
                                                            <input type="text" class="form-control" name="section_1_text_2" value='<?php
                                                                                                                                    if (!empty($settings->section_1_text_2)) {
                                                                                                                                        echo $settings->section_1_text_2;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_3'); ?> </label>
                                                            <input type="text" class="form-control" name="section_1_text_3" value='<?php
                                                                                                                                    if (!empty($settings->section_1_text_3)) {
                                                                                                                                        echo $settings->section_1_text_3;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_image'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->partner_image_1)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->partner_image_1)) {
                                                                                    } else {
                                                                                        echo $settings->partner_image_1;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?> </span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="partner_image_1" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('section_2'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                                                            <input type="text" class="form-control" name="section_title_2" value='<?php
                                                                                                                                    if (!empty($settings->section_title_2)) {
                                                                                                                                        echo $settings->section_title_2;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('description'); ?> </label>
                                                            <input type="text" class="form-control" name="section_description_2" value='<?php
                                                                                                                                        if (!empty($settings->section_description_2)) {
                                                                                                                                            echo $settings->section_description_2;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_1'); ?> </label>
                                                            <input type="text" class="form-control" name="section_2_text_1" value='<?php
                                                                                                                                    if (!empty($settings->section_2_text_1)) {
                                                                                                                                        echo $settings->section_2_text_1;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_2'); ?> </label>
                                                            <input type="text" class="form-control" name="section_2_text_2" value='<?php
                                                                                                                                    if (!empty($settings->section_2_text_2)) {
                                                                                                                                        echo $settings->section_2_text_2;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_3'); ?> </label>
                                                            <input type="text" class="form-control" name="section_2_text_3" value='<?php
                                                                                                                                    if (!empty($settings->section_2_text_3)) {
                                                                                                                                        echo $settings->section_2_text_3;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_image'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->partner_image_2)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->partner_image_2)) {
                                                                                    } else {
                                                                                        echo $settings->partner_image_2;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="partner_image_2" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('section_3'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                                                            <input type="text" class="form-control" name="section_title_3" value='<?php
                                                                                                                                    if (!empty($settings->section_title_3)) {
                                                                                                                                        echo $settings->section_title_3;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('description'); ?> </label>
                                                            <input type="text" class="form-control" name="section_description_3" value='<?php
                                                                                                                                        if (!empty($settings->section_description_3)) {
                                                                                                                                            echo $settings->section_description_3;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_1'); ?> </label>
                                                            <input type="text" class="form-control" name="section_3_text_1" value='<?php
                                                                                                                                    if (!empty($settings->section_3_text_1)) {
                                                                                                                                        echo $settings->section_3_text_1;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_2'); ?> </label>
                                                            <input type="text" class="form-control" name="section_3_text_2" value='<?php
                                                                                                                                    if (!empty($settings->section_3_text_2)) {
                                                                                                                                        echo $settings->section_3_text_2;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('text_3'); ?> </label>
                                                            <input type="text" class="form-control" name="section_3_text_3" value='<?php
                                                                                                                                    if (!empty($settings->section_3_text_3)) {
                                                                                                                                        echo $settings->section_3_text_3;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_image'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->partner_image_3)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->partner_image_3)) {
                                                                                    } else {
                                                                                        echo $settings->partner_image_3;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="partner_image_3" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('section_5_settings'); ?></h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseSeven" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">

                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('section_1'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                                                            <input type="text" class="form-control" name="team_title" value='<?php
                                                                                                                                if (!empty($settings->team_title)) {
                                                                                                                                    echo $settings->team_title;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('description'); ?> </label>
                                                            <input type="text" class="form-control" name="team_description" value='<?php
                                                                                                                                    if (!empty($settings->team_description)) {
                                                                                                                                        echo $settings->team_description;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('button_link'); ?> </label>
                                                            <input type="text" class="form-control" name="team_button_link" value='<?php
                                                                                                                                    if (!empty($settings->team_button_link)) {
                                                                                                                                        echo $settings->team_button_link;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                                        </div>


                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <h4> <label for="exampleInputEmail1"><?php echo lang('comment_section'); ?> </label></h4>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('commentator_name'); ?> </label>
                                                            <input type="text" class="form-control" name="team_commentator_name" value='<?php
                                                                                                                                        if (!empty($settings->team_commentator_name)) {
                                                                                                                                            echo $settings->team_commentator_name;
                                                                                                                                        }
                                                                                                                                        ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('commentator_designation'); ?> </label>
                                                            <input type="text" class="form-control" name="team_commentator_designation" value='<?php
                                                                                                                                                if (!empty($settings->team_commentator_designation)) {
                                                                                                                                                    echo $settings->team_commentator_designation;
                                                                                                                                                }
                                                                                                                                                ?>' placeholder="">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('comment'); ?> </label>
                                                            <input type="text" class="form-control" name="team_comment" value='<?php
                                                                                                                                if (!empty($settings->team_comment)) {
                                                                                                                                    echo $settings->team_comment;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmail1"><?php echo lang('left_text'); ?> </label>
                                                            <input type="text" class="form-control" name="team_verified" value='<?php
                                                                                                                                if (!empty($settings->team_verified)) {
                                                                                                                                    echo $settings->team_verified;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_image'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->team_review_logo)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->team_review_logo)) {
                                                                                    } else {
                                                                                        echo $settings->team_review_logo;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="team_review_logo" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label"><?php echo lang('upload_logo'); ?></label>
                                                            <div class="">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail <?php if (!empty($settings->team_commentator_image)) { ?> img_auto <?php } else { ?> img_auto1 <?php } ?>">
                                                                        <img src="<?php
                                                                                    if (empty($settings->team_commentator_image)) {
                                                                                    } else {
                                                                                        echo $settings->team_commentator_image;
                                                                                    }
                                                                                    ?>" id="img" alt="" />
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail logo_thumbnail"></div>
                                                                    <div>
                                                                        <span class="btn btn-white btn-file">
                                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                                            <input type="file" class="default" name="team_commentator_image" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading clearfix">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false">
                                                        <div class="form-group col-md-6">
                                                            <h4><?php echo lang('tawk_to_settings'); ?> </h4>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseEight" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">

                                                    <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?>
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputEmail1"><?php echo lang('tawk_Direct_Chat_Link'); ?></label> <br>
                                                            <input type="text" class="form-control" name="chat_js" id="exampleInputEmail1" value='<?php
                                                                                                                                                    if (!empty($settings->chat_js)) {
                                                                                                                                                        echo $settings->chat_js;
                                                                                                                                                    }
                                                                                                                                                    ?>' placeholder="<?php echo lang('tawk_Direct_Chat_Link'); ?>">
                                                            <code>
                                                                Login <a href="tawk.to">tawk.to</a> then go to Dashboard -> Add-ons -> Chat Widgets <br>
                                                                In the widgets code copy the value of s1.src and paste here
                                                            </code>
                                                        </div>

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                                                            if (!empty($settings->id)) {
                                                                                echo $settings->id;
                                                                            }
                                                                            ?>'>
                                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
<script src="common/extranal/js/frontend/settings.js"></script>