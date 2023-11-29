<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-7">
            <header class="panel-heading">
                <?php
                if (!empty($category->id))
                    echo lang('edit_payment_category');
                else
                    echo lang('create_payment_procedure');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="finance/addPaymentCategory" class="clearfix" method="post" enctype="multipart/form-data">
                        <div class="form-group"> 
                                <label for="exampleInputEmail1"><?php echo lang('item'); ?> <?php echo lang('code'); ?> &ast;</label>
                                <input type="text" class="form-control" name="code"  value='<?php
                                if (!empty($setval)) {
                                    echo set_value('code');
                                }
                                if (!empty($category->code)) {
                                    echo $category->code;
                                }
                                ?>' placeholder="" required="">    
                            </div> 
                            
                            <div class="form-group"> 
                                <label for="exampleInputEmail1"><?php echo lang('item'); ?> <?php echo lang('description'); ?> &ast;</label>
                                <input type="text" class="form-control" id="category_name" name="category"  value='<?php
                                if (!empty($setval)) {
                                    echo set_value('category');
                                }
                                if (!empty($category->category)) {
                                    echo $category->category;
                                }
                                ?>' placeholder="" required="">    
                            </div> 
                            <span id="notification" class="text-danger"></span>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('service_point'); ?> &ast;</label>
                                <input type="text" class="form-control" name="description"  value='<?php
                                if (!empty($setval)) {
                                    echo set_value('description');
                                }
                                if (!empty($category->description)) {
                                    echo $category->description;
                                }
                                ?>' placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('category'); ?> &ast;</label>
                                <select class="form-control m-bot15 js-example-basic-single" name="payment_category" value='' required="">
                                    <?php foreach ($paycategories as $paycategories) { ?>
                                        <option value="<?php echo $paycategories->id; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($paycategories->id == set_value('payment_category')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($category->payment_category)) {
                                            if ($paycategories->id == $category->payment_category) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $paycategories->category; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('price'); ?> &ast;</label>
                                <input type="text" class="form-control" name="c_price"  value='<?php
                                if (!empty($setval)) {
                                    echo set_value('c_price');
                                }
                                if (!empty($category->c_price)) {
                                    echo $category->c_price;
                                }
                                ?>' placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('doctors_commission'); ?> <?php echo lang('rate'); ?> &ast; (%)</label>
                                <input type="text" class="form-control" name="d_commission"  value='<?php
                                if (!empty($setval)) {
                                    echo set_value('d_commission');
                                }
                                if (!empty($category->d_commission)) {
                                    echo $category->d_commission;
                                }
                                ?>' placeholder="" required=""e>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('type'); ?></label>
                                <select class="form-control m-bot15" name="type" value=''>    
                                    <option value="diagnostic" <?php
                                    if (!empty($setval)) {
                                        if (set_value('type') == 'diagnostic') {
                                            echo 'selected';
                                        }
                                    }
                                    if (!empty($category->type)) {
                                        if ($category->type == 'diagnostic') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo lang('diagnostic_test'); ?> </option>  
                                    <option value="others" <?php
                                    if (!empty($setval)) {
                                        if (set_value('type') == 'others') {
                                            echo 'selected';
                                        }
                                    }
                                    if (!empty($category->type)) {
                                        if ($category->type == 'others') {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo lang('others'); ?> </option>  
                                </select>
                            </div>

                            <input type="hidden" name="id" value='<?php
                            if (!empty($category->id)) {
                                echo $category->id;
                            }
                            ?>'>

                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                            </div>
                            
                        </form>
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
<script src="common/extranal/js/finance/payment_category.js"></script>