<!--?php
@include 'form.php';
if(isset ($_POST['submit']))
{
   $firstname = $_POST['firstName'];
   $lastName = $_POST['lastName'];
  $email = $_POST['email'];
   $country = $_POST['country'];
   $feedback = $_POST['feedback'];
    
  $insert ="INSERT INTO feedback (firstName, lastName, email,country,feedback)
   VALUES('$firstName' , '$lastName' , '$email' , '$country' , '$feedback')";
   mysqli_query($conn, $insert);
  echo '<script type="text/javascript">'; 
  echo 'alert("Thanks for your feedback.");'; 
    echo 'window.location.href = "Feedback.html";';
  echo '</script>';
}
?-->
<html>
    <head>
     
        <title>Capstone Project</title>
         <link href="css/Feedbackform.css" rel="stylesheet">
        <script>
          function showAlert(){
            alert("Thanks for your feedback");
          }
        </script>

        <!---Css------>
        <style>
            
 *{
  box-sizing: border-box;
    
}

body{
    background-image: url(image/feedbackform.jpg);
    background-size: cover;
    width:80%;
    padding-left: 10%;
}

input[type=text], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
    color: black;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: red;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
     opacity: 0.85;
  filter: alpha(opacity=30); /* For IE8 and earlier */
  padding: 20px;
    color: black;
}
 button{
   background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
        
}
h2{
    color: black;
    font-size: 65px;
}
legend{
    color: black;
    font-size: 85px;
     margin-top: 5%;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
    color: black;
    font-size: 35px;
}
lable{
    color: black;
}
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
      color:black;
      
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
    color: black;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

        </style>
        
        <!---Html------>
    </head>
<body>
     
      <section>
        
             <legend>We'd welcome your Feedback</legend>
            <table>
         

<div class="container">
   <form  action="Feedback.html" method="post" onsubmit="send(); reset(); return false;">
      <?php
                      if(isset($error)){
                          foreach($error as $error){
                              echo '<span class="error-msg">'.$error.'</span>';
                          };
                      };
                      ?>
     
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name.."  required >
    </div>
  </div>
    
     <div class="row">
    <div class="col-25">
      <label for="email">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email"  placeholder="Your Email Id" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country" name="country">Country</label>
    </div>
    <div class="col-75">
      <select id="country" name="country">
        <option name="country" value="A">Australia</option>
        <option name="country" value="C">Canada</option>
        <option name="country" value="U">USA</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Your Feedback</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="feedback" placeholder="Your Feedback.." style="height:200px" required ></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit"   value="Submit" name="submit" onclick="showAlert()" >
     
      </div>
      <div class="start">
                <button>
                    <a href="Feedback.html">Back</a> 
                </button>
            </div>
       
    </form>
      </div>  
             </table>
               
           
    </section>
    <!---JavaScript------>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        var send = function(){
        Email.send({
    Host : "smtp.elasticemail.com",
    Username : "folkaid259@gmail.com",
    Password : "5E094E1DD824606168D725F4EE6ED18C2F12",
    From : 'folkaid259@gmail.com',
    To : 'folkaid259@gmail.com',
    ReplyFrom : document.getElementById("email").value,
    Subject : "Feedback From Client",
    Body :  "First Name:"+ document.getElementById("fname").value
    + "<br>   Last Name: " + document.getElementById("lname").value
    +"<br> Email:" + document.getElementById("email").value
    +"<br> Feedback:" +  document.getElementById("subject").value,

      }).then(
  message => {alert("Thanks for your feedback" )
        location.href="Feedback.html";}
           
);
        }
       
    </script>
</body>
</html>
