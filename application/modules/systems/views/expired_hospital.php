<link href="common/extranal/css/systems/active_hospital.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-hospital-o"></i>  <?php echo lang('license_expire_hospitals'); ?>
            </header>




            <div class="panel-body">
                <div class="adv-table editable-table">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('title'); ?></th>
                                <th> <?php echo lang('email'); ?></th>
                                <th> <?php echo lang('address'); ?></th>
                                <th> <?php echo lang('phone'); ?></th>
                                <th> <?php echo lang('expired_on'); ?></th>
                                <th> <?php echo lang('package'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if (!empty($hospitalExpiredList)) {
                                foreach ($hospitalExpiredList as $expired) {
                                    if ($expired->next_due_date_stamp < time()) {
                                        
                                        $hospital_details = $this->db->get_where('hospital', array('id' => $expired->hospital_user_id))->row();
                                        if (!empty($hospital_details)) {
                                            ?>
                                            <tr class="">
                                                <td> <?php echo $hospital_details->name; ?></td>
                                                <td><?php echo $hospital_details->email; ?></td>
                                                <td class="center"><?php echo $hospital_details->address; ?></td>
                                                <td><?php echo $hospital_details->phone; ?></td>
                                                <td><?php echo $expired->next_due_date; ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($hospital_details->package)) {
                                                        echo $this->db->get_where('package', array('id' => $hospital_details->package))->row()->name;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo lang('inactive'); ?>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>

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
<script src="common/extranal/js/systems/systems.js"></script>