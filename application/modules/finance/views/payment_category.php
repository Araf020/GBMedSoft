  <link href="common/extranal/css/finance/payment_category.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('payment_procedures'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a href="finance/addPaymentCategoryView">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('create_payment_procedure'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table "> 
                <div class="row" style="margin-top: 10px;">
                     
                        <div class="col-md-4">
                            <select class="form-control category js-example-basic-single">
                                <option value="all"><?php echo lang('all'); ?></option>
                                <?php foreach ($paycategories as $paycategory) { ?>
                                <option value="<?php echo $paycategory->id; ?>"><?php echo $paycategory->category; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('code'); ?></th>
                               
                                <th><?php echo lang('description'); ?></th>
                                <th><?php echo lang('service_point'); ?></th>
                                <th><?php echo lang('category'); ?>
                                <th><?php echo lang('category'); ?> <?php echo lang('price'); ?> ( <?php echo $settings->currency; ?> )</th>
                                <th><?php echo lang('doctors_commission'); ?></th>
                                <th><?php echo lang('type'); ?></th>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                        
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
<!-- Add Patient Modal-->
<style>
    .ck-editor__editable:not(.ck-editor__nested-editable) { 
    min-height: 400px !important;
}
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_template'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="addTemplate" action="finance/addPaymentProccedureTemplate" class="clearfix" method="post" enctype="multipart/form-data">
              
                <div class="form-group">
                    <label class="control-label"><?php echo lang('template'); ?></label>
                    <textarea class="form-control ckeditor" id="editor1" name="report" value="" rows="50" cols="20"></textarea>
                </div>
                  
                <input type="hidden" name="id">

                    <section class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<script defer type="text/javascript" src="common/assets/DataTables/datatables.min.js"></script>
<script src="common/extranal/js/finance/payment_category.js"></script>
