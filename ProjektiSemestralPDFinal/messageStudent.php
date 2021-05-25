<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}

$mesazhetS = Array();

if(isset($_POST['submitMessageS'])){ 
    
    $usernameS = mysqli_real_escape_string($conn, $_POST['usernameS']);
    $usernameT = mysqli_real_escape_string($conn, $_POST['usernameT']);
    $title = mysqli_real_escape_string($conn, $_POST['titleS']);
    $teksti = mysqli_real_escape_string($conn, $_POST['tekstiS']);
    $profesoriDergoi = mysqli_real_escape_string($conn, $_POST['ProfesoriDergoi']);
    
    $sql = "SELECT * FROM users WHERE username = '$usernameS'";
    
    $result = mysqli_query($conn, $sql);
    
    $array = mysqli_fetch_array($result);
             
    $row = $result->num_rows;
            
    if($row === 0 || $array['user_type'] !== 'student') {  
                
        echo "User nuk ekziston ose nuk eshte student";
                
    } else {  
        
                
        $sql = "INSERT INTO mesazhispecifik(Username_Studenti,Username_Teacher,Title,Teksti,KushDergoi) "
            . "VALUES " . 
            "('$usernameS','$usernameT','$title','$teksti','$profesoriDergoi')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
}

    $kushDerg = 'TtS';

    $sqlAd = "SELECT * FROM mesazhispecifik WHERE Username_Teacher = '$usernameT' AND KushDergoi = '$kushDerg' ";
    $resultAd = mysqli_query($conn, $sqlAd);
    $mesazhetS = mysqli_fetch_all($resultAd, MYSQLI_ASSOC);
    mysqli_free_result($resultAd);
    mysqli_close($conn);
}  

?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class = "mesazhStudentit" style = "margin-top:50px;">
    
    <!--
            
	<?php/* foreach($mesazhetS as $mesazhiS): */?>
        
        <div id = "messageT2">

	   <p> <?php /* echo htmlspecialchars($mesazhiS['Username_Teacher']) . ' : ' . 
                          htmlspecialchars($mesazhiS['Teksti']) . ' To ' . 
                          htmlspecialchars($mesazhiS['Username_Studenti']) ; */?> </p>
           
        </div>   

	<?php /* endforeach;  */ ?> 
     
    
         
     -->    
     <center>
     
    <h4 style = "margin-bottom: 30px;"> <b> Shkruani mesazhin tek Studenti: </b> </h4>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
       
      <input type = "hidden"  name = "usernameT" value = "<?php echo $_SESSION['username']; ?>"> <br> 
      
      <label for = "usernameS"> Shkruani username e studentit: </label>
      <input type = "text" name = "usernameS">
      
      <br> <br> 
      
      <!-- Titulli i mesazhit per Studentin -->
      <label for = "titleS"> Shkruani titullin  </label>
      <input type = "text" id = "titleS" name = "titleS"> 
      
      <br> <br> 
        
      <!-- Messazhi per Studentin -->
      <textarea id = "tekstiS" name = "tekstiS" rows = "10" cols = "30">
      Shkruani mesazhin qe deshironi te dergoni Studentit
      </textarea>
      
      <input type = "hidden"  name = "ProfesoriDergoi" value = "TtS"> <br> <br>
      

      <input type = "submit" name = "submitMessageS" value = "Dergo" class="btn btn-primary">
  
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