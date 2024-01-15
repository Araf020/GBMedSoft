<link href="common/extranal/css/payroll/employeePayroll.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('payroll'); ?>    

            </header>
            <div class="panel-body">
                <div class="col-md-12"> 
                    <div class="row employee_div">
                        <div class="col-md-6">
                            <label><?php echo lang('month'); ?></label>
                            <select class="form-control js-example-basic-single" id="payroll_month">
                                <?php
                                foreach ($months as $month) {
                                    if ($month == date('F')) {
                                        ?>
                                        <option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
                                        <?php
                                        break;
                                    } else {
                                        ?>
                                        <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label><?php echo lang('year'); ?></label>
                            <select class="form-control js-example-basic-single" id="payroll_year">
                                <?php foreach ($years as $year) {
                                    ?>
                                    <option value="<?php echo $year; ?>" <?php if ($year == date('Y')) { ?>selected<?php } ?>><?php echo $year; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-success generatePayroll"><i class="fas fa-paper-plane"></i> <?php echo lang('generate'); ?></button>
                </div>

                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <div class="payroll_table">
                        <table class="table table-striped table-hover table-bordered w-100" id="salary-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('staff'); ?></th>
                                    <th><?php echo lang('salary'); ?></th>
                                    <th><?php echo lang('paid_on'); ?></th>
                                    <th><?php echo lang('status'); ?></th>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (!empty($employees)) {
                                    for ($i = 0; $i < count($employees); $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $employees[$i][0]; ?></td>
                                            <td><?php echo $employees[$i][1]; ?></td>
                                            <td><?php echo $employees[$i][2]; ?></td>
                                            <td><?php echo $employees[$i][3]; ?></td>
                                            <td><?php echo $employees[$i][4]; ?></td>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->






<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('salary'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="salaryForm" action="payroll/addEditSalary" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('salary'); ?></label>
                        <input type="text" class="form-control" name="salary" id="exampleInputEmail1" value='' placeholder="Enter Salary Amount" required>
                    </div>

                    <input type="hidden" name="staff">

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->






<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">var language = "<?php echo $this->language; ?>";</script>

<script src="common/extranal/js/payroll/payroll.js"></script>
