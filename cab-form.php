<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $pickup =$_POST['pickup'];
   $dropOff = $_POST['dropOff'];
   $phone =  $_POST['phone'];
   $cabType =  $_POST['cabType'];
   $passengers = $_POST['passengers'];
   $dateTime = $_POST['dateTime'];

   
         $insert = "INSERT INTO cab (fname, lname, pickup, dropOff, phone, cabType, passengers, dateTime) 
         VALUES('$fname', '$lname', '$pickup', '$dropOff', '$phone', '$cabType', '$passengers', '$dateTime')";
         mysqli_query($conn, $insert);
         echo '<script type="text/javascript">'; 
    echo 'alert("Your cab has been booked.");'; 
    echo 'window.location.href = "index.html";';
    echo '</script>';
         
         
};

?>

<!DOCTYPE html>
<html>
  <head>
    <title>FolkAid</title>
    <link rel="stylesheet" href="css/cab-form.css">
    <link href="css/nav.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzbC9GRFS5XHqwg-c0XhHYcnK8wcZGWJ0&libraries=places&callback=initAutocomplete" async defer>
    </script>
    <script src="js/location.js"></script>

  </head>
  <body>

    <header>
        <div id="nav">
            <div class="navleft">
                <h1>Folkaid</h1>
            </div>
            <div class="navcenter">
                <nav>

                      <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li class="dropdown">
                          <a href="javascript:void(0)" class="dropbtn">Services</a>
                          <div class="dropdown-content">
                          <a href="CabPage.html">Cab</a>
                          <a href="CabPage.html">Cab</a>
                                <a href="accomodation.html">Accommodation</a>
                                <a href="doctor.html">Health Care</a>
                                <a href="grocery.html">Grocery/Laundry</a>
                                <a href="restaurant.html">Restaurants</a>
                                <a href="student.html">Student help</a>
                          </div>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="Feedback.html">Feedback</a></li>
                      </ul>
                    </nav>
                    </ul>
                </nav>
            </div>
            <div class="navright">
              <div class="login">
                <a href="login.php"><img src="image/login-icon.jpeg"></a>
              </div>
              <div class="help">
                <a href="help.html"><img src="image/help.png"></a>
              </div>
              
            </div>
        </div>
    </header>
    <section>

    <div class="homecab" >
            <img src="image/cab.jpg" >
        </div>
        <div class="about">
            <p style="font-size:32px; font-weight:bold">BOOK TAXI FOR RIDE</p>
        </div>

      <div class="cab-form">
        <div class="cab-inner">
          <form action="" method="post">
                      <?php
                      if(isset($error)){
                          foreach($error as $error){
                              echo '<span class="error-msg">'.$error.'</span>';
                          };
                      };
                      ?>
                      <input type="text" name="fname" required placeholder="Enter your first name">
                      <input type="text" name="lname" required placeholder="Enter your last name">
                      <input id="autocompletePickup" type="text" name="pickup" required placeholder="Enter your pick up location">
                      <input id="autocompleteDropOff" type="text" name="dropOff" required placeholder="Enter your drop off location">
                      <input type="text" name="phone" required placeholder="Enter your phone number">
                      <select name="cabType">
                        <option>Choose your cab type</option>
                        <option>All</option>
                        <option>Hybrid</option>
                        <option>Luxury</option>
                      </select>
                      <input type="text" name="passengers" required placeholder="Number of passengers">
                      <input type="datetime-local" name="dateTime" required placeholder="Confirm your date and Time">
                      <input type="submit" name="submit" value="Book now" class="form-btn">
            </form>
        </div>
       
      </div>
        
        
       
        
        
    </section>
   
</body>
</html>