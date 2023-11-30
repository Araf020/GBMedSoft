<section id="main-content">
    <section class="wrapper site-min-height">

        <section class="panel">
            <header class="panel-heading col-md-7">
                <?php
                if (!empty($accountant->id))
                    echo lang('edit_accountant');
                else
                    echo lang('add_accountant');
                ?>
            </header>
            <div class="panel-body col-md-7">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="col-lg-12">
                            <section class="">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <?php echo validation_errors(); ?>
                                            <?php echo $this->session->flashdata('feedback'); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="accountant/addNew" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?> &#42;</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                                if (!empty($setval)) {
                                                                                                                                    echo set_value('name');
                                                                                                                                }
                                                                                                                                if (!empty($accountant->name)) {
                                                                                                                                    echo $accountant->name;
                                                                                                                                }
                                                                                                                                ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?> &#42;</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('email');
                                                                                                                                    }
                                                                                                                                    if (!empty($accountant->email)) {
                                                                                                                                        echo $accountant->email;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('password'); ?>   <?php if (empty($accountant->id)) { ?> &#42; <?php } ?> </label>
                                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********" <?php if (empty($accountant->id)) { ?> required="" <?php } ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?> &#42;</label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('address');
                                                                                                                                    }
                                                                                                                                    if (!empty($accountant->address)) {
                                                                                                                                        echo $accountant->address;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &#42;</label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('phone');
                                                                                                                                    }
                                                                                                                                    if (!empty($accountant->phone)) {
                                                                                                                                        echo $accountant->phone;
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="" required="">
                                        </div>





                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('signature'); ?> &ast; </label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail img_class">
                                                        <img src="<?php

                                                                    if (!empty($accountant->signature)) {
                                                                        echo $accountant->signature;
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

                                                                    if (!empty($accountant->img_url)) {
                                                                        echo $accountant->img_url;
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
                                                                                                                                                if (!empty($accountant->profile)) {
                                                                                                                                                    echo $accountant->profile;
                                                                                                                                                }
                                                                                                                                                ?></textarea>

                                        </div>

                                        <input type="hidden" name="id" value='<?php
                                                                                if (!empty($accountant->id)) {
                                                                                    echo $accountant->id;
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

    </section>
</section>
<script src="common/js/codearistos.min.js"></script>
<script src="common/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>

<script src="common/extranal/js/accountant.js"></script>