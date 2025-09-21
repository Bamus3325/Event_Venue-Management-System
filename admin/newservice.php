
<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if(isset($_POST['submit2']))
{
   
   $rand = rand(1000000000,9999999999);
   $imagename = $_FILES['image']['name'];
   $imagesync = $_FILES['image']['tmp_name'];
   $imagetype = $_FILES['image']['type'];
   $targetdir = "ven_img/";
   $img = $rand.'_'.$imagename;
   $extension = pathinfo($imagename, PATHINFO_EXTENSION);
 
 if (!in_array($extension, ['jpg','jpeg','png','JPG','JPEG','PNG'])){
    ?>
   <div class="alert alert-danger alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    The File Uploaded is Not jpg, jpeg, png Format 
   </div>
   <?php
 }else{
 
 if (move_uploaded_file($imagesync,$targetdir.$img)){
  extract($_POST);
  $sql="INSERT into tblservice(venuename,price,cap,locat,image) VALUES('$venuename','$price','$cap','$locat','$img')";
  $query= mysqli_query($conn, $sql);
  if ($query == TRUE) {
    echo '<script>alert("Venue has been added.")</script>';
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
 }
}
?>
<div class="card-body">
    <h4 class="card-title">Add New Venue </h4>
    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputName1">Venue Name</label>
            <input type="text" name="venuename" class="form-control" id="servicename" placeholder="Venue Name"
                required>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Capacity</label>
            <input type="number" name="cap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Venue Location</label>
            <textarea class="form-control" name="locat" id="servicedes" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Image</label>
            <input type="file" id="fileinput" name="image" required>
            <img src="#" id="preview" alt="selected image" style="display:none; width:200px; height:100px;"><br>
        </div>
        <button type="submit" name="submit2" class="btn btn-primary btn-fw mr-2">Submit</button>
    </form>
</div>


<script type="text/javascript">
document.getElementById('fileinput').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('preview').setAttribute('src', event.target.result);
            document.getElementById('preview').style.display = 'block';

        };
        reader.readAsDataURL(file);
    }

});
</script>