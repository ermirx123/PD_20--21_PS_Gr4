<!DOCTYPE html>
<html>
    
<head>
	<title>Chat</title>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="AjaxPush.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
                <style>
            
            
            #messages {
                
             margin-top: 100px;
            }
            
            body {
                
             padding-bottom: 100px; 
            }
            
            #message {
                
             width: 100%;   
            }
            
            ul {
                 
              list-style-type: none;
              margin: 0;
              padding: 0;
            }
            
            li {
                
              display:inline; 
              margin: 5px;
            }
            
            li a {
                
               text-decoration: none; 
            }
            
            .nav-link.bg-dark {
                
                border-radius: 0px;
            }
            
            form {
                
              margin-top: 20px;
              margin-left: 50px;
              position:relative;
              right:25px;
            }
            
            
        </style>  
</head>
    
<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "student") {
    
    header("location:index.php");
}
?>

<?php

include('config/db_connect.php');

if(isset($_POST['submitMessage'])){ 
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $teksti = mysqli_real_escape_string($conn, $_POST['teksti']);

    $sql = "INSERT INTO Mesazhet(Username,Teksti) VALUES " . "('$username','$teksti')";

    if(mysqli_query($conn, $sql)) {
    
    // success
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
        
        $konsulltimet = array();
        
        if(isset($_POST["lendaEZgjedhur"])) {
            
        $lenda = $_POST["lendet"];
        $profesori = $_POST["profesori"];

	$sql = "SELECT * FROM konsulltimet WHERE Lenda = '$lenda' AND Profesori = '$profesori'";

	$result = mysqli_query($conn, $sql);

	$konsulltimet = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
}
?>

<body>
        

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#" style = "margin-left:20px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?> </a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="logout.php"> Logout </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageSpecificTeacher.php"> Dergo mesazh mesuesit </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageFromTeachers.php"> Mesazhet nga mesuesit </a>
    </li>
  </ul>
</nav>

 <br> <br> 
        
    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST" style = "margin-top:50px;">
   
     <label for = "lendet"> Zgjidheni lenden  </label>
 
     <select id = "lendet" name = "lendet">
       <option value = "Programimi WWW"> Programimi WWW </option>
       <option value = "Procesim i imazheve">  Procesim i imazheve  </option>
       <option value = "Kalkulus 1">  Kalkulus 1  </option>
       <option value = "Kalkulus 2">  Kalkulus 2  </option>
       <option value = "Matematika diskrete"> Matematika diskrete </option>
       <option value = "Teoria e gjases">  Teoria e gjases  </option>
       <option value = "Inxhinierimi Softuerit">  Inxhinierimi Softuerit  </option>
       <option value = "Programim i distribum">  Programim i distribum  </option>
       <option value = "Biznisi dhe Interneti">  Biznisi dhe Interneti  </option>
       <option value = "Siguria e te dhenave">  Siguria e te dhenave  </option>
       <option value = "Analiz Algoritmeve">  Analiz Algoritmeve  </option>
       <option value = "Aplikacione Kompjuterike">  Aplikacione Kompjuterike  </option>
     </select>
     
     <label for = "profesori"> Zgjidheni profesorin  </label>
 
     <select id = "profesori" name = "profesori">
       <option value = "Ermir Rugova"> Ermir Rugova </option>
       <option value = "Naim Braha"> Naim Braha  </option>
       <option value = "Artan Berisha"> Artan Berisha  </option>
       <option value = "Bujar Fejzullahu"> Bujar Fejzullahu </option>
       <option value = "Elver Bajrami"> Elver Bajrami </option>
     </select>

    <input type = "submit" name = "lendaEZgjedhur" value = "Kerko" class = "btn btn-primary">
  
    </form>
        
        <br>
        <hr>
        <br>

	<center> <h4> Lista e konsulltimeve </h4>  </center> <br>

        <center>
        
	<?php foreach($konsulltimet as $konsulltimi): ?>
        
        <div class = "card" style = "width:400px; margin: 20px;">
           <div class = "card-body">
             <h4 class = "card-title"> <?php echo 'Emri konsulltimit: ' . htmlspecialchars($konsulltimi['Emri_Konsulltimit']); ?> </h4>
             <p class = "card-text"> <?php echo 'Lenda: ' . htmlspecialchars($konsulltimi['Lenda']); ?> </p>
             <p class = "card-text"> <?php echo 'Profesori: ' . htmlspecialchars($konsulltimi['Profesori']); ?> </p>
             <p class = "card-text"> <?php echo 'Koha Konsulltimit: ' . htmlspecialchars($konsulltimi['Koha_Konsulltimit']); ?> </p>
             <p class = "card-text"> <?php echo 'Shenimet: ' . htmlspecialchars($konsulltimi['Shenimet']); ?> </p>
            </div>
       </div> 

	<?php endforeach; ?>
            
             </center>   
        
        <center>
        <div id = "messages">

       <center> <h4> Lista e komenteve </h4> <br> </center>
            
	<?php foreach($mesazhet as $mesazhi): ?>
        
    <center> 
  <div class = "media-border p-3">
    <img src="user.png" class="mr-3 mt-0 rounded-circle" style="width:60px">
    <div class="media-body">
	   <p style = "font-weight:bold;"> <?php echo htmlspecialchars($mesazhi['Username']); ?> </p>
           <p> <?php echo htmlspecialchars($mesazhi['Teksti']); ?> </p>
           <p style = "font-size: 12px;"> <i> <?php echo htmlspecialchars($mesazhi['Sent']); ?> </i> </p>
    </div>
  </div> 
     </center>

	<?php endforeach; ?>
       
       <p> <b> Shkruani tekstin: </b> </p>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST">
   
      <input type = "hidden"  name = "username" value = "<?php echo $_SESSION['username']; ?>"> 

       <!-- Messazhi per chatin global -->
       <textarea name = "teksti" rows = "10" cols = "30">Shkruani tekstin qe deshironi te dergoni</textarea>
   
        <br> <br>

      <input type = "submit" name = "submitMessage" value = "Dergo" class = "btn btn-primary">
  
    </form>
        
        </div> 
    </center>

<br> 
<hr>
<br> 
    
    	<input type = "text" autofocus id = "message" placeholder = "your message!">
        <center>
	<button onclick = "send()" class = "btn btn-primary" style = "margin: 20px;"> Send </button> <br><br>
	<div id = "history"></div>
        </center>
        <div id = "username" style = " display:none; "> <?php echo $_SESSION['username']; ?> </div>
        
	<script type = "text/javascript">
            
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
        
</html>>