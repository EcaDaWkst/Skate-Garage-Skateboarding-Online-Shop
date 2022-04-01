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

                        Cart

                    </li>

                </ul>
                <!-- breadcrumb End -->

            </div>
            <!-- col-md-12 End -->

            <!-- col-md-9 Start -->
            <div id="cart" class="col-md-9">

                <!-- box Begin -->
                <div class="box">

                    <!-- form Begin -->
                    <form action="cart.php" method="post" enctype="multipart/form-data">

                        <h1>Shopping Cart</h1>

                        <?php 

                            $ip_add = getRealIpUser();

                            $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";

                            $run_cart = mysqli_query($con, $select_cart);

                            $count = mysqli_num_rows($run_cart);

                        ?>

                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>

                        <!-- table-responsive Start -->
                        <div class="table-responsive">

                            <!-- table Start -->
                            <table class="table">

                                <!-- thead Start -->
                                <thead>

                                    <!-- tr Start -->
                                    <tr>
                                       
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                       
                                    </tr>
                                    <!-- tr Finish -->

                                </thead>
                                <!-- thead Start -->

                                <!-- tbody Start -->
                                <tbody>

                                <?php 

                                    $total = 0;

                                    while($row_cart = mysqli_fetch_array($run_cart)){

                                        $pro_id = $row_cart['p_id'];

                                        $pro_size = $row_cart['size'];

                                        $pro_qty = $row_cart['qty'];

                                        $get_products = "SELECT * FROM products WHERE product_id = '$pro_id'";

                                        $run_products = mysqli_query($con,$get_products);

                                        while($row_products = mysqli_fetch_array($run_products)){

                                            $product_title = $row_products['product_title'];

                                            $product_img1 = $row_products['product_img1'];

                                            $only_price = $row_products['product_price'];

                                            $sub_total = $row_products['product_price']*$pro_qty;

                                            $total += $sub_total;

                                ?>

                                    <!-- tr Start -->
                                    <tr>

                                        <td>
                                           
                                            <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a">

                                        </td>

                                        <td>

                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>

                                        </td>

                                        <td>

                                            <?php echo $pro_qty; ?>

                                        </td>

                                        <td>

                                            <?php echo $only_price; ?>

                                        </td>

                                        <td>

                                            <?php echo $pro_size; ?>

                                        </td>

                                        <td>

                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">

                                        </td>

                                        <td>

                                            PHP <?php echo $sub_total; ?>

                                        </td>

                                    </tr>
                                    <!-- tr End -->

                                <?php 

                                        }

                                    }

                                ?>

                                </tbody>
                                <!-- tbody End -->

                                <!-- tfoot Start -->
                                <tfoot>

                                    <!-- tr Start -->
                                    <tr>

                                        <th colspan="5">Total</th>
                                        <th colspan="2">PHP <?php echo $total; ?></th>

                                    </tr>
                                    <!-- tr End -->

                                </tfoot>
                                <!-- tfoot End -->

                            </table>
                            <!-- table End -->

                        </div>
                        <!-- table-responsive End -->

                        <!-- box-footer Start -->
                        <div class="box-footer">

                            <!-- pull-left Start -->
                            <div class="pull-left">

                                <!-- btn btn-default Start -->
                                <a href="index.php" class="btn btn-default">

                                    <i class="fa fa-chevron-left"></i> Continue Shopping

                                </a>
                                <!-- btn btn-default End -->

                            </div>
                            <!-- pull-left End -->

                            <!-- pull-right Start -->
                            <div class="pull-right">

                                <!-- btn btn-default Start -->
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">

                                    <i class="fa fa-refresh"></i> Update Cart

                                </button>
                                <!-- btn btn-default End -->

                                <a href="checkout.php" class="btn btn-primary">

                                    Proceed Checkout <i class="fa fa-chevron-right"></i>

                                </a>

                            </div>
                            <!-- pull-right End -->

                        </div>
                        <!-- box-footer End -->

                    </form>
                    <!-- form End -->

                </div>
                <!-- box End -->

                <?php 

                    function update_cart() {

                        global $con;

                        if (isset($_POST['update'])) {

                            foreach ($_POST['remove'] as $remove_id) {

                                $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";

                                $run_delete = mysqli_query($con, $delete_product);

                                if ($run_delete) {

                                    echo "<script>window.open('cart.php', '_self')</script>";

                                }

                            }

                        }

                    }

                    echo @$up_cart = update_cart();

                ?>

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

                        while($row_products = mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            echo "

                                <!-- col-md-3 col-sm-6 center-responsive Start -->
                                <div class='col-md-3 col-sm-6 center-responsive'>

                                    <!-- product same-height Start -->
                                    <div class='product same-height'>

                                        <a href='details.php?pro_id=$pro_id'>

                                            <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='Product <?php echo $pro_id; ?>'>

                                        </a>

                                        <!-- text Start -->
                                        <div class='text'>

                                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>

                                            <p class='price'>$$pro_price</p>

                                        </div>
                                        <!-- text End -->

                                    </div>
                                    <!-- product same-height End -->

                                </div>
                                <!-- col-md-3 col-sm-6 center-responsive End -->

                            ";

                        }

                    ?>

                </div>
                <!-- #row same-heigh-row End -->

            </div>
            <!-- col-md-9 End -->

            <!-- col-md-3 Start -->
            <div class="col-md-3">

                <!-- box Start -->
                <div id="order-summary" class="box">

                    <!-- box-header Start -->
                    <div class="box-header">

                        <h3>Order Summary</h3>

                    </div>
                    <!-- box-header End -->

                    <!-- text-muted Start -->
                    <p class="text-muted">

                        Shipping and additional costs are calculated based on value you have entered

                    </p>
                    <!-- text-muted End -->

                    <!-- table-responsive Start -->
                    <div class="table-responsive">

                        <!-- table Start -->
                        <table class="table">

                            <!-- tbody Start -->
                            <tbody>

                                <!-- tr Start -->
                                <tr>

                                    <td>Order All Sub-Total</td>
                                    <th>PHP <?php echo $total; ?></th>

                                </tr>
                                <!-- tr End -->

                                <!-- tr Start -->
                                <tr>

                                    <td>Shipping and Handling</td>
                                    <td>PHP 0</td>

                                </tr>
                                <!-- tr End -->

                                <!-- tr Start -->
                                <tr>

                                    <td>Tax</td>
                                    <th>PHP 0</th>

                                </tr>
                                <!-- tr End -->

                                <!-- tr Start -->
                                <tr class="total">

                                    <td>Total</td>
                                    <th>PHP <?php echo $total; ?></th>

                                </tr>
                                <!-- tr End -->

                            </tbody>
                            <!-- tbody End -->

                        </table>
                        <!-- table End -->

                    </div>
                    <!-- table-responsive End -->

                </div>
                <!-- box End -->

            </div>
            <!-- col-md-3 End -->

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