<?php
include 'dbConfig.php';

/* Form Values */
$level=intval(mysqli_real_escape_string($con,$_POST['level']));
$qno=intval(mysqli_real_escape_string($con,$_POST['qno']));
$question=mysqli_real_escape_string($con,$_POST['question']);
$ans=mysqli_real_escape_string($con,$_POST['answer']);

/* Image Upload */
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["imgfile"]["name"]);

$uploadOk = 1;

/* Empty image */

if(basename($_FILES["imgfile"]["name"]) == "") $uploadOk = 2;

// Check if entry already exists
    $checkquery = "SELECT * FROM br_questions WHERE level=$level AND qno=$qno";
    $res_question=mysqli_query($con,$checkquery);
    $res_question_num=mysqli_num_rows($res_question);
    if($res_question_num>0){
        echo "Sorry, Entry already exists";
        $uploadOk = 0;
    }

/* All including image */

if($uploadOk==1){
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imgfile"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imgfile"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        
    } 
    else {
        if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {
            $insquery="INSERT INTO br_questions(level,qno,question,answer,image) VALUES ('$level','$qno','$question','$ans','$target_file');";
        }
    }
}

/* All except image entry */

else{
    $insquery="INSERT INTO br_questions(level,qno,question,answer) VALUES ('$level','$qno','$question','$ans');";

}

/* Correct entry */

if($uploadOk>0){
        mysqli_query($con,$insquery) or die("Error in insertion");
        header( "Location:index.php" );
        echo "
        <button style='color:#fff;background-color:#5cb85c;border-color:#4cae4c;
        display:inline-block;margin-bottom:0;font-weight:400;text-align:center;
        vertical-align:middle;cursor:pointer;background-image:none;border:1px solid transparent;
        white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.42857143;
        border-radius:4px;-webkit-user-select:none;-moz-user-select:none;
        -ms-user-select:none;user-select:none'>Success, entry done.</button>";
        header( "refresh:5;url=index.php" );
    } else {
        echo "<br><button style='color:#fff;background-color:#d9534f;border-color:#d43f3a;
            display:inline-block;margin-bottom:0;font-weight:400;text-align:center;
            vertical-align:middle;cursor:pointer;background-image:none;border:1px solid transparent;
            white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.42857143;
            border-radius:4px;-webkit-user-select:none;-moz-user-select:none;
            -ms-user-select:none;user-select:none'>Sorry, entry failed.</button>";
        //header( "refresh:5;url=index.php" );
    }
?>