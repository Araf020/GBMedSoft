 <link href="common/extranal/css/pharmacist.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('pharmacist'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button  class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_pharmacist'); ?>
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
                                <th><?php echo lang('image'); ?></th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('email'); ?></th>
                                <th><?php echo lang('address'); ?></th>
                                <th><?php echo lang('phone'); ?></th>
                                <th class="no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                   

                        <?php foreach ($pharmacists as $pharmacist) { ?>
                            <tr class="">
                                <td  class="img_td"><img class="img_url1" src="<?php echo $pharmacist->img_url; ?>"></td>
                                <td> <?php echo $pharmacist->name; ?></td>
                                <td><?php echo $pharmacist->email; ?></td>
                                <td class="center"><?php echo $pharmacist->address; ?></td>
                                <td><?php echo $pharmacist->phone; ?></td>
                                <td class="no-print">
                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $pharmacist->id; ?>"><i class="fa fa-edit"></i> </button>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" href="pharmacist/delete?id=<?php echo $pharmacist->id; ?>" title="<?php echo lang('delete'); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
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






<!-- Add Pharmacist Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('add_new_pharmacist'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="pharmacist/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?> &ast;</label>
                        <input type="text" class="form-control" name="name"  value='' required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?> &ast;</label>
                        <input type="email" class="form-control" name="email"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?> &ast;</label>
                        <input type="password" class="form-control" name="password"  placeholder="" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?> &ast;</label>
                        <input type="text" class="form-control" name="address"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &ast;</label>
                        <input type="number" class="form-control" name="phone"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('signature'); ?> &ast; </label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail img_class">
                                    <img src="" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Signature</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="signature"/>
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
                                    <img src="" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?> &ast; </label>
                        <textarea class="form-control ckeditor" id="editor1" name="profile" value="" rows="50" cols="20"></textarea>
                        <!-- <input type="hidden" name="profile" id="profile" value=""> -->
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right row"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('edit_pharmacist'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editPharmacistForm" class="clearfix" action="pharmacist/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?> &ast;</label>
                        <input type="text" class="form-control" name="name"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?> &ast;</label>
                        <input type="email" class="form-control" name="email"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password"  placeholder="********" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?> &ast;</label>
                        <input type="text" class="form-control" name="address"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?> &ast;</label>
                        <input type="number" class="form-control" name="phone"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="control-label"><?php echo lang('signature');?></label>
                        <div class="signature_class">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail img_class">
                                    <img src="" id="signature" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select Signature</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="signature"/>
                                    </span>
                                    <button class="btn btn-danger" id="remove_button_pharmacist_signature"> <?php echo lang('remove');?></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group last col-md-6">
                        <label class="control-label"><?php echo lang('image'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail img_class">
                                    <img src="" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail img_url"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>
                   
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?></label>
                        <textarea class="form-control ckeditor" id="editor3" name="profile" value="" rows="50" cols="20"></textarea>
                        <!-- <input type="hidden" name="profile" id="profile1" value=""> -->
                    </div>

                    <input type="hidden" name="id" id="id_value" value=''>


                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right row"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script src="common/assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<script src="common/extranal/js/pharmacist.js"></script>