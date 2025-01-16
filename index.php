<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donor Management System | Home Page</title>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php'); ?>

    <!-- banner -->
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
                <li>
                    <div class="banner-top1">
                        <div class="banner-info_agile_w3ls">
                            <div class="container">
                                <h3>Blood bank services that you
                                    <span>can trust</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner-top2">
                        <div class="banner-info_agile_w3ls">
                            <div class="container">
                                <h3>One Blood Donation Saves Three Lives
                                    <span>every day</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- //banner -->
    <div class="clearfix"></div>

    <!-- blog -->
    <div class="blog-w3ls py-5" id="blog">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title text-white">Some of the Donors</h3>
                <span>
                    <i class="fas fa-user-md text-white"></i>
                </span>
            </div>
            <div class="row package-grids mt-5">
                <?php 
                $status = 1;
                $sql = "SELECT * FROM tblblooddonars WHERE status = :status ORDER BY RAND() LIMIT 6";
                $query = $dbh->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                        <div class="col-md-4 pricing" style="margin-top:2%;">
                            <div class="price-top">
                                <img src="images/blood-donor.jpg" alt="" class="img-fluid" />
                                <h3><?php echo htmlentities($result->FullName); ?></h3>
                            </div>
                            <div class="price-bottom p-4">
                                <h4 class="text-dark mb-3">Gender: <?php echo htmlentities($result->Gender); ?></h4>
                                <p class="card-text"><b>Blood Group:</b> <?php echo htmlentities($result->BloodGroup); ?></p>
                                <a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id; ?>">Request</a>
                            </div>
                        </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    <!-- //blog -->

    <!-- treatments -->
    <div class="screen-w3ls py-5">
        <div class="container py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">BLOOD GROUPS</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
                <p class="mt-2">Blood group of any human being will mainly fall into one of the following groups:</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li>A positive or A negative</li>
                        <li>B positive or B negative</li>
                        <li>O positive or O negative</li>
                        <li>AB positive or AB negative</li>
                    </ul>
                    <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-8">
                    <h4 style="padding-top: 30px;">UNIVERSAL DONORS AND RECIPIENTS</h4>
                    <p>
                        The most common blood type is O, followed by type A.<br>
                        Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.
                    </p>
                </div>
                <div class="col-md-4" style="padding-top: 30px;">
                    <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" data-toggle="modal" data-target="#exampleModalCenter1" href="#">Become a Donor</a>
                </div>
            </div>
        </div>
    </div>
    <!-- //treatments -->

    <!-- footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Js files -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 1000,
                namespace: "callbacks",
            });
        });
    </script>
    <script src="js/fixed-nav.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/medic.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
