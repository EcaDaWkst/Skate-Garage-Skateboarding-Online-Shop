<?php 

    $active = 'Contact';
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

                        Contact Us

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

            </div>
            <!-- col-md-3 End -->

            <!-- col-md-9 Start -->
            <div class="col-md-9">

                <!-- box Start -->
                <div class="box">

                    <!-- box-header Start -->
                    <div class="box-header">

                        <!-- center Start -->
                        <center>

                            <h2> Feel free to Contact Us</h2>

                            <!-- text-muted Start -->
                            <p class="text-muted">

                                If you have any questions, feel free to contact us.

                            </p>
                            <!-- text-muted End -->

                        </center>
                        <!-- center End -->

                        <!-- form Start -->
                        <form action="contact.php" method="post">

                            <!-- form-group Start -->
                            <div class="form-group">

                                <label>Name</label>

                                <input type="text" class="form-control" name="name" required>

                            </div>
                            <!-- form-group End -->

                            <!-- form-group Start -->
                            <div class="form-group">

                                <label>Email</label>

                                <input type="text" class="form-control" name="email" required>

                            </div>
                            <!-- form-group End -->

                            <!-- form-group Start -->
                            <div class="form-group">

                                <label>Subject</label>

                                <input type="text" class="form-control" name="subject" required>

                            </div>
                            <!-- form-group End -->

                            <!-- form-group Start -->
                            <div class="form-group">

                                <label>Message</label>

                                <textarea name="message" class="form-control"></textarea>

                            </div>
                            <!-- form-group End -->

                            <!-- text-center Start -->
                            <div class="text-center">

                                <button type="submit" name="submit" class="btn btn-primary">

                                <i class="fa fa-user-md"></i> Send Message

                                </button>

                            </div>
                            <!-- text-center End -->

                        </form>
                        <!-- form End -->

                        <?php 

                        if (isset($_POST['submit'])) {

                            /*  Admin receives message with this */

                            $sender_name = $_POST['name'];

                            $sender_email = $_POST['email'];

                            $sender_subject = $_POST['subject'];

                            $sender_message = $_POST['message'];

                            $receiver_email = "zartalthal@gmail.com";

                            mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

                            /*  Auto reply to sender with this */

                            $email = $_POST['email'];

                            $subject = "Welcome Sk8 Garage!";

                            $msg = "Thanks for sending us message. We will accomodate your as soon as possible.";

                            $from = "zartalthal@gmail.com";

                            mail($email, $subject, $msg, $from);

                            echo "<h2 align='center'>Your message has been sent sucessfully.</h2>";

                        }

                        ?>

                    </div>
                    <!-- box-header End -->

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