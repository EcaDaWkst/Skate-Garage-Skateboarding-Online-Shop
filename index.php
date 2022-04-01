<?php 

    $active = 'Home';
    include("includes/header.php");

?>

    <!-- container Start -->
    <div class="container" id="slider">

        <!-- col-md-12 Start -->
        <div class="col-md-12">

            <!-- carousel slide Start -->
            <div class="carousel slide" id="myCarousel" data-ride="carousel">

                <!-- carousel-indicators Start -->
                <ol class="carousel-indicators">

                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>

                </ol>
                <!-- carousel-indicators End -->

                <div class="carousel-inner">
                <!-- carousel-inner Start -->

                <?php 

                    $get_slides = "SELECT * FROM slider LIMIT 0, 1";

                    $run_slides = mysqli_query($con, $get_slides);

                    while ($row_slides = mysqli_fetch_array($run_slides)) {

                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];

                        echo "

                            <div class='item active'>

                                <img src='admin_area/slides_images/$slide_image'>

                            </div>

                        ";

                    }

                    $get_slides = "SELECT * FROM slider LIMIT 1, 3";

                    $run_slides = mysqli_query($con, $get_slides);

                    while ($row_slides = mysqli_fetch_array($run_slides)) {

                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];

                        echo "

                            <div class='item'>

                                <img src='admin_area/slides_images/$slide_image'>

                            </div>

                        ";

                    }

                ?>

                </div>
                <!-- carousel-inner End -->

                <!-- left carousel-control Start -->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>

                </a>
                <!-- left carousel-control End -->

                <!-- left carousel-control Start -->
                <a href="#myCarousel" class="right carousel-control" data-slide="next">

                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>

                </a>
                <!-- left carousel-control End -->

            </div>
            <!-- carousel slide End -->

        </div>
        <!-- col-md-12 End -->

    </div>
    <!-- container End -->

    <!-- #advantages Start -->
    <div id="advantages">

        <!-- container Start -->
        <div class="container">

            <!-- same-height-row Start -->
            <div class="same-height-row">

                <!-- col-sm-4 Start -->
                <div class="col-sm-4">

                    <!-- box same-height Start -->
                    <div class="box same-height">

                        <!-- icon Start -->
                        <div class="icon">

                            <i class="fa fa-heart"></i>

                        </div>
                        <!-- icon End -->

                        <h3><a href="#">Best Offer</a></h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>

                    </div>
                    <!-- box same-height End -->

                </div>
                <!-- col-sm-4 End -->

                <!-- col-sm-4 Start -->
                <div class="col-sm-4">

                    <!-- box same-height Start -->
                    <div class="box same-height">

                        <!-- icon Start -->
                        <div class="icon">

                            <i class="fa fa-tag"></i>

                        </div>
                        <!-- icon End -->

                        <h3><a href="#">Best Prices</a></h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    </div>
                    <!-- box same-height End -->

                </div>
                <!-- col-sm-4 End -->

                <!-- col-sm-4 Start -->
                <div class="col-sm-4">

                    <!-- box same-height Start -->
                    <div class="box same-height">

                        <!-- icon Start -->
                        <div class="icon">

                            <i class="fa fa-thumbs-up"></i>

                        </div>
                        <!-- icon End -->

                        <h3><a href="#">100% Original</a></h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    </div>
                    <!-- box same-height End -->

                </div>
                <!-- col-sm-4 End -->

            </div>
            <!-- same-height-row End -->

        </div>
        <!-- container End -->

    </div>
    <!-- #advantages End -->

    <!-- #hot Start -->
    <div id="hot">

        <!-- box Start -->
        <div class="box">

            <!-- container Start -->
            <div class="container">

                <!-- col-md-12 Start -->
                <div class="col-md-12">

                    <h2>

                        Our Latest Products

                    </h2>

                </div>
                <!-- col-md-12 End -->

            </div>
            <!-- container End -->

        </div>
        <!-- box End -->

    </div>
    <!-- #hot End -->

    <!-- container Start -->
    <div id="content" class="container">

        <!-- row Start -->
        <div class="row">

            <?php 

                getPro();

            ?>

        </div>
        <!-- row End -->

    </div>
    <!-- container End -->

    <?php 

        include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>