<!DOCTYPE html>
<html lang="en">

<?php 

$webInfo        = web_info();
$notifications  = $this->database->adminNotification();
$count = 0;

foreach ($notifications as $notification) {
    if ($notification['is_seen'] == 0) {
        $count += 1;
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= ($count) ? "($count)" : '' ?> <?= $title; ?> | <?= $webInfo['name']; ?>
    </title>
    <meta name="description" content="<?= $webInfo['description']; ?>" />
    <meta name="keywords" content="<?= $webInfo['keyword']; ?>" />

    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/x-icon">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/backend/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/thumbnail-gallery.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

    <!-- Croppie -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/croppie/croppie.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">

</head>

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">