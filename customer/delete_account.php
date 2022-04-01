<!-- center Start -->
<center>

    <h1>Do you really want to delete your account?</h1>

    <!-- form Start -->
    <form action="" method="post">

       <input type="submit" name="Yes" value="Yes, I want to delete my account" class="btn btn-danger"> 

       <input type="submit" name="No" value="No, I don't want to delete my account" class="btn btn-primary"> 

    </form>
    <!-- form End -->

</center>
<!-- center End -->

<?php 

    $c_email = $_SESSION['customer_email'];

    if (isset($_POST['Yes'])) {

        $delete_customer = "DELETE FROM customers WHERE customer_email = '$c_email'";

        $run_delete_customer = mysqli_query($con, $delete_customer);

        if ($run_delete_customer) {

            session_destroy();

            echo "<script>alert('Successfully deleted your account, goodbye :<')</script>";

            echo "<script>window.open('../index.php', '_self')</script>";

        }

    }

    if (isset($_POST['No'])) {

        echo "<script>window.open('my_account.php?my_orders', '_self')</script>";

    }

?>