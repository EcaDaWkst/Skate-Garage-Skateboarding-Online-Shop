<h1 align="center">Change Password</h1>

<!-- form Start -->
<form action="" method="post">

    <!-- form-group Start -->
    <div class="form-group">

        <label>Current Password: </label>

        <input type="text" name="old_pass" class="form-control" required>

    </div>
    <!-- form-group End -->

    <!-- form-group Start -->
    <div class="form-group">

        <label>New Password: </label>

        <input type="text" name="new_pass" class="form-control" required>

    </div>
    <!-- form-group End -->

    <!-- form-group Start -->
    <div class="form-group">

        <label>Confirm New Password: </label>

        <input type="text" name="new_pass_again" class="form-control" required>

    </div>
    <!-- form-group End -->

    <!-- text-center Start -->
    <div class="text-center">

        <!-- btn btn-primary Start -->
        <button type="submit" name="submit" class="btn btn-primary">

            <i class="fa fa-user-md"></i> Update Now

        </button>
        <!-- btn btn-primary End -->

    </div>
    <!-- text-center End -->

</form>
<!-- form End -->

<?php 

    if (isset($_POST['submit'])) {

        $c_email = $_SESSION['customer_email'];

        $c_old_pass = $_POST['old_pass'];

        $c_new_pass = $_POST['new_pass'];

        $c_new_pass_again = $_POST['new_pass_again'];

        $sel_c_old_pass = "SELECT * FROM customers WHERE customer_pass = '$c_old_pass'";

        $run_c_old_pass = mysqli_query($con, $sel_c_old_pass);

        $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

        if ($check_c_old_pass == 0) {

            echo "<script>alert('Current password is not valid. Please try again.')</script>";

            exit();

        }

        if ($c_new_pass!=$c_new_pass_again) {

            echo "<script>alert('New password did not match.')</script>";

            exit();

        }

        $update_c_pass = "UPDATE customers SET customer_pass = '$c_new_pass' WHERE customer_email = '$c_email'";

        $run_c_pass = mysqli_query($con, $update_c_pass);

        if ($run_c_pass) {

            echo "<script>alert('Your password has been updated')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        }

    }

?>