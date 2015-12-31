
            <div class="col-xs-3">
                <ul class="nav nav-pills tabs-left">
                  <li class="active"><a href="#questions_br" data-toggle="tab">Questions</a></li>
                  <li><a href="#add_br" data-toggle="tab">Add Question</a></li>
                </ul>
            </div>    
            <div class="col-xs-9 description">    
                <div class="tab-content">
                    <div class="tab-pane active" id="questions_br" >      
                      <?php 
                        include "br_questions.php";
                      ?>
                    </div>
                    <div class="tab-pane" id="add_br">
                        <?php  include "br_add_question.php";  ?> 
                    </div>
                </div>
              </div>  