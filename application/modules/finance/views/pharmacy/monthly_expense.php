<!--sidebar end-->
<!--main content start-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<section id="main-content"> 
    <section class="wrapper site-min-height">
        <!--state overview start-->
        <link href="common/extranal/css/pharmacy/daily.css" rel="stylesheet">
        <div class="col-md-12">
            <div class="row state-overview state_overview_design">
                <div class="col-md-8">
                    <!--custom chart start-->

                    <?php
                    $currently_processing_year = date('Y', $first_minute);
                    $next_year = $currently_processing_year + 1;
                    $previous_year = $currently_processing_year - 1;
                    ?>

                    <div class="panel-heading"> <?php echo date('Y', $first_minute) . ' ' .lang('pharmacy').' '. lang('expense_report'); ?> 
                        
                        <div class="col-md-1 pull-right no-print">
                            <a class="no-print pull-right" onclick="javascript:window.print();"> <i class="fa fa-print"></i>  </a>
                        </div>
                        <div class="col-md-1 pull-right no-print">
                            <a href="finance/pharmacy/monthlyExpense?year=<?php echo $next_year; ?>">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="col-md-1 pull-right no-print">
                            <a href="finance/pharmacy/monthlyExpense?year=<?php echo $previous_year; ?>">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <div  id="chart_div"></div>




                    <div class="panel-body">
                        <div class="adv-table editable-table ">

                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('date'); ?> </th>
                                        <th> <?php echo lang('amount'); ?> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($month = 1; $month <= 12; $month++) {
                                        $time = mktime(12, 0, 0, $month, 1, $year);
                                        if (!empty($all_expenses[date('m-Y', $time)])) {
                                            if (date('Y', $time) == $year) {
                                                $month_name = date('F', $time);
                                                $amount = $all_expenses[date('m-Y', $time)];
                                            }
                                        } else {
                                            if (date('Y', $time) == $year) {
                                                $month_name = date('F', $time);
                                                $amount = 0;
                                            }
                                        }
                                        ?>
                                    
                                        <tr>
                                            <td><?php echo lang($month_name); ?></td>
                                            <td><?php echo $this->currency; ?><?php echo number_format($amount, 2, '.', ','); ?></td>
                                            <?php $total_amount[] = $amount; ?>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                        
                                         <?php
                                    if (!empty($total_amount)) {
                                        $total_amount = array_sum($total_amount);
                                    } else {
                                        $total_amount = 0;
                                    }
                                    ?>

                                    <tr class="total_amount">
                                        <td><?php echo lang('total'); ?></td> 
                                        <td><?php echo $this->currency; ?><?php echo number_format($total_amount, 2, '.', ','); ?></td>
                                    </tr>

                    

                                </tbody>
                            </table>
                        </div>
                    </div>









                </div>
            </div>
        </div>
        <!--state overview end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<!--footer end-->
<div id="myModal33" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lang(stock_alert); ?></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="common/js/codearistos.min.js"></script>
<script>
    $(window).on('load', function () {
        //      $('#myModal33').modal('show');
    });
</script>




</body>
</html>
