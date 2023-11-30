<footer class="site-footer">
    <div class="text-center">
        <?php echo date('Y'); ?> &copy; <?php $this->db->where('hospital_id', $this->hospital_id);
                                        echo $this->db->get('settings')->row()->footer_message; ?>
        <a href="<?php echo current_url() . '#'; ?>" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<?php
$language = $this->language;

$langdate = 'en-CA';
if ($language == 'english') {
    $lang = 'en-ca';
    $langdate = 'en-CA';
} elseif ($language == 'spanish') {
    $lang = 'es';
    $langdate = 'es';
} elseif ($language == 'french') {
    $lang = 'fr';
    $langdate = 'fr';
} elseif ($language == 'portuguese') {
    $lang = 'pt';
    $langdate = 'pt';
} elseif ($language == 'arabic') {
    $lang = 'ar';
    $langdate = 'ar';
} elseif ($language == 'italian') {
    $lang = 'it';
    $langdate = 'it';
} elseif ($language == 'zh_cn') {
    $lang = 'zh-cn';
    $langdate = 'zh-CN';
} elseif ($language == 'japanese') {
    $lang = 'ja';
    $langdate = 'ja';
} elseif ($language == 'russian') {
    $lang = 'ru';
    $langdate = 'ru';
} elseif ($language == 'turkish') {
    $lang = 'tr';
    $langdate = 'tr';
} elseif ($language == 'indonesian') {
    $lang = 'id';
    $langdate = 'id';
}


?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    var langdate = "<?php echo $langdate; ?>";
    $(document).ready(function() {
        $('.readonly').keydown(function(e) {
            e.preventDefault();
        });

    })
</script>



<script src="common/js/jquery.js"></script>
<script src="common/js/bootstrap.min.js"></script>
<script src="common/js/jquery.scrollTo.min.js"></script>

<script src="common/js/moment.min.js"></script>
<script type="text/javascript" src="common/assets/DataTables/pdfmake.min.js"></script>
<script type="text/javascript" src="common/assets/DataTables/vfs_fonts.js"></script>
<script type="text/javascript" src="common/assets/DataTables/datatables.min.js"></script>


<script src="common/js/respond.min.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>


<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="common/assets/ckeditor/build/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/decoupled-document/ckeditor.js"></script> 
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>-->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> -->
<script type="text/javascript" src="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript" src="common/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="common/js/advanced-form-components.js"></script>
<script src="common/js/jquery.cookie.js"></script>
<!--common script for all pages-->
<script src="common/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="common/js/common-scripts.js"></script>
<script src="common/js/lightbox.js"></script>
<script class="include" type="text/javascript" src="common/js/jquery.dcjqaccordion.2.7.js"></script>
<!--script for this page only-->
<script src="common/js/editable-table.js"></script>

<script src="common/assets/fullcalendar/fullcalendar.js"></script>

<script type="text/javascript" src="common/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="common/assets/select2/js/select2.min.js"></script>
<script src="common/js/bootstrap-select.min.js"></script>
<script src="common/js/bootstrap-select-country.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>



<script src='common/assets/fullcalendar/locale/<?php echo $lang; ?>.js'></script>
<script type="text/javascript" src="common/assets/select2/js/select2.min.js"></script>



<script src="common/assets/bootstrap-datepicker/locales/bootstrap-datepicker.<?php echo $langdate; ?>.min.js"></script>
<!-- <script src="common/assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.<?php echo $langdate; ?>.min.js"></script> -->
<script src="common/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>





<script src="common/extranal/js/footer.js"></script>


</body>

</html>