<?php $webInfo = web_info(); ?>

<footer class="footer-area pb-65 mt-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-info-wrap">
                    <div class="footer-logo">
                        <a href="#"><img src="assets/images/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="single-contact-info">
                        <span>Alamat Kami</span>
                        <p><?= $webInfo['address']; ?></p>
                    </div>
                    <div class="single-contact-info">
                        <span>24/7 dapat dihubungi:</span>
                        <p>+62<?= $webInfo['telp']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="footer-right-wrap">
                    <div class="footer-menu">
                        <nav>
                            <ul>
                                <li><a href="<?= base_url(); ?>">home</a></li>
                                <li><a href="<?= base_url('katalog'); ?>">Katalog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="social-style-2 social-style-2-hover-black social-style-2-mrg">
                        <a href="<?= $webInfo['twitter']; ?>"><i class="social_twitter"></i></a>
                        <a href="<?= $webInfo['facebook']; ?>"><i class="social_facebook"></i></a>
                        <a href="<?= $webInfo['pinterest']; ?>"><i class="social_pinterest"></i></a>
                        <a href="<?= $webInfo['instagram']; ?>"><i class="social_instagram"></i></a>
                    </div>
                    <div class="copyright">
                        <p>Copyright © 2020 <?= $webInfo['name']; ?> | <a href="https://hasthemes.com/">Built with
                                <span>Norda</span> by HasThemes</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- All JS is here
============================================ -->

<script src="<?= base_url('assets/'); ?>js/frontend/vendor/modernizr-3.6.0.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/bootstrap.bundle.min.js"></script>
<!-- sweet alert -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweetalert2.js"></script>

<script src="<?= base_url('assets/'); ?>js/frontend/plugins/slick.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery.syotimer.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/wow.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery-ui-touch-punch.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/jquery-ui.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/magnific-popup.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/sticky-sidebar.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/easyzoom.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/scrollup.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/ajax-mail.js"></script>

<!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="<?= base_url('assets/'); ?>js/frontend/vendor/vendor.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/frontend/plugins/plugins.min.js"></script>  -->
<!-- Main JS -->
<script src="<?= base_url('assets/'); ?>js/frontend/main.js"></script>
<script src="<?= base_url('assets/'); ?>js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#click-purchase').on('click', function(e) {
        var qty = $('#qtybutton').val();
        var product_id = $('#product-id').val();

        var data = '[' + JSON.stringify({
            product_id: Number(product_id),
            qty: Number(qty)
        }) + ']';

        sessionStorage.setItem('dataProducts', data);

        <?php if ($this->session->userdata('email')) : ?>

        $('#purchase-now').prepend("<input type='hidden' name='products' value='" + data +
            "'>");
        $('#purchase-now').unbind('submit').submit();

        <?php else : ?>
        const uri = encodeURI(btoa(data));
        const uriReplace = uri.replace('=', '_');
        document.location = '<?= base_url('auth/r/'); ?>' + uriReplace;

        <?php endif; ?>

        e.preventDefault();
    });
});

$(document).ready(function() {
    $('#city_id').on('change', function() {
        const selectCity = $('#city_id option:selected').attr('city');

        $('#form_address').prepend('<input type="hidden" name="city_name" value="' + selectCity + '">');
    });
});


$(document).ready(function() {
    $('.select-search').select2();
});


<?php if (isset($json)) : ?>
$(document).ready(function() {

    $('#place-order').on('click', function(e) {
        const product = '<?= $json; ?>';
        const shipping_address = $('#shipping_address').text();
        const total_fee = $('#total-fee').html();


        console.log(product);
        console.log(shipping_address);

        $('#order-form').prepend("<input type='hidden' name='product' value='" + product +
            "'>");
        $('#order-form').prepend("<input type='hidden' name='total_fee' value='" + total_fee +
            "'>");
        $('#order-form').prepend("<input type='hidden' name='shipping_address' value='" +
            shipping_address +
            "'>");
        $('#order-form').unbind('submit').submit();

        e.preventDefault()
    });
});


$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
<?php endif; ?>
</script>

</body>

</html>