<form method="post" action="ros_block_user.php" enctype="multipart/form-data">
 
 <div class="row">
 <div class="col-md-3"><input class="form-control"  placeholder="k! Id " type="text"  name="kid" id="kid"  required /> </div>
 
 <div class="col-md-3"><button class="btn btn-danger" type="submit">Block</button></div>
<div class="col-md-6"></div>
</div>
 </form>
 <h3>Blocked Users</h3>
 <table  class="table table-hover">
 
 
 <?php
// Make a MySQL Connection
	$conn=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");

$query = " SELECT * FROM ros_users where blocked = 1"; 

$result = mysqli_query($conn,$query) or die(mysql_error());

echo "<tr class='info' ><td>Name</td><td>k! d</td></tr>";
while($row = mysqli_fetch_array($result)){

    echo "<tr><td>".$row['name']. "</td><td>". $row['k_id']."</td></tr>";
    
}

?>

</table>
