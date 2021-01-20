<!DOCTYPE html>
<html lang="en">

<?php 

$webInfo    = web_info();

?>

<head>
    <meta charset="utf-8" />
    <title><?= ($title) ? $title . ' | ' . $webInfo['name'] : $webInfo['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $webInfo['description']; ?>" />
    <meta name="keywords" content="<?= $webInfo['keyword']; ?>" />
    <meta content="Themesdesign" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>favicon.ico">
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/signericafat.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/cerebrisans.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/elegant.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/vendor/linear-icon.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/easyzoom.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/plugins/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/frontend/style.css">

    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfIZCcaAAAAAKtNqVjv-LuuQfc8jVCio7GKA0Iu"></script>

</head>

<body data-spy="scroll" data-target="#navbarCollapse">