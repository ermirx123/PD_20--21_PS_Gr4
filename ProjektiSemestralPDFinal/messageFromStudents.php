<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}
    $usernameT = $_SESSION['username'];
    
    $kushDergoi = 'StT'; 

    $sql = "SELECT * FROM mesazhispecifik WHERE Username_Teacher = '$usernameT' AND KushDergoi = '$kushDergoi' ";
    $result = mysqli_query($conn, $sql);
    $mesazhetS = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn); 
    
?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<div class = "mesazhProfesorit">
    
     <center> <h4 style = "margin-top: 50px;"> Mesazhet nga Studentet </h4> <br> </center>
            
	<?php foreach($mesazhetS as $mesazhiS): ?>
        
        <div id = "messageT2">

        <div class = "card" style = "width:400px; margin: 20px;">
           <div class = "card-body">
               <h4 class = "card-title"> <?php echo 'Titulli: ' . htmlspecialchars($mesazhiS['Title']); ?> </h4>
               <p class = "card-text"> <?php echo 'Studenti: ' . htmlspecialchars($mesazhiS['Username_Studenti']); ?> </p>
               <p class = "card-text"> <?php echo 'Mesazhi: ' . htmlspecialchars($mesazhiS['Teksti']); ?> </p>
               <p class = "card-text"> <?php echo 'Koha derguar: ' . htmlspecialchars($mesazhiS['Derguar']); ?> </p>
           </div>
       </div> 
           
        </div>   

	<?php endforeach; ?>
       
   </div>    

<button onclick = "goToTeacherPage()" class = "btn btn-primary" style = "margin: 30px;"> Kthehu ne faqen kryesore </button>

<script>
    
    
function goToTeacherPage() {
    
   location.replace("teacher.php");
}
    
    
</script>    