
<head>
   <title>Xceed - Kurukshetra 2016</title>
   <meta>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.vertical-tabs.css">
   <link rel="stylesheet" type="text/css" href="css/styles.css">
   <link rel="stylesheet" type="text/css" href="css/added.css">
</head>

<body>
<div class="row">
  <div class="col-sm-3">  	<img src="img/ceg.png" class="ceg">  </div>
  <div class="col-sm-6">
  	<center>
		<img src="img/k.png" style="height:105px;" />
	</center>
  </div>
  <div class="col-sm-3">  	<img src="img/unesco.png" class="unesco">  </div>
</div>
<div class="header">
	

  <?php 
  if(isset($_SESSION['type']))
  {
    echo "
<div class='row'>
  <div class='col-md-10'><center>    <h1 style='padding-left: 260px;'>k!16 Online Events CMS  </h1>    </div>
  <div class='col-md-2'><a href='logout.php'><button class='btn btn-primary' style='margin-top:25px'>Logout</button></a></div>
</div>
";
  }
  else
  {
    echo "<center>    <h1>k!16 Online Events CMS  </h1>    ";
  }
  ?>
</div>