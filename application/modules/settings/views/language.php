<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <link href="common/extranal/css/settings/language.css" rel="stylesheet">

        <section class="content col-md-6">
            <div class="">
                <div class="">
                    <header class="panel-heading">
                        <?php echo lang('select'); ?> <?php echo lang('language'); ?>
                    </header>

                    <form role="form" class="clearfix pos form1"  id="editSaleForm" action="settings/changeLanguage" method="post" enctype="multipart/form-data">
                        <div class="form-group col-md-8"> 
                            <select class="form-control js-example-basic-single" name="language" value=''>
                                <option value="arabic" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'arabic') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('arabic'); ?> 
                                </option>
                                
                               
                                <option value="english" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'english') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('english'); ?> 
                                </option>
                               
                                <option value="spanish" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'spanish') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('spanish'); ?>
                                </option>
                                <option value="french" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'french') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('french'); ?>
                                </option>
                                <option value="italian" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'italian') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('italian'); ?>
                                </option>
                                <option value="portuguese" <?php
                                if (!empty($settings->language)) {
                                    if ($settings->language == 'portuguese') {
                                        echo 'selected';
                                    }
                                }
                                ?>><?php echo lang('portuguese'); ?>
                                </option>
                               
                                
                                
                               
                            </select>
                        </div>

                        <input type="hidden" name="language_settings" value='language_settings'>

                        <input type="hidden" name="id" value='<?php
                        if (!empty($settings->id)) {
                            echo $settings->id;
                        }
                        ?>'>

                        <div class="form-group col-md-12"> 
                            <button type="submit" name="submit" class="btn green"> <?php echo lang('submit'); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
<?php     if ($this->ion_auth->in_group(array('superadmin'))) { ?>
        <section class="content col-md-6 row">
            <div class="">
                <div class="">
                    <header class="panel-heading">
                        <?php echo lang('edit'); ?> <?php echo lang('language'); ?>
                    </header>
                    <div class="panel-body table_div">
                        <div class="adv-table editable-table ">
                            <div class=" panel clearfix"> 

                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">


                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo lang('name'); ?></th>
                                        <th><?php echo lang('options'); ?></th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <tr class="">
                                        <td><?php echo '1'; ?></td>
                                        <td><?php echo lang('arabic'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=arabic">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td><?php echo '2'; ?></td>
                                        <td><?php echo lang('english'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=english">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                    
                                    <tr class="">
                                        <td><?php echo '3'; ?></td>
                                        <td><?php echo lang('spanish'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=spanish">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td><?php echo '4'; ?></td>
                                        <td><?php echo lang('french'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=french">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td><?php echo '5'; ?></td>
                                        <td><?php echo lang('italian'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=italian">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td><?php echo '6'; ?></td>
                                        <td><?php echo lang('portuguese'); ?> </td>

                                        <td>
                                            <a class="btn btn-info btn-xs btn_width" href="settings/languageEdit?id=portuguese">   <?php echo lang('manage'); ?></a>
                                        </td>
                                    </tr>
                                   
                                   
                                </tbody>
                        </div>

                        </table>

                    </div>
                </div>
            </div>
        </section>
<?php } ?>
    </section>
</section>


<script src="common/js/codearistos.min.js"></script>
<script src="common/extranal/js/settings/language.js"></script>

