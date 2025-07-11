<?php
global $rand_id;
$sql = 'SELECT * FROM M_USER ORDER BY ID_USER';
$query = $this->db->query($sql);
if ($query->num_rows() > 0) {
    $result = $query->result_array();
}
$current_year = date('y');
$total_data = $query->num_rows() + 1;
$formatted_data = sprintf('%02d', $total_data);
$rand_id = 'U' . $current_year . '00' . $formatted_data;
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Master User</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/'); ?>img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/'); ?>images/ubs1.1.png">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/'); ?>img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/favicons/favicon.ico"> -->
    <link rel="manifest" href="<?= base_url('assets/'); ?>img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/'); ?>img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url('vendors/'); ?>imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('vendors/'); ?>simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url('vendors/'); ?>dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors/'); ?>flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../../../css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('vendors/'); ?>simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../release/v4.0.8/css/line.css">
    <link href="<?= base_url('assets/'); ?>css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="<?= base_url('assets/'); ?>css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="<?= base_url('assets/'); ?>css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="<?= base_url('assets/'); ?>css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js"></script>
    <script src="<?= base_url('assets/js/echarts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/charts.js'); ?>"></script>
    <link href="<?= base_url('vendors/'); ?>flatpickr/flatpickr.min.css" rel="stylesheet" />
    <script src="<?= base_url('assets/'); ?>js/flatpickr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <style>
        html,
        body {
            min-height: 100vh !important;
            margin: 0;
        }

        .border-start-xxl,
        .border-end,
        .border-end-md {
            border-width: 4px !important;
            border-color: #ccc;
        }

        .content {
            padding-bottom: 0 !important;
        }
    </style>
