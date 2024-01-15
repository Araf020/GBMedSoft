<link href="common/extranal/css/hospital/report_subscription.css" rel="stylesheet">
<?php
touch('common/js/countrypicker.js');
?>
<section id="main-content">
    <section class="wrapper site-min-height">
        <section class="col-md-3 row clearfix section_top">
            <header class="panel-heading clearfix section_top_child">
                <div class="">
                    <i class="fa fa-list-alt"></i> <?php echo lang('filter_by'); ?>
                </div>
            </header>

            <aside class="profile-nav profile-nav_aside">
                <section class="">
                    <form role="form" class="form_style" action="attendance/Report" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <select class="form-control js-example-basic-single" name="staff" value=''>
                            <?php foreach ($doctors as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 
                            
                            <?php foreach ($laboratorists as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 

                                        <?php foreach ($receptionists as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 

                                        <?php foreach ($pharmacists as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 

                                        <?php foreach ($nurses as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 

                                        <?php foreach ($accountants as $staff) { ?>
                                    <option value="<?php echo $staff->ion_user_id; ?>" <?php
                                    if ($staff->ion_user_id == $staff_select) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $staff->name; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('years'); ?></label>
                            <select class="form-control ca_select2" id="" name="r_year" value=''>
                                <?php foreach ($years as $year) {
                                ?>
                                    <option value="<?php echo $year; ?>" <?php if ($year == $year_select) { ?>selected<?php } ?>><?php echo $year; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php echo lang('months'); ?> </label>
                            <select class="form-control ca_select2" id="" name="r_month" value=''>
                            
                                <?php
                                foreach ($months as $month) {
                                   
                                ?>
                                        <option value="<?php echo $month; ?>"  <?php if ($month == $month_select) { ?>selected<?php } ?>><?php echo $month; ?></option>
                                    <?php
                                       
                                    } 
                                    ?>
                                        
                                
                            </select>
                        </div>

                        <div class="form-group button_div">
                            <button type="submit" name="submit" value="submit" class="btn btn-success submit_button"><?php echo lang('submit'); ?></button>
                            <!-- <button type="submit" name="submit" value="reset" class="btn btn-danger submit_button"><?php echo lang('reset'); ?></button> -->
                        </div>
                    </form>
                </section>
            </aside>

        </section>
        <section class="col-md-7 row clearfix">
            <header class="panel-heading">
            <p class="text1">
            <i class="fa fa-home"></i> <?php echo lang('attendance'); ?> <?php echo lang('report'); ?>
            </p>
                <?php if (!empty($this->input->post('staff'))) { ?>
                    <p class="text1">
                        <i class="fa fa-list"></i> <?php echo lang('staff'); ?> : <?php echo $staff_info->username; ?>
                    </p>
                <?php } ?>
                <?php if (!empty($this->input->post('r_year'))) { ?>
                    <p class="text1">
                        <i class="fa fa-list"></i> <?php echo lang('year'); ?> : <?php echo $this->input->post('r_year'); ?>
                    </p>
                <?php } ?>
                <?php if (!empty($this->input->post('r_month'))) { ?>
                    <p class="text1">
                        <i class="fa fa-calendar"></i> <?php echo lang('month'); ?> :<?php echo $this->input->post('r_month'); ?> 
                    </p>
                <?php } ?>
            </header>
            
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                
                                <th> <?php echo lang('name'); ?></th>
                                
                                <th> <?php echo lang('month'); ?> </th>
                                <th> <?php echo lang('clock_in'); ?></th>
                                <th> <?php echo lang('clock_out'); ?></th>
                                <th> <?php echo lang('late'); ?> </th>
                                <th> <?php echo lang('duty_hour'); ?> </th>
                                <th> <?php echo lang('status'); ?></th>

                               


                            </tr>
                        </thead>
                        <tbody>
                        <?php
 $i = 0;
foreach ($attendances as $attendance) {
    $attendance = explode('#', $attendance->details);
    foreach ($attendance as $row) {
        $i = $i + 1;
        $details = explode('_', $row);
        if($details[0] != 'NONE'){
            $status = 'Present';
        }else{
            $status = 'Absent';
        }

        if($details[0] == 'NONE'){
            $clock_in = '';
        }else{
            $clock_in = $details[0];
        }
        if($details[1] == 'NONE'){
            $clock_out = '';
        }else{
            $clock_out = $details[1];
        }
        if($details[2] == 'NONE'){
            $late = '';
        }else{
            $late = $details[2];
        }
        $in_time = strtotime($clock_in);
        $out_time = strtotime($clock_out);
        $diff = $out_time - $in_time;
        $hours = floor($diff / 3600);
        $minutes = floor(($diff % 3600) / 60);
        $seconds = $diff % 60;
        $total_diff[] = $diff;   
        
?>
    <tr>

       
        <td><?php echo $staff_info->username; ?></td>
       
        <td> <?php echo $this->input->post('r_month'); ?> <?php echo $i; ?></td>
        <td> <?php echo $clock_in; ?></td>
        <td> <?php echo $clock_out; ?></td>
        <td> <?php echo $late; ?></td>
        <td> <?php if(!empty($clock_in)){ echo "$hours : $minutes";} ?></td>
        <td> <?php echo $status; ?></td>
        
    </tr>
<?php
    // }
}}

?>
<tr>
        <td colspan="5" style="text-align:right; font-weight:bold">Total Duty Hours</td>
        <td style="font-weight:bold">
        <?php   if(!empty($this->input->post('staff'))){
                                            $total = array_sum($total_diff);
                                            $total_hours = floor($total / 3600);
$total_minutes = floor(($total % 3600) / 60);
echo "$total_hours : $total_minutes";
}
                                    ?>
        </td>
    </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="col-md-2 row clearfix section_middle">
            <section class="panel">
                <div class="weather-bg section_middle_child">
                    <div class="panel-body section_middle_child_child">
                        <div class="row">
                            <div class="col-xs-4">
                            <i class="fa fa-file"></i>
                                <?php echo lang('total'); ?> <?php echo lang('days'); ?>
                            </div>
                            <div class="col-xs-8">
                                <div class="degree">
                                   
                                <?php
                                    $total_days = array();
                                    $i = 0;
                                    
                                    foreach ($attendances as $attendance) {
                                        $attendance = explode('#', $attendance->details);
                                        foreach ($attendance as $row) {
                                            $total_days[] = $i + 1;
                                            
                                            
                                    ?>
                                       
                                    <?php
                                        // }
                                    }}

                                    echo array_sum($total_days);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel">
                <div class="weather-bg section_middle_child">
                    <div class="panel-body section_middle_child_child">
                        <div class="row">
                            <div class="col-xs-4">
                            <i class="fa fa-file"></i>
                                <?php echo lang('total'); ?> <?php echo lang('present'); ?>
                            </div>
                            <div class="col-xs-8">
                                <div class="degree">
                                <?php
                                    $total_present = array();
                                    
                                    
                                    foreach ($attendances as $attendance) {
                                        $attendance = explode('#', $attendance->details);
                                        $i = 0;
                                        foreach ($attendance as $row) {
                                            $details = explode('_', $row);
                                            if($details[0] != 'NONE'){
                                                $total_present[] = $i + 1;
                                            }
                                          
                                            
                                            
                                    ?>
                                       
                                    <?php
                                        // }
                                    }}

                                    echo array_sum($total_present);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel">
                <div class="weather-bg section_middle_child">
                    <div class="panel-body section_middle_child_child">
                        <div class="row">
                            <div class="col-xs-4">
                            <i class="fa fa-file"></i>
                                <?php echo lang('total'); ?> <?php echo lang('absent'); ?>
                            </div>
                            <div class="col-xs-8">
                                <div class="degree">
                                <?php
                                    $total_absent = array();
                                    
                                    
                                    foreach ($attendances as $attendance) {
                                        $attendance = explode('#', $attendance->details);
                                        $i = 0;
                                        foreach ($attendance as $row) {
                                            $details = explode('_', $row);
                                            if($details[0] == 'NONE'){
                                                $total_absent[] = $i + 1;
                                            }
                                          
                                            
                                            
                                    ?>
                                       
                                    <?php
                                        // }
                                    }}

                                    echo array_sum($total_absent);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel">
                <div class="weather-bg section_middle_child">
                    <div class="panel-body section_middle_child_child">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-file"></i>
                                <?php echo lang('total'); ?> <?php echo lang('late'); ?>
                            </div>
                            <div class="col-xs-8">
                                <div class="degree">
                                <?php
                                    $total_late = array();
                                    
                                    
                                    foreach ($attendances as $attendance) {
                                        $attendance = explode('#', $attendance->details);
                                        $i = 0;
                                        foreach ($attendance as $row) {
                                            $details = explode('_', $row);
                                            if($details[2] == 'late'){
                                                $total_late[] = $i + 1;
                                            }
                                          
                                            
                                            
                                    ?>
                                       
                                    <?php
                                        // }
                                    }}

                                    echo array_sum($total_late);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="panel">
                <div class="weather-bg section_middle_child">
                    <div class="panel-body section_middle_child_child">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-file"></i>
                                <?php echo lang('total'); ?> <?php echo lang('duty_hour'); ?>
                            </div>
                            <div class="col-xs-8">
                                <div class="degree">
                                <?php   if(!empty($this->input->post('staff'))){
                                            $total = array_sum($total_diff);
                                            $total_hours = floor($total / 3600);
$total_minutes = floor(($total % 3600) / 60);
echo "$total_hours : $total_minutes";
                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

        </section>
    </section>
</section>

<script src="common/js/codearistos.min.js"></script>


<script>
    "use strict";
$(document).ready(function () {
    "use strict";
    $('#editable-sample1').DataTable({
        responsive: true,
        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5],
                }
            },
        ],
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        iDisplayLength: -1,
        "order": [[0, "asc"]],
        "language": {
            "lengthMenu": "_MENU_ records per page",
        }


    });
});

</script>