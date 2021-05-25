<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM users WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)) {
                    
			header('Location: admin.php');
                        
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM users WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$perdoruesi = mysqli_fetch_assoc($result);

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
            
            #lastPageId {
                
              margin-top: 20px;  
            }
            
        </style>
                     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    
    <body>

	<div id = "contactInfo123a">
            
	<?php if($perdoruesi): ?>
                        
    <center>        
           
   <div class="container">
   <div class="card" style="width:400px">
     <img class = "card-img-top" src = "user.png" alt = "Card image" style = "width:100%">
     <div class="card-body">
       <h4 class="card-title"> <?php echo 'Username: ' . htmlspecialchars($perdoruesi['username']); ?> </h4>
       <p class="card-text"> <?php echo 'Roli: ' . htmlspecialchars($perdoruesi['user_type']); ?> </p>
       <p class="card-text"> <?php echo 'Data krijuar: ' . htmlspecialchars($perdoruesi['created']); ?> </p>
      
            <!-- DELETE FORM -->
	    <form action = "info.php" method = "POST">
		<input type = "hidden" name = "id_to_delete" value = "<?php echo $perdoruesi['id']; ?>">
		<input type = "submit" name = "delete" value = "Delete" class="btn btn-danger" style = "padding-right: 20px; padding-left: 20px;">
	    </form>
                        
             <br>
                        
             <a href = "updatePerdoruesi.php?id=<?php echo $perdoruesi['id']; ?>" class="btn btn-success"> Perditeso </a>        

            </div>
            </div>
             
		<?php else: ?>
			<h5> No such user exist's. </h5>
		<?php endif ?>
	</div>
        
        <button onclick = "goToAdminPage()" class="btn btn-primary" id = "lastPageId"> Kthehu ne faqen kryesore </button>

            </center>        

        
<script>
       
function goToAdminPage() {
    
   location.replace("admin.php");
}    
    
</script>    

    </body>
        
</html>