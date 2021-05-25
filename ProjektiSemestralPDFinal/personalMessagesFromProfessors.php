<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "admin") {
    
    header("location:index.php");
}

    $admin = $_SESSION['username'];
    
    $mesazhetT = array();
    $kushDergoi = 'TtA'; 
    
    $sql = "SELECT * FROM meszhipersonal WHERE Admin = '$admin' AND KushDergoi = '$kushDergoi' ";
    $result = mysqli_query($conn, $sql);
    $mesazhetT = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn); 
    
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class = "mesazhProfesorit">
    
     <center> <h4 style = "margin-top: 50px;"> Mesazhet nga Profesoret </h4> <br> </center>
            
	<?php foreach($mesazhetT as $mesazhiT): ?>
        
        <div id = "messageT2">

           
        <div class = "card" style = "width:400px; margin: 20px;">
          <div class = "card-body">
              
              <center>
              <h4 class = "card-title"> <?php echo 'Titulli: ' . htmlspecialchars($mesazhiT['Title']); ?> </h4>
              <p class = "card-text"> <?php echo 'Profesori: ' . htmlspecialchars($mesazhiT['Username_Professor']); ?> </p>
              <p class = "card-text"> <?php echo 'Mesazhi: ' . htmlspecialchars($mesazhiT['Teksti']); ?> </p>
              <p class = "card-text"> <?php echo 'Koha derguar: ' . htmlspecialchars($mesazhiT['Derguar']); ?> </p>
          
              <a href = "personalMEssagesFromProfessorsInfo.php?id=<?php echo $mesazhiT['Id'] ?>"> more info </a>  
          
              </center>
          </div>
       </div> 
           
           
           
        </div>   

	<?php endforeach; ?>
       
   </div>    

<button onclick = "goToAdminPage()" class = "btn btn-primary" style = "margin: 30px;"> Kthehu ne faqen kryesore </button>

<script>
        
function goToAdminPage() {
    
   location.replace("admin.php");
}
    
</script>    