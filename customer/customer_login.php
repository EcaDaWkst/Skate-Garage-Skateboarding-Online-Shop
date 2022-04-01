<!-- box Start -->
<div class="box">

    <!-- box-header Start -->
    <div class="box-header">

        <!-- center Start -->
        <center>

            <h1>Login</h1>

            <p class="lead">Already have an account? Log In now!</p>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit!</p>

        </center>
        <!-- center End -->

    </div>
    <!-- box-header End -->

    <!-- form Start -->
    <form method="post" action="checkout.php">

        <!-- form-group Start -->
        <div class="form-group">

            <label>Email </label>

            <input name="c_email" type="text" class="form-control" required>

        </div>
        <!-- form-group End -->

        <!-- form-group Start -->
        <div class="form-group">

            <label>Password</label>

            <input name="c_pass" type="password" class="form-control" required>

        </div>
        <!-- form-group End -->

        <!-- text-center Start -->
        <div class="text-center">

            <button name="login" value="Login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Login

            </button>

        </div>
        <!-- text-center End -->     

    </form>
    <!-- form End -->

    <!-- center Start -->
    <center>

        <a href="customer_register.php">

            <h3>Don't have account? Sign Up now!</h3>

        </a> 

    </center>
    <!-- center End -->

</div>
<!-- box End -->

<?php 

    if (isset($_POST['login'])) {

        $customer_email = $_POST['c_email'];

        $customer_pass = $_POST['c_pass'];

        $select_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email' AND customer_pass = '$customer_pass'";

        $run_customer = mysqli_query($con, $select_customer);

        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);

        $select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";

        $run_cart = mysqli_query($con, $select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_customer == 0) {

            echo "<script>alert('Your email or password is wrong.')</script>";

            exit();

        }

        if ($check_customer == 1 AND $check_cart == 0) {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You are Logged in.')</script>"; 

            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

        }

        else {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You are Logged in.')</script>"; 

            echo "<script>window.open('checkout.php','_self')</script>";

        }

    }

?>