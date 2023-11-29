<!--sidebar end-->
<!--main content start-->
<link href="common/extranal/css/email/email.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('sent_messages'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix"> 
                        <button class="export" onclick="javascript:window.print();">Print</button>  
                    </div>
                    <?php echo form_open('email/deleteEmail'); ?>
                      
                    <button type="submit" value="Delete" class="btn btn-danger" onClick="return confirm('Are you sure?')"> Delete All</button>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr><th class="first_th" ><button type="button" id="toggle" class="btn btn-success" value="Select" onClick="do_this()">Select</button></th>
                                <th>#</th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('message'); ?></th>
                                <th><?php echo lang('recipient'); ?></th>
                                <th><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($sents as $sent) {
                                $i = $i + 1;
                                ?>
                                <tr class="">
                                    <td><input type="checkbox" name="id[]" value="<?php echo $sent->id; ?>" /></td>
                                    <td><?php echo $i; ?></td>
                                    <td class="date_email"><?php echo date('h:i:s a m/d/y', $sent->date); ?></td>
                                    <td><?php
                                        if (!empty($sent->message)) {
                                            echo $sent->message;
                                        }
                                        ?></td>
                                    <td><?php
                                        if (!empty($sent->reciepient)) {
                                            echo $sent->reciepient;
                                        }
                                        ?></td>
                                    <td>
                                        <a class="btn btn-info btn-xs btn_width delete_button" href="email/delete?id=<?php echo $sent->id; ?>" <?php echo lang('delete'); ?> onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                     <?php echo form_close(); ?>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<!-- Add Area Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Area</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="area/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"  value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" name="description" value="<?php
                            if (!empty($area->description)) {
                                echo $area->description;
                            }
                            ?>" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Area Modal-->

<!-- Edit Area Modal-->
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Area</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="areaEditForm" action="area/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"  value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>

<script src="common/extranal/js/email/email.js"></script>