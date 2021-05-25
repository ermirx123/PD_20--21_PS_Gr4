<!DOCTYPE html>
<html>

<head>
	<title>Chat</title>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="AjaxPush.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
           <style>
            
            
            body {
                
             padding-bottom: 200px;  
            }
            
            #message {
                
             width: 100%;   
            }
            
            .perdoruesit {
                
              padding: 20px;
              margin: 20px;
            }
            
            .listaEkonsulltimeve {
                
              padding: 20px;
              margin: 20px;   
              margin-top:50px; 
            }
            
            ul {
                 
              list-style-type: none;
              margin: 0;
              padding: 0;
            }
            
            li {
                
              display:inline; 
              margin: 10px 20px;
            }
            
            li a {
                
               text-decoration: none; 
            }
            
            form {
                
              margin-top: 30px;
              margin-left: 30px;
            }
            
        </style>  
</head>


<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "admin") {
    
    header("location:admin.php");
}

if(isset($_POST['submitUsers'])){ 
    
    $username = mysqli_real_escape_string($conn, $_POST['fusername']);
    $password = mysqli_real_escape_string($conn, sha1($_POST['fpassword']));
    $userType = mysqli_real_escape_string($conn, $_POST['fuserType']);
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    
    $result = mysqli_query($conn, $sql);
             
    $row = $result->num_rows;
            
    if($row > 0) {  
                
        echo 'User exists';
                
    } else {  
                
    $sql = "INSERT INTO users(username,password,user_type) VALUES " . "('$username','$password','$userType')"; 
     
    if(mysqli_query($conn, $sql)) {
    
         echo 'Data inserted sucessfully ';
                                
    } else {
                             
        echo 'query error: '. mysqli_error($conn);
    }
    }  

}

?>

<?php

if(isset($_POST['submit'])){ 
    
    $emriKonsulltimit = mysqli_real_escape_string($conn, $_POST['emriKonsulltimit']);
    $lenda = mysqli_real_escape_string($conn, $_POST['lenda']);
    $professori = mysqli_real_escape_string($conn, $_POST['profesori']);
    $kohaKonsulltimit = mysqli_real_escape_string($conn, $_POST['kohaKonsulltimit']);
    $shenime = mysqli_real_escape_string($conn, $_POST['shenime']);

    $sql = "INSERT INTO konsulltimet(Emri_Konsulltimit,Lenda,Profesori,Koha_Konsulltimit,Shenimet) VALUES "
        . "('$emriKonsulltimit','$lenda','$professori','$kohaKonsulltimit','$shenime')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
}

?>

<?php

include('config/db_connect.php');

if(isset($_POST['submitMessage'])){ 
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $teksti = mysqli_real_escape_string($conn, $_POST['teksti']);

    $sql = "INSERT INTO Mesazhet(Username,Teksti) VALUES " . "('$username','$teksti')";

    if(mysqli_query($conn, $sql)) {
    
    echo 'Data inserted sucessfully ';
                                
    } else {
                             
       echo 'query error: '. mysqli_error($conn);
    }
    
}
	$sql = 'SELECT * FROM Mesazhet';

	$result = mysqli_query($conn, $sql);

	$mesazhet = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);

        ?>

<?php 

	include('config/db_connect.php');

	$sql = 'SELECT * FROM users';

	$result = mysqli_query($conn, $sql);

	$perdoruesit = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
?>

<?php 

	include('config/db_connect.php');
        
	$sql = "SELECT * FROM konsulltimet";

	$result = mysqli_query($conn, $sql);

	$konsulltimet = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
?>

<body class = "secondary">
    

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#" style = "margin-left:20px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?> </a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="logout.php"> Logout </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageTeacherByAdmin.php"> Diskutime me Profesoret </a>
    </li>
    <li class="nav-item">
      <a class = "nav-link" href = "messagePersonalprivateProfessor.php"> Mesazh personal Profesorit </a>
    </li>
    <li class="nav-item">
        <a class = "nav-link" href = "personalMessagesFromProfessors.php"> Mesazhet nga Profesoret </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href = "http://localhost:3000" target = "_blank" > Chat </a>
    </li>
  </ul>
</nav>

  <br> <br> <br> <br>    
    
  <center>
  
<h4 style = "position:relative; left: 20px; margin-top: 20px;"> Shtoni konsulltime </h4>

<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
   
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

  <input type = "submit" name ="submit" value = "Submit" class="btn btn-primary mb-2">
  
</form>

</center>

<br>
<hr>
<br> 

<center>

<h4> Shtoni Perdorues te ri </h4>

