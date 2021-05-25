<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}

$mesazhetS = Array();

if(isset($_POST['submitMessageT'])){ 
    
    $usernameA = mysqli_real_escape_string($conn, $_POST['usernameA']);
    $usernameT = mysqli_real_escape_string($conn, $_POST['usernameT']);
    $title = mysqli_real_escape_string($conn, $_POST['titleT']);
    $teksti = mysqli_real_escape_string($conn, $_POST['tekstiT']);
    $profesoriDergoi = mysqli_real_escape_string($conn, $_POST['profesoriDergoi']);

    $sql = "INSERT INTO meszhipersonal(Admin,Username_Professor,Title,Teksti,KushDergoi) "
            . "VALUES " . 
            "('$usernameA','$usernameT','$title','$teksti','$profesoriDergoi')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
    
    $kushDerg = 'TtA';
    
    $sqlAd = "SELECT * FROM meszhipersonal WHERE Admin = '$usernameA' AND KushDergoi = '$kushDerg'";
    $resultAd = mysqli_query($conn, $sqlAd);
    $mesazhetT = mysqli_fetch_all($resultAd, MYSQLI_ASSOC);
    mysqli_free_result($resultAd);
    mysqli_close($conn);
}    
    
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class = "mesazhProfesorit" style = "margin-top:50px;">
    
  <!--          
	<?php /* foreach($mesazhetT as $mesazhiT): */?>
     
        <center>
        
        <div id = "messageT2">

	   <p> <?php /* echo htmlspecialchars($mesazhiT['Username_Studenti']) . ' : ' . htmlspecialchars($mesazhiT['Teksti']) . ' To ' . htmlspecialchars($mesazhiT['Username_Teacher']) ;  */?> </p>
           
        </div> 
            
        </center>    

	<?php /* endforeach; */ ?>
  
  -->
     
     <center>
       
    <h4 style = "margin-bottom: 30px;"> <b> Shkruani mesazhin tek Admini: </b> </h4>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
       
      <input type = "hidden"  name = "usernameT" value = "<?php echo $_SESSION['username']; ?>"> 
      <input type = "hidden"  name = "usernameA" value = "admin"> 
      
      <br> <br> 
      
      <!-- Titulli i mesazhit per adminin -->
      <label for = "titleT"> Shkruani titullin  </label>
      <input type = "text" id = "titleT" name = "titleT"> 
      
      <br> <br> 
        
      <!-- Messazhi per Adminin -->
      <textarea id = "tekstiT" name = "tekstiT" rows = "10" cols = "30">
      Shkruani mesazhin qe deshironi te dergoni Adminit
      </textarea>
      
      <input type = "hidden"  name = "profesoriDergoi" value = "TtA"> <br> <br>

      <input type = "submit" name = "submitMessageT" value = "Dergo" class="btn btn-primary">
  
    </form>   
    
    </center>
       
   </div>    


<center>
   <button onclick = "goToTeacherPage()" class="btn btn-primary" style = "margin-bottom:50px;"> Kthehu ne faqen kryesore </button>
</center>


<script>
       
function goToTeacherPage() {
    
   location.replace("teacher.php");
}    
    
</script>    