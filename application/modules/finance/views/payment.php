
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
           <link href="common/extranal/css/finance/payments.css" rel="stylesheet">
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('payments'); ?>
                <div class="col-md-4 clearfix no-print pull-right">
                    <a href="finance/addPaymentView"> 
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_payment'); ?>
                            </button>
                        </div>
                    </a> 
                </div>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="col-md-4 date_field" style="margin-top: 10px; float: left; margin-left: -14px;">
                <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control default-date-picker" name="date_from" id="date_from" value="" placeholder="<?php echo lang('date_from'); ?>" readonly="">
                                    <span class="input-group-addon"><?php echo lang('to'); ?></span>
                                    <input type="text" class="form-control default-date-picker" name="date_to" id="date_to" value="" placeholder="<?php echo lang('date_to'); ?>" readonly="">
                                </div>
                        </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample3">
                        <thead>
                            <tr>
                                <th><?php echo lang('invoice_id'); ?></th>
                                <th><?php echo lang('patient'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('from'); ?></th>
                                <th><?php echo lang('sub_total'); ?></t>
                                <th><?php echo lang('vat'); ?></th>
                                <th><?php echo lang('discount'); ?></th>
                                <th><?php echo lang('grand_total'); ?></th>
                                <th><?php echo lang('paid'); ?> <?php echo lang('amount'); ?></th>
                                <th><?php echo lang('due'); ?></th>
                                <th><?php echo lang('remarks'); ?></th>
                                <th class="option_th no-print"><?php echo lang('options'); ?></th>
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



<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<script defer type="text/javascript" src="common/assets/DataTables/datatables.min.js"></script>
<script src="common/extranal/js/finance/payments.js"></script>
<script>
$(document).ready(function () {
  

 $('#date_from').on('change',function(){
        var date_from=$(this).val();
        var date_to=$('#date_to').val();
        var date_from_split=date_from.split('-');
        var date_from_new=date_from_split[1] +'/'+date_from_split[0]+'/'+date_from_split[2]
        if(date_to !='' || date_to !=null){
            var date_to_split=date_to.split('-');
            var date_to_new=date_to_split[1] +'/'+date_to_split[0]+'/'+date_to_split[2];
        }
    if(date_to !='' || date_to !=null){
        if(Date.parse(date_to_new) <= Date.parse(date_from_new)){
           
            alert('Select a Valid Date. End Date should be Greater than Start Date');
            $(this).val("");
        }else{
            $('#editable-sample3').DataTable().destroy().clear();
            "use strict";
     var table = $('#editable-sample3').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "finance/getPayment?start_date="+date_from+"&end_date="+date_to,
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-md-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
            {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,

        "order": [[0, "desc"]],

        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            "url": "common/assets/DataTables/languages/"+language+".json"
        }
    });
    table.buttons().container().appendTo('.custom_buttons');
        }
    }
    })
    $('#date_to').on('change',function(){
        var date_to=$(this).val();
        var date_from=$('#date_from').val();
         
        var date_to_split=date_to.split('-');
        var date_to_new=date_to_split[1] +'/'+date_to_split[0]+'/'+date_to_split[2];
        if(date_from !='' || date_from !=null){
            var date_from_split=date_from.split('-');
            var date_from_new=date_from_split[1] +'/'+date_from_split[0]+'/'+date_from_split[2];
            
        }
    if(date_from !='' || date_from !=null){
        if(Date.parse(date_to_new) <= Date.parse(date_from_new)){
           
            alert('Select a Valid Date. End Date should be Greater than Start Date');
            $(this).val("");
        }else{
            $('#editable-sample3').DataTable().destroy().clear();
            "use strict";
     var table = $('#editable-sample3').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "finance/getPayment?start_date="+date_from+"&end_date="+date_to,
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-md-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
            {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
            {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], }},
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: 100,

        "order": [[0, "desc"]],

        "language": {
            "lengthMenu": "_MENU_",
            search: "_INPUT_",
            "url": "common/assets/DataTables/languages/"+language+".json"
        }
    });
    table.buttons().container().appendTo('.custom_buttons');
        }
    }
    })
})

</script>