<?php

include('config/db_connect.php');

if(isset($_POST['submit'])) {
		
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $emriKonsulltimit = mysqli_real_escape_string($conn, $_POST['emriKonsulltimit']);
    $lenda = mysqli_real_escape_string($conn, $_POST['lenda']);
    $professori = mysqli_real_escape_string($conn, $_POST['profesori']);
    $kohaKonsulltimit = mysqli_real_escape_string($conn, $_POST['kohaKonsulltimit']);
    $shenime = mysqli_real_escape_string($conn, $_POST['shenime']);

    $sql = "UPDATE konsulltimet SET Emri_Konsulltimit = '$emriKonsulltimit',Lenda = '$lenda',
            Profesori = '$professori' ,Koha_Konsulltimit = '$kohaKonsulltimit',Shenimet = '$shenime' 
            WHERE id = '$id' ";

    if(mysqli_query($conn, $sql)) {
    
    echo ' Konsulltimi u perditesua me sukses ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
}

?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
    <center>  <h5 style = "margin-top:30px;"> <b> Jepeni vlerat e reja  </b> </h5>   </center>  
  
  <center>
<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST" style = "margin:30px;">
   
  <input type = "hidden" name = "id" value = "<?php echo $_GET['id'] ?>">  
    
  <!-- Emri i konsulltimit --> 
  <label for = "emriKonsulltimit"> Emri i konsulltimit :</label>
  <input type = "text" id = "emriKonsulltimit" name = "emriKonsulltimit"> <br> <br>
  
  <!-- Lenda -->
  <label> Zgjedheni lenden :</label>
  <input list = "lendetId" name = "lenda">
  <datalist id = "lendetId">
    <option value = "Teoria e gjases">
    <option value = "Kalkulus">
    <option value = "Programimi WWW">
    <option value = "Procesim i imazheve">
    <option value = "Analiz Algoritmeve">
  </datalist> <br> <br>
  
  <!-- Profesori -->
  <label> Zgjedheni profesorin :</label>
  <input list = "profesoriId" name = "profesori" >
  <datalist id = "profesoriId">
    <option value = "Bujar Fejzullahu">
    <option value = "Ermir Rugova">
    <option value = "Naim Braha">
    <option value = "Artan Berisha">
    <option value = "Elver Bajrami">
  </datalist> <br> <br>
  
  <!-- Koha kur do te mbahet konsulltimi -->
  <label for = "kohaKonsulltimit"> Konsulltimi do te mbahet ne : </label>
  <input type = "datetime-local" id = "kohaKonsulltimit" name = "kohaKonsulltimit">
  
  <br> <br>
   
   <!-- Shenime rreth konsulltimit te caktuar -->
   <textarea name = "shenime" rows = "10" cols = "30">
   Shenime rreth konsulltimit
   </textarea>
   
   <br> <br>

  <input type = "submit" name ="submit" value = "Submit" class = "btn btn-primary">
  
</form>
      
      </center>
  
  <center>
      <button onclick = "goToAdminPage()" class = "btn btn-primary" style = "margin-bottom: 50px;"> Kthehu ne faqen e kryesore  </button>
  </center>
  
<script>
       
function goToAdminPage() {
    
   location.replace("admin.php");
}    
    
</script>    