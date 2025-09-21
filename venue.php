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
                <div class="col-md-6">
                    <div class="card venue-list">

                        <div id="imagesCarousel_<?php?> card-img-top " class="carousel slide" data-ride="carousel">
                            <?php ?>
                            <div class="carousel-inner">
                                <div >
                                    <img class="d-block w-100" src="img/mee.jpg" style="height: 150px; width: 150px;" >
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center text-center h-100">
                                <div class="">
                                    <div>
                                        <h3><b class="filter-txt">ICE</b></h3>
                                        <small><i>Offa</i></small>
                                    </div>
                                    <div>
                                        <span class="truncate"
                                            style="font-size: inherit;"><small>dsfvdhfgdsahvgdsfvgdshjdsbvbvhgchgd</small></span>
                                        <br>
                                        <span class="badge badge-secondary"><i class="fa fa-tag"></i> Rate Per Hour:
                                            30000</span>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary book-venue align-self-end" type="button">Book</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="card venue-list">

                        <div id="imagesCarousel_<?php?> card-img-top " class="carousel slide" data-ride="carousel">
                            <?php ?>
                            <div class="carousel-inner">
                                <div >
                                    <img class="d-block w-100" src="img/back.jpg" style="height: 50px; width: 50px;" >
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center text-center h-100">
                                <div class="">
                                    <div>
                                        <h3><b class="filter-txt">ICE</b></h3>
                                        <small><i>Offa</i></small>
                                    </div>
                                    <div>
                                        <span class="truncate"
                                            style="font-size: inherit;"><small>dsfvdhfgdsahvgdsfvgdshjdsbvbvhgchgd</small></span>
                                        <br>
                                        <span class="badge badge-secondary"><i class="fa fa-tag"></i> Rate Per Hour:
                                            30000</span>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary book-venue align-self-end" type="button"
                                            >Book</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>


