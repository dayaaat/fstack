<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

thead {
  background-color: #f2f2f2;
}

th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #4CAF50;
  color: white;
}

/* Gaya hover pada baris tabel */
tr:hover {
  background-color: #f5f5f5;
}
   </style>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function(){
          $(".scroll-top").click(function() {
              $("html, body").animate({ 
                  scrollTop: 0 
              }, "slow");
              return false;
          });
      });
   </script>

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo"><img src="images/logo.png"></a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php">book</a>
      <a href="book.php" class="active">book list</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>
</section>

<section class="booking-list">
   <div class="box-container">
      <h2>Booking List</h2>
      <a href="book.php">Create</a>
      <table>
         <thead>
            <tr>
               <th>Booking ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Address</th>
               <th>Location</th>
               <th>Guests</th>
               <th>Arrivals</th>
               <th>Leaving</th>
               <th>Status</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $connection = mysqli_connect('localhost', 'root', '', 'travel');

               $query = "SELECT bf.*, 
                        CASE 
                            WHEN p.book_id IS NOT NULL THEN 'Paid' 
                            ELSE 'Not Paid' 
                        END AS status
                    FROM book_form bf
                    LEFT JOIN payment p ON bf.id = p.book_id
                    ORDER BY bf.id desc";

                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['location']}</td>";
                    echo "<td>{$row['guests']}</td>";
                    echo "<td>{$row['arrivals']}</td>";
                    echo "<td>{$row['leaving']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "<td>";
                    echo "<a href='process_edit.php?id={$row['id']}'>Edit</a><br/>";
                    echo "<a href='process_delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                mysqli_close($connection);
            ?>
         </tbody>
      </table>
   </div>
</section>


<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
<!-- booking section ends -->
<!-- footer section starts  -->
<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>
      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +628-2341-3515-88 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-2222-333333 </a>
         <a href="#"> <i class="fas fa-envelope"></i> dayat@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Bali, Indonesia </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn </a>
         <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
         <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
         <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
      </div>
   </div>
   <div class="credit"> designed by <span> Kelompok 2 </span> | all rights reserved! </div>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>