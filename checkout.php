<?php 

    $active = 'Account';
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

                        Register

                    </li>

                </ul>
                <!-- breadcrumb End -->

            </div>
            <!-- col-md-12 End -->

        <div class="col-md-3">
        <!-- col-md-3 End -->

        <?php 

            include("includes/sidebar.php");

        ?>

        </div>
        <!-- col-md-3 End -->

            <!-- col-md-9 Start -->
            <div class="col-md-9">

            <?php 

                if (!isset($_SESSION['customer_email'])) {

                    include("customer/customer_login.php");

                }

                else {

                    include("payment_options.php");

                }

            ?>

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