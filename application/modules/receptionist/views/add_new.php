<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading col-md-7">
                <?php
                if (!empty($receptionist->id))
                    echo lang('edit_receptionist');
                else
                    echo lang('add_receptionist');
                ?>
            </header>
            <div class="panel-body col-md-7">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <?php echo validation_errors(); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="receptionist/addNew" method="post" enctype="multipart/form-data">
                                        <div class="form-group">


                                            <label for="exampleInputEmail1"> <?php echo lang('name'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="name" value='<?php
                                                                                                        if (!empty($setval)) {
                                                                                                            echo set_value('name');
                                                                                                        }
                                                                                                        if (!empty($receptionist->name)) {
                                                                                                            echo $receptionist->name;
                                                                                                        }
                                                                                                        ?>' placeholder="">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('email'); ?> &ast;</label>
                                            <input type="email" class="form-control" name="email" value='<?php
                                                                                                            if (!empty($setval)) {
                                                                                                                echo set_value('email');
                                                                                                            }
                                                                                                            if (!empty($receptionist->email)) {
                                                                                                                echo $receptionist->email;
                                                                                                            }
                                                                                                            ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('password'); ?></label>
                                            <input type="password" class="form-control" name="password" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('address'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="address" value='<?php
                                                                                                            if (!empty($setval)) {
                                                                                                                echo set_value('address');
                                                                                                            }
                                                                                                            if (!empty($receptionist->address)) {
                                                                                                                echo $receptionist->address;
                                                                                                            }
                                                                                                            ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('phone'); ?> &ast;</label>
                                            <input type="number" class="form-control" name="phone" value='<?php
                                                                                                            if (!empty($setval)) {
                                                                                                                echo set_value('phone');
                                                                                                            }
                                                                                                            if (!empty($receptionist->phone)) {
                                                                                                                echo $receptionist->phone;
                                                                                                            }
                                                                                                            ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label class="control-label"><?php echo lang('signature'); ?></label>
                                            <div class="signature_class">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php

                                                                    if (!empty($receptionist->signature)) {
                                                                        echo $receptionist->signature;
                                                                    }
                                                                    ?>" id="signature" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Signature</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="default" name="signature" />
                                                        </span>
                                                        <button class="btn btn-danger" id="remove_button_receptionist_signature"> <?php echo lang('remove'); ?></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group last col-md-6 profile_class">
                                            <label class="control-label"><?php echo lang('image'); ?></label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php

                                                                    if (!empty($receptionist->img_url)) {
                                                                        echo $receptionist->img_url;
                                                                    }
                                                                    ?>" id="img" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="default" name="img_url" />
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group profile">
                                            <label for="exampleInputEmail1"><?php echo lang('profile'); ?> &ast; </label>
                                            <textarea class="form-control ckeditor" id="editor1" name="profile" value="" rows="50" cols="20"><?php
                                                                                                                                                if (!empty($setval)) {
                                                                                                                                                    echo set_value('profile');
                                                                                                                                                }
                                                                                                                                                if (!empty($receptionist->profile)) {
                                                                                                                                                    echo $receptionist->profile;
                                                                                                                                                }
                                                                                                                                                ?></textarea>


                                        </div>
                                        <!-- <input type="hidden" name="profile" id="profile" value="<?php
                                                                                                        if (!empty($setval)) {
                                                                                                            echo set_value('profile');
                                                                                                        }
                                                                                                        if (!empty($receptionist->profile)) {
                                                                                                            echo $receptionist->profile;
                                                                                                        }
                                                                                                        ?>"> -->


                                        <input type="hidden" name="id" value='<?php
                                                                                if (!empty($receptionist->id)) {
                                                                                    echo $receptionist->id;
                                                                                }
                                                                                ?>'>


                                        <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                                    </form>

                                </div>
                            </section>
                        </div>

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
<script src="common/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>
<script src="common/extranal/js/receptionist.js"></script>