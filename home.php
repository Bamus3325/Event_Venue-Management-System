<?php 

?>
<style>
#portfolio .img-fluid {
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}

.event-list {
    cursor: pointer;
}

span.hightlight {
    background: yellow;
}

.banner {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 26vh;
    width: calc(30%);
}

.banner img {
    width: calc(100%);
    height: calc(100%);
    cursor: pointer;
}

.event-list {
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
}

.event-list .banner {
    width: calc(40%)
}

.event-list .card-body {
    width: calc(60%)
}

.event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
}

span.hightlight {
    background: yellow;
}

.banner {
    min-height: calc(100%)
}
</style>
<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">Welcome to Event Management System</h3>
                <hr class="divider my-4" />

                <div class="col-md-12 mb-2 justify-content-center">
                </div>
            </div>

        </div>
    </div>
</header>
<div>

</div>
<div class="container mt-3 pt-2">
    <h4 class="text-center text-white">Upcoming Events</h4>
    <hr class="divider">
    <div class="row">
    <?php
include 'admin/includes/dbconnection.php';
$query = mysqli_query($conn, "SELECT * FROM tbleventtype ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($query)) {
    ?>
<div class="col-6">
            <div class="card event-list">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center text-center h-100">
                        <div class="">
                            <h3><b class="filter-txt"><?php echo $row['event']; ?></b></h3>
                            <div><small>
                                    <p><b><i class="fa fa-calendar"></i>
                                            <?php echo $row['cdate']; ?></b></p>
                                </small></div>
                            <hr>
                            <larger class="truncate filter-txt"><?php echo $row['descr']; ?></larger>
                            <br>
                            <hr class="divider" style="max-width: calc(80%)">
                            <!-- <button class="btn btn-primary float-right read_more" data-id="6">Read
                        More</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <br><br>

    <?php

}

?>
        
    </div>


    <br>
</div>