<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="active"><?= $title; ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
<?php if (validation_errors()) : ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>
<?php endif; ?>
<div class="flash-error" data-flasherror="<?= $this->session->flashdata('error') ?>"></div>

<div class="checkout-main-area pt-120 pb-120">
    <div class="container">
        <div class="checkout-wrap pt-30">
            <div class="row">
                <div class="col">
                    <div class="billing-info-wrap mr-50">
                        <h3><?= $title; ?></h3>
                        <?= form_open('checkout/address'); ?>
                        <div class="row" id="form_address">
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Nama : <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="receiver" value="<?= set_value('receiver'); ?>"
                                        placeholder="Nama Penerima">
                                    <small class="text-red"><?= form_error('receiver'); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Alamat <abbr class="required" title="required">*</abbr></label>
                                    <input class="billing-address" name="address" placeholder="Nama Jalan/ Daerah"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Kecamatan <abbr class="required" title="required">*</abbr></label>
                                    <input class="billing-address" name="sub_districts" placeholder="Nama Kecamatan"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Kota <abbr class="required" title="required">*</abbr></label>
                                    <select class="select-search" name="city_id" id="city_id">
                                        <option disabled selected>--pilih kota--</option>

                                        <?php foreach ($cities as $city) : ?>
                                        <?php foreach ($provincies as $province) : ?>
                                        <?php if ($province['province_id'] == $city['province_id']) : ?>

                                        <option value="<?= $city['city_id']; ?>" city="<?= $city['type']; ?> <?= $city['city_name']; ?>,
                                            <?= $province['province']; ?>">
                                            <?= $city['type']; ?> <?= $city['city_name']; ?>,
                                            <?= $province['province']; ?>
                                        </option>

                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Kode POS <abbr class="required" title="required">*</abbr></label>
                                    <input type="number" name="postal" placeholder="Kode POS">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>No. Telepon yang dapat dihubungi <abbr class="required"
                                            title="required">*</abbr></label>
                                    <input type="number" name="phone" placeholder="Nomer Telepon yang dapat dihubungi">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Tambahan</label>
                                    <input class="billing-address" name="option_address"
                                        placeholder="Apartemen, Gedung, Patokan" type="text">
                                </div>
                            </div>

                            <?php if ($this->uri->segment(3)) : ?>
                            <input type="hidden" name="products" value="<?= $this->uri->segment(3); ?>">
                            <?php endif; ?>
                            <div class="col-lg-12">
                                <button class="btn btn-primary" type="submit">Lanjutkan</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        <div class="checkout-account mt-25">
                            <input class="checkout-toggle" type="checkbox">
                            <span>Ship to a different address?</span>
                        </div>
                        <div class="different-address open-toggle mt-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>First Name</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Last Name</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Company Name</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20">
                                        <label>Country</label>
                                        <select>
                                            <option>Select a country</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Street Address</label>
                                        <input class="billing-address" placeholder="House number and street name"
                                            type="text">
                                        <input placeholder="Apartment, suite, unit etc." type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Town / City</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>State / County</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Postcode / ZIP</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Phone</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Email Address</label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrap">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                name="message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>