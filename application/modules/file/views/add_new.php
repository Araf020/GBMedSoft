  <link href="common/extranal/css/file/add_new.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <div class="col-md-7">
            <header class="panel-heading">
                <?php
                if (!empty($file->id))
                    echo lang('edit_file');
                else
                    echo lang('add_file');
                ?>
            </header>
            <div class="panel-body col-md-12">
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
                                    <form role="form" action="file/addNew" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo lang('name'); ?> &ast; </label>
                                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('title');
                                                }
                                                if (!empty($file->title)) {
                                                    echo $file->title;
                                                }
                                                ?>' required="">
                                            </div>
                                                                               
                                            <label class="control-label"><?php echo lang('upload_file'); ?></label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail <?php if (!empty($file->img_url)) { ?> img_url <?php } else { ?> img_url1 <?php } ?>">
                                                        <img src="<?php
                                                        if (!empty($file->img_url)) {
                                                            echo $file->img_url;
                                                        } 
                                                        ?>" id="img" alt="" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail img_class"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select_image'); ?></span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('change'); ?></span>
                                                            <input type="file" class="default" name="img_url" required/>
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> <?php echo lang('remove'); ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pos_client"> 
                                                <label for="exampleInputEmail1"> <?php echo lang('permission_for'); ?> :</label> 
                                                <br>
                                                <input type='checkbox' value = "doctor" name="module[]"

                                                       <?php
                                                       if (!empty($file->id)) {
                                                           $modules = $this->file_model->getFileById($file->id)->module;
                                                           $modules1 = explode(',', $modules);
                                                           if (in_array('doctor', $modules1)) {
                                                               echo 'checked';
                                                           }
                                                       } else {
                                                           echo 'checked';
                                                       }
                                                       ?>
                                                       > <?php echo lang('doctor'); ?>

                                                <br>
                                                <input type='checkbox' value = "nurse" name="module[]"  <?php
                                                if (!empty($file->id)) {
                                                    if (in_array('nurse', $modules1)) {
                                                        echo 'checked';
                                                    }
                                                } else {
                                                    echo 'checked';
                                                }
                                                ?>> <?php echo lang('nurse'); ?>                              


                                                <br>
                                                <input type='checkbox' value = "accountant" name="module[]"  <?php
                                                if (!empty($file->id)) {
                                                    if (in_array('accountant', $modules1)) {
                                                        echo 'checked';
                                                    }
                                                } else {
                                                    echo 'checked';
                                                }
                                                ?>> <?php echo lang('accountant'); ?>
                                                <br>
                                                <input type='checkbox' value = "pharmacist" name="module[]" <?php
                                                if (!empty($file->id)) {
                                                    if (in_array('pharmacist', $modules1)) {
                                                        echo 'checked';
                                                    }
                                                } else {
                                                    echo 'checked';
                                                }
                                                ?>> <?php echo lang('pharmacist'); ?>

                                                <br>
                                                <input type='checkbox' value = "laboratorist" name="module[]" <?php
                                                if (!empty($file->id)) {
                                                    if (in_array('laboratorist', $modules1)) {
                                                        echo 'checked';
                                                    }
                                                } else {
                                                    echo 'checked';
                                                }
                                                ?>> <?php echo lang('laboratorist'); ?>

                                                <br>
                                                <input type='checkbox' value = "receptionist" name="module[]" <?php
                                                if (!empty($file->id)) {
                                                    if (in_array('receptionist', $modules1)) {
                                                        echo 'checked';
                                                    }
                                                } else {
                                                    echo 'checked';
                                                }
                                                ?>> <?php echo lang('receptionist'); ?>

                                                <br>

                                            </div>
                                        </div>
                                            <input type="hidden" name="id" value='<?php
                                            if (!empty($file->id)) {
                                                echo $file->id;
                                            }
                                            ?>'>
                                            <div class="col-md-12">
                                            <button type="submit" name="submit" class="btn btn-info btn-group pull-right"><?php echo lang('submit'); ?></button>
                                            </div>
                                    </form>
                                </div>
                            </section>
                        </div>
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
