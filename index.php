<!DOCTYPE html>
<html>
<?php
include "header.php";
?>
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
          <p>ROS CMS</p>
      </div>
<!--Sherlock-->
      <div class="tab-pane fade" id="sherlock">            
      </div> 
<!--Bank Robbery-->
      <div class="tab-pane fade" id="br">
            
            <div class="col-xs-3">
                <ul class="nav nav-pills tabs-left">
                  <li class="active"><a href="#questions" data-toggle="tab">Questions</a></li>
                  <li><a href="#add" data-toggle="tab">Add Question</a></li>
                </ul>
            </div>    
            <div class="col-xs-9 description">    
                <div class="tab-content">
                    <div class="tab-pane active" id="questions" >      
                      <?php 
                        include "br_questions.php";
                      ?>
                    </div>
                    <div class="tab-pane" id="add">
                        <?php  include "br_add_question.php";  ?> 
                    </div>
                </div>
              </div>  
      </div> 
<!--BR ends-->
</div>
</body>
</html>
