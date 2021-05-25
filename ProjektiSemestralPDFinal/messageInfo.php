<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM mesazhet WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)) {
                    
			header('Location: admin.php');
                        
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM mesazhet WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$mesazhi = mysqli_fetch_assoc($result);

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
              margin-top: 150px;
            }
            
        </style>
        
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    </head>
    
    <body>

	<div id = "contactInfo123a">
            
		<?php if($mesazhi): ?>
                        
           <center>      
           
          <div class = "card" style = "width:400px">
             <div class = "card-body">
              <h4 class = "card-title"> <?php echo 'Username: ' . htmlspecialchars($mesazhi['Username']); ?> </h4>
              <p class = "card-text"> <?php echo 'Mesazhi: ' . htmlspecialchars($mesazhi['Teksti']); ?> </p>
              <p class = "card-text"> <?php echo 'Data derguar: ' . htmlspecialchars($mesazhi['Sent']); ?> </p>

			<!-- DELETE FORM -->
	    <form action = "messageInfo.php" method = "POST">
		<input type = "hidden" name = "id_to_delete" value = "<?php echo $mesazhi['id']; ?>">
		<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete">
	    </form>
                        
         </div>
       </div> 
               
                </center>   

		<?php else: ?>
			<h5> No such message exist's. </h5>
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