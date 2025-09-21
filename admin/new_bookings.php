<?php
include('includes/checklogin.php');
check_login();



?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>

<body>
    <!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
    <div class="container-scroller">

        <?php @include("includes/header.php");?>

        <div class="container-fluid page-body-wrapper">


            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">New Bookings</h5>
                                    <div class="card-tools" style="float: right;">
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#AddData4"><i class="fas fa-plus"></i> Booking History
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th class="text-center">S/N</th>
                                    <th>Booking ID</th>
                                    <th class="d-none d-sm-table-cell">Date</th>
                                    <th class="d-none d-sm-table-cell">Full Name</th>
                                    <th class="d-none d-sm-table-cell">Mobile Number</th>
                                    <th class="d-none d-sm-table-cell">Email</th>
                                    <th class="d-none d-sm-table-cell">Venue</th>
                                    <th class="d-none d-sm-table-cell">Amount</th>
                                    <th class="d-none d-sm-table-cell">Booking Date</th>
                                    <th class="d-none d-sm-table-cell">Status</th>
                                    <th class=" Text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
               $sql="SELECT * from tblbooking";
               $query = $dbh -> prepare($sql);
               $query->execute();
               $results=$query->fetchAll(PDO::FETCH_OBJ);
               
               $cnt=1;
               if($query->rowCount() > 0)
               {
                foreach($results as $row){  
                  $usr = $row->email;
                  $user = mysqli_query($conn, "SELECT * FROM tbladmin WHERE Email = '$usr'");
                  $row1 = mysqli_fetch_assoc($user);            
                    
                    ?>
                                <tr>
                                    <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                    <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                                    <td class="font-w600"><?php  echo htmlentities($row->ddate);?></td>
                                    <td class="font-w600"><?php  echo $row1['LastName'].' '.$row1['FirstName'];?></td>
                                    <td class="font-w600"><?php  echo $row1['MobileNumber'];?>
                                    </td>
                                    <td class="font-w600"><?php  echo htmlentities($row->email);?></td>
                                    <td class="font-w600"><?php  echo htmlentities($row->venue);?></td>
                                    <td class="font-w600">&#8358; <?php  echo number_format(htmlentities($row->amount));?></td>
                                    <td class="font-w600"><?php  echo htmlentities($row->cdate);?></td>
                                    <td class="font-w600">
                                        <?php
                                      if ($row->Status == '0') {
                                       ?>
                                        <span class="badge badge-info">PENDING</span>
                                        <?php
                                      }else if($row->Status == '1'){
                                        ?>
                                        <span class="badge badge-success">APPROVED</span>
                                        <?php
                                      }else{
                                        ?>
                                        <span class="badge badge-danger">DECLINED</span>
                                        <?php
                                      }
                                        ?>
                                    </td>
                                    <td style=" text-center">
                                        <?php
                                      if ($row->Status == '0') {
                                       ?>
                                        <a href="#" class="btn btn-purple rounded update_sta"
                                            id="<?php echo  ($row->ID); ?>" title="Click for Update">Update Status</a>
                                        <?php
                                      }else {
                                        ?>
                                        <a href="#=<?php echo ($row->ID);?>"
                                            onclick="return confirm('Do you really want to Delete ?');"
                                            class="btn btn-danger rounded"><i class="mdi mdi-delete"
                                                aria-hidden="true"></i></a>

                                        <?php
                                      }
                                      ?>

                                    </td>
                                </tr>
                                <?php
                    $cnt=$cnt+1;
                  }
                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editData" class="modal fade">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Booking Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="info_update">
                                        <?php //@include("update_statdergtrgus.php");?>
                                    </div>
                                    <div class="modal-footer ">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

    <?php @include("includes/footer.php");?>

    </div>

    </div>

    </div>

    <?php @include("includes/foot.php");?>

</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '.update_sta', function() {
        var edit_id = $(this).attr('id');
        $.ajax({
            url: "update_status.php",
            type: "post",
            data: {
                edit_id: edit_id
            },
            success: function(data) {
                $("#info_update").html(data);
                $("#editData").modal('show');
            }
        });
    });
});
</script>