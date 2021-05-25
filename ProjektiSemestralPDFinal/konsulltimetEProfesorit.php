<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}

$string = $_SESSION['username'];

if( 
  (strlen(strpos($string, "naim")) > 0 or strlen(strpos($string, "Naim")) > 0) 
   and 
  (strlen(strpos($string, "braha")) > 0 or strlen(strpos($string, "Braha")) > 0)      
   ) {

   $professorValue = 'Naim Braha';

} else if( (strlen(strpos($string, "bujar")) > 0 or strlen(strpos($string, "Bujar")) > 0) 
   and 
  (strlen(strpos($string, "fejzullahu")) > 0 or strlen(strpos($string, "Fejzullahu")) > 0)      
   ) {

   $professorValue = 'Bujar Fejzullahu';

} else if((strlen(strpos($string, "ermir")) > 0 or strlen(strpos($string, "Ermir")) > 0) 
   and 
  (strlen(strpos($string, "rugova")) > 0 or strlen(strpos($string, "Rugova")) > 0)      
   ) {

   $professorValue = 'Ermir Rugova';

} else if((strlen(strpos($string, "artan")) > 0 or strlen(strpos($string, "Artan")) > 0) 
   and 
  (strlen(strpos($string, "berisha")) > 0 or strlen(strpos($string, "Berisha")) > 0)      
   ) {
   
   $professorValue = 'Artan Berisha';

} else if((strlen(strpos($string, "elver")) > 0 or strlen(strpos($string, "Elver")) > 0) 
   and 
  (strlen(strpos($string, "bajrami")) > 0 or strlen(strpos($string, "Bajrami")) > 0)      
   ) {
   
   $professorValue = 'Elver Bajrami';

} else {
   
   $professorValue = 'No professor defined';
}
   

   $sql = "SELECT * FROM konsulltimet WHERE Profesori ='$professorValue'";

   $result = mysqli_query($conn, $sql);

   $konsulltimetT = mysqli_fetch_all($result, MYSQLI_ASSOC);

   mysqli_free_result($result);

   mysqli_close($conn);
   
   
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
  <div class = "konsulltimetEProfesorit">
    
     <center> <h4 style = "margin-top: 50px;"> Konsulltimet qe keni krijuar </h4> <br> </center>
            
<?php foreach($konsulltimetT as $konsulltimiT): ?>
        
    <center>   
                        
   <div class="card" style="width:400px; margin:20px;">
    <div class="card-body">
       <h4 class = "card-title"> <?php echo 'Emri konsulltimit: ' . htmlspecialchars($konsulltimiT['Emri_Konsulltimit']); ?> </h4>
         <p class="card-text"> <?php echo 'Lenda: ' . htmlspecialchars($konsulltimiT['Lenda']); ?> </p>
         <p class="card-text"> <?php echo 'Koha Konsulltimit: ' . htmlspecialchars($konsulltimiT['Koha_Konsulltimit']); ?> </p>
         <p class="card-text"> <?php echo 'Shenimet: ' . htmlspecialchars($konsulltimiT['Shenimet']); ?> </p>
                   
        </div>
  </div> 
                  
    </center>  

	<?php endforeach; ?>
       
   </div>    

<button onclick = "goToTeacherPage()" class = "btn btn-primary" style = "margin: 30px;"> Kthehu ne faqen kryesore </button>

<script>
    
    
function goToTeacherPage() {
    
   location.replace("teacher.php");
}
    
    
</script>    