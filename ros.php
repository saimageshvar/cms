<?php
if(isset($_POST['ros_edit_question']))
{
  include"ros_update.php";
}
else
{
 // echo "No edit operation";
}
?>
            <div class="col-xs-3">
                <ul class="nav nav-pills tabs-left">
                  <li class="active"><a href="#questions" data-toggle="tab">Questions</a></li>
                  <li><a href="#add" data-toggle="tab">Add Question</a></li>
                   <li><a href="#ros_blocked_users" data-toggle="tab">Blocked Users</a></li>
                </ul>
            </div>    
            <div class="col-xs-9 description">    
                <div class="tab-content">
                    <div class="tab-pane active" id="questions" >      
                      <?php 
                        include "ros_question_display.php";
                      ?>
                    </div>
                    <div class="tab-pane" id="add">
                        <?php  include "ros_question_add.php";  ?> 
                    </div>
                    <div class="tab-pane" id="ros_blocked_users">
                        <?php  include "ros_display_blocked_users.php";  ?> 
                    </div>
                </div>
              </div>  