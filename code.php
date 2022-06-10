<?php
 session_start();
 ?>
<?php
	
    include_once 'connexiondb.php';
    
    
         
           
       
         /* Ajouter template */

         if(isset($_POST["ajouter"])){
        

            $objet =mysqli_real_escape_string($conn, $_POST["objet"]);
            
            $message =mysqli_real_escape_string($conn, $_POST["message"]);
            $id=$_SESSION['id'];
            $sql = "INSERT INTO template (iduser,objet,message) VALUES ('$id','$objet','$message')";
            if (mysqli_query($conn, $sql)) {
               header('Location: components-cards.php');
               
            } else {
               echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
       
            mysqli_close($conn);
       }


 /*  Supprimer template */
 if(isset($_POST["supprimer"])){
   
   $id = $_POST["ids"];
   $sql = "DELETE  FROM template WHERE id='$id'";
   if (mysqli_query($conn, $sql)) {
     
      header('Location: components-cards.php');
      
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
   }

   mysqli_close($conn);}

  

    /* Choisir template  */

   if(isset($_POST["choisir"])){
   
      $objet =mysqli_real_escape_string($conn, $_POST["objet"]);
            
            $message =mysqli_real_escape_string($conn, $_POST["message"]);
      setcookie("objet", $objet, time()+1);
      setcookie("message", $message, time()+1);
      header('Location: forms-elements.php');
   }
   
   if(isset($_POST["modifier"])){
   
      $objet = $_POST["objet"];
      $message = $_POST["message"];
      setcookie("objet", $objet, time()+100);
      setcookie("message", $message, time()+100);
      $_SESSION['idt']=$_POST["ids"];
      header('Location: modification.php');
   }
   if(isset($_POST["update"])){
   
      $objet = $_POST["objet"];
      $message = $_POST["message"];
      $id=$_SESSION['idt'];
      $sql = " UPDATE template SET objet = '$objet', message = '$message' WHERE id=$id";
   if (mysqli_query($conn, $sql)) {
     
      header('Location: components-cards.php');
      
   } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
   }

   mysqli_close($conn);
     
      
   }
   /* Se connecter  */
   if(isset($_POST["login"])){
        

   
      $username = $_POST["username"];
      
      $password = $_POST["password"];
      $query = "SELECT * FROM users WHERE username='$username'";
   $result = mysqli_query($conn,$query);
   if($result){
     
     while($row = mysqli_fetch_assoc($result)){
       
       
         
             if($password==$row['password']){
                 
               
               $_SESSION['id']=$row['id'];
             
               header('Location: index.php');
               
             }
             
             else{
               setcookie("password","Wrong password! try again..",time()+1);
               
               header('location: ./pages-login.php');
             }
         }}
         else{
           setcookie("username","Wrong username! try again..",time()+1);
           
           header('location: ./pages-login.php');
         }
   }
   



/*  Création de compte */

   if(isset($_POST["create"])){
        
      $name = $_POST["name"];
      $username = $_POST["username2"];
      
      $password = $_POST["password2"];
      $sql = "INSERT INTO users (name,username,password) VALUES ('$name','$username','$password')";
       if (mysqli_query($conn, $sql)) {
       header('Location: ./pages-login.php');
         
         }
          
          
        else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
       }
  
       mysqli_close($conn);
  }


  /*  Importation de fichier */
     
  if(isset($_POST["test"])){
   


   



   
      $name       = $_FILES['file']['name'];  
      $temp_name  = $_FILES['file']['tmp_name'];  
     
          $location = './csv/';      
          move_uploaded_file($temp_name, $location.$name);
          header('Location: forms-elements.php');
  
   }
     ?>