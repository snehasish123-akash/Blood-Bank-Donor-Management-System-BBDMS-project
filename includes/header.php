<?php error_reporting(0);
session_start(); ?>
<!-- header -->
<header>
    <!-- top-bar -->
    <div class="top-bar py-3">
        <div class="container">
            <div class="row">
                <!-- Removed the section responsible for displaying Address, Email, and Phone -->
            </div>
        </div>
    </div>
</header>
<!-- header 2 -->
<div id="home">
    <!-- navigation -->
    <div class="main-top py-1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand font-weight-bold" href="index.php">
                        <span>BB</span>DMS
                        <i class="fas fa-syringe"></i>
                    </a>
                </h1>
                <!-- //logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto custom-nav-spacing">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="donor-list.php">Donor List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search-donor.php">Search Donor</a>
                        </li>
                        <?php if (strlen($_SESSION['bbdmsdid'] != 0)) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="change-password.php">Change Password</a>
                                    <a class="dropdown-item" href="request-received.php">Request Received</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (strlen($_SESSION['bbdmsdid'] == 0)) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/index.php">Admin</a>
                            </li>
                        </ul>
                        <a href="login.php" class="login-button">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                        <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- Custom CSS -->
<style>
    /* Add space between menu items */
    .custom-nav-spacing .nav-item {
        margin-right: 20px; /* Adjust spacing as needed */
    }

    /* Remove extra margin for the last item */
    .custom-nav-spacing .nav-item:last-child {
        margin-right: 0;
    }

    /* Styling for login button */
    .login-button {
        margin-left: 20px;
    }
</style>
