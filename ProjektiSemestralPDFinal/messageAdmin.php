
<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}

if(isset($_POST['submitMessageAd'])){ 
    
    $username = mysqli_real_escape_string($conn, $_POST['usernameAd']);
    $teksti = mysqli_real_escape_string($conn, $_POST['tekstiAd']);

    $sql = "INSERT INTO mesazhadmin(Username,Mesazhi) VALUES " . "('$username','$teksti')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
}
    
    $sqlAd = 'SELECT * FROM mesazhadmin';

    $resultAd = mysqli_query($conn, $sqlAd);

    $mesazhetAd = mysqli_fetch_all($resultAd, MYSQLI_ASSOC);
    
    mysqli_free_result($resultAd);

    mysqli_close($conn);

?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class = "mesazhAdminit" style = "margin-top:50px;">
    
      <center>
       
       <center> <h5> Shkruani mesazhin tek Admini dhe Profesoret tjere: </h5> <br> </center>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
       
      <input type = "hidden"  name = "usernameAd" value = "<?php echo $_SESSION['username']; ?>"> 
        
      <!-- Messazhi per Adminin -->
      <textarea id = "tekstiAd" name = "tekstiAd" rows = "10" cols = "30">Shkruani mesazhin qe deshironi te dergoni Adminit</textarea>
   
        <br> <br>

      <input type = "submit" name = "submitMessageAd" value = "Dergo" class = "btn btn-primary">
  
    </form>   
       
      </center>   
       
   </div>    

     <center> <h5 style = "margin-top:30px;"> Mesazhet e Adminit me Profesoret </h5> <br> </center>
            
	<?php foreach($mesazhetAd as $mesazhiAd): ?>
        
        <div id = "messageAd2">

        <div class = "card" style = "width:400px; margin: 20px;">
          <div class = "card-body">
              <p class = "card-text"> <?php echo 'Username: ' . htmlspecialchars($mesazhiAd['Username']); ?> </p>
              <p class = "card-text"> <?php echo 'Mesazhi: ' . htmlspecialchars($mesazhiAd['Mesazhi']); ?> </p>
              <p class = "card-text"> <?php echo 'Koha derguar: ' . htmlspecialchars($mesazhiAd['Created_At']); ?> </p>
          </div>
       </div> 
           
        </div>   

	<?php endforeach; ?>

<button onclick = "goToTeacherPage()" class = "btn btn-primary" style = "margin: 30px;"> Kthehu ne faqen kryesore </button>

<script>
       
function goToTeacherPage() {
    
   location.replace("teacher.php");
}    
    
</script>    