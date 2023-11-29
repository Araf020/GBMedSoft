<link href="common/extranal/css/systems/active_hospital.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-hospital-o"></i>  <?php echo lang('inactive_hospitals'); ?>
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
                                <th> <?php echo lang('next_renewal_date'); ?></th>
                                <th> <?php echo lang('package'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if (!empty($hospitals)) {
                                for ($id = 0; $id < count($hospitals); $id++) {
                                    ?>
                                    <tr class="">
                                        <td> <?php echo $hospitals[$id]->name; ?></td>
                                        <td><?php echo $hospitals[$id]->email; ?></td>
                                        <td class="center"><?php echo $hospitals[$id]->address; ?></td>
                                        <td><?php echo $hospitals[$id]->phone; ?></td>
                                        <td><?php
                                            $hospital_payment_details = $this->db->get_where('hospital_payment', array('hospital_user_id' => $hospitals[$id]->id))->row();
                                            echo $hospital_payment_details->next_due_date;
                                            ?></td>
                                        <td>
                                            <?php
                                            if (!empty($hospitals[$id]->package)) {
                                                echo $this->db->get_where('package', array('id' => $hospitals[$id]->package))->row()->name;
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
