<section class = 'loginContainer'>

<form  
    action= 'addprofilePic.php' 
    method = 'post'  
    enctype=”multipart/form-data”>
    <div class="form-group">
    <label for="exampleFormControlInput1">Add/Edit profile pic</label>

    <input 
      name = 'profilePic' 
      type="file" class="form-control-file" 
      id="exampleFormControlFile1"  
      value= ""
    >
  </div>
<input type="submit" name="submit" value="upload" class = 'submitBtn'>
</form>
</section>