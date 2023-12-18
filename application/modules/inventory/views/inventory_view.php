<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
         <link href="common/extranal/css/medicine/medicine.css" rel="stylesheet">
        <section class="">
            <header class="panel-heading">
                Inventory
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> Add Item
                            </button>
                        </div>
                    </a>
                </div>
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
                                <th> Department </th>
                                <th> <?php echo lang('options'); ?></th>
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






<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  Add Item </h4>
            </div>
            <div class="modal-body row">
            <form id="addItemForm" role="form" action="medicine/addNewItem?flag=e" class="clearfix" method="post" enctype="multipart/form-data">
            <!-- <form role="form" id="editMedicineForm" class="clearfix" action="medicine/addNewItem" method="post" enctype="multipart/form-data"> -->
                    
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?> &ast;</label>
                        <input id="autocompleteTextbox" type="text" class="form-control" name="name"  value='' placeholder="" required="">
                        <div id="autocompleteList" class="autocomplete-list"></div>
                    </div>
                    <!-- <input type="text" class="form-control" id="autocompleteTextbox"> -->
                    

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?> &ast;</label>
                        <select class="form-control m-bot15" name="category" value='' required="">
                            <option value="">Select Category</option>
                            <option value="reagent">Reagent</option>
                            <option value="accesories">Medical Accessories</option>
                            <option value="equipment">Medical equipment</option>
                            <option value="electronic">Electronic</option>
                            <option value="appliances">Appliances</option>
                            <option value="stationary">Stationary</option>
                            <option value="furniture">Furniture</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> <?php echo lang('p_price'); ?> &ast;</label>
                        <input type="text" class="form-control" name="price"  value='' placeholder="" required="">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> <?php echo lang('quantity'); ?> &ast;</label>
                        <input type="text" class="form-control" name="quantity"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"> Unit &ast;</label>
                        <input type="text" class="form-control" name="unit"  value='' placeholder="" required="">
                    </div>
                    
                    
                    <div class="form-group col-md-4"> 
                        <label for="description">description</label>
                        <input type="text" class="form-control" name="description"  value='' placeholder="">
                    </div>
                    <!-- <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> Last Add Date &ast;</label>
                        <input type="text" class="form-control default-date-picker readonly" name="last_add_date"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> Last Out Date &ast;</label>
                        <input type="text" class="form-control default-date-picker readonly" name="last_out_date"  value='' placeholder="" required="">
                    </div> -->
                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                    </div>



                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  Edit Item</h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="editMedicineForm" class="clearfix" action="medicine/addNewItem" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?> &ast;</label>
                        <input type="text" class="form-control" name="name"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?> &ast;</label>
                        <select class="form-control m-bot15" name="category" value='' required="">
                            <option value="">Select Category</option>
                            <option value="stationary">Stationary</option>
                            <option value="reagent">Reagent</option>
                            <option value="accesories">Medical Accessories</option>
                            <option value="equipment">Medical equipment</option>
                            <option value="furniture">Furniture</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> <?php echo lang('p_price'); ?> &ast;</label>
                        <input type="text" class="form-control" name="price"  value='' placeholder="" required="">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> <?php echo lang('quantity'); ?> &ast;</label>
                        <input type="text" class="form-control" name="quantity"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="exampleInputEmail1"> Unit &ast;</label>
                        <input type="text" class="form-control" name="unit"  value='' placeholder="" required="">
                    </div>
                    
                    
                    <div class="form-group col-md-4"> 
                        <label for="description">description</label>
                        <input type="text" class="form-control" name="description"  value='' placeholder="">
                    </div>
                    <!-- <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> Last Add Date &ast;</label>
                        <input type="text" class="form-control default-date-picker readonly" name="last_add_date"  value='' placeholder="" required="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"> Last Out Date &ast;</label>
                        <input type="text" class="form-control default-date-picker readonly" name="last_out_date"  value='' placeholder="" required="">
                    </div> -->
                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                    </div>



                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->









<!-- Load Medicine -->
<div class="modal fade" id="myModal3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  Load Item </h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editMedicineForm1" class="clearfix" action="medicine/Itemload" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('add_quantity'); ?> &ast;</label>
                        <input type="text" class="form-control" name="qty"  value='' placeholder="" required="">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="myModal4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  Remove Item </h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editMedicineForm2" class="clearfix" action="medicine/removeItem" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Quantity &ast;</label>
                        <input type="text" class="form-control" name="qty"  value='' placeholder="" required="">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>
<!-- <script src="common/extranal/js/medicine/medicine.js"></script> -->

<script>
    "use strict";
