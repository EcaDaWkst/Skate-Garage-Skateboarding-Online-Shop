<!-- box Start -->
<div class="box">

    <?php 

        $session_email = $_SESSION['customer_email'];

        $select_customer = "SELECT * FROM customers WHERE customer_email = '$session_email'";

        $run_customer = mysqli_query($con, $select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['customer_id'];

        ?>

        <h1 class="text-center">Payment Options:</h1>  

        <!-- lead text-center Start -->
        <p class="lead text-center">

            <a href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment</a>

        </p>
        <!-- lead text-center End -->

        <!-- center Start -->
        <center>

            <!-- lead Start -->
            <p class="lead">

                <a href="#">

                    PayPal Payment

                    <img class="img-responsive" src="images/paypall_img.png" alt="img-paypall">

                </a>

            </p>
            <!-- lead End -->

        </center>
        <!-- center End -->

</div>
<!-- box End -->