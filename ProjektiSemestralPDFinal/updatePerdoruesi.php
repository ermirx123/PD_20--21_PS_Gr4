<?php

include('config/db_connect.php');

if(isset($_POST['submit'])) {
	
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['fusername']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['fpassword']));
    $userType = mysqli_real_escape_string($conn, $_POST['fuserType']);

    $sql = "UPDATE users SET username = '$username',password = '$password',
            user_type = '$userType' WHERE id = '$id' ";

    if(mysqli_query($conn, $sql)) {
    
    echo ' Perdoruesi u perditesua me sukses ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
}

?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <center>  <h5 style = "margin-top:50px;"> <b> Jepeni vlerat e reja  </b> </h5>   </center>  

 <center> 
<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST" style = "margin:50px;">
   
  <input type = "hidden" name = "id" value = "<?php echo $_GET['id'] ?>">  
    
  <label for = "fusername"> Username: </label> 
  <input type = "text" id = "fusername" name = "fusername"> <br> <br>
  
  <label for = "fpassword"> Password: </label> 
  <input type = "text" id = "fpassword" name = "fpassword">  <br> <br>
  
 <label for = "fuserType"> User Type: </label> <br>
 <select id = "fuserType" name = "fuserType">
   <option value = "teacher">  Teacher </option>
   <option value = "student">  Student  </option>
 </select>
   
  <input type = "submit" name = "submit" value = "Submit" class = "btn btn-primary">
  
</form>
</center>
     

<center>
   <button onclick = "goToAdminPage()" class = "btn btn-primary"> Kthehu ne faqen e kryesore  </button>
</center>

<script>
       
function goToAdminPage() {
    
   location.replace("admin.php");
}    
    
</script>    