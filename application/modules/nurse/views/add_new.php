<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading col-md-7">
                <?php
                if (!empty($nurse->id))
                    echo lang('edit_nurse');
                else
                    echo lang('add_nurse');
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
                                    <form role="form" action="nurse/addNew" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('name');
                                                                                                                                }
                                                                                                                                if (!empty($nurse->name)) {
                                                                                                                                    echo $nurse->name;
                                                                                                                                }
                                                                                                                                ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?> &ast;</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('email');
                                                                                                                                    }
                                                                                                                                    if (!empty($nurse->email)) {
                                                                                                                                        echo $nurse->email;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('password'); ?><?php if (!$nurse->email) { ?> &ast; <?php } ?></label>
                                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********" <?php if (!$nurse->email) { ?> required="" <?php } ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('address');
                                                                                                                                    }
                                                                                                                                    if (!empty($nurse->address)) {
                                                                                                                                        echo $nurse->address;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &ast;</label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('phone');
                                                                                                                                }
                                                                                                                                if (!empty($nurse->phone)) {
                                                                                                                                    echo $nurse->phone;
                                                                                                                                }
                                                                                                                                ?>' placeholder="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('signature'); ?> &ast; </label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php

                                                                    if (!empty($nurse->signature)) {
                                                                        echo $nurse->signature;
                                                                    }
                                                                    ?>" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Signature</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" class="default" name="signature" />
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group last col-md-6">
                                            <label class="control-label"><?php echo lang('image'); ?> </label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php

                                                                    if (!empty($nurse->img_url)) {
                                                                        echo $nurse->img_url;
                                                                    }
                                                                    ?>" alt="" />
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
                                                                                                                                                if (!empty($nurse->profile)) {
                                                                                                                                                    echo $nurse->profile;
                                                                                                                                                }
                                                                                                                                                ?></textarea>

                                        </div>


                                        <input type="hidden" name="id" value='<?php
                                                                                if (!empty($nurse->id)) {
                                                                                    echo $nurse->id;
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
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>
<script src="common/assets/tinymce/tinymce.min.js"></script>
<script src="common/extranal/js/nurse.js"></script>