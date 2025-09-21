<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $eid=$_SESSION['edid'];
  $venuename=$_POST['venuename'];
  $price=$_POST['price'];
  $cap=$_POST['cap'];
  $locat=$_POST['locat'];
  $status=$_POST['status'];
  $sql="update tblservice set venuename =:venuename,price=:price,cap=:cap,locat=:locat,status=:status  where tblservice.ID=:eid";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->bindParam(':venuename',$venuename,PDO::PARAM_STR);
  $query->bindParam(':price',$price,PDO::PARAM_STR);
  $query->bindParam(':cap',$cap,PDO::PARAM_STR);
  $query->bindParam(':locat',$locat,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()){
    echo '<script>alert("Venue has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<div class="card-body">
    <h4 class="card-title">Update Venue </h4>
    <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  tblservice where tblservice.ID=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->ID;
        ?>
        <div class="form-group">
            <label for="exampleInputName1">Venue Name</label>
            <input type="text" name="venuename" class="form-control" value="<?php  echo $row->venuename;?>" placeholder="Venue Name"
                required>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" name="price" class="form-control" value="<?php  echo $row->price;?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Capacity</label>
            <input type="number" name="cap" class="form-control" value="<?php  echo $row->cap;?>" required>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Venue Location</label>
            <textarea class="form-control" name="locat" id="servicedes" rows="2" required><?php  echo $row->locat;?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleTextarea1">Status</label>
            <select class="form-control" name="status">
            
            <option value="<?php  echo $row->status;?>">
              <?php
              if ($row->status == '0') {
                echo "Active";
              }else{
                  echo "InActive";
                
              }
              ?>

            </option>
            <option value="<?php  echo $row->status;?>">--Select--</option>
            <option value="0">Active</option>
            <option value="1">InActive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Image</label>
            <input type="file" id="fileinput" name="image" required>
            <img src="#" id="preview" alt="selected image" style="display:none; width:200px; height:100px;"><br>
        </div>
        <?php
        $cnt=$cnt+1;
      }
    } ?>
        <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Update</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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