<!DOCTYPE html>
<html>
<?php
@session_start();

if(isset($_SESSION['type']))
{
        include "header.php";
        include "content_page.php";
}
else
if( isset($_POST["email"]) )
{
    
    include "dbConfig.php";
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);
    if($result)
    {        
        $row = mysqli_fetch_assoc($result);        
        $_SESSION['type']=$row['type_of_user'];
        include "header.php";
          include "content_page.php";
    }
    else{
      echo "wrong".$email.$password;
      echo $query;
      //alert("Wrong email and password");
    }
}
else
{
  include "header.php";
  include "login.php";
}

?>
</body>
</html>
