<?php 

    session_start();

    if (!isset($_SESSION['customer_email'])) {

        echo "<script>window.open('../checkout.php','_self')</script>";

    }

    else {

    include("includes/db.php");
    include("functions/functions.php");

    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sk8 Garage</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
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

                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?></a>

            </div>
            <!-- col-md-6 offer End -->

            <!-- col-md-6 Start -->
            <div class="col-md-6">

                <!-- cmenu Start -->
                <ul class="menu">

                    <li>

                        <a href="../customer_register.php">Register</a>

                    </li>

                    <li>

                        <a href="my_account.php">My Account</a>

                    </li>

                    <li>

                        <a href="../cart.php">Go To Cart</a>

                    </li>

                    <li>

                        <a href="../checkout.php">

                            <?php 

                                if (!isset($_SESSION['customer_email'])) {

                                    echo "<a href='checkout.php'>Login</a>";

                                }

                                else {

                                    echo " <a href='logout.php'>Log Out</a> ";

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
                <a href="../index.php" class="navbar-brand home">

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

                        <li>

                            <a href="../index.php">Home</a>

                        </li>

                        <li>

                            <a href="../shop.php">Shop</a>

                        </li>

                        <li class="active">

                            <a href="my_account.php">My Account</a>

                        </li>

                        <li>

                            <a href="../cart.php">Shopping Cart</a>

                        </li>

                        <li>

                            <a href="../contact.php">Contact Us</a>

                        </li>

                    </ul>
                    <!-- nav navbar-nav left End -->

                </div>
                <!-- padding-nav End -->

                <!-- btn navbar-btn btn-primary Start -->
                <a href="../cart.php" class="btn navbar-btn btn-primary right">

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> Items In Your Cart</span>

                </a>
                <!-- btn navbar-btn btn-primary End -->

                <!-- navbar-collapse collapse right Start -->
                <div class="navbar-collapse collapse right">

                    <!-- btn btn-primary navbar-btn Start -->
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">

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

                        My Account

                    </li>

                </ul>
                <!-- breadcrumb End -->

            </div>
            <!-- col-md-12 End -->

            <!-- col-md-3 Start -->
            <div class="col-md-3">

            <?php

                include("includes/sidebar.php");

            ?>

            </div><!-- col-md-3 End -->

            <!-- col-md-9 Start -->
            <div class="col-md-9">

                <!-- box Start -->
                <div class="box">

                    <h1 align="center">Please confirm your payment</h1>

                    <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Start -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label>Invoice No: </label>

                            <input type="text" class="form-control" name="invoice_no" required>

                        </div>
                        <!-- form-group End -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label>Amount Sent: </label>

                            <input type="text" class="form-control" name="amount_sent" required>

                        </div>
                        <!-- form-group End -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label>Select Payment Method: </label>

                            <!-- form-control Start -->
                            <select name="payment_mode" class="form-control">

                                <option>Select Payment Mode</option>
                                <option>Back Code</option>
                                <option>Paypall</option>
                                <option>Payoneer</option>
                                <option>Western Union</option>

                            </select>
                            <!-- form-control End -->

                        </div>
                        <!-- form-group End -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label>Transaction/Reference ID: </label>

                            <input type="text" class="form-control" name="ref_no" required>

                        </div>
                        <!-- form-group End -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label> Paypall/Payonee/Western Union Code: </label>

                            <input type="text" class="form-control" name="code" required>

                        </div>
                        <!-- form-group End -->

                        <!-- form-group Start -->
                        <div class="form-group">

                            <label>Payment Date: </label>

                            <input type="text" class="form-control" name="date" required>

                        </div>
                        <!-- form-group End -->

                        <!-- text-center Start -->
                        <div class="text-center">

                            <!-- tn btn-primary btn-lg Start -->
                            <button class="btn btn-primary btn-lg" name="confirm_payment">

                                <i class="fa fa-user-md"></i> Confirm Payment

                            </button>
                            <!-- tn btn-primary btn-lg End -->

                        </div>
                        <!-- text-center End -->

                    </form>
                    <!-- form End -->

                    <?php 
                    
                        if (isset($_POST['confirm_payment'])) {

                            $update_id = $_GET['update_id'];

                            $invoice_no = $_POST['invoice_no'];

                            $amount = $_POST['amount_sent'];

                            $payment_mode = $_POST['payment_mode'];

                            $ref_no = $_POST['ref_no'];

                            $code = $_POST['code'];

                            $payment_date = $_POST['date'];

                            $complete = "Complete";

                            $insert_payment = "INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, code, payment_date) VALUES ('$invoice_no', '$amount', '$payment_mode', '$ref_no', '$code', '$payment_date')";

                            $run_payment = mysqli_query($con, $insert_payment);

                            $update_customer_order = "UPDATE customer_orders SET order_status = '$complete' WHERE order_id = '$update_id'";

                            $run_customer_order = mysqli_query($con, $update_customer_order);

                            $update_pending_order = "UPDATE pending_orders SET order_status = '$complete' WHERE order_id = '$update_id'";

                            $run_pending_order = mysqli_query($con, $update_pending_order);

                            if ($run_pending_order) {

                                echo "<script>alert('Thank you for purchasing, please wait for the product to be delivered to you.')</script>";

                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                            }

                        }

                    ?>

                </div>
                <!-- box End -->

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

<?php 

    }

?>