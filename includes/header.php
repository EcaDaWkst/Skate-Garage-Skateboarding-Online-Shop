<?php 

    session_start();

    include("includes/db.php");
    include("functions/functions.php");

?>

<?php 

    if (isset($_GET['pro_id'])) {

        $product_id = $_GET['pro_id'];

        $get_product = "SELECT * FROM products WHERE product_id = '$product_id'";

        $run_product = mysqli_query($con, $get_product);

        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];

        $pro_title = $row_product['product_title'];

        $pro_price = $row_product['product_price'];

        $pro_desc = $row_product['product_desc'];

        $pro_img1 = $row_product['product_img1'];

        $pro_img2 = $row_product['product_img2'];

        $pro_img3 = $row_product['product_img3'];

        $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";

        $run_p_cat = mysqli_query($con, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sk8 Garage</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

    <!-- Top Start -->
    <div id="top">

        <!-- container Start -->
        <div class="container">

            <!-- col-md-6 offer Start -->
            <div class="col-md-6 offer">

                <a href="#" class="btn btn-success btn-sm">

                    <?php 

                        if (!isset($_SESSION['customer_email'])) {

                            echo "Welcome: Guest";

                        }

                        else {

                            echo "Welcome: " . $_SESSION['customer_email'] . "";

                        }

                    ?>

                </a>

                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>

            </div>
            <!-- col-md-6 offer End -->

            <!-- col-md-6 Start -->
            <div class="col-md-6">

                <!-- cmenu Start -->
                <ul class="menu">

                    <li>

                        <a href="customer_register.php">Sign Up</a>

                    </li>

                    <li>

                        <a href="checkout.php">My Account</a>

                    </li>

                    <li>

                        <a href="cart.php">Go To Cart</a>

                    </li>

                    <li>

                        <a href="checkout.php">

                            <?php 

                                if(!isset($_SESSION['customer_email'])){

                                    echo "<a href='checkout.php'>Log In</a>";

                                }

                                else {

                                    echo "<a href='logout.php'>Log Out</a>";

                                }

                            ?>

                        </a>

                    </li>

                </ul>
                <!-- menu End -->

            </div>
            <!-- col-md-6 End -->

        </div>
        <!-- container End -->

    </div>
    <!-- Top End -->

    <!-- navbar navbar-default Start -->
    <div id="navbar" class="navbar navbar-default">

        <!-- container Start -->
        <div class="container">

            <!-- navbar-header Start -->
            <div class="navbar-header">

                <!-- navbar-brand home Start -->
                <a href="index.php" class="navbar-brand home">

                    <img src="images/skate-garage-logo.png" alt="Sk8 Garage Logo" class="hidden-xs" style="width: 125px;">
                    <img src="images/skate-garage-logo.png" alt="Sk8 Garage Logo Mobile" class="visible-xs" style="width: 125px;">

                </a>
                <!-- navbar-brand home End -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div>
            <!-- navbar-header End -->

            <!-- navbar-collapse collapse Start -->
            <div class="navbar-collapse collapse" id="navigation">

                <!-- padding-nav Start -->
                <div class="padding-nav">

                    <!-- nav navbar-nav left Start -->
                    <ul class="nav navbar-nav left">

                        <li class="<?php if ($active == 'Home') echo "active"; ?>">

                            <a href="index.php">Home</a>

                        </li>

                        <li class="<?php if ($active == 'Shop') echo "active"; ?>">

                            <a href="shop.php">Shop</a>

                        </li>

                        <li class="<?php if ($active == 'Account') echo "active"; ?>">

                        <?php 

                            if (!isset($_SESSION['customer_email'])) {

                                echo "<a href='checkout.php'>My Account</a>";

                            }

                            else {

                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>"; 

                            }

                        ?>

                        </li>

                        <li class="<?php if ($active == 'Cart') echo"active"; ?>">

                            <a href="cart.php">Shopping Cart</a>

                        </li>

                        <li class="<?php if ($active == 'Contact') echo"active"; ?>">

                            <a href="contact.php">Contact Us</a>

                        </li>

                    </ul>
                    <!-- nav navbar-nav left End -->

                </div>
                <!-- padding-nav End -->

                <!-- btn navbar-btn btn-primary Start -->
                <a href="cart.php" class="btn navbar-btn btn-primary right">

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> Items In Your Cart</span>

                </a>
                <!-- btn navbar-btn btn-primary End -->

                <!-- navbar-collapse collapse right Start -->
                <div class="navbar-collapse collapse right">

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Start -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>
                    <!-- btn btn-primary navbar-btn End -->

                </div>
                <!-- navbar-collapse collapse right End -->

                <!-- collapse clearfix Start -->
                <div class="collapse clearfix" id="search">

                    <!-- navbar-form Start -->
                    <form method="get" action="results.php" class="navbar-form">

                        <!-- input-group Start -->
                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <!-- input-group-btn Start -->
                            <span class="input-group-btn">

                            <!-- btn btn-primary Start -->
                            <button type="submit" name="search" value="Search" class="btn btn-primary">

                                <i class="fa fa-search"></i>

                            </button>
                            <!-- btn btn-primary End -->

                            </span>
                            <!-- input-group-btn End -->

                        </div>
                        <!-- input-group End -->

                    </form>
                    <!-- navbar-form End -->

                </div>
                <!-- collapse clearfix End -->

            </div>
            <!-- navbar-collapse collapse End -->

        </div>
        <!-- container End -->

    </div>
    <!-- navbar navbar-default End -->