$(document).ready(function () {
    "use strict";
    $(".table").on("click", ".editbutton", function () {
        "use strict";
        var iid = $(this).attr('data-id');
        $('#editMedicineForm').trigger("reset");
        $('#myModal2').modal('show');
        $.ajax({
            url: 'medicine/editItemByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                "use strict";
                console.log(response);
                $('#editMedicineForm').find('[name="id"]').val(response.item.id).end();
                $('#editMedicineForm').find('[name="name"]').val(response.item.name).end();
                // $('#editMedicineForm').find('[name="box"]').val(response.item.box).end();
                $('#editMedicineForm').find('[name="price"]').val(response.item.price).end();
                $('#editMedicineForm').find('[name="unit"]').val(response.item.unit).end();
                $('#editMedicineForm').find('[name="quantity"]').val(response.item.quantity).end();
                $('#editMedicineForm').find('[name="description"]').val(response.item.description).end();
                // $('#editMedicineForm').find('[name="company"]').val(response.item.company).end();
                // $('#editMedicineForm').find('[name="effects"]').val(response.item.effects).end();
                // $('#editMedicineForm').find('[name="last_add_date"]').val(response.item.last_add_date).end();
                // $('#editMedicineForm').find('[name="last_out_date"]').val(response.item.last_out_date).end();
            }
        })
    });

    $(".table").on("click", ".removebutton", function () {
        "use strict";
        var iid = $(this).attr('data-id');
        $('#editMedicineForm2').trigger("reset");
        $('#myModal4').modal('show');


        $('#editMedicineForm2').find('[name="id"]').val(iid).end();

        
    });
});

$(document).ready(function () {
    "use strict";
    $(".table").on("click", ".load", function () {
        "use strict";
        var iid = $(this).attr('data-id');
        $('#editMedicineForm1').trigger("reset");
        $('#myModal3').modal('show');


        $('#editMedicineForm1').find('[name="id"]').val(iid).end();
    });
});

$(document).ready(function () {
    "use strict";
    var table = $('#editable-sample1').DataTable({
        responsive: true,

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "medicine/getItemList",
            type: 'POST',
        },
        scroller: {
            loadingIndicator: true
        },
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
            {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8,9], }},
            {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8,9], }},
            {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8,9], }},
            {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8,9], }},
            {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8,9], }},
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

var staticList = [
    
];

function getItems()
{
    $.ajax({
        url: "medicine/getItems",
        type: 'GET',
        // data: {query: query},
        dataType: 'json',
        success: function (response) {
            // console.log(response);
            staticList = response;
        }
    })
}
getItems();

function fetchListItems(query, callback) {
    // This is where you would make an actual AJAX request to your server
    // and retrieve the list items based on the query.
    // For simplicity, let's use a static list here.
    //call medicine/getItems using ajax

  const filteredList = staticList.filter(item => item.name.toLowerCase().includes(query.toLowerCase()));
  callback(filteredList);
  }

  $(document).ready(function() {
    const textbox = $('#autocompleteTextbox');
    const autocompleteList = $('#autocompleteList');

    textbox.on('input', function() {
        const query = $(this).val();

        fetchListItems(query, function(items) {
        displayListItems(items);
        });
    });

    function displayListItems(items) {
        autocompleteList.empty();

        if (items.length === 0) {
        autocompleteList.hide();
        return;
        }

        items.forEach(item => {
            const listItem = $('<div class="autocomplete-item">' + item.name + '</div>');
            listItem.on('click', function() {
                handleItemClick(item.id);
                textbox.val(item.name);
                autocompleteList.hide();
            });
            autocompleteList.append(listItem);
        });

        autocompleteList.show();

        function handleItemClick(itemId) {
            // Call your method here with the item id
            console.log('Item ID clicked:', itemId);
            $.ajax({
            url: 'medicine/editItemByJason?id=' + itemId+'&flag=add',
            method: 'GET',
            data: '',
            dataType: 'json',
            success: function (response) {
                "use strict";
                console.log(response);
                $('#addItemForm').find('[name="id"]').val(response.item.id).end();
                $('#addItemForm').find('[name="name"]').val(response.item.name).end();
                // $('#addItemForm').find('[name="box"]').val(response.item.box).end();
                $('#addItemForm').find('[name="price"]').val(response.item.price).end();
                $('#addItemForm').find('[name="unit"]').val(response.item.unit).end();
                // $('#addItemForm').find('[name="quantity"]').val(response.item.quantity).end();
                $('#addItemForm').find('[name="description"]').val(response.item.description).end();
                // $('#addItemForm').find('[name="company"]').val(response.item.company).end();
                // $('#addItemForm').find('[name="effects"]').val(response.item.effects).end();
                // $('#addItemForm').find('[name="last_add_date"]').val(response.item.last_add_date).end();
                // $('#addItemForm').find('[name="last_out_date"]').val(response.item.last_out_date).end();
            }
        })

        }
    }

    // Hide autocomplete list on outside click
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#autocompleteList').length && !$(event.target).is('#autocompleteTextbox')) {
        autocompleteList.hide();
        }
    });

  });

</script>