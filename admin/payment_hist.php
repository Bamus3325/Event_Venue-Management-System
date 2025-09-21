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
                                    <h5 class="modal-title" style="float: left;">List of Payment History</h5>
                                    <div class="card-tools" style="float: right;">
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#AddData4"><i class="fas fa-plus"></i> Payment History
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
                                        <th class="d-none d-sm-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Email</th>
                                        <th class="d-none d-sm-table-cell">Venue</th>
                                        <th class="d-none d-sm-table-cell">Amount</th>
                                        <th class="d-none d-sm-table-cell">Channel</th>
                                        <th class="d-none d-sm-table-cell">Reference ID</th>
                                        <th class="d-none d-sm-table-cell">IP Address</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th class="d-none d-sm-table-cell">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
               $sql="SELECT * from payment";
               $query = $dbh -> prepare($sql);
               $query->execute();
               $results=$query->fetchAll(PDO::FETCH_OBJ);
               
               $cnt=1;
               if($query->rowCount() > 0)
               {
                foreach($results as $row){  
                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->cdate);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->email);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->venue);?></td>
                                        <td class="font-w600">&#8358; <?php  echo number_format(htmlentities($row->amount));?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->channel);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->reference_id);?></td>
                                        <td class="font-w600"><?php  echo htmlentities($row->ip_address);?></td>
                                        <td class="font-w600">
                                        <span class="badge badge-info">Success</span>
                                        </td>
                                        <td style=" text-center">
                                            <a href="#=<?php echo ($row->ID);?>"
                                                onclick="return confirm('Do you really want to Delete ?');"
                                                class="btn btn-danger rounded"><i class="mdi mdi-delete"
                                                    aria-hidden="true"></i></a>

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

    <?php @include("includes/footer.php");?>

    </div>

    </div>

    </div>

    <?php @include("includes/foot.php");?>

</body>

</html>