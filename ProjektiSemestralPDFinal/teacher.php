
<!DOCTYPE html>
<html>
<head>
	<title> Profesori </title>
	<meta charset="UTF-8">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="AjaxPush.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

         <style>
            
            body {
                
             padding-bottom: 1500px; 
            }
            
            #message {
                
             width: 100%;   
             border: 1px solid black;   
            }
            
            ul {
                 
              list-style-type: none;
              margin: 0;
              padding: 0;
            }
            
            li {
              
              border-radius:0px;
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
                
              margin-top: 50px;
              margin-left: 50px;
            }
            
        </style>  
</head>


<?php

include('config/db_connect.php');

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != "teacher") {
    
    header("location:index.php");
}
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#" style = "margin-left:20px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?> </a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="logout.php"> Logout </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageAdmin.php"> Diskutime me Profesoret </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageFromStudents.php"> Mesazhet nga studentet </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="messageStudent.php"> Dergo Mesazh Studentit </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="messagePersonalprivateAdmin.php"> Dergo Mesazh Adminit </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="personalMessageFromAdmin.php"> Mesazhet nga Admini </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="konsulltimetEProfesorit.php"> Konsulltimet </a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href = "http://localhost:3000" target = "_blank"> Chat </a>
    </li>
  </ul>
</nav>

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


