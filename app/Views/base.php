<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/iconly/bold.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.svg') ?>" type="image/x-icon">

    <?= $this->renderSection('header') ?>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?php echo base_url('assets/images/logo/logo.png') ?>" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/') ?>" class='sidebar-link'>
                                <i class="bi bi-speedometer"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Users</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/users/create') ?>">Add User</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/users') ?>">Manage Users</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Groups</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/groups/create') ?>">Add Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/groups') ?>">Manage Groups</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/brands') ?>" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Brands</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/categories') ?>" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/stores') ?>" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Stores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/attributes') ?>" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Attributes</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-box-seam"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/users/create') ?>">Add Product</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/products') ?>">Manage Products</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Orders</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/users/create') ?>">Add Order</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url('/orders') ?>">Manage Orders</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/company') ?>" class='sidebar-link'>
                                <i class="bi bi-building"></i>
                                <span>Company</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/users/profile') ?>" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo base_url('/users/create') ?>" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <?= $this->renderSection('content') ?>

    </div>
    <script src="<?php echo base_url('assets/js/jquery-3.6.0.js') ?>"></script>
    
    <script src="<?php echo base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    
    <script src="<?php echo base_url('assets/js/mazer.js') ?>"></script>
    
    <?= $this->renderSection('footer') ?>
    
    <script>
        var url = window.location
        $('.sidebar-item a').each(function(e) {
            var link = $(this).attr('href');
            if (link == url) {
                $(this).parent('li').addClass('active');
                $(this).closest('.sidebar-item').addClass('active');
                $(this).closest('.submenu').addClass('active');
            }
        });
    </script>

    </script>

</body>

</html>