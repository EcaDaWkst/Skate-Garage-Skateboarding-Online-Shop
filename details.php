<?php 

    $active = 'Cart';
    include("includes/header.php");

?>
   
   <!-- #content Start -->
    <div id="content">

        <!-- container Start -->
        <div class="container">

            <!-- col-md-12 Start -->
            <div class="col-md-12">

                <!-- breadcrumb Start -->
                <ul class="breadcrumb">

                    <li>

                        <a href="index.php">Home</a>

                    </li>

                    <li>

                        Shop

                    </li>

                    <li>

                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>

                    </li>

                    <li><?php echo $pro_title; ?></li>

                </ul>
                <!-- breadcrumb End -->

            </div>
            <!-- col-md-12 End -->

            <!-- col-md-3 Start -->
            <div class="col-md-3">

            <?php 

                include("includes/sidebar.php");

            ?>

            </div>
            <!-- col-md-3 End -->

            <!-- col-md-9 Start -->
            <div class="col-md-9">

                <!-- row Start -->
                <div id="productMain" class="row">

                    <!-- col-sm-6 Start -->
                    <div class="col-sm-6">

                        <!-- #mainImage Start -->
                        <div id="mainImage">

                            <!-- carousel slide Start -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <!-- carousel-indicators Start -->
                                <ol class="carousel-indicators">

                                    <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>

                                </ol>
                                <!-- carousel-indicators End -->

                                <div class="carousel-inner">

                                    <div class="item active">

                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>

                                    </div>

                                    <div class="item">

                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>

                                    </div>

                                    <div class="item">

                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>

                                    </div>

                                </div>

                                <!-- left carousel-control Start -->
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>

                                </a>
                                <!-- left carousel-control End -->

                                <!-- right carousel-control Start -->
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">

                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Previous</span>

                                </a>
                                <!-- right carousel-control End -->

                            </div>
                            <!-- carousel slide End -->

                        </div>
                        <!-- mainImage End -->

                    </div>
                    <!-- col-sm-6 End -->

                    <!-- col-sm-6 Start -->
                    <div class="col-sm-6">

                        <!-- box Start -->
                        <div class="box">

                            <h1 class="text-center"><?php echo $pro_title; ?></h1>

                            <?php

                                add_cart();

                            ?>

                            <!-- form-horizontal Start -->
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">

                                <!-- form-group Start -->    
                                <div class="form-group">

                                    <label for="" class="col-md-5 control-label">Product Quantity</label>

                                    <!-- col-md-7 Start -->
                                    <div class="col-md-7">

                                        <!-- select Start -->
                                        <select name="product_qty" id="" class="form-control">

                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                        <!-- select End -->

                                    </div>
                                    <!-- col-md-7 End -->

                                </div>
                                <!-- form-group End -->

                                <!-- form-group Start -->
                                <div class="form-group">

                                    <label class="col-md-5 control-label">Product Size</label>

                                    <!-- col-md-7 Start -->
                                    <div class="col-md-7">

                                        <!-- form-control Start -->
                                        <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Please choose size.')">

                                            <option disabled selected>Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>

                                        </select>
                                        <!-- form-control End -->

                                    </div>
                                    <!-- col-md-7 End -->

                                </div>
                                <!-- form-group End -->

                                <p class="price">PHP <?php echo $pro_price; ?></p>

                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to Cart</button></p>

                            </form>
                            <!-- form-horizontal End -->

                        </div>
                        <!-- box End -->

                        <!-- row Start -->
                        <div class="row" id="thumbs">

                            <!-- col-xs-4 Start -->
                            <div class="col-xs-4">

                                <!-- thumb Start -->
                                <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb">

                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">

                                </a>
                                <!-- thumb End -->

                            </div>
                            <!-- col-xs-4 End -->

                            <!-- col-xs-4 Start -->
                            <div class="col-xs-4">

                                <!-- thumb Start -->
                                <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb">

                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">

                                </a>
                                <!-- thumb End -->

                            </div>
                            <!-- col-xs-4 End -->

                            <!-- col-xs-4 Start -->
                            <div class="col-xs-4">

                                <!-- thumb Start -->
                                <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb">

                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">

                                </a>
                                <!-- thumb End -->

                            </div>
                            <!-- col-xs-4 End -->

                        </div>
                        <!-- row End -->

                    </div>
                    <!-- col-sm-6 End -->

                </div>
                <!-- row End -->

                <!-- box Start -->
                <div class="box" id="details">

                    <h4>Product Details</h4>

                    <p>

                        <?php echo $pro_desc; ?>

                    </p>

                    <h4>Size</h4>

                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>  

                    <hr>

                </div>
                <!-- box End -->

                <!-- #row same-heigh-row Start -->
                <div id="row same-heigh-row">

                    <!-- col-md-3 col-sm-6 Start -->
                    <div class="col-md-3 col-sm-6">

                        <!-- box same-height headline Start -->
                        <div class="box same-height headline">

                            <h3 class="text-center">Products You May Like</h3>

                        </div>
                        <!-- box same-height headline End -->

                    </div>
                    <!-- col-md-3 col-sm-6 End -->

                    <?php 

                        $get_products = "SELECT * FROM products ORDER BY RAND() LIMIT 0, 3";

                        $run_products = mysqli_query($con, $get_products);

                        while ($row_products=mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_img1 = $row_products['product_img1'];

                            $pro_price = $row_products['product_price'];

                            echo "

                                <div class='col-md-3 col-sm-6 center-responsive'>

                                    <div class='product same-height'>

                                        <a href='details.php?pro_id=$pro_id'>

                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>

                                        </a>

                                        <div class='text'>

                                            <h3> <a href='details.php?pro_id=$pro_id'> $pro_title</a></h3>

                                            <p class='price'>PHP $pro_price</p>

                                        </div>

                                    </div>

                                </div>

                            ";

                        }

                    ?>

                </div>
                <!-- #row same-heigh-row End -->

            </div>
            <!-- col-md-9 End -->

        </div>
        <!-- container End -->

    </div>
    <!-- #content End -->

    <?php 

        include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>
