<footer>
  <div class="footer-container py-4">
    <div class="container text-center">
      <div class="row">
        <!-- Logo and Description -->
        <div class="col-md-4">
          <h2>
            <a href="index.php" class="text-white font-weight-bold">
              Blood Bank & Donor Management System <i class="fas fa-syringe"></i>
            </a>
          </h2>
          <p>Your trusted platform for blood donation and management.</p>
        </div>
        
        <!-- Address Section -->
        <div class="col-md-4">
          <h3 class="text-white">Address</h3>
          <ul class="list-unstyled">
            <?php 
              $sql = "SELECT * FROM tblcontactusinfo";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              if($query->rowCount() > 0) {
                foreach($results as $result) { ?>
                  <li><i class="fas fa-map-marker-alt"></i> <?php echo $result->Address; ?></li>
                  <li><i class="fas fa-phone"></i> <?php echo $result->ContactNo; ?></li>
                  <li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $result->EmailId; ?>"><?php echo $result->EmailId; ?></a></li>
            <?php } } ?>
          </ul>
        </div>

        <!-- Quick Links -->
        <div class="col-md-4">
          <h3 class="text-white">Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="mt-4 text-white">
        <p>© Blood Bank Donor Management System</p>
      </div>
    </div>
  </div>
</footer>
