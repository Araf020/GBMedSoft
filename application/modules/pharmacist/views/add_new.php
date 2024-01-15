<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading col-md-7">
                <?php
                if (!empty($pharmacist->id))
                    echo lang('edit_pharmacist');
                else
                    echo lang('add_new_pharmacist');
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
                                            <?php echo $this->session->flashdata('feedback'); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="pharmacist/addNew" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('name');
                                                                                                                                }
                                                                                                                                if (!empty($pharmacist->name)) {
                                                                                                                                    echo $pharmacist->name;
                                                                                                                                }
                                                                                                                                ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?> &ast;</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('email');
                                                                                                                                    }
                                                                                                                                    if (!empty($pharmacist->email)) {
                                                                                                                                        echo $pharmacist->email;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('address');
                                                                                                                                    }
                                                                                                                                    if (!empty($pharmacist->address)) {
                                                                                                                                        echo $pharmacist->address;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('phone');
                                                                                                                                }
                                                                                                                                if (!empty($pharmacist->phone)) {
                                                                                                                                    echo $pharmacist->phone;
                                                                                                                                }
                                                                                                                                ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label class="control-label"><?php echo lang('signature'); ?></label>
                                            <div class="signature_class">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php
                                                                    if (!empty($pharmacist->signature)) {
                                                                        echo $pharmacist->signature;
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
                                                        <button class="btn btn-danger" id="remove_button_pharmacist_signature"> <?php echo lang('remove'); ?></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group last col-md-6">
                                            <label class="control-label"><?php echo lang('image'); ?></label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php
                                                                    if (!empty($pharmacist->img_url)) {
                                                                        echo $pharmacist->img_url;
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('profile'); ?> &ast; </label>
                                            <textarea class="form-control ckeditor" id="editor1" name="profile" value="" rows="50" cols="20"><?php
                                                                                                                                                if (!empty($setval)) {
                                                                                                                                                    echo set_value('profile');
                                                                                                                                                }
                                                                                                                                                if (!empty($pharmacist->profile)) {
                                                                                                                                                    echo $pharmacist->profile;
                                                                                                                                                }
                                                                                                                                                ?></textarea>

                                        </div>
                                       

                                        <input type="hidden" name="id" value='<?php
                                                                                if (!empty($pharmacist->id)) {
                                                                                    echo $pharmacist->id;
                                                                                }
                                                                                ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
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
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<script src="common/extranal/js/pharmacist.js"></script>