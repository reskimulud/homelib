<?php $webInfo = web_info(); ?>

<!-- Modal -->
<div class="modal fade" id="terms" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsLabel">Syarat dan Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $webInfo['terms']; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
            </div>
        </div>
    </div>
</div>

<!-- javascript -->
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/modernizr-3.6.0.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/slick.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery.syotimer.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery.instagramfeed.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/wow.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery-ui-touch-punch.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery-ui.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/magnific-popup.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/sticky-sidebar.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/easyzoom.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/scrollup.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/ajax-mail.js"></script>

<script>
//  reCAPTCHA
$('#login').submit(function onClick(e) {
    e.preventDefault();
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfIZCcaAAAAAKtNqVjv-LuuQfc8jVCio7GKA0Iu', {
            action: 'submit'
        }).then(function(token) {
            // Add your logic to submit to your backend server here.
            $('#login').prepend('<input type="hidden" name="token" value="' + token +
                '">');
            $('#login').unbind('submit').submit();
        });
    });
});


$('#agreeTerms').on('click', function() {

    if ($('#agreeTerms').is(':checked')) {
        $('.btn-block').removeAttr('disabled');
    } else {
        $('.btn-block').attr('disabled');
    }
});
</script>

</body>

</html>