</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <script>
            var navbarStyle = window.config.config.phoenixNavbarStyle;
            if (navbarStyle && navbarStyle !== 'transparent') {
                document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
            }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <!-- scrollbar removed-->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <!-- parent pages-->
                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1"
                                href="<?= base_url() ?>" role="button" aria-expanded="false" aria-controls="nv-home">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            data-feather="pie-chart"></span></span><span
                                        class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <p class="navbar-vertical-label">Tickets</p>
                        <hr class="navbar-vertical-line">
                        <!-- parent pages-->
                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1"
                                href="<?= base_url() ?>index.php/welcome/allticket" role="button" aria-expanded="false"
                                aria-controls="nv-home">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fa-solid fa-ticket"></span></span><span class="nav-link-text">All
                                        Tickets</span>
                                </div>
                            </a>
                        </div>
                        <!-- parent pages-->
                        <?php if ($this->session->userdata('role') != 'Admin'): ?>
                            <!-- parent pages-->
                            <div class="nav-item-wrapper">
                                <a class="nav-link dropdown-indicator label-1" href="#nv-project-management" role="button"
                                    data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-project-management">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fa-solid fa-ticket"></span>
                                        </span>
                                        <span class="nav-link-text">My Tickets</span>
                                        <div class="dropdown-indicator-icon ps-3">
                                            <span class="fas fa-caret-right"></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse"
                                        id="nv-project-management">
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?= base_url() ?>index.php/welcome/finished" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text">Finished</span></div>
                                            </a><!-- more inner pages-->
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="<?= base_url() ?>index.php/welcome/unfinished" data-bs-toggle=""
                                                aria-expanded="false">
                                                <div class="d-flex align-items-center"><span
                                                        class="nav-link-text">Unfinished</span></div>
                                            </a><!-- more inner pages-->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <!-- label-->
                        <p class="navbar-vertical-label">Master</p>
                        <hr class="navbar-vertical-line">
                        <!-- parent pages-->
                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1"
                                href="<?= base_url() ?>index.php/welcome/category" role="button" aria-expanded="false"
                                aria-controls="nv-home">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="fas fa-list-ul"></span></span><span class="nav-link-text">Master
                                        Category</span>
                                </div>
                            </a>
                        </div>
                        <!-- parent pages-->
                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1"
                                href="<?= base_url() ?>index.php/welcome/schedule" role="button" aria-expanded="false"
                                aria-controls="nv-home">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="far fa-calendar-alt"></span></span><span class="nav-link-text">Master
                                        Schedule</span>
                                </div>
                            </a>
                        </div>
                        <!-- parent pages-->
                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1"
                                href="<?= base_url() ?>index.php/welcome/user" role="button" aria-expanded="false"
                                aria-controls="nv-home">
                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                            class="far fa-user"></span></span><span class="nav-link-text">Master
                                        User</span>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-vertical-footer"><button
                class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span
                    class="uil uil-left-arrow-to-left fs-0"></span><span
                    class="uil uil-arrow-from-right fs-0"></span><span
                    class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
        <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-logo">
                <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                    aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                        class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center"><img src="<?= base_url('assets/'); ?>images/ubs.png"
                                alt="phoenix" width="150">
                            <!-- <p class="logo-text ms-2 d-none d-sm-block">UBS</p> -->
                        </div>
                    </div>
                </a>
            </div>
            <ul class="navbar-nav navbar-nav-icons flex-row">
                <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                        role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="avatar avatar-l ">
                            <img class="rounded-circle " src="<?= base_url('assets/'); ?>images/profile.jpg" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                        aria-labelledby="navbarDropdownUser">
                        <div class="card position-relative border-0">
                            <div class="card-body p-0">
                                <div class="text-center pt-4 pb-3">
                                    <div class="avatar avatar-xl ">
                                        <img class="rounded-circle "
                                            src="<?= base_url('assets/'); ?>images/profile.jpg" alt="">
                                    </div>
                                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                                </div>
                            </div>
                            <div class="p-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="<?= base_url() ?>index.php/UserController/logout"> <span class="me-2"
                                        data-feather="log-out"> </span>Sign out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-top navbar-slim fixed-top navbar-expand" id="topNavSlim" style="display:none;">
        <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-logo">
                <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                    aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                        class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span
                        class="text-1000 d-none d-sm-inline">slim</span></a>
            </div>
            <ul class="navbar-nav navbar-nav-icons flex-row">
                <li class="nav-item">
                    <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
                            class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle"
                            type="checkbox" data-theme-control="phoenixTheme" value="dark"><label
                            class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                                class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span
                                class="fs--1 fw-bold">Dark</span></label><label
                            class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                                class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span
                                class="fs--1 fw-bold">Light</span></label></div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal"
                        data-bs-target="#searchBoxModal"><span data-feather="search"
                            style="height:12px;width:12px;"></span></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span
                            data-feather="bell" style="height:12px;width:12px;"></span></a>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                        id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                        <div class="card position-relative border-0">
                            <div class="card-header p-2">
                                <div class="d-flex justify-content-between">
                                    <h5 class="text-black mb-0">Notificatons</h5><button
                                        class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as
                                        read</button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="scrollbar-overlay" style="height: 27rem;">
                                    <div class="border-300">
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle"
                                                            src="<?= base_url('assets/'); ?>img/team/40x40/30.webp"
                                                            alt=""></div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>💬</span>Mentioned you in a
                                                            comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                        </p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">10:41 AM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3">
                                                        <div class="avatar-name rounded-circle"><span>J</span></div>
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Jane Foster</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>📅</span>Created an event.<span
                                                                class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">10:20 AM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle avatar-placeholder"
                                                            src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                            alt="">
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                                class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">9:30 AM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-300">
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle"
                                                            src="<?= base_url('assets/'); ?>img/team/40x40/57.webp"
                                                            alt=""></div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>💬</span>Mentioned you in a
                                                            comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                        </p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">9:11 AM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle"
                                                            src="<?= base_url('assets/'); ?>img/team/40x40/59.webp"
                                                            alt=""></div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Herman Carter</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>👤</span>Tagged you in a
                                                            comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                        </p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">10:58 PM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                            <div
                                                class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle"
                                                            src="<?= base_url('assets/'); ?>img/team/40x40/58.webp"
                                                            alt=""></div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                        <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                                class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                        <p class="text-800 fs--1 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span
                                                                class="fw-bold">10:18 AM </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="font-sans-serif d-none d-sm-block"><button
                                                        class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                            class="dropdown-item" href="#!">Mark as unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-0 border-top border-0">
                                <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                        href="../../pages/notifications.html">Notification history</a></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10"
                            height="10" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                            <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                            <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                            <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                            <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                            <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                            <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                        </svg></a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                        aria-labelledby="navbarDropdownNindeDots">
                        <div class="card bg-white position-relative border-0">
                            <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                                <div class="row text-center align-items-center gx-0 gy-0">
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img
                                                src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp" alt=""
                                                width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img
                                                src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp" alt=""
                                                width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp"
                                                alt="" width="20">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp" alt=""
                                                width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img
                                                src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp" alt=""
                                                width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img
                                                src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp" alt=""
                                                width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                            href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp"
                                                alt="" width="30">
                                            <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser"
                        href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        data-bs-auto-close="outside" aria-expanded="false">Olivia <span
                            class="fa-solid fa-chevron-down fs--2"></span></a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                        aria-labelledby="navbarDropdownUser">
                        <div class="card position-relative border-0">
                            <div class="card-body p-0">
                                <div class="text-center pt-4 pb-3">
                                    <div class="avatar avatar-xl ">
                                        <img class="rounded-circle "
                                            src="<?= base_url('assets/'); ?>img/team/72x72/57.webp" alt="">
                                    </div>
                                    <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                                </div>
                                <div class="mb-3 mx-3"><input class="form-control form-control-sm"
                                        id="statusUpdateInput" type="text" placeholder="Update your status"></div>
                            </div>
                            <div class="overflow-auto scrollbar" style="height: 10rem;">
                                <ul class="nav d-flex flex-column mb-2 pb-1">
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="user"></span><span>Profile</span></a></li>
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                                data-feather="pie-chart"></span>Dashboard</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="lock"></span>Posts &amp;
                                            Activity</a></li>
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="settings"></span>Settings &amp;
                                            Privacy </a></li>
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="help-circle"></span>Help
                                            Center</a></li>
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="globe"></span>Language</a></li>
                                </ul>
                            </div>
                            <div class="card-footer p-0 border-top">
                                <ul class="nav d-flex flex-column my-3">
                                    <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                                data-feather="user-plus"></span>Add another
                                            account</a></li>
                                </ul>
                                <hr>
                                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                        href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign out</a>
                                </div>
                                <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                        href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                        href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="<?= base_url('assets/'); ?>img/icons/logo.png"
                            alt="phoenix" width="27">
                        <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
            id="navbarTopCollapse">
            <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../index.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="shopping-cart"></span>E commerce</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clipboard"></span>Project management</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/crm.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="phone"></span>CRM</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../social/feed.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="share-2"></span>Social feed</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Admin</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/admin/add-product.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                    product</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/products.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customers.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customers</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customer-details.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customer details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/orders.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/order-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/refund.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Customer</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/landing/homepage.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Homepage</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/products-filter.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products filter</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/cart.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/checkout.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Checkout</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/shipping-info.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Shipping info</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/profile.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/favourite-stores.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Favourite stores</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/wishlist.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Wishlist</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/order-tracking.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    tracking</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/invoice.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="analytics.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deals.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deal-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="leads.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="lead-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="add-contact.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="clipboard"></span>Project
                                        management</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../project-management/create-new.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-list-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            list view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-card-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            card view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-board-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            board view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/todo-list.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            details</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../chat.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="message-square"></span>Chat</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="mail"></span>Email</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../email/inbox.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/email-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email
                                            detail</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/compose.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../events/create-an-event.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an
                                            event</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../events/event-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event
                                            detail</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../kanban/kanban.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/boards.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                            board</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../social/profile.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../social/settings.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../calendar.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="calendar"></span>Calendar</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../pages/starter.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="compass"></span>Starter</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq
                                            accordion</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/landing/default.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            column</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            grid</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../pages/notifications.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="bell"></span>Notifications</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/members.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="users"></span>Members</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/timeline.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clock"></span>Timeline</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="alert-triangle"></span>Errors</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/errors/404.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/403.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/500.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Simple</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/simple/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Split</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/split/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Card</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/card/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            sidenav</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav
                                            collapse</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/darknav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                    <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                        <div class="border-0 scrollbar" style="max-height: 60vh;">
                            <div class="px-3 pt-4 pb-3 img-dropdown">
                                <div class="row gx-4 gy-5">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Forms</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/forms/basic/form-control.html">Form control</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/input-group.html">Input group</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/select.html">Select</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/checks.html">Checks</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/range.html">Range</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/floating-labels.html">Floating
                                            labels</a><a class="dropdown-link"
                                            href="../../modules/forms/basic/layout.html">Layout</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/advance-select.html">Advance
                                            select</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/date-picker.html">Date picker</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/editor.html">Editor</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/file-uploader.html">File
                                            uploader</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/rating.html">Rating</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/validation.html">Validation</a><a
                                            class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Icons</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link"
                                            href="../../modules/icons/font-awesome.html">Font
                                            awesome</a><a class="dropdown-link"
                                            href="../../modules/icons/unicons.html">Unicons</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2"
                                                data-feather="bar-chart-2" style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">ECharts</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/echarts/line-charts.html">Line charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/candlestick-charts.html">Candlestick
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/geo-map.html">Geo map</a><a
                                            class="dropdown-link"
                                            href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a
                                            class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/how-to-use.html">How
                                            to use</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Components</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/components/accordion.html">Accordion</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/avatar.html">Avatar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/alerts.html">Alerts</a><a
                                            class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/breadcrumb.html">Breadcrumb</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/button.html">Buttons</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/calendar.html">Calendar</a><a
                                            class="dropdown-link" href="../../modules/components/card.html">Card</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/swiper.html">Swiper</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/collapse.html">Collapse</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/dropdown.html">Dropdown</a><a
                                            class="dropdown-link" href="../../modules/components/list-group.html">List
                                            group</a><a class="dropdown-link"
                                            href="../../modules/components/modal.html">Modals</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/offcanvas.html">Offcanvas</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/progress-bar.html">Progress bar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/placeholder.html">Placeholder</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/pagination.html">Pagination</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/popovers.html">Popovers</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/scrollspy.html">Scrollspy</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/sortable.html">Sortable</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/spinners.html">Spinners</a><a
                                            class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/tooltips.html">Tooltips</a><a
                                            class="dropdown-link" href="../../modules/components/chat-widget.html">Chat
                                            widget</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Tables</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/tables/basic-tables.html">Basic tables</a><a
                                            class="dropdown-link"
                                            href="../../modules/tables/advance-tables.html">Advance tables</a><a
                                            class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk
                                            Select</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Utilities</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/utilities/background.html">Background</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/borders.html">Borders</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/colors.html">Colors</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/display.html">Display</a><a
                                            class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/stacks.html">Stacks</a><a
                                            class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a
                                            class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/interactions.html">Interactions</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/opacity.html">Opacity</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/overflow.html">Overflow</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/position.html">Position</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/shadows.html">Shadows</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/sizing.html">Sizing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/spacing.html">Spacing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/typography.html">Typography</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/vertical-align.html">Vertical align</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/visibility.html">Visibility</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span
                            class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="life-buoy"></span>Getting started</div>
                            </a></li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="settings"></span>Customization</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="../../documentation/customization/configuration.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../documentation/gulp.html">
                                <div class="dropdown-item-wrapper"><span
                                        class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../documentation/design-file.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="figma"></span>Design file</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../changelog.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="git-merge"></span>Changelog</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../showcase.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="monitor"></span>Showcase</div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2"><input
                        class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                    data-bs-target="#searchBoxModal"><span data-feather="search"
                        style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell"
                        style="height:20px;width:20px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificatons</h5><button
                                    class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/30.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:41
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>📅</span>Created an event.<span
                                                            class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:20
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle avatar-placeholder"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                        alt=""></div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:30
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:11
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/59.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👤</span>Tagged you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:58
                                                            PM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/58.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:18
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                    href="../../pages/notifications.html">Notification history</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16"
                        viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">
                    <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp" alt=""
                                            width="20">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/72x72/57.webp"
                                        alt="">
                                </div>
                                <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput"
                                    type="text" placeholder="Update your status"></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                            data-feather="pie-chart"></span>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="lock"></span>Posts &amp; Activity</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="help-circle"></span>Help Center</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr>
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                    <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-top navbar-slim justify-content-between fixed-top navbar-expand-lg" id="navbarTopSlim"
        style="display:none;">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span
                    class="text-1000 d-none d-sm-inline">slim</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
            id="navbarTopCollapse">
            <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../index.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="shopping-cart"></span>E commerce</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clipboard"></span>Project management</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/crm.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="phone"></span>CRM</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../social/feed.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="share-2"></span>Social feed</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Admin</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/admin/add-product.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                    product</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/products.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customers.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customers</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customer-details.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customer details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/orders.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/order-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/refund.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Customer</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/landing/homepage.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Homepage</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/products-filter.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products filter</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/cart.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/checkout.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Checkout</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/shipping-info.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Shipping info</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/profile.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/favourite-stores.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Favourite stores</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/wishlist.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Wishlist</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/order-tracking.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    tracking</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/invoice.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="analytics.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deals.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deal-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="leads.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="lead-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="add-contact.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="clipboard"></span>Project
                                        management</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../project-management/create-new.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-list-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            list view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-card-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            card view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-board-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            board view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/todo-list.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            details</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../chat.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="message-square"></span>Chat</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="mail"></span>Email</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../email/inbox.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/email-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email
                                            detail</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/compose.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../events/create-an-event.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an
                                            event</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../events/event-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event
                                            detail</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../kanban/kanban.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/boards.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                            board</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../social/profile.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../social/settings.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../calendar.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="calendar"></span>Calendar</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../pages/starter.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="compass"></span>Starter</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq
                                            accordion</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/landing/default.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            column</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            grid</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../pages/notifications.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="bell"></span>Notifications</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/members.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="users"></span>Members</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/timeline.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clock"></span>Timeline</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="alert-triangle"></span>Errors</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/errors/404.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/403.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/500.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Simple</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/simple/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Split</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/split/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Card</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/card/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            sidenav</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav
                                            collapse</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/darknav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                    <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                        <div class="border-0 scrollbar" style="max-height: 60vh;">
                            <div class="px-3 pt-4 pb-3 img-dropdown">
                                <div class="row gx-4 gy-5">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Forms</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/forms/basic/form-control.html">Form control</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/input-group.html">Input group</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/select.html">Select</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/checks.html">Checks</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/range.html">Range</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/floating-labels.html">Floating
                                            labels</a><a class="dropdown-link"
                                            href="../../modules/forms/basic/layout.html">Layout</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/advance-select.html">Advance
                                            select</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/date-picker.html">Date picker</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/editor.html">Editor</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/file-uploader.html">File
                                            uploader</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/rating.html">Rating</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/validation.html">Validation</a><a
                                            class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Icons</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link"
                                            href="../../modules/icons/font-awesome.html">Font
                                            awesome</a><a class="dropdown-link"
                                            href="../../modules/icons/unicons.html">Unicons</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2"
                                                data-feather="bar-chart-2" style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">ECharts</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/echarts/line-charts.html">Line charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/candlestick-charts.html">Candlestick
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/geo-map.html">Geo map</a><a
                                            class="dropdown-link"
                                            href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a
                                            class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/how-to-use.html">How
                                            to use</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Components</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/components/accordion.html">Accordion</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/avatar.html">Avatar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/alerts.html">Alerts</a><a
                                            class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/breadcrumb.html">Breadcrumb</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/button.html">Buttons</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/calendar.html">Calendar</a><a
                                            class="dropdown-link" href="../../modules/components/card.html">Card</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/swiper.html">Swiper</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/collapse.html">Collapse</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/dropdown.html">Dropdown</a><a
                                            class="dropdown-link" href="../../modules/components/list-group.html">List
                                            group</a><a class="dropdown-link"
                                            href="../../modules/components/modal.html">Modals</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/offcanvas.html">Offcanvas</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/progress-bar.html">Progress bar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/placeholder.html">Placeholder</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/pagination.html">Pagination</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/popovers.html">Popovers</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/scrollspy.html">Scrollspy</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/sortable.html">Sortable</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/spinners.html">Spinners</a><a
                                            class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/tooltips.html">Tooltips</a><a
                                            class="dropdown-link" href="../../modules/components/chat-widget.html">Chat
                                            widget</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Tables</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/tables/basic-tables.html">Basic tables</a><a
                                            class="dropdown-link"
                                            href="../../modules/tables/advance-tables.html">Advance tables</a><a
                                            class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk
                                            Select</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Utilities</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/utilities/background.html">Background</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/borders.html">Borders</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/colors.html">Colors</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/display.html">Display</a><a
                                            class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/stacks.html">Stacks</a><a
                                            class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a
                                            class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/interactions.html">Interactions</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/opacity.html">Opacity</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/overflow.html">Overflow</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/position.html">Position</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/shadows.html">Shadows</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/sizing.html">Sizing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/spacing.html">Spacing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/typography.html">Typography</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/vertical-align.html">Vertical align</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/visibility.html">Visibility</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span
                            class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="life-buoy"></span>Getting started</div>
                            </a></li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="settings"></span>Customization</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="../../documentation/customization/configuration.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../documentation/gulp.html">
                                <div class="dropdown-item-wrapper"><span
                                        class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../documentation/design-file.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="figma"></span>Design file</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../changelog.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="git-merge"></span>Changelog</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../showcase.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="monitor"></span>Showcase</div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
                        class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark"><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                            class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span
                            class="fs--1 fw-bold">Dark</span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                            class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span
                            class="fs--1 fw-bold">Light</span></label></div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal"
                    data-bs-target="#searchBoxModal"><span data-feather="search"
                        style="height:12px;width:12px;"></span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span data-feather="bell"
                        style="height:12px;width:12px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificatons</h5><button
                                    class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/30.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:41
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>📅</span>Created an event.<span
                                                            class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:20
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle avatar-placeholder"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                        alt=""></div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:30
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:11
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/59.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👤</span>Tagged you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:58
                                                            PM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/58.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:18
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                    href="../../pages/notifications.html">Notification history</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10"
                        viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">
                    <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp" alt=""
                                            width="20">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser"
                    href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
                    aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/72x72/57.webp"
                                        alt="">
                                </div>
                                <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput"
                                    type="text" placeholder="Update your status"></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                            data-feather="pie-chart"></span>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="lock"></span>Posts &amp; Activity</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="help-circle"></span>Help Center</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr>
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                    <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarCombo" data-navbar-top="combo"
        data-move-target="#navbarVerticalNav" style="display:none;">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="<?= base_url('assets/'); ?>img/icons/logo.png"
                            alt="phoenix" width="27">
                        <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
            id="navbarTopCollapse">
            <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../index.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="shopping-cart"></span>E commerce</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clipboard"></span>Project management</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/crm.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="phone"></span>CRM</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../social/feed.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="share-2"></span>Social feed</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Admin</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/admin/add-product.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                    product</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/products.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customers.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customers</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customer-details.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customer details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/orders.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/order-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/refund.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Customer</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/landing/homepage.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Homepage</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/products-filter.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products filter</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/cart.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/checkout.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Checkout</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/shipping-info.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Shipping info</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/profile.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/favourite-stores.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Favourite stores</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/wishlist.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Wishlist</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/order-tracking.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    tracking</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/invoice.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="analytics.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deals.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deal-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="leads.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="lead-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="add-contact.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="clipboard"></span>Project
                                        management</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../project-management/create-new.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-list-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            list view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-card-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            card view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-board-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            board view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/todo-list.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            details</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../chat.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="message-square"></span>Chat</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="mail"></span>Email</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../email/inbox.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/email-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email
                                            detail</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/compose.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../events/create-an-event.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an
                                            event</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../events/event-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event
                                            detail</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../kanban/kanban.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/boards.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                            board</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../social/profile.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../social/settings.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../calendar.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="calendar"></span>Calendar</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../pages/starter.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="compass"></span>Starter</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq
                                            accordion</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/landing/default.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            column</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            grid</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../pages/notifications.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="bell"></span>Notifications</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/members.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="users"></span>Members</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/timeline.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clock"></span>Timeline</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="alert-triangle"></span>Errors</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/errors/404.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/403.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/500.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Simple</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/simple/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Split</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/split/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Card</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/card/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            sidenav</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav
                                            collapse</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/darknav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                    <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                        <div class="border-0 scrollbar" style="max-height: 60vh;">
                            <div class="px-3 pt-4 pb-3 img-dropdown">
                                <div class="row gx-4 gy-5">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Forms</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/forms/basic/form-control.html">Form control</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/input-group.html">Input group</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/select.html">Select</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/checks.html">Checks</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/range.html">Range</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/floating-labels.html">Floating
                                            labels</a><a class="dropdown-link"
                                            href="../../modules/forms/basic/layout.html">Layout</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/advance-select.html">Advance
                                            select</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/date-picker.html">Date picker</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/editor.html">Editor</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/file-uploader.html">File
                                            uploader</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/rating.html">Rating</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/validation.html">Validation</a><a
                                            class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Icons</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link"
                                            href="../../modules/icons/font-awesome.html">Font
                                            awesome</a><a class="dropdown-link"
                                            href="../../modules/icons/unicons.html">Unicons</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2"
                                                data-feather="bar-chart-2" style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">ECharts</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/echarts/line-charts.html">Line charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/candlestick-charts.html">Candlestick
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/geo-map.html">Geo map</a><a
                                            class="dropdown-link"
                                            href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a
                                            class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/how-to-use.html">How
                                            to use</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Components</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/components/accordion.html">Accordion</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/avatar.html">Avatar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/alerts.html">Alerts</a><a
                                            class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/breadcrumb.html">Breadcrumb</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/button.html">Buttons</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/calendar.html">Calendar</a><a
                                            class="dropdown-link" href="../../modules/components/card.html">Card</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/swiper.html">Swiper</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/collapse.html">Collapse</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/dropdown.html">Dropdown</a><a
                                            class="dropdown-link" href="../../modules/components/list-group.html">List
                                            group</a><a class="dropdown-link"
                                            href="../../modules/components/modal.html">Modals</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/offcanvas.html">Offcanvas</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/progress-bar.html">Progress bar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/placeholder.html">Placeholder</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/pagination.html">Pagination</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/popovers.html">Popovers</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/scrollspy.html">Scrollspy</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/sortable.html">Sortable</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/spinners.html">Spinners</a><a
                                            class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/tooltips.html">Tooltips</a><a
                                            class="dropdown-link" href="../../modules/components/chat-widget.html">Chat
                                            widget</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Tables</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/tables/basic-tables.html">Basic tables</a><a
                                            class="dropdown-link"
                                            href="../../modules/tables/advance-tables.html">Advance tables</a><a
                                            class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk
                                            Select</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Utilities</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/utilities/background.html">Background</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/borders.html">Borders</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/colors.html">Colors</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/display.html">Display</a><a
                                            class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/stacks.html">Stacks</a><a
                                            class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a
                                            class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/interactions.html">Interactions</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/opacity.html">Opacity</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/overflow.html">Overflow</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/position.html">Position</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/shadows.html">Shadows</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/sizing.html">Sizing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/spacing.html">Spacing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/typography.html">Typography</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/vertical-align.html">Vertical align</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/visibility.html">Visibility</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span
                            class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="life-buoy"></span>Getting started</div>
                            </a></li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="settings"></span>Customization</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="../../documentation/customization/configuration.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../documentation/gulp.html">
                                <div class="dropdown-item-wrapper"><span
                                        class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../documentation/design-file.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="figma"></span>Design file</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../changelog.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="git-merge"></span>Changelog</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../showcase.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="monitor"></span>Showcase</div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2"><input
                        class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                    data-bs-target="#searchBoxModal"><span data-feather="search"
                        style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell"
                        style="height:20px;width:20px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificatons</h5><button
                                    class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/30.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:41
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>📅</span>Created an event.<span
                                                            class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:20
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle avatar-placeholder"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                        alt=""></div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:30
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:11
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/59.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👤</span>Tagged you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:58
                                                            PM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/58.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:18
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                    href="../../pages/notifications.html">Notification history</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="16" height="16"
                        viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">
                    <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp" alt=""
                                            width="20">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/72x72/57.webp"
                                        alt="">
                                </div>
                                <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput"
                                    type="text" placeholder="Update your status"></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                            data-feather="pie-chart"></span>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="lock"></span>Posts &amp; Activity</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="help-circle"></span>Help Center</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr>
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                    <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-slim justify-content-between navbar-expand-lg" id="navbarComboSlim"
        data-navbar-top="combo" data-move-target="#navbarVerticalNav" style="display:none;">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand navbar-brand" href="../../index.html">phoenix <span
                    class="text-1000 d-none d-sm-inline">slim</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center"
            id="navbarTopCollapse">
            <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../index.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="shopping-cart"></span>E commerce</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clipboard"></span>Project management</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../dashboard/crm.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="phone"></span>CRM</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../social/feed.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="share-2"></span>Social feed</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="shopping-cart"></span>E commerce</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Admin</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/admin/add-product.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                    product</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/products.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customers.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customers</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/customer-details.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Customer details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/orders.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Orders
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/order-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/admin/refund.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Refund
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Customer</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../e-commerce/landing/homepage.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Homepage</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Product
                                                    details</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/products-filter.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Products filter</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/cart.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Cart
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/checkout.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Checkout</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/shipping-info.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Shipping info</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/profile.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/favourite-stores.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Favourite stores</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/wishlist.html">
                                                <div class="dropdown-item-wrapper"><span
                                                        class="me-2 uil"></span>Wishlist</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/order-tracking.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Order
                                                    tracking</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../e-commerce/landing/invoice.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Invoice
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="analytics.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deals.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="deal-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="leads.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="lead-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="reports-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                            details</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="add-contact.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add contact
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="clipboard"></span>Project
                                        management</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../project-management/create-new.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create new
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-list-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            list view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-card-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            card view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-board-view.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            board view</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/todo-list.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo list
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../project-management/project-details.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                            details</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../chat.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="message-square"></span>Chat</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="mail"></span>Email</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../email/inbox.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/email-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email
                                            detail</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../email/compose.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../events/create-an-event.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create an
                                            event</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../events/event-detail.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event
                                            detail</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../kanban/kanban.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/boards.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                            board</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../social/profile.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../social/settings.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../calendar.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="calendar"></span>Calendar</div>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../pages/starter.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="compass"></span>Starter</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq
                                            accordion</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/landing/default.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            column</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                            grid</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../pages/notifications.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="bell"></span>Notifications</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/members.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="users"></span>Members</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../pages/timeline.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="clock"></span>Timeline</div>
                            </a></li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="alert-triangle"></span>Errors</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../pages/errors/404.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/403.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../pages/errors/500.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500</div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="lock"></span>Authentication</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Simple</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/simple/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/simple/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Split</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/split/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/split/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <div class="dropdown-item-wrapper"><span
                                                class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                    class="me-2 uil"></span>Card</span></div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-in.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign in
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-up.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign up
                                                </div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/sign-out.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sign
                                                    out</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/forgot-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Forgot
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/reset-password.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reset
                                                    password</div>
                                            </a></li>
                                        <li><a class="dropdown-item"
                                                href="../../pages/authentication/card/lock-screen.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lock
                                                    screen</div>
                                            </a></li>
                                        <li><a class="dropdown-item" href="../../pages/authentication/card/2FA.html">
                                                <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                </div>
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            sidenav</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav
                                            collapse</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/darknav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav slim
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar top
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo nav
                                            slim</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                    <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                        <div class="border-0 scrollbar" style="max-height: 60vh;">
                            <div class="px-3 pt-4 pb-3 img-dropdown">
                                <div class="row gx-4 gy-5">
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Forms</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/forms/basic/form-control.html">Form control</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/input-group.html">Input group</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/select.html">Select</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/checks.html">Checks</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/range.html">Range</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/basic/floating-labels.html">Floating
                                            labels</a><a class="dropdown-link"
                                            href="../../modules/forms/basic/layout.html">Layout</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/advance-select.html">Advance
                                            select</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/date-picker.html">Date picker</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/editor.html">Editor</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/file-uploader.html">File
                                            uploader</a><a class="dropdown-link"
                                            href="../../modules/forms/advance/rating.html">Rating</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/advance/emoji-button.html">Emoji button</a><a
                                            class="dropdown-link"
                                            href="../../modules/forms/validation.html">Validation</a><a
                                            class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Icons</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/icons/feather.html">Feather</a><a class="dropdown-link"
                                            href="../../modules/icons/font-awesome.html">Font
                                            awesome</a><a class="dropdown-link"
                                            href="../../modules/icons/unicons.html">Unicons</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2"
                                                data-feather="bar-chart-2" style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">ECharts</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/echarts/line-charts.html">Line charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/candlestick-charts.html">Candlestick
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/geo-map.html">Geo map</a><a
                                            class="dropdown-link"
                                            href="../../modules/echarts/scatter-charts.html">Scatter charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/pie-charts.html">Pie
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a
                                            class="dropdown-link" href="../../modules/echarts/radar-charts.html">Radar
                                            charts</a><a class="dropdown-link"
                                            href="../../modules/echarts/heatmap-charts.html">Heatmap charts</a><a
                                            class="dropdown-link" href="../../modules/echarts/how-to-use.html">How
                                            to use</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Components</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/components/accordion.html">Accordion</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/avatar.html">Avatar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/alerts.html">Alerts</a><a
                                            class="dropdown-link" href="../../modules/components/badge.html">Badge</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/breadcrumb.html">Breadcrumb</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/button.html">Buttons</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/calendar.html">Calendar</a><a
                                            class="dropdown-link" href="../../modules/components/card.html">Card</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/carousel/swiper.html">Swiper</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/collapse.html">Collapse</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/dropdown.html">Dropdown</a><a
                                            class="dropdown-link" href="../../modules/components/list-group.html">List
                                            group</a><a class="dropdown-link"
                                            href="../../modules/components/modal.html">Modals</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/offcanvas.html">Offcanvas</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/progress-bar.html">Progress bar</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/placeholder.html">Placeholder</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/pagination.html">Pagination</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/popovers.html">Popovers</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/scrollspy.html">Scrollspy</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/sortable.html">Sortable</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/spinners.html">Spinners</a><a
                                            class="dropdown-link" href="../../modules/components/toast.html">Toast</a><a
                                            class="dropdown-link"
                                            href="../../modules/components/tooltips.html">Tooltips</a><a
                                            class="dropdown-link" href="../../modules/components/chat-widget.html">Chat
                                            widget</a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Tables</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/tables/basic-tables.html">Basic tables</a><a
                                            class="dropdown-link"
                                            href="../../modules/tables/advance-tables.html">Advance tables</a><a
                                            class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk
                                            Select</a>
                                        <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                                                style="stroke-width:2;"></span>
                                            <h6 class="dropdown-item-title">Utilities</h6>
                                        </div><a class="dropdown-link"
                                            href="../../modules/utilities/background.html">Background</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/borders.html">Borders</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/colors.html">Colors</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/display.html">Display</a><a
                                            class="dropdown-link" href="../../modules/utilities/flex.html">Flex</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/stacks.html">Stacks</a><a
                                            class="dropdown-link" href="../../modules/utilities/float.html">Float</a><a
                                            class="dropdown-link" href="../../modules/utilities/grid.html">Grid</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/interactions.html">Interactions</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/opacity.html">Opacity</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/overflow.html">Overflow</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/position.html">Position</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/shadows.html">Shadows</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/sizing.html">Sizing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/spacing.html">Spacing</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/typography.html">Typography</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/vertical-align.html">Vertical align</a><a
                                            class="dropdown-link"
                                            href="../../modules/utilities/visibility.html">Visibility</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false"><span
                            class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                    <ul class="dropdown-menu navbar-dropdown-caret">
                        <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="life-buoy"></span>Getting started</div>
                            </a></li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="customization"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="settings"></span>Customization</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="../../documentation/customization/configuration.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Configuration
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/dark-mode.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark mode
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle" id="layouts-doc"
                                href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <div class="dropdown-item-wrapper"><span
                                        class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                            class="me-2 uil" data-feather="table"></span>Layouts doc</span></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../documentation/layouts/vertical-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/horizontal-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                            navbar</div>
                                    </a></li>
                                <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                                        <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual nav
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="../../documentation/gulp.html">
                                <div class="dropdown-item-wrapper"><span
                                        class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../documentation/design-file.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="figma"></span>Design file</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../changelog.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="git-merge"></span>Changelog</div>
                            </a></li>
                        <li><a class="dropdown-item" href="../../showcase.html">
                                <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                        data-feather="monitor"></span>Showcase</div>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-ion-wait pe-2 theme-control-toggle-slim"><input
                        class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark"><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                            class="icon me-1 d-none d-sm-block" data-feather="moon"></span><span
                            class="fs--1 fw-bold">Dark</span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span
                            class="icon me-1 d-none d-sm-block" data-feather="sun"></span><span
                            class="fs--1 fw-bold">Light</span></label></div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="#" data-bs-toggle="modal"
                    data-bs-target="#searchBoxModal"><span data-feather="search"
                        style="height:12px;width:12px;"></span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false"><span data-feather="bell"
                        style="height:12px;width:12px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificatons</h5><button
                                    class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/30.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:41
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3">
                                                    <div class="avatar-name rounded-circle"><span>J</span></div>
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jane Foster</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>📅</span>Created an event.<span
                                                            class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:20
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle avatar-placeholder"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                        alt=""></div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:30
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-300">
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/57.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>💬</span>Mentioned you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">9:11
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/59.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Herman Carter</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👤</span>Tagged you in a
                                                        comment.<span class="ms-2 text-400 fw-bold fs--2"></span>
                                                    </p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:58
                                                            PM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m status-online me-3"><img
                                                        class="rounded-circle"
                                                        src="<?= base_url('assets/'); ?>img/team/40x40/58.webp" alt="">
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                    <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                            class='me-1 fs--2'>👍</span>Liked your comment.<span
                                                            class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                    <p class="text-800 fs--1 mb-0"><span
                                                            class="me-1 fas fa-clock"></span><span class="fw-bold">10:18
                                                            AM </span>August 7,2021</p>
                                                </div>
                                            </div>
                                            <div class="font-sans-serif d-none d-sm-block"><button
                                                    class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                        class="dropdown-item" href="#!">Mark as unread</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                    href="../../pages/notifications.html">Notification history</a></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false"><svg width="10" height="10"
                        viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">
                    <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp" alt=""
                                            width="20">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp" alt=""
                                            width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0 white-space-nowrap" id="navbarDropdownUser"
                    href="#!" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
                    aria-expanded="false">Olivia <span class="fa-solid fa-chevron-down fs--2"></span></a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/72x72/57.webp"
                                        alt="">
                                </div>
                                <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                            </div>
                            <div class="mb-3 mx-3"><input class="form-control form-control-sm" id="statusUpdateInput"
                                    type="text" placeholder="Update your status"></div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user"></span><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900"
                                            data-feather="pie-chart"></span>Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="lock"></span>Posts &amp; Activity</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="help-circle"></span>Help Center</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr>
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="#!">
                                    <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="dualNav" style="display:none;">
        <div class="w-100">
            <div class="d-flex flex-between-center dual-nav-first-layer">
                <div class="navbar-logo">
                    <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse"
                        aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><img
                                    src="<?= base_url('assets/'); ?>img/icons/logo.png" alt="phoenix" width="27">
                                <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}'
                    style="width:25rem;">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                            class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search"
                            placeholder="Search..." aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                        data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0"
                            aria-label="Close"></button></div>
                    <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                        <div class="scrollbar-overlay" style="max-height: 30rem;">
                            <div class="list pb-3">
                                <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span
                                        class="text-500">results</span></h6>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Recently Searched </h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-clock-rotate-left"
                                                    data-fa-transform="shrink-2"></span> Store Macbook</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-clock-rotate-left"
                                                    data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Products</h6>
                                <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                                                src="<?= base_url('assets/'); ?>img/products/60x60/3.png" alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB
                                                    Memory - 1.6GHz - 128GB
                                                    Storage</span></p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-2 d-flex align-items-center"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="file-thumbnail me-2"><img class="img-fluid"
                                                src="<?= base_url('assets/'); ?>img/products/60x60/3.png" alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                            <p class="fs--2 mb-0 d-flex text-700"><span
                                                    class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Quick Links</h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-link text-900"
                                                    data-fa-transform="shrink-2"></span> Support MacBook House</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-link text-900"
                                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Files</h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-file-zipper text-900"
                                                    data-fa-transform="shrink-2"></span> Library MacBook folder.rar
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-file-lines text-900"
                                                    data-fa-transform="shrink-2"></span> Feature MacBook
                                                extensions.txt</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-image text-900"
                                                    data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Members</h6>
                                <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                        href="../../pages/members.html">
                                        <div class="avatar avatar-l status-online  me-2 text-900">
                                            <img class="rounded-circle "
                                                src="<?= base_url('assets/'); ?>img/team/40x40/10.webp" alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                            <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-2 d-flex align-items-center"
                                        href="../../pages/members.html">
                                        <div class="avatar avatar-l  me-2 text-900">
                                            <img class="rounded-circle "
                                                src="<?= base_url('assets/'); ?>img/team/40x40/12.webp" alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">John Smith</h6>
                                            <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                        </div>
                                    </a>
                                </div>
                                <hr class="text-200 my-0">
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                    Related Searches</h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-brands fa-firefox-browser text-900"
                                                    data-fa-transform="shrink-2"></span> Search in the Web MacBook
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-brands fa-chrome text-900"
                                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-icons flex-row">
                    <li class="nav-item">
                        <div class="theme-control-toggle fa-icon-wait px-2"><input
                                class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                                data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"><label
                                class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Switch theme"><span class="icon" data-feather="moon"></span></label><label
                                class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Switch theme"><span class="icon" data-feather="sun"></span></label></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" style="min-width: 2.5rem" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span
                                data-feather="bell" style="height:20px;width:20px;"></span></a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                            <div class="card position-relative border-0">
                                <div class="card-header p-2">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="text-black mb-0">Notificatons</h5><button
                                            class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as
                                            read</button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="scrollbar-overlay" style="height: 27rem;">
                                        <div class="border-300">
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3"><img
                                                                class="rounded-circle"
                                                                src="<?= base_url('assets/'); ?>img/team/40x40/30.webp"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>💬</span>Mentioned you in a
                                                                comment.<span
                                                                    class="ms-2 text-400 fw-bold fs--2">10m</span>
                                                            </p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">10:41 AM </span>August 7,2021
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3">
                                                            <div class="avatar-name rounded-circle"><span>J</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Jane Foster</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>📅</span>Created an
                                                                event.<span
                                                                    class="ms-2 text-400 fw-bold fs--2">20m</span>
                                                            </p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">10:20 AM </span>August 7,2021
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3"><img
                                                                class="rounded-circle avatar-placeholder"
                                                                src="<?= base_url('assets/'); ?>img/team/40x40/avatar.webp"
                                                                alt=""></div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Jessie Samson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>👍</span>Liked your
                                                                comment.<span
                                                                    class="ms-2 text-400 fw-bold fs--2">1h</span>
                                                            </p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">9:30 AM </span>August 7,2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-300">
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3"><img
                                                                class="rounded-circle"
                                                                src="<?= base_url('assets/'); ?>img/team/40x40/57.webp"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>💬</span>Mentioned you in a
                                                                comment.<span
                                                                    class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">9:11 AM </span>August 7,2021</p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3"><img
                                                                class="rounded-circle"
                                                                src="<?= base_url('assets/'); ?>img/team/40x40/59.webp"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Herman Carter</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>👤</span>Tagged you in a
                                                                comment.<span
                                                                    class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">10:58 PM </span>August 7,2021
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-m status-online me-3"><img
                                                                class="rounded-circle"
                                                                src="<?= base_url('assets/'); ?>img/team/40x40/58.webp"
                                                                alt="">
                                                        </div>
                                                        <div class="flex-1 me-sm-3">
                                                            <h4 class="fs--1 text-black">Benjamin Button</h4>
                                                            <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span
                                                                    class='me-1 fs--2'>👍</span>Liked your
                                                                comment.<span
                                                                    class="ms-2 text-400 fw-bold fs--2"></span></p>
                                                            <p class="text-800 fs--1 mb-0"><span
                                                                    class="me-1 fas fa-clock"></span><span
                                                                    class="fw-bold">10:18 AM </span>August 7,2021
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="font-sans-serif d-none d-sm-block"><button
                                                            class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            data-boundary="window" aria-haspopup="true"
                                                            aria-expanded="false" data-bs-reference="parent"><span
                                                                class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-end py-2"><a
                                                                class="dropdown-item" href="#!">Mark as unread</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0 border-top border-0">
                                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder"
                                            href="../../pages/notifications.html">Notification history</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
                            aria-expanded="false"><svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                                <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                                <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                                <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                                <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                                <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                                <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                                <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                            </svg></a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                            aria-labelledby="navbarDropdownNindeDots">
                            <div class="card bg-white position-relative border-0">
                                <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                                    <div class="row text-center align-items-center gx-0 gy-0">
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/behance.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/google-cloud.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/slack.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/gitlab.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/bitbucket.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket
                                                </p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/google-drive.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/trello.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/figma.webp"
                                                    alt="" width="20">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/twitter.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/pinterest.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest
                                                </p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img src="<?= base_url('assets/'); ?>img/nav-icons/ln.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin
                                                </p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/google-maps.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/google-photos.webp"
                                                    alt="" width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                            </a></div>
                                        <div class="col-4"><a
                                                class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                                href="#!"><img
                                                    src="<?= base_url('assets/'); ?>img/nav-icons/spotify.webp" alt=""
                                                    width="30">
                                                <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                            role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="avatar avatar-l ">
                                <img class="rounded-circle " src="<?= base_url('assets/'); ?>img/team/40x40/57.webp"
                                    alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                            aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body p-0">
                                    <div class="text-center pt-4 pb-3">
                                        <div class="avatar avatar-xl ">
                                            <img class="rounded-circle "
                                                src="<?= base_url('assets/'); ?>img/team/72x72/57.webp" alt="">
                                        </div>
                                        <h6 class="mt-2 text-black">Jerry Seinfield</h6>
                                    </div>
                                    <div class="mb-3 mx-3"><input class="form-control form-control-sm"
                                            id="statusUpdateInput" type="text" placeholder="Update your status">
                                    </div>
                                </div>
                                <div class="overflow-auto scrollbar" style="height: 10rem;">
                                    <ul class="nav d-flex flex-column mb-2 pb-1">
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900"
                                                    data-feather="user"></span><span>Profile</span></a></li>
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"><span
                                                    class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900" data-feather="lock"></span>Posts &amp;
                                                Activity</a></li>
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900" data-feather="settings"></span>Settings
                                                &amp; Privacy </a></li>
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900" data-feather="help-circle"></span>Help
                                                Center</a></li>
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900" data-feather="globe"></span>Language</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer p-0 border-top">
                                    <ul class="nav d-flex flex-column my-3">
                                        <li class="nav-item"><a class="nav-link px-3" href="#!"> <span
                                                    class="me-2 text-900" data-feather="user-plus"></span>Add
                                                another account</a></li>
                                    </ul>
                                    <hr>
                                    <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                            href="#!"> <span class="me-2" data-feather="log-out"> </span>Sign
                                            out</a></div>
                                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                            href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                            href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse navbar-top-collapse justify-content-center" id="navbarTopCollapse">
                <ul class="navbar-nav navbar-nav-top" data-dropdown-on-hover="data-dropdown-on-hover">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false"><span class="uil fs-0 me-2 uil-chart-pie"></span>Home</a>
                        <ul class="dropdown-menu navbar-dropdown-caret">
                            <li><a class="dropdown-item" href="../../index.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="shopping-cart"></span>E commerce</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../dashboard/project-management.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="clipboard"></span>Project management</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../dashboard/crm.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="phone"></span>CRM</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../social/feed.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="share-2"></span>Social feed</div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false"><span class="uil fs-0 me-2 uil-cube"></span>Apps</a>
                        <ul class="dropdown-menu navbar-dropdown-caret">
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="e-commerce" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="shopping-cart"></span>E
                                            commerce</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="admin" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                        class="me-2 uil"></span>Admin</span></div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../e-commerce/admin/add-product.html">
                                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                        product</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/admin/products.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Products</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/admin/customers.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Customers</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/admin/customer-details.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Customer details</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/admin/orders.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Orders</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/admin/order-details.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Order details</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/admin/refund.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Refund</div>
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="customer" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                        class="me-2 uil"></span>Customer</span></div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../e-commerce/landing/homepage.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Homepage</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/landing/product-details.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Product details</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/landing/products-filter.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Products filter</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/landing/cart.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Cart</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/landing/checkout.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Checkout</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/landing/shipping-info.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Shipping info</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/landing/profile.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Profile</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/landing/favourite-stores.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Favourite stores</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/landing/wishlist.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Wishlist</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../e-commerce/landing/order-tracking.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Order tracking</div>
                                                </a></li>
                                            <li><a class="dropdown-item" href="../e-commerce/landing/invoice.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Invoice</div>
                                                </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="CRM" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="phone"></span>CRM</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item active" href="analytics.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Analytics
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="deals.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deals
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="deal-details.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Deal
                                                details</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="leads.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Leads
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="lead-details.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Lead
                                                details</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="reports.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="reports-details.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Reports
                                                details</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="add-contact.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Add
                                                contact</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="project-management"
                                    href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="clipboard"></span>Project
                                            management</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../project-management/create-new.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                                new</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../project-management/project-list-view.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                                list view</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../project-management/project-card-view.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                                card view</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../project-management/project-board-view.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                                board view</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../project-management/todo-list.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Todo
                                                list</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../project-management/project-details.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Project
                                                details</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="../chat.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="message-square"></span>Chat</div>
                                </a></li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="email" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="mail"></span>Email</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../email/inbox.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Inbox
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../email/email-detail.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Email
                                                detail</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../email/compose.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Compose
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="events" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="bookmark"></span>Events</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../events/create-an-event.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                                an event</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../events/event-detail.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Event
                                                detail</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="kanban" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="trello"></span>Kanban</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../kanban/kanban.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Kanban
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../kanban/boards.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Boards
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../kanban/create-kanban-board.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Create
                                                board</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="social" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="share-2"></span>Social</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../social/profile.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Profile
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../social/settings.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Settings
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="../calendar.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="calendar"></span>Calendar</div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false"><span class="uil fs-0 me-2 uil-files-landscapes-alt"></span>Pages</a>
                        <ul class="dropdown-menu navbar-dropdown-caret">
                            <li><a class="dropdown-item" href="../../pages/starter.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="compass"></span>Starter</div>
                                </a></li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="faq" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="help-circle"></span>Faq</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../pages/faq/faq-accordion.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq
                                                accordion</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../pages/faq/faq-tab.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Faq tab
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="landing" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="globe"></span>Landing</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../pages/landing/default.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Default
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../pages/landing/alternate.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Alternate
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="pricing" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="tag"></span>Pricing</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../pages/pricing/pricing-column.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                                column</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../pages/pricing/pricing-grid.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Pricing
                                                grid</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="../../pages/notifications.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="bell"></span>Notifications</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../pages/members.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="users"></span>Members</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../pages/timeline.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="clock"></span>Timeline</div>
                                </a></li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="errors" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="alert-triangle"></span>Errors</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../pages/errors/404.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>404
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../pages/errors/403.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>403
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../pages/errors/500.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>500
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="authentication" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="lock"></span>Authentication</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="simple" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                        class="me-2 uil"></span>Simple</span></div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/sign-in.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign in</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/sign-up.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign up</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/sign-out.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign out</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/forgot-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Forgot password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/reset-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Reset password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/lock-screen.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Lock screen</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/simple/2FA.html">
                                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="split" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                        class="me-2 uil"></span>Split</span></div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/sign-in.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign in</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/sign-up.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign up</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/sign-out.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign out</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/forgot-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Forgot password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/reset-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Reset password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/lock-screen.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Lock screen</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/split/2FA.html">
                                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="Card" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                        class="me-2 uil"></span>Card</span></div>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/sign-in.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign in</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/sign-up.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign up</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/sign-out.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Sign out</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/forgot-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Forgot password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/reset-password.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Reset password</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/lock-screen.html">
                                                    <div class="dropdown-item-wrapper"><span
                                                            class="me-2 uil"></span>Lock screen</div>
                                                </a></li>
                                            <li><a class="dropdown-item"
                                                    href="../../pages/authentication/card/2FA.html">
                                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>2FA
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-item dropdown-toggle" id="layouts" href="#"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="layout"></span>Layouts</span></div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../demo/vertical-sidenav.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                                sidenav</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/dark-mode.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark
                                                mode</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/sidenav-collapse.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Sidenav
                                                collapse</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/darknav.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Darknav
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/topnav-slim.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Topnav
                                                slim</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/navbar-top-slim.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar
                                                top slim</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/navbar-top.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Navbar
                                                top</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/horizontal-slim.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                                slim</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/combo-nav.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                                nav</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/combo-nav-slim.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                                nav slim</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../demo/dual-nav.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual
                                                nav</div>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false"><span class="uil fs-0 me-2 uil-puzzle-piece"></span>Modules</a>
                        <ul class="dropdown-menu navbar-dropdown-caret dropdown-menu-card py-0">
                            <div class="border-0 scrollbar" style="max-height: 60vh;">
                                <div class="px-3 pt-4 pb-3 img-dropdown">
                                    <div class="row gx-4 gy-5">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="dropdown-item-group"><span class="me-2" data-feather="file-text"
                                                    style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">Forms</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/forms/basic/form-control.html">Form
                                                control</a><a class="dropdown-link"
                                                href="../../modules/forms/basic/input-group.html">Input group</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/basic/select.html">Select</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/basic/checks.html">Checks</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/basic/range.html">Range</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/basic/floating-labels.html">Floating
                                                labels</a><a class="dropdown-link"
                                                href="../../modules/forms/basic/layout.html">Layout</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/advance/advance-select.html">Advance
                                                select</a><a class="dropdown-link"
                                                href="../../modules/forms/advance/date-picker.html">Date
                                                picker</a><a class="dropdown-link"
                                                href="../../modules/forms/advance/editor.html">Editor</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/advance/file-uploader.html">File
                                                uploader</a><a class="dropdown-link"
                                                href="../../modules/forms/advance/rating.html">Rating</a><a
                                                class="dropdown-link"
                                                href="../../modules/forms/advance/emoji-button.html">Emoji
                                                button</a><a class="dropdown-link"
                                                href="../../modules/forms/validation.html">Validation</a><a
                                                class="dropdown-link" href="../../modules/forms/wizard.html">Wizard</a>
                                            <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="grid"
                                                    style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">Icons</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/icons/feather.html">Feather</a><a
                                                class="dropdown-link" href="../../modules/icons/font-awesome.html">Font
                                                awesome</a><a class="dropdown-link"
                                                href="../../modules/icons/unicons.html">Unicons</a>
                                            <div class="dropdown-item-group mt-5"><span class="me-2"
                                                    data-feather="bar-chart-2" style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">ECharts</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/echarts/line-charts.html">Line charts</a><a
                                                class="dropdown-link" href="../../modules/echarts/bar-charts.html">Bar
                                                charts</a><a class="dropdown-link"
                                                href="../../modules/echarts/candlestick-charts.html">Candlestick
                                                charts</a><a class="dropdown-link"
                                                href="../../modules/echarts/geo-map.html">Geo map</a><a
                                                class="dropdown-link"
                                                href="../../modules/echarts/scatter-charts.html">Scatter
                                                charts</a><a class="dropdown-link"
                                                href="../../modules/echarts/pie-charts.html">Pie charts</a><a
                                                class="dropdown-link"
                                                href="../../modules/echarts/gauge-chart.html">Gauge chart</a><a
                                                class="dropdown-link"
                                                href="../../modules/echarts/radar-charts.html">Radar charts</a><a
                                                class="dropdown-link"
                                                href="../../modules/echarts/heatmap-charts.html">Heatmap
                                                charts</a><a class="dropdown-link"
                                                href="../../modules/echarts/how-to-use.html">How to use</a>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="dropdown-item-group"><span class="me-2" data-feather="package"
                                                    style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">Components</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/components/accordion.html">Accordion</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/avatar.html">Avatar</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/alerts.html">Alerts</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/badge.html">Badge</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/breadcrumb.html">Breadcrumb</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/button.html">Buttons</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/calendar.html">Calendar</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/card.html">Card</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/carousel/bootstrap.html">Bootstrap</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/carousel/swiper.html">Swiper</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/collapse.html">Collapse</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/dropdown.html">Dropdown</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/list-group.html">List group</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/modal.html">Modals</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/navs-and-tabs/navs.html">Navs</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/offcanvas.html">Offcanvas</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/progress-bar.html">Progress bar</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/placeholder.html">Placeholder</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/pagination.html">Pagination</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/popovers.html">Popovers</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/scrollspy.html">Scrollspy</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/sortable.html">Sortable</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/spinners.html">Spinners</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/toast.html">Toast</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/tooltips.html">Tooltips</a><a
                                                class="dropdown-link"
                                                href="../../modules/components/chat-widget.html">Chat widget</a>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="dropdown-item-group"><span class="me-2" data-feather="columns"
                                                    style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">Tables</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/tables/basic-tables.html">Basic tables</a><a
                                                class="dropdown-link"
                                                href="../../modules/tables/advance-tables.html">Advance tables</a><a
                                                class="dropdown-link" href="../../modules/tables/bulk-select.html">Bulk
                                                Select</a>
                                            <div class="dropdown-item-group mt-5"><span class="me-2" data-feather="tool"
                                                    style="stroke-width:2;"></span>
                                                <h6 class="dropdown-item-title">Utilities</h6>
                                            </div><a class="dropdown-link"
                                                href="../../modules/utilities/background.html">Background</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/borders.html">Borders</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/colors.html">Colors</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/display.html">Display</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/flex.html">Flex</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/stacks.html">Stacks</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/float.html">Float</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/grid.html">Grid</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/interactions.html">Interactions</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/opacity.html">Opacity</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/overflow.html">Overflow</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/position.html">Position</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/shadows.html">Shadows</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/sizing.html">Sizing</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/spacing.html">Spacing</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/typography.html">Typography</a><a
                                                class="dropdown-link"
                                                href="../../modules/utilities/vertical-align.html">Vertical
                                                align</a><a class="dropdown-link"
                                                href="../../modules/utilities/visibility.html">Visibility</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle lh-1" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false"><span
                                class="uil fs-0 me-2 uil-document-layout-right"></span>Documentation</a>
                        <ul class="dropdown-menu navbar-dropdown-caret">
                            <li><a class="dropdown-item" href="../../documentation/getting-started.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="life-buoy"></span>Getting started</div>
                                </a></li>
                            <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle"
                                    id="customization" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="settings"></span>Customization</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="../../documentation/customization/configuration.html">
                                            <div class="dropdown-item-wrapper"><span
                                                    class="me-2 uil"></span>Configuration</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../documentation/customization/styling.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Styling
                                            </div>
                                        </a></li>
                                    <li><a class="dropdown-item"
                                            href="../../documentation/customization/dark-mode.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dark
                                                mode</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../documentation/customization/plugin.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Plugin
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-inside"><a class="dropdown-item dropdown-toggle"
                                    id="layouts-doc" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                    <div class="dropdown-item-wrapper"><span
                                            class="uil fs-0 uil-angle-right lh-1 dropdown-indicator-icon"></span><span><span
                                                class="me-2 uil" data-feather="table"></span>Layouts doc</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="../../documentation/layouts/vertical-navbar.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Vertical
                                                navbar</div>
                                        </a></li>
                                    <li><a class="dropdown-item"
                                            href="../../documentation/layouts/horizontal-navbar.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Horizontal
                                                navbar</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../documentation/layouts/combo-navbar.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Combo
                                                navbar</div>
                                        </a></li>
                                    <li><a class="dropdown-item" href="../../documentation/layouts/dual-nav.html">
                                            <div class="dropdown-item-wrapper"><span class="me-2 uil"></span>Dual
                                                nav</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="../../documentation/gulp.html">
                                    <div class="dropdown-item-wrapper"><span
                                            class="me-2 fa-brands fa-gulp ms-1 me-1 fa-lg"></span>Gulp</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../documentation/design-file.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="figma"></span>Design file</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../changelog.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="git-merge"></span>Changelog</div>
                                </a></li>
                            <li><a class="dropdown-item" href="../../showcase.html">
                                    <div class="dropdown-item-wrapper"><span class="me-2 uil"
                                            data-feather="monitor"></span>Showcase</div>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true"
        data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
        <div class="modal-dialog">
            <div class="modal-content mt-15 rounded-pill">
                <div class="modal-body p-0">
                    <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}'
                        style="width: auto;">
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                                class="form-control search-input fuzzy-search rounded-pill form-control-lg"
                                type="search" placeholder="Search..." aria-label="Search">
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                        <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                            data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0"
                                aria-label="Close"></button></div>
                        <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                            <div class="scrollbar-overlay" style="max-height: 30rem;">
                                <div class="list pb-3">
                                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span
                                            class="text-500">results</span></h6>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Recently Searched </h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-clock-rotate-left"
                                                        data-fa-transform="shrink-2"></span> Store Macbook</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-clock-rotate-left"
                                                        data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Products</h6>
                                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img
                                                    class="h-100 w-100 fit-cover rounded-3"
                                                    src="<?= base_url('assets/'); ?>img/products/60x60/3.png" alt="">
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span
                                                        class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB
                                                        Storage</span></p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="file-thumbnail me-2"><img class="img-fluid"
                                                    src="<?= base_url('assets/'); ?>img/products/60x60/3.png" alt="">
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                                <p class="fs--2 mb-0 d-flex text-700"><span
                                                        class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Quick Links</h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-link text-900"
                                                        data-fa-transform="shrink-2"></span> Support MacBook House
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-link text-900"
                                                        data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Files</h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-solid fa-file-zipper text-900"
                                                        data-fa-transform="shrink-2"></span> Library MacBook
                                                    folder.rar</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-file-lines text-900"
                                                        data-fa-transform="shrink-2"></span> Feature MacBook
                                                    extensions.txt</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-solid fa-image text-900"
                                                        data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Members</h6>
                                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../../pages/members.html">
                                            <div class="avatar avatar-l status-online  me-2 text-900">
                                                <img class="rounded-circle "
                                                    src="<?= base_url('assets/'); ?>img/team/40x40/10.webp" alt="">
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 d-flex align-items-center"
                                            href="../../pages/members.html">
                                            <div class="avatar avatar-l  me-2 text-900">
                                                <img class="rounded-circle "
                                                    src="<?= base_url('assets/'); ?>img/team/40x40/12.webp" alt="">
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-1000 title">John Smith</h6>
                                                <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                            </div>
                                        </a>
                                    </div>
                                    <hr class="text-200 my-0">
                                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">
                                        Related Searches</h6>
                                    <div class="py-2"><a class="dropdown-item"
                                            href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"><span
                                                        class="fa-brands fa-firefox-browser text-900"
                                                        data-fa-transform="shrink-2"></span> Search in the Web
                                                    MacBook</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="../e-commerce/landing/product-details.html">
                                            <div class="d-flex align-items-center">
                                                <div class="fw-normal text-1000 title"> <span
                                                        class="fa-brands fa-chrome text-900"
                                                        data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTop = document.querySelector('#navbarTop');
        var topNavSlim = document.querySelector('#topNavSlim');
        var navbarTopSlim = document.querySelector('#navbarTopSlim');
        var navbarCombo = document.querySelector('#navbarCombo');
        var navbarComboSlim = document.querySelector('#navbarComboSlim');
        var dualNav = document.querySelector('#dualNav');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarPosition === 'dual-nav') {
            topNavSlim.remove();
            navbarTop.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.remove();
            dualNav.removeAttribute('style');
            documentElement.classList.add('dual-nav');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
            navbarDefault.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            topNavSlim.style.display = 'block';
            navbarVertical.style.display = 'inline-block';
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTopSlim.removeAttribute('style');
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
            navbarDefault.remove();
            //- navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarTopSlim.remove();
            navbarComboSlim.removeAttribute('style');
            navbarVertical.removeAttribute('style');
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            topNavSlim.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTop.removeAttribute('style');
            documentElement.classList.add('navbar-horizontal');
        } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarDefault.remove();
            navbarComboSlim.remove();
            navbarCombo.removeAttribute('style');
            navbarVertical.removeAttribute('style');
            documentElement.classList.add('navbar-combo')

        } else {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.removeAttribute('style');
            navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
            navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
            navbarVertical.classList.add('navbar-darker');
        }
    </script>
    <div class="content">
        <div class="">
            <div class="row align-items-center justify-content-between g-3 mb-6">
                <div class="col-12 col-md-auto">
                    <h2 class="mb-0">Master User</h2>
                </div>
            </div>

            <div id="tableExample3"
                data-list='{"valueNames":["id_user","nik","username","role"],"page":10,"pagination":true}'>

                <div class="search-box mb-3 mx-auto">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                            class="form-control search-input search form-control-sm" type="search" placeholder="Search"
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm fs--1 mb-0" style="width: 100vw;">
                        <thead>
                            <tr>
                                <th class="sort border-top text-center ps-3" data-sort="id_user"
                                    style="min-width: 125px;">Id
                                    User</th>
                                <th class="sort border-top text-center" data-sort="nik" style="min-width: 500px;">
                                    NIK</th>
                                <th class="sort border-top text-center" data-sort="username" style="min-width: 500px;">
                                    Username</th>
                                <th class="sort border-top text-center" data-sort="role" style="min-width: 500px;">
                                    Role</th>
                                <th class="sort text-center align-middle pe-0 border-top" scope="col"
                                    style="min-width: 150px;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="list" style="max-height: calc(100vh - 400px); overflow-y: auto;">
                            <?php if ($query->num_rows() > 0) {
                                foreach ($result as $row) { ?>
                                    <tr>
                                        <td class="align-middle text-center ps-3 id_user"><?php echo $row["ID_USER"]; ?>
                                        </td>
                                        <td class="align-middle nik"><?php echo $row["NIK"]; ?></td>
                                        <td class="align-middle username"><?php echo $row["USERNAME"]; ?></td>
                                        <?php if ($row["ROLE"] == 'Inactive') { ?>
                                            <td class="align-middle text-center white-space-nowrap text-end role"
                                                id="role-<?php echo $row["ID_USER"]; ?>">
                                                <span class="badge badge-phoenix fs--2 badge-phoenix-danger">Inactive</span>
                                            </td>
                                        <?php } else { ?>
                                            <td class="align-middle text-center white-space-nowrap text-end role">
                                                <span
                                                    class="badge badge-phoenix fs--2 badge-phoenix-success"><?php echo $row["ROLE"]; ?></span>
                                            </td>
                                        <?php } ?>
                                        <td class="align-middle text-center white-space-nowrap text-end pe-0">
                                            <div class="font-sans-serif btn-reveal-trigger position-static">
                                                <button
                                                    class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2"
                                                    type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                    aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                    <span class="fas fa-ellipsis-h fs--2"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end py-2">
                                                    <a class="dropdown-item edit-role-btn" data-bs-toggle="modal"
                                                        data-bs-target="#editRoleModal" data-id="<?php echo $row['ID_USER']; ?>"
                                                        data-username="<?php echo $row['USERNAME']; ?>">Edit Role</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="10">No data available</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Control -->
                <div class="d-flex justify-content-between mt-3">
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                    <div class="d-flex">
                        <button class="page-link" data-list-pagination="prev"><span
                                class="fas fa-chevron-left"></span></button>
                        <ul class="mb-0 pagination" data-pagination="true"></ul>
                        <!-- Add data-pagination attribute here -->
                        <button class="page-link pe-0" data-list-pagination="next"><span
                                class="fas fa-chevron-right"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-inline" data-bs-toggle="modal" data-bs-target="#addModal"><a class="btn btn-primary px-5"><i
                    class="fa-solid fa-plus me-2"></i>Add User</a></div>

        <!-- Modal User -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticallyCenteredModalLabel">Add User</h5><button class="btn p-1"
                            type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                class="fas fa-times fs--1"></span></button>
                    </div>
                    <div class="modal-body">
                        <form id="addForm">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="addusername" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <input type="hidden" id="addId" value="<?php echo $rand_id; ?>">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id="save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Role -->
        <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleModalLabel"></h5><button class="btn p-1" type="button"
                            data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                    </div>
                    <div class="modal-body">
                        <form id="editRoleForm">
                            <div class="mb-3">
                                <label for="roleSelect" class="form-label">Select Role:</label>
                                <select class="form-select" id="roleSelect">
                                    <option value="Admin">Admin</option>
                                    <option value="Technician">Technician</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <input type="hidden" id="userId" value="">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id="saveRoleBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url('vendors/'); ?>popper/popper.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>bootstrap/bootstrap.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>anchorjs/anchor.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>is/is.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>fontawesome/all.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>lodash/lodash.min.js"></script>
        <script src="../../../../v3/polyfill.min.js?features=window.scroll"></script>
        <script src="<?= base_url('vendors/'); ?>list.js/list.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>feather-icons/feather.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>dayjs/dayjs.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>dropzone/dropzone.min.js"></script>
        <script src="<?= base_url('vendors/'); ?>echarts/echarts.min.js"></script>
        <script src="<?= base_url('assets/'); ?>js/phoenix.js"></script>
        <script src="<?= base_url('assets/'); ?>js/crm-analytics.js"></script>
        <script>
            $(document).ready(function () {
                // Fungsi Pencarian
                $('.search-input').on('keyup', function () {
                    var value = $(this).val().toLowerCase();
                    $('tbody tr').filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });

                $('.edit-role-btn').on('click', function () {
                    // Ambil ID dan Username dari tombol yang di klik
                    var userId = $(this).data('id');
                    var username = $(this).data('username');
                    var textHeader = "Edit Role " + username;

                    // Isi hidden input dengan ID User yang dipilih
                    $('#userId').val(userId);
                    $('#editRoleModalLabel').text(textHeader);
                });

                $('#saveRoleBtn').on('click', function () {
                    // Ambil data dari modal
                    var userId = $('#userId').val();
                    var role = $('#roleSelect').val();

                    // Kirim data dengan AJAX ke controller untuk diupdate
                    $.ajax({
                        url: '<?= base_url('index.php/UserController/updateRole') ?>', // URL ke controller
                        type: 'POST',
                        data: {
                            userId: userId,
                            role: role
                        },
                        dataType: 'json', // Format data yang diterima kembali dari server
                        success: function (response) {
                            if (response.status == 'success') {
                                // Jika berhasil, update kolom role di tabel tanpa refresh halaman
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Successfully Updated',
                                    text: 'Role successfully changed',
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to base URL when "OK" is clicked
                                        location.reload(); // Reload halaman
                                    }
                                });
                                // location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error updating role',
                                    text: 'Role failed to change',
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK'
                                })
                                // alert(response.message);
                            }
                        },
                        error: function () {
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Error updating role',
                                    text: 'Role failed to change',
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK'
                                })
                            // alert('Error updating role');
                        }
                    });
                });
                $('#save').on('click', function () {
                    // Ambil data dari modal
                    var addId = $('#addId').val();
                    var nik = $('#nik').val();
                    var username = $('#addusername').val();
                    var password = $('#password').val();

                    // Validasi sederhana di sisi client
                    if (addId === '' || nik === '' || username === '' || password === '') {
                        // alert('All fields are required');
                        Swal.fire({
                                icon: 'error',
                                title: 'Incomplete Data',
                                text: 'All fields are required',
                                allowOutsideClick: false,
                                confirmButtonText: 'OK'
                            })
                        return; // Berhenti jika validasi gagal
                    }

                    // Kirim data dengan AJAX ke controller untuk diupdate
                    $.ajax({
                        url: '<?= base_url('index.php/UserController/addUser') ?>', // Pastikan URL benar
                        type: 'POST',
                        data: {
                            addId: addId,
                            nik: nik,
                            username: username,
                            password: password // Kirim password sebagai plain text untuk dienkripsi di server
                        },
                        dataType: 'json', // Format data yang diterima kembali dari server
                        success: function (response) {
                            if (response.status === 'success') {
                                // Jika sukses
                                $('#addModal').modal('hide'); // Tutup modal
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Complete Data',
                                    text: 'all columns are filled',
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to base URL when "OK" is clicked
                                        location.reload(); // Reload halaman
                                    }
                                });
                                // alert(response.message); // Pesan sukses
                                
                            } else {
                                // Jika gagal, tampilkan pesan error
                                $('#addModal').modal('hide'); // Tutup modal
                                    Swal.fire({
                                    icon: 'error',
                                    title: 'NIK already exists',
                                    text: 'Please use different NIK',
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK'
                                })
                                // alert(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            // Tangani error jika request gagal
                            console.error('AJAX Error: ', error);
                            alert('An error occurred while adding user');
                        }
                    });
                });
            });

            function fetchMessages() {
                fetch('<?= base_url("index.php/UserController/fetchMessages") ?>')
                    .then(response => {
                        if (!response.ok) {
                            console.error('Network response was not ok:', response.statusText);
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

            setInterval(fetchMessages, 5000);

        </script>
</body>

</html>