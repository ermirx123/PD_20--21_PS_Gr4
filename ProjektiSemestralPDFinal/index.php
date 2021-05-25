
<?php

session_start();

include('config/db_connect.php');

$msg = "";

if(isset($_POST['login'])) {
    
  $username = $_POST['username'];  
  $password = $_POST['password'];   
  $password = sha1($password); 
  $userType = $_POST['userType'];
  
  $sql = " SELECT * FROM users WHERE username = ? AND password = ? AND user_type = ?";
  
  $stmt = $conn-> prepare($sql);
  $stmt -> bind_param("sss",$username,$password,$userType);
  $stmt -> execute();
  $result = $stmt -> get_result();
  $row = $result -> fetch_assoc();
  
  if ($result -> num_rows == 1) {
  
  session_regenerate_id();
  $_SESSION['username'] = $row['username'];
  $_SESSION['role'] = $row['user_type'];
  session_write_close();
  
  if($_SESSION['role'] == "student") {
      
    header("location:student.php");  
  
  } else if($_SESSION['role'] == "teacher") {
      
    header("location:teacher.php");   
    
  } else if($_SESSION['role'] == "admin") {
      
    header("location:admin.php");    
  
  } else  {
      
     $msg = "Username or Password is Incorrect!"; 
  }
  
} else {
    
    $msg = "Username or Password is Incorrect!";
}
  
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style>
      
            
  .textBox123 {
    
    position:absolute;  
    background-color: white;  
    color:black;
    top:150px;
    left:350px;
    opacity: 0.8;
    border-radius: 20px;
    padding: 50px;
  }    
            
body {
    
    font-family: Arial, Helvetica, sans-serif;     
    background-image: url("UP.jpg");  
    background-size: cover;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    
  span.psw {
      
     display: block;
     float: none;
  }
  
  .cancelbtn {
      
     width: 100%;
  }
  
  
}
</style>
        
    </head>
    <body>
     
        
<div class = "textBox123">        
 <h2 style = "color:black;"> Orari i menaxhimit te konsulltimeve FSHMN </h2>
 <h2 style = "color:black; text-align:center;"> Shkenca Kompjuterike </h2>
 <button id = "buttonA11" onclick = "document.getElementById('id01').style.display='block'" style = "width:auto; position:relative; left: 200px;">Login</button>
</div>


<div id="id01" class="modal">
  
  <form class = "modal-content animate" action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src = "user.png" alt = "Avatar" class = "avatar">
    </div>

    <div class = "container">
        
      <label for = "username"> <b> Username </b> </label>
      <input type = "text" placeholder = "Enter Username" name = "username" id = "username" required>

      <label for = "password"> <b> Password </b> </label>
      <input type = "password" placeholder = "Enter Password" id = "password" name = "password" required>
        
      <label>
        <input type = "radio" name = "userType" value = "student" required> Student
      </label>
      <label>
        <input type = "radio" name = "userType" value = "teacher" required> Teacher
      </label>
      <label>
        <input type = "radio" name = "userType" value = "admin" required> Admin
      </label>
    </div>
    
    <div class = "container" style = "background-color:#f1f1f1">
            <input type = "submit" name = "login" value = "Login"
           style = "background-color: blueviolet; color:white;  padding: 10px 20px; position:relative; left:250px;">
      <button type="button" style = "position:relative; left:600px;" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
        
        
        
   <script>
            
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
</script>    

    </body>

</html>

