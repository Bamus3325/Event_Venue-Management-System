<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    // include('db_connect.php');
    // ob_start();
    //     $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    //      foreach ($query as $key => $value) {
    //       if(!is_numeric($key))
    //         $_SESSION['system'][$key] = $value;
    //     }
    // ob_end_flush();
    include 'header.php';

	
    ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
header.masthead {
    background: url(img/back.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}

#viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}

#viewer_modal .modal-dialog {
    width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}

#viewer_modal .modal-content {
    background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

#viewer_modal img,
#viewer_modal video {
    max-height: calc(100%);
    max-width: calc(100%);
}

body,
footer {
    background: #000000e6 !important;
}
</style>

<body id="page-top">
    <!-- Navigation-->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./">Event Management System </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="me.php">View
                            Venues</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a>
                    </li>
                    <?php
                    // if(!isset($_SESSION['full_name'])){
                    //     echo "<script>alert('Please Login'); window.location='index.php'; </script>";
                    // }
                    if (isset($_SESSION['Email'])) {
                        ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=book">My
                            Bookings</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">Payments</a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger">Hi
                            <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                    </li>
                    <?php
                    }else {
                        ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                    </li>

                    <?php
                    }
                    ?>



                </ul>
            </div>
        </div>
    </nav>



    <?php 
include 'db_connect.php'; 
?>
    <style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .venue-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .venue-list .carousel,
    .venue-list .card-body {
        width: calc(50%)
    }

    .venue-list .carousel img.d-block.w-100 {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        min-height: 50vh;
    }

    span.hightlight {
        background: yellow;
    }

    .carousel,
    .carousel-inner,
    .carousel-item {
        min-height: calc(100%)
    }

    header.masthead,
    header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important
    }

    .row-items {
        position: relative;
    }

    .card-left {
        left: 0;
    }

    .card-right {
        right: 0;
    }

    .rtl {
        direction: rtl;
    }

    .venue-text {
        justify-content: center;
        align-items: center;
    }
    </style>
    <header class="masthead">
    </header>
    <div class="container-fluid mt-3 pt-2">
        <h4 class="text-center text-white">List of Our Event Venues</h4>
        <hr class="divider">
        <div class="row-items">
            <div class="col-lg-12">
                <div class="row">
                    <?php
include 'admin/includes/dbconnection.php';
$query = mysqli_query($conn, "SELECT * FROM tblservice ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                    <div class="col-md-6">
                        <div class="card venue-list">

                            <div id="imagesCarousel_<?php?> card-img-top " class="carousel slide" data-ride="carousel">
                                <?php ?>
                                <div class="carousel-inner">
                                    <div>
                                        <img class="d-block w-100" src="admin/ven_img/<?php echo $row['image']; ?>"
                                            style="height: 50px; width: 50px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center justify-content-center text-center h-100">
                                    <div class="">
                                        <div>
                                            <h3><b class="filter-txt"><?php echo strtoupper($row['venuename']); ?></b>
                                            </h3>
                                            <h6>Capacity:
                                                <small><i><?php echo number_format($row['cap']); ?></i></small>
                                            </h6>
                                        </div>
                                        <div>
                                            <span class="truncate"
                                                style="font-size: inherit;"><small><?php echo $row['locat']; ?></small></span>
                                            <br>
                                            <span class="badge badge-secondary"><i class="fa fa-tag"></i> Price:
                                                &#8358; <?php echo number_format($row['price']); ?></span>

                                            <?php
                                            if ($row['status'] == '0') {
                                                ?>
                                            <span class="badge badge-success"><i class="fa fa-tag"></i> Available</span>
                                            <?php
                                            }else {
                                                ?>
                                            <span class="badge badge-danger"><i class="fa fa-tag"></i>
                                                Un-Available</span>
                                            <?php
                                            }
                                            ?>


                                            <br>
                                            <br>
                                            <?php
if (!isset($_SESSION['Email'])) {
    ?>
                                            <a onclick="return alert('Please Login to your Account ❗❗❗');"
                                                href="login.php">
                                                <button class="btn btn-primary book-venue align-self-end"
                                                    data-price="<?php echo $row['price']; ?>">Book Now!</button>
                                            </a>
                                            <?php
} else {
    if ($row['status'] == '1') {
        ?>
                                            <button class="btn btn-danger" type="button">Not Available</button>
                                            <?php

    }else {
        ?>
                                            <button class="btn btn-primary book-venue align-self-end" type="button"
                                                data-toggle="modal" data-target="#bookingModal"
                                                data-price="<?php echo $row['price']; ?>" data-venue="<?php echo $row['venuename']; ?>" data-venueid="<?php echo $row['ID']; ?>">Book Now!</button>
                                                <!-- <button class="btn btn-primary book-venue align-self-end" type="button" data-toggle="modal" data-target="#bookingModal" data-price="<?php echo $row['price']; ?>" data-location="<?php echo $row['locat']; ?>">Book</button> -->
                                            <?php
    }
    
}
?>



                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <br>
                    </div>
                    <?php

}
    ?>

                </div>
            </div>
        </div>
    </div>



    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Your Venue</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form id="bookingForm"> -->
                <form id="bookingForm" class="paymentForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <label for="name">Email</label> -->
                            <input type="hidden" name="email" class="form-control" value="<?php echo $_SESSION['Email']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="cdate" name="cdate" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="date">Venue</label>
                            <input type="text" id="venue" name="venue" class="form-control" readonly>
                            <input type="hidden" id="venueid" name="venueid" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" id="amountInput" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                                        <!-- <button type="submit" name="submit" onclick="payWithPaystack()"
                                        class="btn btn-primary">Make Payment Now</button> -->
                                        <button type="button" id="payButton" class="btn btn-primary" onclick="validateForm()">Make Payment Now</button>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div id="preloader"></div>
    <footer class=" py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0 text-white">Contact us</h2>
                    <hr class="divider my-4" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div class="text-white">+234 80 646 28234, +234 70 700 21383</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:#    ">user@gmail.com</a>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2024 - | <a href="#">Designed By: Arowolo kehinde
                    Emmanuel CS/HND/F22/3365</a></div>
        </div>
        <h6 style="color:#fff; text-align:center;">Supervised by: Mr Adeyemi</h6>
    </footer>

    <?php include('footer.php') ?>
