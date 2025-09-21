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


            <div class="main-panel"><br>
                <!--         <strong style="color: red; background-color: white; margin-left: 100px;">
                Alert : Don't Sale or Publish this script with your name. However you can use it for Academic Practice !</strong> -->
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 stretch-card grid-margin">
                                    <div class="card bg-gradient-info card-img-holder text-white"
                                        style="height: 130px;">
                                        <div class="card-body">
                                            <h4 class="font-weight-normal mb-3">Total Bookings
                                            </h4>
                                            <?php 
                  $sql ="SELECT ID from tblbooking";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalnewbooking=$query->rowCount();
                  ?>
                                            <h2 class="mb-5"><?php echo htmlentities($totalnewbooking);?></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 stretch-card grid-margin">
                                    <div class="card bg-gradient-warning card-img-holder text-white"
                                        style="height: 130px;">
                                        <div class="card-body">
                                            <h4 class="font-weight-normal mb-3">Total Approved Bookings
                                            </h4>
                                            <?php 
                  $sql ="SELECT ID from tblbooking where Status='1' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalappbooking=$query->rowCount();
                  ?>
                                            <h2 class="mb-5"><?php echo htmlentities($totalappbooking);?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card grid-margin">
                                    <div class="card bg-gradient-primary  card-img-holder text-white"
                                        style="height: 130px;">
                                        <div class="card-body">
                                            <h4 class="font-weight-normal mb-3">Total Cancelled Booking
                                            </h4>
                                            <?php 
                  $sql ="SELECT ID from tblbooking where Status='2' ";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalcanbooking=$query->rowCount();
                  ?>
                                            <h2 class="mb-5"><?php echo htmlentities($totalcanbooking);?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card grid-margin">
                                    <div class="card bg-gradient-success card-img-holder text-white"
                                        style="height: 130px;">
                                        <div class="card-body">
                                            <h4 class="font-weight-normal mb-3">Total Venues
                                            </h4>
                                            <?php 
                  $sql ="SELECT ID from tblservice";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $totalserv=$query->rowCount();
                  ?>
                                            <h2 class="mb-5"><?php echo htmlentities($totalserv);?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart" style="width:100%; height: 300px;"></div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">New Bookings</h5>
                                </div>



                                <div class="modal fade" id="addsector">
                                    <div class="modal-dialog modal-sm ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Register Event</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <?php @include("newevent.php");?>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="card-body table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Image</th>
                                                <th>Venue name</th>
                                                <th class="">Price</th>
                                                <th class="">Capacity</th>
                                                <th class="">Location</th>
                                                <th class="">Status</th>
                                            </tr>
                                        </thead>
                                        <!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                                        <tbody>
                                            <?php
                    $sql="SELECT * from tblservice";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {    
                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                                <td><img src="ven_img/<?php  echo htmlentities($row->image);?>" /></td>
                                                <td><?php  echo htmlentities($row->venuename);?></td>
                                                <td>&#8358; <?php echo number_format(htmlentities($row->price));?></td>
                                                <td><?php  echo htmlentities($row->cap);?></td>
                                                
                                                <td class=""><?php  echo htmlentities($row->locat);?>
                                                </td>
                                                <td>
                                                    <?php  
                                                if ($row->status == '0') {
                                                  ?>
                                                    <a class="btn btn-info rounded">Active</a>
                                                    <?php
                                                }else {
                                                  ?>
                                                    <a class="btn btn-danger rounded">InActive</a>
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




            </div>

        </div>

    </div>
    

    <?php @include("includes/foot.php");?>
    <!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
    
    <<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_data.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var jsonData = JSON.parse(xhr.responseText);
                    var data = google.visualization.arrayToDataTable(jsonData);

                    var options = {
                        title: 'Available Venues'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                } else {
                    console.error('Failed to fetch data');
                }
            };
            xhr.send();
        }
    </script>

</body>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->

</html>