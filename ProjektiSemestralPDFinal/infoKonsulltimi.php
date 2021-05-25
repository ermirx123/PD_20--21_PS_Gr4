<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM konsulltimet WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)) {
                    
			header('Location: admin.php');
                        
		} else {
                    
			echo 'query error: '. mysqli_error($conn);
		}
	}

	if(isset($_GET['id'])){
		
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM konsulltimet WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$konsulltimi = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
                
		mysqli_close($conn);
	}

?>

<!DOCTYPE html>
<html>
    
    <head>
        
        <title> Info Page </title>    
        
        <style>
             
            #contactInfo123a {
                
             margin: 40px;
            } 
            
        </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body>

	<div id = "contactInfo123a">
            
		<?php if($konsulltimi): ?>
            
              <center>   
                        
   <div class="card" style="width:400px">
    <div class="card-body">
       <h4 class = "card-title"> <?php echo 'Emri konsulltimit: ' . htmlspecialchars($konsulltimi['Emri_Konsulltimit']); ?> </h4>
         <p class="card-text"> <?php echo 'Lenda: ' . htmlspecialchars($konsulltimi['Lenda']); ?> </p>
         <p class="card-text"> <?php echo 'Profesori: ' . htmlspecialchars($konsulltimi['Profesori']); ?> </p>
         <p class="card-text"> <?php echo 'Koha Konsulltimit: ' . htmlspecialchars($konsulltimi['Koha_Konsulltimit']); ?> </p>
         <p class="card-text"> <?php echo 'Shenimet: ' . htmlspecialchars($konsulltimi['Shenimet']); ?> </p>

	     <!-- DELETE FORM -->
	    <form action = "infoKonsulltimi.php" method = "POST">
		    <input type = "hidden" name = "id_to_delete" value = "<?php echo $konsulltimi['id']; ?>">
		    <input type = "submit" name = "delete" class="btn btn-danger" value = "Delete" style = "padding-right: 20px; padding-left: 20px;">
	    </form>
             
             <br>
                        
             <a href = "updateKonsulltimi.php?id=<?php echo $konsulltimi['id']; ?>" class="btn btn-success"> Perditeso </a>

        </div>
  </div> 
                  
                 </center>      
             
		<?php else: ?>
			<h5> Nuk ekziston konsulltimi </h5>
		<?php endif ?>
	</div>
<center>      
    <button onclick = "goToAdminPage()" class = "btn btn-primary"> Kthehu ne faqen kryesore </button>
</center>

<script>
       
function goToAdminPage() {
    
   location.replace("admin.php");
}    
    
</script>    
    </body>
        
</html>