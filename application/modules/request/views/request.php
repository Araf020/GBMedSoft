 <link href="common/extranal/css/request/request.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">            
            <header class="panel-heading">
                <?php echo lang('hospital_registration_from_website'); ?>
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
                                <th> <?php echo lang('package'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
                                <th class="no-print"> <?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                      

                        <?php
                        foreach ($requests as $request) {
                            ?>
                            <tr class="">
                                <td> <?php echo $request->name; ?></td>
                                <td><?php echo $request->email; ?></td>
                                <td class="center"><?php echo $request->address; ?></td>
                                <td><?php echo $request->phone; ?></td>
                                <td>
                                    <?php
                                    if (!empty($request->package)) {
                                        echo $this->package_model->getPackageById($request->package)->name;
                                    }
                                    ?>
                                </td>
                                <td> <?php echo $request->status; ?></td>
                                <td class="no-print">
                                    <?php
                                    $status = $this->db->get_where('request', array('id' => $request->id))->row()->status;
                                    if ($status == 'Pending') {
                                        ?>
                                        <a href="request/approve?id=<?php echo $request->id; ?>" type="button" class="btn btn-info btn-xs status" data-toggle="modal" data-id="<?php echo $request->id; ?>"><?php echo lang('approve'); ?></a>  

                                    <?php }
                                    ?>
                                    <?php if ($status != 'Approved') { ?>
                                        <a class="btn btn-info btn-xs btn_width delete_button" href="request/delete?id=<?php echo $request->id; ?>" onclick="return confirm('Are you sure you want to decline this request?');"><i class="fa fa-trash"></i> <?php echo lang('decline'); ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
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
<script src="common/extranal/js/request/request.js"></script>