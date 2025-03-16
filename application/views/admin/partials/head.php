<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SMK Muhammadiyah 2 Paleran</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= base_url('assets/backend/') ?>img/logo.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/backend/') ?>js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url('assets/backend/') ?>css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>css/plugins.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>css/kaiadmin.min.css" />

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- CSS Sweet alert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>toastr/toastr.css">
    <script src="<?php echo base_url('assets/backend/'); ?>toastr/toastr.js"></script>
</head>

<body>
    <div class="wrapper">