</body>

<?php //$conn->close() ?>

</html>
<!-- <script>
// When the modal is shown, update the input value
$('#bookingModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var price = button.data('price'); // Extract info from data-* attributes

    var modal = $(this);
    modal.find('#amountInput').val(price); // Update the modal's input with the price
});
</script> -->

<!-- jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // When the modal is shown, update the input value
    $('#bookingModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var price = button.data('price'); // Extract info from data-* attributes
        var venue = button.data('venue'); // Extract info from data-* attributes
        var venueID = button.data('venueid'); // Extract info from data-* attributes

        var modal = $(this);
        modal.find('#amountInput').val(price); // Update the modal's input with the price
        modal.find('#venue').val(venue); // Update the modal's input with the price
        modal.find('#venueid').val(venueID); // Update the modal's input with the price
    });

    // Validate form and initiate payment
    $('#payButton').on('click', function() {
        var form = document.getElementById('bookingForm');
        var inputs = form.querySelectorAll('input'); // Adjust selectors as needed
        var allFilled = true;

        inputs.forEach(function(input) {
            if (input.type !== 'hidden' && !input.value.trim()) { // Ignore hidden inputs
                allFilled = false;
            }
        });

        if (allFilled) {
            payWithPaystack(); // Call the Paystack payment function
        } else {
            alert('Please fill all the required fields.');
        }
    });

    function payWithPaystack() {
        var total = document.getElementById("amountInput").value;
        var venue = document.getElementById("venue").value;
        var venueid = document.getElementById("venueid").value;
        var cdate = document.getElementById("cdate").value;
        var handler = PaystackPop.setup({
            key: 'pk_test_b04fbb7505efdf5918fcc2e3ff69c3614feb4503', // Use your live key in production
            email: '<?php echo $_SESSION['Email']; ?>',
            amount: total * 100, // Amount in kobo
            currency: "NGN",
            ref: 'MY' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference

            callback: function(response) {
                var message = 'Payment Completed! ref is ' + response.reference;
                window.location = 'verify_transaction.php?reference=' + response.reference + '&total=' + total + '&venue=' + venue + '&venueid=' + venueid + '&cdate=' + cdate;
            },
            onClose: function() {
                alert('Payment window closed.');
            }
        });
        handler.openIframe();
    }
});
</script>




