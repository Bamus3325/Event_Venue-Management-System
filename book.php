 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                 <h1 class="text-uppercase text-white font-weight-bold">BOOKING hISTORY</h1>
                 <hr class="divider my-4" />
             </div>

         </div>
     </div>
 </header>
 <style>
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td,
#customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even) {
    background-color: #f2f2f2;
}

#customers tr:hover {
    background-color: #ddd;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
 </style>

 <section class="page-section">
     <div class="container">
         <div class="table-responsive">
             <table id="customers">
                 <tr>
                     <th>S/N</th>
                     <th>Date</th>
                     <th>Event Date</th>
                     <th>Venue</th>
                     <th>Status</th>
                 </tr>
                 <?php
include 'admin/includes/dbconnection.php';
$user = $_SESSION['Email'];
$query = mysqli_query($conn, "SELECT * FROM tblbooking WHERE email= '$user' ORDER BY id DESC");
$i = 1;
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                 <tr>
                     <td><?php echo $i; ?></td>
                     <td><?php echo $row['ddate']; ?></td>
                     <td><?php echo $row['cdate']; ?></td>
                     <td><?php echo $row['venue']; ?></td>
                     <td>
                         <?php
                                            if ($row['Status'] == '0') {
                                                ?>
                         <button class="btn btn-warning">Pending❗❗❗</button>
                         <?php
                                            }else if($row['Status'] == '1') {
                                                ?>
                         <button class="btn btn-success">Approved</button>
                         <?php
                                            }else{
                                                ?>
                         <button class="btn btn-danger">Declined</button>
                         <?php
                                            }
                                            ?>
                     </td>
                 </tr>
                 <?php
    $i++;

}
    ?>


             </table>
         </div>

     </div>
 </section>