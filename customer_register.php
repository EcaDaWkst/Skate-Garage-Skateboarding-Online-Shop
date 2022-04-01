<?php 

    $active = 'Account';
    include("includes/header.php");

?>

    <!-- #content Begin -->
    <div id="content">

        <!-- container Begin -->
        <div class="container">

            <!-- col-md-12 Begin -->
            <div class="col-md-12">

                <!-- breadcrumb Begin -->
                <ul class="breadcrumb">

                    <li>

                        <a href="index.php">Home</a>

                    </li>

                    <li>

                        Register

                    </li>

                </ul>
                <!-- breadcrumb Finish -->

            </div>
            <!-- col-md-12 Finish -->

            <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php 

                include("includes/sidebar.php");

            ?>

            </div>
            <!-- col-md-3 Finish -->

            <!-- col-md-9 Begin -->
            <div class="col-md-9">

                <!-- box Begin -->
                <div class="box">

                    <!-- box-header Begin -->
                    <div class="box-header">

                        <!-- center Begin -->
                        <center>

                            <h2>Sign Up Now!</h2>

                        </center>
                        <!-- center Finish -->

                        <!-- form Begin -->
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Name:</label>

                                <input type="text" class="form-control" name="c_name" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Email:</label>

                                <input type="text" class="form-control" name="c_email" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Password:</label>

                                <input type="password" class="form-control" name="c_pass" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Country:</label>

                                <input type="text" class="form-control" name="c_country" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>City:</label>

                                <input type="text" class="form-control" name="c_city" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Contact:</label>

                                <input type="text" class="form-control" name="c_contact" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Address:</label>

                                <input type="text" class="form-control" name="c_address" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- form-group Begin -->
                            <div class="form-group">

                                <label>Profile Picture:</label>

                                <input type="file" class="form-control form-height-custom" name="c_image" required>

                            </div>
                            <!-- form-group Finish -->

                            <!-- text-center Begin -->
                            <div class="text-center">

                                <button type="submit" name="register" class="btn btn-primary">

                                <i class="fa fa-user-md"></i> Sign Up

                                </button>

                            </div>
                            <!-- text-center Finish -->

                        </form>
                        <!-- form Finish -->

                    </div>
                    <!-- box-header Finish -->

                </div>
                <!-- box Finish -->

            </div>
            <!-- col-md-9 Finish -->

        </div>
        <!-- container Finish -->

    </div>
    <!-- #content Finish -->

    <?php 

        include("includes/footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>

<?php 

    if (isset($_POST['register'])) {

        $c_name = $_POST['c_name'];

        $c_email = $_POST['c_email'];

        $c_pass = $_POST['c_pass'];

        $c_country = $_POST['c_country'];

        $c_city = $_POST['c_city'];

        $c_contact = $_POST['c_contact'];

        $c_address = $_POST['c_address'];

        $c_image = $_FILES['c_image']['name'];

        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        $c_ip = getRealIpUser();

        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

        $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip')";

        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "SELECT * FROM cart WHERE ip_add = '$c_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart > 0) {

            /*  If signed up with items in cart  */

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('Congratulations! Your account has been successfully created.')</script>";

            echo "<script>window.open('checkout.php', '_self')</script>";

        }

        else {

            /*  If sign up without items in cart  */

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('Congratulations! Your account has been successfully created.')</script>";

            echo "<script>window.open('index.php', '_self')</script>";

        }

    }

?>