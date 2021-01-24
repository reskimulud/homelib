<?php $webInfo = web_info(); ?>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer-area pb-65 mt-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-info-wrap">
                    <div class="footer-logo">
                        <a href="#"><img src="<?= base_url('assets/'); ?>images/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="single-contact-info">
                        <span>24/7 dapat dihubungi:</span>
                        <p>+62<?= $webInfo['telp']; ?></p>
                        <p><?= $webInfo['email']; ?></p>
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

<!-- Croppie Image Crop tool -->
<script src="<?= base_url('assets/'); ?>plugins/croppie/croppie.min.js"></script>

<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>

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
        const idC = $('#idC').html();


        console.log(product);
        console.log(shipping_address);
        if (idC) {
            console.log(idC);

            $('#order-form').prepend("<input type='hidden' name='idC' value='" + idC +
                "'>");

        }

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

function addToCart(productID, qty = 1) {
    const countCart = $('#count-cart').text();
    console.log(countCart);
    $('.count-cart').text(Number(countCart) + 1);

    toastr.success("Produk ditambahkan ke keranjang");

    for (i = 0; i < qty; i++) {
        $.ajax({
            url: "<?= base_url('user/addToCart/'); ?>" + productID,
        });
    }

}

$('#addToCartProduct').on('click', function(e) {
    const productID = $('#product-id').val();
    const qtyCart = $('#qtybutton').val();

    addToCart(productID, qtyCart);

    e.product_id();
});


function img() {
    //croppie image profile
    $uploadCrop = $("#upload-demo").croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: "square",
        },
        boundary: {
            width: 300,
            height: 300,
        },
    });

    $("#upload").on("change", function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $uploadCrop
                .croppie("bind", {
                    url: e.target.result,
                })
                .then(function() {
                    console.log("jQuery bind complete");
                    $(".upload-result").show();
                });
        };
        reader.readAsDataURL(this.files[0]);
    });

    $(".upload-result").on("click", function(ev) {
        $uploadCrop
            .croppie("result", {
                type: "canvas",
                size: "viewport",
            })
            .then(function(resp) {
                $.ajax({
                    url: "<?php echo base_url(); ?>user/uploadImage",
                    type: "POST",
                    data: {
                        image: resp,
                    },
                    success: function(data) {
                        // html = '<img src="' + resp + '" />';
                        // $("#upload-demo-i").html(html);
                        location.replace("<?= base_url('user'); ?>");
                    }
                });
            });
        $(".save").show();
    });
}
</script>

</body>

</html>