if(isset($_POST['submit'])){ 
    
    include('config/db_connect.php');
    
    $emriKonsulltimit = mysqli_real_escape_string($conn, $_POST['emriKonsulltimit']);
    $lenda = mysqli_real_escape_string($conn, $_POST['lendet']);
    $professori = mysqli_real_escape_string($conn, $professorValue);
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

<body>

    <center>

<p style = "display:none;"><?php echo $professorValue; ?></p>

<h4 style = "margin-top:150px;"> <b> Caktoni konsulltimin </b> </h4>


<form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
</form>

   </center>

<br>
<hr>
<br>

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
           <p> <i> <?php echo htmlspecialchars($mesazhi['Sent']); ?> </i> </p>
    </div>
  </div> 
          
          </center>

	<?php endforeach; ?>
       
       <p> <b> Shkruani komentin: </b> </p>

    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "POST"   style =" position:relative; right:20px;">
   
      <input type = "hidden"  name = "username" value = "<?php echo $_SESSION['username']; ?>"> 

       <!-- Messazhi per chatin global -->
       <textarea name = "teksti" rows = "10" cols = "30">Shkruani tekstin qe deshironi te dergoni</textarea>
   
        <br> <br>

      <input type = "submit" name = "submitMessage" value = "Dergo" class = "btn btn-primary">
  
    </form>
        
        </div> 
    </center>

  <script>
            
          var formElement = document.getElementsByTagName("form")[0];
          
          var brTag1 = document.createElement("br");
          var brTag2 = document.createElement("br");
          var brTag3 = document.createElement("br");
          var brTag4 = document.createElement("br");
          var brTag5 = document.createElement("br");
          var brTag6 = document.createElement("br");
          var brTag7 = document.createElement("br");
          var brTag8 = document.createElement("br");
          
          var formElementEmriKonsulltimitLabel = document.createElement("label");
          formElementEmriKonsulltimitLabel.setAttribute("for","emriKonsulltimit");
          formElementEmriKonsulltimitLabel.innerHTML = "Emri i konsulltimit: ";
          
          var formElementEmriKonsulltimit = document.createElement("input");
          formElementEmriKonsulltimit.setAttribute("type","text");
          formElementEmriKonsulltimit.setAttribute("name","emriKonsulltimit");
          formElementEmriKonsulltimit.setAttribute("placeholder","emriKonsulltimit");
          formElementEmriKonsulltimit.setAttribute("id","emriKonsulltimit");
          formElementEmriKonsulltimit.required = true;
          
          var formElementLendaLabel = document.createElement("label");
          formElementLendaLabel.setAttribute("id","lendetId");
          formElementLendaLabel.innerHTML = 'Zgjedheni lenden : ';
           
          var formElementSelect = document.createElement("select");
          formElementSelect.setAttribute("id","lendetId");
          formElementSelect.setAttribute("name","lendet");
          
          var textValidator = document.getElementsByTagName("p")[0];
          
          if(textValidator.innerHTML === "Naim Braha") {
             
          var formElementOption1 = document.createElement("option");
          formElementOption1.setAttribute("value","Kalkulus 1");
          formElementOption1.innerHTML = "Kalkulus 1";
          
          var formElementOption2 = document.createElement("option");
          formElementOption2.setAttribute("value","Aplikacione Kompjuterike");
          formElementOption2.innerHTML = "Aplikacione Kompjuterike";
          
          var formElementOption3 = document.createElement("option");
          formElementOption3.setAttribute("value","Kalkulus 2");
          formElementOption3.innerHTML = "Kalkulus 2";    
              
          formElementSelect.append(formElementOption1); 
          formElementSelect.append(formElementOption2); 
          formElementSelect.append(formElementOption3); 
          
         } else if(textValidator.innerHTML === "Bujar Fejzullahu") {
             
          var formElementOption1 = document.createElement("option");
          formElementOption1.setAttribute("value","Matematika diskrete");
          formElementOption1.innerHTML = "Matematika diskrete";
          
          var formElementOption2 = document.createElement("option");
          formElementOption2.setAttribute("value","Teoria e gjases");
          formElementOption2.innerHTML = "Teoria e gjases";
          
          formElementSelect.append(formElementOption1); 
          formElementSelect.append(formElementOption2); 
          
         } else if(textValidator.innerHTML === "Ermir Rugova") {
             
          var formElementOption1 = document.createElement("option");
          formElementOption1.setAttribute("value","Programimi WWW");
          formElementOption1.innerHTML = "Programimi WWW";
          
          var formElementOption2 = document.createElement("option");
          formElementOption2.setAttribute("value","Inxhinierimi Softuerit");
          formElementOption2.innerHTML = "Inxhinierimi Softuerit";
          
          var formElementOption3 = document.createElement("option");
          formElementOption3.setAttribute("value","Programim i distribum");
          formElementOption3.innerHTML = "Programim i distribum";
          
          var formElementOption4 = document.createElement("option");
          formElementOption4.setAttribute("value","Biznisi dhe Interneti");
          formElementOption4.innerHTML = "Biznisi dhe Interneti";
          
          formElementSelect.append(formElementOption1); 
          formElementSelect.append(formElementOption2);
          formElementSelect.append(formElementOption3); 
          formElementSelect.append(formElementOption4); 
          
         } else if(textValidator.innerHTML === "Artan Berisha") {
             
          var formElementOption1 = document.createElement("option");
          formElementOption1.setAttribute("value","Siguria e te dhenave");
          formElementOption1.innerHTML = "Siguria e te dhenave";
          
          var formElementOption2 = document.createElement("option");
          formElementOption2.setAttribute("value","Grafik kompjuterike");
          formElementOption2.innerHTML = "Grafik kompjuterike";
          
          var formElementOption3 = document.createElement("option");
          formElementOption3.setAttribute("value","Procesim i imazheve");
          formElementOption3.innerHTML = "Procesim i imazheve";
          
          formElementSelect.append(formElementOption1); 
          formElementSelect.append(formElementOption2);
          formElementSelect.append(formElementOption3); 
          
         } else if(textValidator.innerHTML === "Elver Bajrami") {
             
          var formElementOption1 = document.createElement("option");
          formElementOption1.setAttribute("value","Programim OOP & GUI");
          formElementOption1.innerHTML = "Programim OOP & GUI";
          
          var formElementOption2 = document.createElement("option");
          formElementOption2.setAttribute("value","Analiz Algoritmeve");
          formElementOption2.innerHTML = "Analiz Algoritmeve";
          
          formElementSelect.append(formElementOption1); 
          formElementSelect.append(formElementOption2);
         }
         
          var formElementDateTimeLocalLabel = document.createElement("label");
          formElementDateTimeLocalLabel.setAttribute("for","kohaKonsulltimit");
          formElementDateTimeLocalLabel.innerHTML = "Konsulltimi do te mbahet ne :";
          
          var formElementDateTimeLocal = document.createElement("input");
          formElementDateTimeLocal.setAttribute("type","datetime-local");
          formElementDateTimeLocal.setAttribute("name","kohaKonsulltimit");
          formElementDateTimeLocal.setAttribute("id","kohaKonsulltimit");
          
          var formElementTextArea = document.createElement("textarea");
          formElementTextArea.setAttribute("name","shenime");
          formElementTextArea.setAttribute("rows","10");
          formElementTextArea.setAttribute("cols","30");
          formElementTextArea.innerHTML = 'Shenime rreth konsulltimit';
          
          var formElementSubmit = document.createElement("input");
          formElementSubmit.setAttribute("type","submit");
          formElementSubmit.setAttribute("name","submit");
          formElementSubmit.setAttribute("class","btn btn-primary");
          
          formElement.appendChild(formElementEmriKonsulltimitLabel);
          formElement.appendChild(formElementEmriKonsulltimit);
          formElement.appendChild(brTag1);
          formElement.appendChild(brTag2);
          formElement.appendChild(formElementLendaLabel);
          formElement.appendChild(formElementSelect);
          formElement.appendChild(brTag3);
          formElement.appendChild(brTag4);
          formElement.appendChild(formElementDateTimeLocalLabel);
          formElement.appendChild(formElementDateTimeLocal);
          formElement.appendChild(brTag5);
          formElement.appendChild(brTag6);
          formElement.appendChild(formElementTextArea);
          formElement.appendChild(brTag7);
          formElement.appendChild(brTag8);
          formElement.appendChild(formElementSubmit);
          
        </script>   
        
  <br> 
  <hr>
  <br> 
  
  	<input type = "text" autofocus id = "message" placeholder = "your message!">
        <center>
	      <button onclick = "send()" class = "btn btn-primary" style = "margin:20px;"> Send </button><br><br>
        
	<div id = "history"></div>
  
        <div id = "username" style = " display:none; "> <?php echo $_SESSION['username']; ?> </div>
    
        </center>
        
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

        
</html>