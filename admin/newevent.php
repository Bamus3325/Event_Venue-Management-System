<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if(isset($_POST['submit']))
{
   extract($_POST);
  $sql="INSERT into tbleventtype(event,cdate,descr) VALUES('$event','$cdate','$desc')";
  $query= mysqli_query($conn, $sql);
  if ($query == TRUE) {
    echo '<script>alert("Event has been added.")</script>';
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
?>
<div class="card-body">
    <h4 class="card-title">Add Event Form </h4>
    <form class="forms-sample" method="POST" action="">
        <div class="form-group">
            <label for="exampleInputName1">Event Name</label>
            <input type="text" name="event" class="form-control" id="event" placeholder="Event Type" required><br><br>
            <label for="exampleInputName1">Date</label>
            <input type="date" name="cdate" class="form-control" id="event" required><br><br>
            <label for="exampleInputName1">Description</label>
            <textarea name="desc" class="form-control" placeholder="Write short description" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
    </form>
</div>