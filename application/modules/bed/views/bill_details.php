<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-height">
        <style>
            .site-height {
                min-height: 1500px;
            }

            @media print {
                .site-height {
                    min-height: 100px;
                }
            }
        </style>
        <!-- page start-->
        <link href="common/extranal/css/bed/edit_alloted_bed.css" rel="stylesheet">
        <section class="col-md-9">
            <header class="panel-heading clearfix">
                <div class="col-md-9">
                    <?php echo lang('admission'); ?> <?php echo lang('bill'); ?> <?php echo lang('details'); ?> | <?php echo $patient->name; ?>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-info btn-sm invoice_button pull-right no-print" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                </div>
            </header>

            <section class="panel-body">
                <header class="panel-heading tab-bg-dark-navy-blueee">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#medicines"><?php echo lang('all_bills'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#bill"><?php echo lang('invoice'); ?></a>
                        </li>
                    </ul>
                </header>
                <div class="panel">
                    <div class="tab-content">


                        <div id="medicines" class="tab-pane active">
                            <?php if (!empty($daily_medicine)) {
                            ?>
                                <div class="">
                                    <div class="adv-table editable-table ">
                                        <table class="table table-striped table-hover table-bordered medicine_table" id="editable-table1_disabled">
                                            <thead>
                                                <tr>
                                                    <th class="twenty_class"><?php echo lang('medicine'); ?> <?php lang('name'); ?></th>
                                                    <th class="twenty_class"><?php echo lang('date'); ?></th>
                                                    <th class="ten_class"><?php echo lang('invoice_no'); ?></th>
                                                    <th class="ten_class"><?php echo lang('sales'); ?> <?php lang('price'); ?></th>
                                                    <th class="ten_class"><?php echo lang('quantity'); ?></th>
                                                    <th class="ten_class"><?php echo lang('total'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody id="medicine_table">
                                                <?php foreach ($daily_medicine as $medicine) {
                                                    if (!empty($medicine->payment_id)) { ?>
                                                        <tr id="<?php echo $medicine->id; ?>">
                                                            <td class=""><?php echo $medicine->medicine_name; ?></td>
                                                            <td class=""><?php echo $medicine->date; ?></td>
                                                            <td class=""><?php echo $medicine->payment_id; ?></td>
                                                            <td class=""><?php echo $settings->currency . $medicine->s_price; ?></td>
                                                            <td class=""><?php echo $medicine->quantity; ?></td>
                                                            <td class=""><?php echo $settings->currency . $medicine->total; ?></td>
                                                        </tr>

                                                <?php
                                                        $medicine_total = $medicine->total;
                                                        $medicine_total_sum[] = $medicine_total;
                                                    }
                                                } ?>
                                                <tr>

                                                    <td colspan="5" style="text-align:right ; font-weight: bold;">Total</td>
                                                    <td><strong>
                                                            <?php echo $settings->currency; ?>
                                                            <?php if (!empty($medicine_total_sum)) {
                                                                echo array_sum($medicine_total_sum);
                                                            } ?>
                                                        </strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } ?>

                            <?php if (!empty($daily_service)) { ?>
                                <div class="">
                                    <div class="adv-table editable-table ">
                                        <table class="table table-striped table-hover table-bordered service_table" id="editable-table2_disabled">
                                            <thead>
                                                <tr>
                                                    <th class="twenty_class"><?php echo lang('service'); ?></th>
                                                    <th class="twenty_class"><?php echo lang('date'); ?></th>
                                                    <th class="ten_class"><?php echo lang('invoice_no'); ?></th>
                                                    <th class="ten_class"><?php echo lang('price'); ?></th>
                                                    <th class="ten_class"><?php echo lang('quantity'); ?></th>
                                                    <th class="ten_class"><?php echo lang('total'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody id="paservice_table">
                                                <?php
                                                if (!empty($daily_service)) {
                                                    foreach ($daily_service as $service) {
                                                        if (!empty($service->payment_id)) {
                                                            $service_name = $this->pservice_model->getPserviceById($service->service)->name;
                                                ?>
                                                            <tr id="<?php echo $service->date; ?>-<?php echo $service->service; ?>">
                                                                <td><?php echo $service_name; ?></td>
                                                                <td><?php echo $service->date; ?></td>
                                                                <td><?php echo $service->payment_id; ?></td>
                                                                <td><?php echo $settings->currency; ?><?php echo $service->price; ?></td>
                                                                <td><?php echo $service->quantity ?></td>
                                                                <td><?php echo $settings->currency; ?><?php echo $service->price * $service->quantity; ?></td>
                                                            </tr>
                                                <?php
                                                            $service_total = $service->price * $service->quantity;
                                                            $service_total_sum[] = $service_total;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <tr>

                                                    <td colspan="5" style="text-align:right ; font-weight: bold;">Total</td>
                                                    <td><strong>
                                                            <?php echo $settings->currency; ?>
                                                            <?php if (!empty($service_total_sum)) {
                                                                echo array_sum($service_total_sum);
                                                            } ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } ?>




                            <?php if (!empty($diagnostics_alloted)) {
                            ?>
                                <div class="">
                                    <div class="adv-table editable-table ">
                                        <table class="table table-striped table-hover table-bordered diagnostic_table" id="editable-table3_disabled">
                                            <thead>
                                                <tr>
                                                    <th class="twenty_class"><?php echo lang('diagnostic_test'); ?></th>
                                                    <th class="twenty_class"><?php echo lang('date'); ?></th>
                                                    <th class="ten_class"><?php echo lang('invoice_no'); ?></th>
                                                    <th class="ten_class"><?php echo lang('price'); ?></th>
                                                    <th class="ten_class"><?php echo lang('quantity'); ?></th>
                                                    <th class="ten_class"><?php echo lang('total'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody id="diagnostic_table">
                                                <?php
                                                if (!empty($diagnostics_alloted)) {
                                                    foreach ($diagnostics_alloted as $diagnostic_alloted) {
                                                        if (!empty($diagnostic_alloted->payment_id)) {
                                                            $diagnostic_name = $this->finance_model->getPaymentCategoryById($diagnostic_alloted->payment_procedure)->category;
                                                ?>
                                                            <tr id="<?php echo $diagnostic_alloted->date; ?>-<?php echo $diagnostic_alloted->payment_procedure; ?>">
                                                                <td><?php echo $diagnostic_name; ?></td>
                                                                <td><?php echo $diagnostic_alloted->date; ?></td>
                                                                <td><?php echo $diagnostic_alloted->payment_id; ?></td>
                                                                <td><?php echo $settings->currency; ?><?php echo $diagnostic_alloted->price; ?></td>
                                                                <td><?php echo $diagnostic_alloted->quantity ?></td>
                                                                <td><?php echo $settings->currency; ?><?php echo $diagnostic_alloted->price * $diagnostic_alloted->quantity; ?></td>
                                                            </tr>
                                                <?php
                                                            $diagnostic_total = $diagnostic_alloted->price * $diagnostic_alloted->quantity;
                                                            $diagnostic_total_sum[] = $diagnostic_total;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <tr>

                                                    <td colspan="5" style="text-align:right ; font-weight: bold;">Total</td>
                                                    <td><strong>
                                                            <?php echo $settings->currency; ?>
                                                            <?php if (!empty($diagnostic_total_sum)) {
                                                                echo array_sum($diagnostic_total_sum);
                                                            } ?>
                                                        </strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } ?>

                        </div>






                        <div id="bill" class="tab-pane">
                            <div class="">
                                <div class="adv-table editable-table ">
                                    <table class="table table-striped table-hover table-bordered diagnostic_table" id="editable-table3">
                                        <thead>
                                            <tr>
                                                <th class="twenty_class"><?php echo lang('invoice_id'); ?></th>
                                                <th class="twenty_class"><?php echo lang('type'); ?></th>
                                                <th class="twenty_class"><?php echo lang('date'); ?></th>
                                                <th class="twenty_class"><?php echo lang('total'); ?></th>
                                                <th class="ten_class"><?php echo lang('paid'); ?></th>
                                                <th class="ten_class"><?php echo lang('due'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="diagnostic_table">
                                            <?php
                                            if (!empty($all_payments)) {
                                                foreach ($all_payments as $key => $value) {
                                                    $payment_details = $this->finance_model->getPaymentById($value);
                                            ?>
                                                    <tr>
                                                        <td><a href="finance/invoice?id=<?php echo $payment_details->id; ?>" target="_blank"><?php echo $payment_details->hospital_payment_id; ?></a></td>
                                                        <td>
                                                            <?php
                                                            if ($payment_details->payment_from == 'admitted_patient_bed_medicine') {
                                                                echo lang('medicine');
                                                            } elseif ($payment_details->payment_from == 'admitted_patient_bed_service') {
                                                                echo lang('service');
                                                            } elseif ($payment_details->payment_from == 'admitted_patient_bed_diagnostic') {
                                                                echo lang('diagnostic');
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo date('d-m-Y', $payment_details->date); ?></td>
                                                        <td><?php echo $settings->currency; ?><?php echo $total = $payment_details->gross_total; ?></td>
                                                        <td><?php echo $paid = $this->finance_model->getDepositAmountByPaymentId($payment_details->id); ?></td>
                                                        <td><?php echo $settings->currency; ?><?php echo $total - $paid; ?></td>
                                                    </tr>
                                            <?php
                                                    $total_sum[] = $total;
                                                    $paid_sum[] = $paid;
                                                    $due_sum[] = $total - $paid;
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><strong><?php echo lang('total'); ?></strong></td>
                                                <td><strong>
                                                        <?php echo $settings->currency; ?>
                                                        <?php if (!empty($total_sum)) {
                                                            echo array_sum($total_sum);
                                                        } ?>
                                                    </strong></td>
                                                <td><strong>
                                                        <?php echo $settings->currency; ?>
                                                        <?php if (!empty($paid_sum)) {
                                                            echo array_sum($paid_sum);
                                                        } ?></strong></td>
                                                <td><strong>
                                                        <?php echo $settings->currency; ?>
                                                        <?php if (!empty($due_sum)) {
                                                            echo $due = array_sum($due_sum);
                                                        } ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>

        <section class="col-md-3 no-print">
            <header class="panel-heading clearfix">
                <div class="">
                    <?php echo lang('admission'); ?> <?php echo lang('details'); ?>
                </div>

            </header>

            <aside class="profile-nav">
                <section class="">
                    <ul class="nav nav-pills nav-stacked">
                        <li> <?php echo lang('admission'); ?> <?php echo lang('id'); ?> <span class="label pull-right r-activity"><?php
                                                                                                                                    if (!empty($allotment->id)) {
                                                                                                                                        echo $allotment->id;
                                                                                                                                    }
                                                                                                                                    ?></span></li>
                        <li> <?php echo lang('admission'); ?> <?php echo lang('date'); ?> <span class="label pull-right r-activity"><?php
                                                                                                                                    if (!empty($allotment->a_time)) {
                                                                                                                                        echo $allotment->a_time;
                                                                                                                                    }
                                                                                                                                    ?></span></li>
                        <li> <?php echo lang('discharge'); ?> <?php echo lang('date'); ?> <span class="label pull-right r-activity"><?php
                                                                                                                                    if (!empty($allotment->d_time)) {
                                                                                                                                        echo $allotment->d_time;
                                                                                                                                    }
                                                                                                                                    ?></span></li>
                        <li> <?php echo lang('patient'); ?> <?php echo lang('name'); ?> <span class="label pull-right r-activity"><?php echo $patient->name; ?></span></li>
                        <li> <?php echo lang('patient_id'); ?> <span class="label pull-right r-activity"><?php echo $patient->hospital_patient_id; ?></span></li>
                        <li> <?php echo lang('gender'); ?><span class="label pull-right r-activity"><?php echo $patient->sex; ?></span></li>
                        <li> <?php echo lang('birth_date'); ?><span class="label pull-right r-activity"><?php echo $patient->birthdate; ?></span></li>
                        <li> <?php echo lang('phone'); ?><span class="label pull-right r-activity"><?php echo $patient->phone; ?></span></li>
                        <li> <?php echo lang('email'); ?><span class="label pull-right r-activity"><?php echo $patient->email; ?></span></li>
                        <li class="address_bar"> <?php echo lang('address'); ?><span class="pull-right address_bar"><?php echo $patient->address; ?></span></li>
                    </ul>
                </section>
            </aside>


        </section>

    </section>
    <!-- page end-->
</section>

<!--main content end-->
<!--footer start-->



<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
if (!$this->ion_auth->in_group(array('admin'))) {
    $admin = 'other';
} else {
    $admin = 'admin';
}
?>



<script src="common/js/codearistos.min.js"></script>

<script src="common/extranal/toast.js"></script>
<link rel="stylesheet" type="text/css" href="common/extranal/toast.css">
<script type="text/javascript">
    var select_doctor = "<?php echo lang('select_doctor'); ?>";
</script>
<script type="text/javascript">
    var select_patient = "<?php echo lang('select_patient'); ?>";
</script>
<script type="text/javascript">
    var medicine_gen_name = "<?php echo lang('medicine_gen_name'); ?>";
</script>
<script type="text/javascript">
    var select_nurse = "<?php echo lang('select_nurse'); ?>";
</script>
<script type="text/javascript">
    var delete_lang = "<?php echo lang('delete'); ?>";
</script>
<script type="text/javascript">
    var more = "<?php echo lang('more'); ?>";
</script>
<script type="text/javascript">
    var edit = "<?php echo lang('edit'); ?>";
</script>
<script type="text/javascript">
    var admin = "<?php echo $admin; ?>";
</script>
<script type="text/javascript">
    var patient_name = "<?php echo $patient->name; ?>";
</script>
<script type="text/javascript">
    var patient_id = "<?php echo $patient->id; ?>";
</script>
<script type="text/javascript">
    var doctor_name = "<?php echo $doctor->name; ?>";
</script>
<script type="text/javascript">
    var doctor_id = "<?php echo $doctor->id; ?>";
</script>
<script type="text/javascript">
    var accepting_doctor_name = "<?php echo $accepting_doctor->name; ?>";
</script>
<script type="text/javascript">
    var accepting_doctor_id = "<?php echo $accepting_doctor->id; ?>";
</script>
<script type="text/javascript">
    var language = "<?php echo $this->language; ?>";
</script>
<script src="common/extranal/js/bed/edit_allotment_bed.js"></script>