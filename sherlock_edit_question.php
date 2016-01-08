<?php  
  @session_start();
  include 'dbConfig.php';
  include "header.php";

  /* Set SESSION var to avoid loss of GET request 
   * Select required row
   */

  if(isset($_GET['qid']) || isset($_SESSION['qid'])){
    if(isset($_GET['qid'])) $_SESSION['qid']=$_GET['qid'];
    $qid=$_SESSION['qid'];

    $selectquery = "SELECT * FROM sherlock_questions WHERE _qid=$qid";
    $con=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");
    $result = mysqli_query($con,$selectquery) or die("Error in query");
    $row = mysqli_fetch_array($result);
   
  } 
?>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<!-- Generate fields based on qid -->

<center>
  <h2>Editing Sherlock Questions</h2>
</center>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <br>
      <form action="index.php" method="post" enctype="multipart/form-data">
          <div class="input-group">
              <div class="input-group-addon">Level</div>
          <input class="form-control" type="number" name="level" id="level" value="<?php echo $row['level']; ?>" required min="1"/>
          </div>  <br/>
          <div class="input-group">
              <div class="input-group-addon">Question Number</i></div>
              <input class="form-control" type="number" name="qno" id="qno" value="<?php echo $row['qno']; ?>" required min="1"/>
          </div><br/>

          <div class="input-group">
              <div class="input-group-addon">Question</div>
          <input class="form-control" type="text" name="question" id="question" value="<?php echo $row['question']; ?>" required/>
          </div><br/>

          <div class="input-group">
              <div class="input-group-addon">Answer</div>
          <input class="form-control" type="text" name="answer" id="answer" value="<?php echo $row['answer']; ?>" required/>
          </div><br/>   
		  
		  <div class="input-group">
              <div class="input-group-addon">Type</div>
			  <input class="form-control" type="text" name="type" id="type" value="<?php echo $row['type']; ?>" required/>
          </div><br/>   
		  
		  
          <div class="input-group">
              <div class="input-group-addon">  Image &nbsp;</div>
              <input type="file" name="imgfile" id="imgfile"   value="<?php echo $row['image']; ?>">
          </div>  <br/>
          <center>
            <a href="index.php"><button class="btn btn-primary"  >cancel</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
           
            <input type="submit" class="btn btn-default" value="Update" name="updated">
            
          </center>
          <br/>  <br/>  <br/>
       </form>
  </div>
  <div class="col-md-2"></div>
</div>
