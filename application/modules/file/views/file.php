<link href="common/extranal/css/file/file.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('file_manager'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="file/addNewView">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_file'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('title'); ?></th>
                                <th> <?php echo lang('file'); ?></th>

                                <th> <?php echo lang('options'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                      

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img src="<?php echo $file->img_url; ?>" width="100px"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                
                            }
                            ?>
                        <?php } ?>   
                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('doctor', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>" ></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        <?php if ($this->ion_auth->in_group(array('Nurse'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('nurse', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        <?php if ($this->ion_auth->in_group(array('Accountant'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('accountant', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        <?php if ($this->ion_auth->in_group(array('Pharmacist'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('pharmacist', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        <?php if ($this->ion_auth->in_group(array('Laboratorist'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('laboratorist', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
                            <?php
                            foreach ($files as $file) {
                                $modules = explode(',', $file->module);
                                if (in_array('receptionist', $modules)) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $file->title; ?></td>
                                        <td><img class="img_src_class" src="<?php echo $file->img_url; ?>"></td>
                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="<?php echo $file->img_url; ?>" download> <?php echo lang('download'); ?> </a>
                                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                <a class="btn btn-info btn-xs btn_width delete_button" href="file/delete?id=<?php echo $file->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        <?php } ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<script src="common/extranal/js/file.js"></script>
