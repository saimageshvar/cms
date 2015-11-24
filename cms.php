<?php

if(isset($_SESSION["type"]))
{
  echo "success";
}

else if( isset($_POST["email"]) )
{
    include "header.php";
    include "login_config.php";

    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);
    if($result)
    {        
        $row = mysqli_fetch_assoc($result);        
        $_SESSION["type"]=$row['type_of_user'];
        if(isset($_SESSION["type"]))
        {
          include "content_page.php";}
          else
          {
            header('Location: index.php');
          }
    }
    else{
      header('Location: index.php');
    }
}

?>