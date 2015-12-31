<?php
  /* If update is clicked */
  //session_start();
  include 'dbConfig.php';
  $con=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");
//echo $_SESSION['qid'];
  if(isset($_POST['updated']))
  {
    
    $qid = $_SESSION['qid'];

    /* Get all form values */
    
    $level=intval(mysqli_real_escape_string($con,$_POST['level']));
    $qno=intval(mysqli_real_escape_string($con,$_POST['qno']));
    $question=mysqli_real_escape_string($con,$_POST['question']);
    $ans=mysqli_real_escape_string($con,$_POST['answer']);



    /* Image Upload */
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imgfile"]["name"]);
    $uploadOk = 1;


    /* If no change in image then just update rest of fields */

    if(basename($_FILES["imgfile"]["name"]) == "") $uploadOk = 2;

    /* Image changed */

    if($uploadOk==1){
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      $check = getimagesize($_FILES["imgfile"]["tmp_name"]);

        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script type='text/javascript'>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }
      // Check file size
      if ($_FILES["imgfile"]["size"] > 500000000) {
          echo "<script type='text/javascript'>alert('Sorry, your file is too large.');</script>";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          
        }
      else{
        /* All fields update */
        if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
            $updatequery="UPDATE br_questions SET  level=$level, qno=$qno,question='$question',
            answer='$ans',image ='$target_file' WHERE _qid=$qid;";
        } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
        }
      }
    }
    else{
      /* All fields except image, update */
      $updatequery="UPDATE br_questions SET  level=$level, qno=$qno,question='$question',
            answer='$ans' WHERE _qid=$qid;";
    }

    /* Success and redirect to View all questions */
    
    if($uploadOk>0){
      $res = mysqli_query($con,$updatequery) or die("Error in Update Query");
          echo "
          <script type='text/javascript'>alert('Success, Updated.');</script>";
      }else{      
        echo "<script type='text/javascript'>alert('Sorry, update failed.');</script>";
      }


  }


  /* If delete is clicked, Delete the entry and go back to view all questions */

  if(isset($_POST['deleted'])){
    $qid = $_SESSION['qid'];
    $delquery = "DELETE FROM br_questions WHERE _qid=$qid";
    $result = mysqli_query($con,$delquery) or die("Error in query");
    if($result){
    echo "<script type='text/javascript'>alert('Delete successful.');</script>";
    }
  } 

?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="added.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  
  

<div>

  <h1>View Questions</h1>
  <?php  
  $con=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");
    $query = "SELECT * FROM br_questions";
    $res_ques=mysqli_query($con,$query) or die("Error in query");
    echo "<table class='table' width='100%'>
    <tr>
      <th>Level</th>
      <th>Q No</th>
      <th>Question</th>
      <th>Answer</th>
      <th>Image</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>";
    while ($row = mysqli_fetch_array($res_ques)) {
      $qid=$row['_qid'];
      $level=$row['level'];
        $qno=$row['qno'];
        $question=$row['question'];
        $answer=$row['answer'];
        $image=$row['image'];
        echo "<tr>
          <td>".$level."</td>
          <td>".$qno."</td>
          <td>".$question."</td>
          <td>".$answer."</td>
          <td><a href='./".$image."'>Click to see image</td>
          <td><a href='br_edit_question.php?qid=".$qid."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>
          <td><a href='delete.php?qid=".$qid."'> <span class='  glyphicon glyphicon-trash' aria-hidden='true'></span> </a></td>
        </tr>";
    }
    echo "</table>";
  ?>
</div> 