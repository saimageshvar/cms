
<ul id="myTab" class="nav nav-tabs nav-justified">
   <li class="active">
      <a href="#ros" data-toggle="tab"> 
	    <h4>ROS</h4>
      </a>
   </li>
   <li><a href="#sherlock" data-toggle="tab"><h4>Sherlock</h4></a></li>
   <li><a href="#br" data-toggle="tab"><h4>Bank Robbery</h4></a></li>
</ul>
<div id="myTabContent" class="tab-content">
<br>
<!--ROS-->
      <div class="tab-pane fade in active" id="ros">   	
      <?php
          if($_SESSION['type'] == "admin"||$_SESSION['type'] == "ros"){
              include "ros.php";
          }
          else{
              include "auth_restricted.php"; 
          }
      ?>          
      </div>
<!--Sherlock-->
      <div class="tab-pane fade" id="sherlock">            
      <?php
          if($_SESSION['type'] == "admin"||$_SESSION['type'] == "sherlock"){
              include "sherlock.php";
          }
          else{
              include "auth_restricted.php"; 
          }
      ?>        
      </div> 
<!--Bank Robbery-->
      <div class="tab-pane fade" id="br">
            <?php
                if($_SESSION['type'] == "admin"||$_SESSION['type'] == "br"){
                  include "bankRobbery.php";            
                }
                else{
                    include "auth_restricted.php"; 
                }
            ?>        
            
      </div> 
<!--BR ends-->
</div>
