<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['sub'])) {
    $eid = $_SESSION['edid'];
    $status = $_POST['sta'];
    echo '<script>alert("dfghdfgdfgdfggdfgfdfged")</script>';
    // Validate and sanitize inputs
    // $status = mysqli_real_escape_string($conn, $status);

    // $sql = "UPDATE tblbooking SET Status = ? WHERE ID = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('ii', $status, $eid);

    // if ($stmt->execute()) {
    //     echo '<script>alert("Booking status has been updated")</script>';
    // } else {
    //     echo '<script>alert("Update failed! Try again later")</script>';
    // }

    // $stmt->close();
}
?>
<div class="card-body">
    <h4 class="card-title">Update Booking Status </h4>
    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="sta.php" class="form-horizontal">
    <?php
        // Use mysqli for fetching booking details
        $eid = $_POST['edit_id'];
        $eid = mysqli_real_escape_string($conn, $eid);

        $sql = "SELECT * FROM tblbooking WHERE ID = '$eid'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['edid'] = $row['ID'];
        ?>
        <div class="form-group">
            <label for="exampleInputName1">Booking Id</label>
            <input type="text" name="venuename" class="form-control" value="<?php  echo $row['BookingID'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Venue Name</label>
            <input type="text" name="venuename" class="form-control" value="<?php  echo $row['venue'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" name="price" class="form-control" value="<?php  echo $row['amount'];?>" readonly>
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputName1">Capacity</label>
            <input type="number" name="cap" class="form-control" value="<?php  echo $row->cap;?>" required>
        </div> -->
        <!-- <div class="form-group">
            <label for="exampleTextarea1">Venue Location</label>
            <textarea class="form-control" name="locat" id="servicedes" rows="2" required><?php  echo $row->locat;?></textarea>
        </div> -->
        <div class="form-group">
            <label >Status</label>
            <select class="form-control" name="sta">
            <option value="0">--Select--</option>
            <option value="1">Approved</option>
            <option value="2">Declined</option>
            </select>
        </div>
        <!-- <div class="form-group">
            <label for="exampleInputName1">Image</label>
            <input type="file" id="fileinput" name="image" required>
            <img src="#" id="preview" alt="selected image" style="display:none; width:200px; height:100px;"><br>
        </div> -->
        <?php
        $cnt=$cnt+1;
      }
    ?>
        <input type="submit" name="submit" class="btn btn-primary btn-fw mr-2" value="Update">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
    </form>
</div>

<!-- <script type="text/javascript">
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
</script> -->