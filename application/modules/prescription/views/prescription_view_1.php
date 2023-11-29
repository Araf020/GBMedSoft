<!--main content start-->
<section id="main-content">
    <section class="wrapper site-height">

        <?php
        $doctor = $this->doctor_model->getDoctorById($prescription->doctor);
        $patient = $this->patient_model->getPatientById($prescription->patient);
        ?>
        <link href="common/extranal/css/prescription/prescription_view_1.css" rel="stylesheet">
        <div class="col-md-8 panel bg_container margin_top" id="prescription">
            <div class="bg_prescription">
                <?php if ($redirect != 'download') { ?>
                    <div class="panel-body">
                        <div class="col-md-8 pull-left top_title">
                            <h2 class='doctor'><?php
                                                if (!empty($doctor)) {
                                                    echo $doctor->name;
                                                } else {
                                                ?>
                                    <?php echo $settings->title; ?>
                                    <h5><?php echo $settings->address; ?></h5>
                                    <h5><?php echo $settings->phone; ?></h5>
                                <?php }
                                ?>
                            </h2>
                            <h4>
                                <?php
                                if (!empty($doctor)) {
                                    echo $doctor->profile;
                                }
                                ?>
                            </h4>
                        </div>
                        <div class="col-md-4 pull-right text-right top_logo"> <img src="<?php echo $settings->logo; ?>" height="150"></div>
                    </div>
                <?php } else { ?>
                    <div id="invoice_header" style="width:100%;">
                        <table class="info_rer">
                            <tr class="tr_info">
                                <td style="width:80%;">
                                    <?php
                                    if (!empty($doctor)) { ?>
                                        <p style="color: blue; font-size:40px;"><?php echo $doctor->name; ?></p>
                                    <?php } else {
                                    ?>
                                        <p style="font-size:40px;"> <?php echo $settings->title; ?></p>
                                        <p style="font-size:40px;"><?php echo $settings->address; ?></p>
                                        <p style="font-size:40px;"><?php echo $settings->phone; ?></p>
                                    <?php }
                                    ?>
                                    <h1 style="font-size:60px!important;">
                                        <?php
                                        if (!empty($doctor)) {
                                            echo $doctor->profile;
                                        }
                                        ?>
                                    </h1>
                                </td>
                                <td id="first_td" style="width:20%;">
                                    <img src="<?php echo $settings->logo; ?>" height="150">

                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
                <hr>
                <?php if ($redirect != 'download') { ?>
                    <div class="panel-body">
                        <div class="">
                            <h5 class="col-md-4 prescription"><?php echo lang('date'); ?> : <?php echo date('d-m-Y', $prescription->date); ?></h5>
                            <h5 class="col-md-3 prescription"><?php echo lang('prescription'); ?> <?php echo lang('id'); ?> : <?php echo $prescription->id; ?></h5>
                            <h5 class="col-md-2 prescription"><?php echo lang('birth_date'); ?>: <?php echo $patient->birthdate; ?></h5>
                        </div>
                    </div>
                <?php } else { ?>
                    <div id="invoice_header" style="width:100%;">
                        <table class="info_rer">
                            <tr class="tr_info">
                                <td style="width:40%;">

                                    <?php echo lang('date'); ?> : <?php echo date('d-m-Y', $prescription->date); ?>

                                </td>
                                <td id="first_td" style="width:40%;">
                                    <?php echo lang('prescription'); ?> <?php echo lang('id'); ?> : <?php echo $prescription->id; ?>

                                </td>
                                <td id="first_td" style="width:20%;">
                                    <?php echo lang('birth_date'); ?>: <?php echo $patient->birthdate; ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
                <hr>
                <?php if ($redirect != 'download') { ?>
                    <div class="panel-body">
                        <div class="">
                            <h5 class="col-md-4 patient_name"><?php echo lang('patient'); ?>: <?php
                                                                                                if (!empty($patient)) {
                                                                                                    echo $patient->name;
                                                                                                }
                                                                                                ?>
                            </h5>
                            <h5 class="col-md-3 patient"><?php echo lang('patient_id'); ?>: <?php
                                                                                            if (!empty($patient)) {
                                                                                                echo $patient->id;
                                                                                            }
                                                                                            ?></h5>
                            <h5 class="col-md-3 patient"><?php echo lang('age'); ?>:
                                <?php
                                if (!empty($patient)) {
                                    $birthDate = strtotime($patient->birthdate);
                                    $birthDate = date('m/d/Y', $birthDate);
                                    $birthDate = explode("/", $birthDate);
                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                                    echo $age . ' Year(s)';
                                }
                                ?>
                            </h5>
                            <h5 class="col-md-2 patient text-right"><?php echo lang('gender'); ?>: <?php echo $patient->sex; ?></h5>
                            <h5 class="col-md-2 prescription"><?php echo lang('address'); ?>: <?php echo $patient->address; ?></h5>


                        </div>
                    </div>
                <?php } else { ?>
                    <div id="invoice_header" style="width:100%;">
                        <table class="info_rer">
                            <tr class="tr_info">
                                <td style="width:20%;">

                                    <?php echo lang('patient'); ?>: <?php
                                                                    if (!empty($patient)) {
                                                                        echo $patient->name;
                                                                    }
                                                                    ?>

                                </td>
                                <td id="first_td" style="width:25%;">
                                    <?php echo lang('patient_id'); ?>: <?php
                                                                        if (!empty($patient)) {
                                                                            echo $patient->id;
                                                                        }
                                                                        ?>

                                </td>
                                <td id="first_td" style="width:30%;">
                                    <?php echo lang('age'); ?>:
                                    <?php
                                    if (!empty($patient)) {
                                        $birthDate = strtotime($patient->birthdate);
                                        $birthDate = date('m/d/Y', $birthDate);
                                        $birthDate = explode("/", $birthDate);
                                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                                        echo $age . ' Year(s)';
                                    }
                                    ?>

                                </td>
                                <td id="first_td" style="width:20%;">
                                    <?php echo lang('gender'); ?>: <?php echo $patient->sex; ?>

                                </td>
                            </tr>
                            <tr class="tr_info">
                                <td style="width:100%;"><?php echo lang('address'); ?>: <?php echo $patient->address; ?></td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
                <hr>
                <?php if ($redirect != 'download') { ?>
                    <div class="col-md-12 clearfix description">



                        <div class="col-md-5 left_panel">

                            <div class="panel-body">
                                <div class="pull-left">
                                    <h5><strong><?php echo lang('history'); ?>: </strong> <br> <br> <?php echo $prescription->symptom; ?></h5>
                                </div>
                            </div>

                            <hr>

                            <div class="panel-body">
                                <div class="pull-left">
                                    <h5><strong><?php echo lang('note'); ?>:</strong> <br> <br> <?php echo $prescription->note; ?></h5>
                                </div>
                            </div>




                            <hr>

                            <div class="panel-body">
                                <div class="pull-left">
                                    <h5><strong><?php echo lang('advice'); ?>: </strong> <br> <br> <?php echo $prescription->advice; ?></h5>
                                </div>
                            </div>




                        </div>

                        <div class="col-md-7">

                            <div class="panel-body">
                                <div class="medicine_div">
                                    <strong class="medicine_div1"> Rx </strong>
                                </div>
                                <?php
                                if (!empty($prescription->medicine)) {
                                ?>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <th><?php echo lang('medicine'); ?></th>
                                            <th><?php echo lang('instruction'); ?></th>
                                            <th class="text-right"><?php echo lang('frequency'); ?></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $medicine = $prescription->medicine;
                                            $medicine = explode('###', $medicine);
                                            foreach ($medicine as $key => $value) {
                                            ?>
                                                <tr>
                                                    <?php $single_medicine = explode('***', $value); ?>

                                                    <td class=""><?php echo $this->medicine_model->getMedicineById($single_medicine[0])->name . ' - ' . $single_medicine[1]; ?> </td>
                                                    <td class=""><?php echo $single_medicine[3] . ' - ' . $single_medicine[4]; ?> </td>
                                                    <td class="text-right"><?php echo $single_medicine[2] ?> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>


                        </div>

                    </div>
                <?php } else { ?>
                    <div id="invoice_header" style="width:100%; margin-left:20px;">

                        <div class="col-md-12 clearfix description">



                            <div class="col-md-5 left_panel">

                                <div class="panel-body">
                                    <div class="pull-left">
                                        <h5><strong><?php echo lang('history'); ?>: </strong> <br> <br> <?php echo $prescription->symptom; ?></h5>
                                    </div>
                                </div>

                                <hr>

                                <div class="panel-body">
                                    <div class="pull-left">
                                        <h5><strong><?php echo lang('note'); ?>:</strong> <br> <br> <?php echo $prescription->note; ?></h5>
                                    </div>
                                </div>




                                <hr>

                                <div class="panel-body">
                                    <div class="pull-left">
                                        <h5><strong><?php echo lang('advice'); ?>: </strong> <br> <br> <?php echo $prescription->advice; ?></h5>
                                    </div>
                                </div>




                            </div>

                            <div class="col-md-7">

                                <div class="panel-body">
                                    <div class="medicine_div">
                                        <strong class="medicine_div1"> Rx </strong>
                                    </div>
                                    <?php
                                    if (!empty($prescription->medicine)) {
                                    ?>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <th><?php echo lang('medicine'); ?></th>
                                                <th><?php echo lang('instruction'); ?></th>
                                                <th class="text-right"><?php echo lang('frequency'); ?></th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $medicine = $prescription->medicine;
                                                $medicine = explode('###', $medicine);
                                                foreach ($medicine as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <?php $single_medicine = explode('***', $value); ?>

                                                        <td class=""><?php echo $this->medicine_model->getMedicineById($single_medicine[0])->name . ' - ' . $single_medicine[1]; ?> </td>
                                                        <td class=""><?php echo $single_medicine[3] . ' - ' . $single_medicine[4]; ?> </td>
                                                        <td class="text-right"><?php echo $single_medicine[2] ?> </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>


                            </div>

                        </div>

                    </div>
                <?php } ?>

            </div>
            <style>
                .image {
                    height: 70px;
                    width: 220px;
                    margin-bottom: -15px;

                }

                .site-height {
                    height: 1300px;
                }

                @media print {
                    .site-height {
                        height: 100%;
                        position: fixed;
                    }
                }
            </style>
            <?php if ($redirect != 'download') { ?>
                <div class="panel-body prescription_footer">
                    <div class="col-md-4 pull-left">
                        <!-- <img class="image" src="<?php echo $this->doctor_model->getDoctorById($prescription->doctor)->signature; ?>" alt="error"> -->
                        <hr>
                        <h6 style="text-align:center;"><?php echo lang('signature'); ?></h6>
                    </div>

                    <div class="col-md-8 pull-right text-right">
                        <!-- <h3 class='hospital'><?php echo $settings->title; ?></h3> -->
                        <h5><?php echo $settings->address; ?></h5>
                        <h5><?php echo $settings->phone; ?></h5>
                    </div>
                </div>
            <?php } else { ?>
                <div id="invoice_header" style="width:100%;">
                    <table class="info_rer">
                        <tr class="tr_info">
                            <td style="width:35%;">

                                <!-- <img class="image" src="<?php echo $this->doctor_model->getDoctorById($prescription->doctor)->signature; ?>" alt="error"> -->
                                <hr>
                                <h4 style="text-align:center;"><?php echo lang('signature'); ?></h4>

                            </td>
                            <td style="width:35%;">&nbsp; &nbsp;</td>
                            <td style="width:35%;">&nbsp; &nbsp;</td>
                            <td id="first_td" style="width:35%;">
                                <h4><?php echo $settings->address; ?></h4>
                                <h4><?php echo $settings->phone; ?></h4>

                            </td>

                        </tr>

                    </table>
                </div>
            <?php } ?>


        </div>


        <?php if ($redirect != 'download') { ?>
            <!-- invoice start-->
            <section class="col-md-4 margin_top">
                <div class="panel-primary clearfix">

                    <div class="panel_button clearfix">
                        <div class="text-center invoice-btn no-print pull-left">
                            <a class="btn btn-info btn-lg invoice_button" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                        </div>
                    </div>

                    <div class="panel_button clearfix">
                        <div class="text-center invoice-btn no-print pull-left download_button">
                            <a class="btn btn-info btn-sm detailsbutton pull-left download" id="download"><i class="fa fa-download"></i> <?php echo lang('download'); ?> </a>
                            <!-- <a href="prescription/download?id=<?php echo $prescription->id; ?>" class="btn btn-info btn-sm detailsbutton pull-left download"><i class="fa fa-download"></i> <?php echo lang('download'); ?> </a> -->
                        </div>
                    </div>
                    <div class="panel_button clearfix">
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <div class="text-center invoice-btn no-print pull-left">
                                <a class="btn btn-info btn-lg info" href='prescription/all'><i class="fa fa-medkit"></i> <?php echo lang('all'); ?> <?php echo lang('prescription'); ?> </a>
                            </div>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <div class="text-center invoice-btn no-print pull-left">
                                <a class="btn btn-info btn-lg info" href='prescription'><i class="fa fa-medkit"></i> <?php echo lang('all'); ?> <?php echo lang('prescriptions'); ?> </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="panel_button">
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <div class="text-center invoice-btn no-print pull-left">
                                <a class="btn btn-info btn-lg green" href="prescription/addPrescriptionView"><i class="fa fa-plus-circle"></i> <?php echo lang('add_prescription'); ?> </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>


                    <div class="col-md-12">
                        <form role="form" style="background-color:#f3f3f3 ;" action="prescription/sendPrescription" method="post" enctype="multipart/form-data">
                            <div class="radio radio_button">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios2" value="patient" checked="checked">
                                    <?php echo lang('send_prescription_to_patient'); ?> (<?php echo $patient->email; ?>)
                                </label>
                            </div>
                            <div class="radio radio_button">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios4" value="single_pharmacist">
                                    <?php echo lang('send_prescription_to_pharmacist'); ?>
                                </label>
                            </div>

                            <div class="radio single_pharmacist">
                                <label>
                                    <?php echo lang('select_pharmacist'); ?>
                                    <select class="form-control m-bot15" id="pharmacistchoose" name="pharmacist" value=''>

                                    </select>
                                </label>

                            </div>
                            <div class="radio radio_button">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios2" value="other">
                                    <?php echo lang('send_prescription_to_other'); ?>
                                </label>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $prescription->id; ?>">
                            <div class="radio other">
                                <label>
                                    <?php echo lang('email'); ?> <?php echo lang('address'); ?>
                                    <input type="email" name="other_email" value="" class="form-control">
                                </label>

                            </div>

                            <button type="submit" name="submit" class="btn btn-info col-md-3 pull-left"><i class="fa fa-location-arrow"></i> <?php echo lang('send'); ?></button>

                        </form>
                    </div>


                <?php } ?>


            </section>
        <?php } ?>
        <!-- invoice end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    var select_pharmacist = "<?php echo lang('select_pharmacist'); ?>";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">
    var id_pres = "<?php echo $prescription->id; ?>";
</script>
<script src="common/extranal/js/prescription/prescription_view_1.js"></script>