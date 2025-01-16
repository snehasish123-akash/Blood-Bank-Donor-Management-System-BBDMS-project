<?php
//error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Blood Bank Donor Management System | Search Blood Donor</title>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans|Roboto+Condensed" rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php');?>

    <div class="inner-banner-w3ls">
        <div class="container"></div>
    </div>

    <div class="breadcrumb-agile">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blood Donor List</li>
            </ol>
        </div>
    </div>

    <div class="agileits-contact py-5">
        <div class="py-xl-5 py-lg-3">
            <form name="donor" method="post" style="padding-left: 30px;">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Blood Group<span style="color:red">*</span></div>
                        <select name="bloodgroup" class="form-control" required>
                            <?php
                            $sql = "SELECT * from  tblbloodgroup ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0) {
                                foreach($results as $result) { ?>
                                    <option value="<?php echo htmlentities($result->BloodGroup);?>">
                                        <?php echo htmlentities($result->BloodGroup);?>
                                    </option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Location</div>
                        <textarea class="form-control" name="location"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <input type="submit" name="sub" class="btn btn-primary" value="Search" style="cursor:pointer">
                    </div>
                </div>
            </form>

            <?php
            if(isset($_POST['sub'])) {
                $status = 1;
                $bloodgroup = $_POST['bloodgroup'];
                $location = $_POST['location'];

                $sql = "SELECT * from tblblooddonars where (status=:status and BloodGroup=:bloodgroup) || (Address=:location)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
                $query->bindParam(':location', $location, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if($query->rowCount() > 0) { ?>
                    <div class="w3ls-titles text-center mb-5">
                        <h3 class="title">Search Blood Donor</h3>
                        <span><i class="fas fa-user-md"></i></span>
                    </div>

                    <div class="row" style="padding-left: 50px;">
                        <?php foreach($results as $result) { ?>
                            <div class="col-md-6 pricing" style="max-width: 250px; margin: 10px;">
                                <div class="price-top">
                                    <a href="single.html">
                                        <img src="images/blood-donor.jpg" alt="Blood Donor" class="img-fluid" style="border:1px solid #000;" />
                                    </a>
                                    <h4><?php echo htmlentities($result->FullName);?></h4>
                                </div>

                                <div class="price-bottom p-3">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr><th>Gender</th><td><?php echo htmlentities($result->Gender);?></td></tr>
                                            <tr><td>Blood Group</td><td><?php echo htmlentities($result->BloodGroup);?></td></tr>
                                            <tr><td>Mobile No.</td><td><?php echo htmlentities($result->MobileNumber);?></td></tr>
                                            <tr><td>Email ID</td><td><?php echo htmlentities($result->EmailId);?></td></tr>
                                            <tr><td>Age</td><td><?php echo htmlentities($result->Age);?></td></tr>
                                            <tr><td>Address</td><td><?php echo htmlentities($result->Address);?></td></tr>
                                            <tr><td>Message</td><td><?php echo htmlentities($result->Message);?></td></tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-primary" href="contact-blood.php?cid=<?php echo $result->id;?>" style="color:#fff;">Request</a>
                                </div>
                            </div>
                        <?php }} else {
                            echo "No Record Found";
                        }
            }?>
        </div>
    </div>

    <?php include('includes/footer.php');?>

    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="js/fixed-nav.js"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/medic.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
