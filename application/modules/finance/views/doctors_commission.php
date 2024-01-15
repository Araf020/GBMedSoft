
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
          <link href="common/extranal/css/finance/doctors_commission.css" rel="stylesheet">
        <section class="panel">
            <header class="panel-heading">
                 <?php echo lang('doctors_commission'); ?>
            </header>
            <div class="space15"></div> 
            <div class="col-md-12">
                <div class="col-md-7">
                    <section class="panel-body">
                        <form role="form" action="finance/doctorsCommission" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <!--     <label class="control-label col-md-3">Date Range</label> -->
                                <div class="col-md-6">
                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control dpd1" name="date_from" value="<?php
                                        if (!empty($from)) {
                                            echo $from;
                                        }
                                        ?>" placeholder="<?php echo lang('date_from'); ?>" required autocomplete="off ">
                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control dpd2" name="date_to" value="<?php
                                        if (!empty($to)) {
                                            echo $to;
                                        }
                                        ?>" placeholder="<?php echo lang('date_to'); ?>" required autocomplete="off">
                                    </div>
                                    <div class="row"></div>
                                    <span class="help-block"></span> 
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-info range_submit"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-5">
                </div>
            </div>



            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <button class="export" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>     
                    </div>
                    <div class="space15">
                        <?php
                        if (!empty($from) && !empty($to)) {
                            echo "From $from To $to";
                        }
                        ?> 
                    </div>

                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('doctor_id'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('commission'); ?></th>
                                <th><?php echo lang('total'); ?></th>
                                <th><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>


                        <?php
                        $doctor_intotal[]=array();
                        foreach ($doctors as $doctor) { ?>

                            <tr class="">
                                <td><?php echo $doctor->id; ?></td>
                                <td><?php echo $doctor->name; ?></td>
                                <td><?php echo $settings->currency; ?>
                                    <?php
                                    foreach ($payments as $payment) {
                                        if ($payment->doctor == $doctor->id) {    
                                                $doctor_amount[] = $payment->doctor_amount;            
                                        }
                                    }
                                    if (!empty($doctor_amount)) {
                                        $doctor_total = array_sum($doctor_amount);
                                        $doctor_intotal[]=$doctor_total;
                                        echo $doctor_total;
                                    } else {
                                        $doctor_total = 0;
                                        $doctor_intotal[]=0;
                                        echo $doctor_total;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $settings->currency; ?>
                                    <?php

                                    $doctor_gross = $doctor_total;
                                    if (!empty($doctor_gross)) {
                                        echo $doctor_gross;
                                    } else {
                                        echo'0';
                                    }
                                    ?>
                                </td>
                                 <td> <a class="btn btn-info btn-xs invoicebutton" href="finance/docComDetails?id=<?php echo $doctor->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('details'); ?> </a></td>
                            </tr>
                            <?php $doctor_amount = NULL; ?>
                            <?php $doctor_gross = NULL; ?>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td id="total" style=" font-weight:700 !important;"><?php echo lang('total').' '.lang('commission'); ?> :</th>
                            <td id="total_sum" style=" font-weight:700 !important;"><?php echo $settings->currency.' '.array_sum($doctor_intotal);?></td>
                            <td></td>
                            </tr>
                           
<style>
     #total {
      text-align:right;
   }
   #total_sum{
       font-weight:700 !important;
   }
</style>
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
<script src="common/extranal/js/finance/doctor_commission.js"></script>