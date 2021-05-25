<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "admin") {
    
    header("location:index.php");
}

$mesazhetS = Array();

if(isset($_POST['submitMessageT'])){ 
    
    $usernameA = mysqli_real_escape_string($conn, $_POST['usernameA']);
    $usernameT = mysqli_real_escape_string($conn, $_POST['usernameT']);
    $title = mysqli_real_escape_string($conn, $_POST['titleT']);
    $teksti = mysqli_real_escape_string($conn, $_POST['tekstiT']);
    $adminDergoi = mysqli_real_escape_string($conn, $_POST['adminDergoi']);

    $sql = "INSERT INTO meszhipersonal(Admin,Username_Professor,Title,Teksti,KushDergoi) "
            . "VALUES " . 
            "('$usernameA','$usernameT','$title','$teksti','$adminDergoi')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
    
    $kushDerg = 'AtT';
    
    $sqlAd = "SELECT * FROM meszhipersonal WHERE Username_Professor = '$usernameT' AND KushDergoi = '$kushDerg'";
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
       
    <h4 style = "margin-bottom: 30px;"> <b> Shkruani mesazhin tek Profesori: </b> </h4>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
       
      <input type = "hidden"  name = "usernameA" value = "<?php echo $_SESSION['username']; ?>"> <br> 
      
      <label for = "usernameT"> Zgjidh profesorin qe deshironi te dergoni mesazh: </label>
      
            <select id = "usernameT" name = "usernameT">
            <option value = "ermirrugova123a"> Ermir Rugova         </option>
            <option value = "elverBajrami11">  Elver Bajrami        </option>
            <option value = "naimBraha1">           Naim Braha      </option>
            <option value = "BujarFejzullahu33">  Bujar Fejzullahu </option>
            <option value = "ArtanBerisha123">  Artan Berisha       </option>
      </select>
      
      <br> <br> 
      
      <!-- Titulli i mesazhit per profesorin -->
      <label for = "titleT"> Shkruani titullin  </label>
      <input type = "text" id = "titleT" name = "titleT"> 
      
      <br> <br> 
        
      <!-- Messazhi per Profesorin -->
      <textarea id = "tekstiT" name = "tekstiT" rows = "10" cols = "30">
      Shkruani mesazhin qe deshironi te dergoni Profesorit
      </textarea>
      
      <input type = "hidden"  name = "adminDergoi" value = "AtT"> <br> <br>

      <input type = "submit" name = "submitMessageT" value = "Dergo" class="btn btn-primary">
  
    </form>   
    
    </center>
       
   </div>    


<center>
   <button onclick = "goToAdminPage()" class="btn btn-primary" style = "margin-bottom:50px;"> Kthehu ne faqen kryesore </button>
</center>


<script>
       
function goToAdminPage() {
    
   location.replace("admin.php");
}    
    
</script>    