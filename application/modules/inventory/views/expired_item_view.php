<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
         <link href="common/extranal/css/medicine/medicine.css" rel="stylesheet">
        <section class="">
            <header class="panel-heading">
                Expired Items
  
            </header>
            

            <div class="panel-body"> 
                <div class="adv-table editable-table">
                    <div class="space15">
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th> SL</th>
                                <th> <?php echo lang('name'); ?></th>
                                <th> <?php echo lang('category'); ?></th>
                                
                                <th> <?php echo lang('p_price'); ?></th>
                               
                                <th> <?php echo lang('quantity'); ?></th>
                                <th> Unit</th>
                                <th> Description</th>
                                <th> Last Added </th>
                                <th> Last Out </th>
                                <th> Expire Date </th>
                                <th> Department </th>
                                
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
<!-- <script src="common/extranal/js/medicine/medicine.js"></script> -->

<script>
    "use strict";




$(document).ready(function () {
    "use strict";
    

    var table = $('#editable-sample1').DataTable({
        responsive: true,

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "medicine/getExpiredItemList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
            {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4, 5,6,7], }},
            {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4,5,6,7], }},
            {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4, 5,6,7], }},
            {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4, 5,6,7], }},
            {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5,6,7], }},
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
            searchPlaceholder: "Search...",
            "url": "common/assets/DataTables/languages/" + language + ".json"
        },
    });
    table.buttons().container().appendTo('.custom_buttons');
});

$(document).ready(function () {
    "use strict";
    $(".flashmessage").delay(3000).fadeOut(100);
});







</script>