<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
   
  <label for = "fusername"> Username: </label> 
  <input type = "text" id = "fusername" name = "fusername"> <br> <br>
  
  <label for = "fpassword"> Password: </label> 
  <input type = "text" id = "fpassword" name = "fpassword">  <br> <br>
  
  
 <label for = "fuserType"> User Type: </label> <br>
 <select id = "fuserType" name = "fuserType">
   <option value = "teacher">  Teacher </option>
   <option value = "student">  Student  </option>
 </select>
   
  <input type = "submit" name = "submitUsers" value = "Submit" class="btn btn-primary mb-2">
  
</form>

</center>
       
<br>
<hr>

        <div class = "perdoruesit">

	 <center> <h4> Lista e Perdoruesve </h4> <br> </center>

	<?php foreach($perdoruesit as $perdoruesi): ?>
        
     <div class="media border p-3">
      <img src = "user.png" alt = "John Doe" class="mr-3 mt-0 rounded-circle" style="width:60px;">
        <div class="media-body">
        <h4> <?php echo 'Username: ' . htmlspecialchars($perdoruesi['username']); ?> <small><i> <?php echo 'Data krijuar: ' . htmlspecialchars($perdoruesi['created']); ?> </i></small></h4>
        <p> <?php echo 'Roli: ' . htmlspecialchars($perdoruesi['user_type']); ?> <a href = "info.php?id=<?php echo $perdoruesi['id'] ?>"> more info </a> </p>    
      </div>
     </div>

	<?php endforeach; ?>
        
        </div>       
               
              
        <div class = "listaEkonsulltimeve" >      
           
       	<center> <h4> Lista e Konsulltimeve </h4> <br> </center> <br>

	<?php foreach($konsulltimet as $konsulltimi): ?>
        
        
<div class="jumbotron jumbotron-fluid" style = 'border:1px solid black; border-radius: 10px; margin:10px; padding:10px;'>
  <div class="container" style = "text-align:center;">
       
	   <p> <?php echo 'Emri konsulltimit: ' . htmlspecialchars($konsulltimi['Emri_Konsulltimit']); ?> </p>
           <p> <?php echo 'Lenda: ' . htmlspecialchars($konsulltimi['Lenda']); ?> </p>
           <p> <?php echo 'Profesori: ' . htmlspecialchars($konsulltimi['Profesori']); ?> </p> 
           
           <a href = "infoKonsulltimi.php?id=<?php echo $konsulltimi['id'] ?>"> more info </a>     
  </div>
</div>

	<?php endforeach; ?>       
              
        </div>
        
<div class = "listaEKomenteve">

       <center> <h4> Lista e komenteve </h4> <br> </center>
            
	<?php foreach($mesazhet as $mesazhi): ?>
        
      <center> 
       
  <div class = "media-border p-3">
    <img src="user.png" class="mr-3 mt-0 rounded-circle" style="width:60px">
    <div class="media-body">
	   <p style = "font-weight:bold;"> <?php echo htmlspecialchars($mesazhi['Username']); ?> </p>
           <p> <?php echo htmlspecialchars($mesazhi['Teksti']); ?> </p>
           <a href = "messageInfo.php?id=<?php echo $mesazhi['id'] ?>"> info </a>
    </div>
  </div> 
          
          </center>

	<?php endforeach; ?>
        
    <center>   
        
           <p style = "margin-top: 50px;"> <b> Shkruani tekstin: </b> </p>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
   
      <input type = "hidden"  name = "username" value = "<?php echo $_SESSION['username']; ?>"> 

       <!-- Messazhi per chatin global -->
       <textarea name = "teksti" rows = "10" cols = "30">Shkruani tekstin qe deshironi te dergoni</textarea>
   
        <br> <br>

      <input type = "submit" name = "submitMessage" value = "Dergo" class="btn btn-primary mb-2">
  
    </form>
        
   </center>
           
 </div>  
        
<hr>

  <br> 
  <hr>
  <br> 

	<input type = "text" autofocus id = "message" placeholder="your message!">
        <center>
	<button onclick="send()" class = "btn btn-primary" style = "margin: 20px;">Send</button><br><br>
	<div id="history"></div>
        </center>
        
        <div id = "username" style = " display:none; "> <?php echo $_SESSION['username']; ?> </div>
        
    <script type="text/javascript">
        
		var comet = new AjaxPush('listener.php', 'sender.php');
                
                var usernm = document.getElementById('username').innerHTML;
                
		var template = "<strong style='color:black'>" + usernm + "</strong>: ";

		// listener
		comet.connect(function(data) { $("#history").append(data.message) + "<br>"; });

		// sender
		var send = function() {
                    
		    comet.doRequest({ message: template + $("#message").val() + "<br>" }, function(){
				$("#message").val('').focus();
		    });
		};
                
	</script>
</body>

</html>