
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('backend/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript">
    jQuery(document).ready(function() {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: '{{ GetLanguage() == 'ar' ? true : false }}',
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
    });
</script>
