<!-- A form to add new questions -->
<div >
  <h1>Add Question</h1>

  <form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="input-group">
      <div class="input-group-addon"><i class="icon-signal "></i></div>
      <input class="form-control" type="number" name="level" id="level" placeholder="Level" required min="1"/>
  </div>  <br/>
  <div class="input-group">
      <div class="input-group-addon"><i class="icon-play "></i></div>
      <input class="form-control" type="number" name="qno" id="qno" placeholder="Question number" required min="1"/>
  </div><br/>

  <div class="input-group">
      <div class="input-group-addon"><i class="icon-question-sign"></i></div>
      <input type="text" class="form-control" name="question" id="question" placeholder="Question" required/>  
  </div><br/>

  <div class="input-group">
      <div class="input-group-addon"><i class="icon-ok-sign"></i></div>
      <input type="text" name="answer" class="form-control" id="answer" placeholder="Answer" required/>
  </div><br/>
  <div class="input-group">
      <div class="input-group-addon">  <i class="icon-picture"></i></div>
      <input type="file" name="imgfile" id="imgfile" >  
  </div>  <br/>
  <button class="btn btn-primary" type="submit"  name="submit" >Submit</button>     
  <br/>  <br/>  <br/>
  </form>
</div>
