<!-- #footer Start -->
<div id="footer">

    <!-- container Start -->
    <div class="container">

        <!-- row Start -->
        <div class="row">

            <!-- col-sm-6 col-md-3 Start -->
            <div class="col-sm-6 col-md-3">

                <h4>Pages</h4>

                <!-- ul Start -->
                <ul>

                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>

                </ul>
                <!-- ul End -->

                <hr>

                <h4>User Section</h4>

                <!-- ul Start -->
                <ul>

                <?php 

                    if (!isset($_SESSION['customer_email'])) {

                        echo"<a href='../checkout.php'>Log In</a>";

                    }

                    else {

                        echo"<a href='my_account.php?my_orders'>My Account</a>"; 

                    }

                ?>

                    <li>

                    <?php 

                        if (!isset($_SESSION['customer_email'])) {

                            echo"<a href='../checkout.php'>Log In</a>";

                        }

                        else {

                            echo"<a href='my_account.php?edit_account'>Edit Account</a>"; 

                        }

                    ?>

                    </li>

                </ul>
                <!-- ul End -->

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- col-sm-6 col-md-3 End -->

            <!-- col-sm-6 col-md-3 Start -->
            <div class="com-sm-6 col-md-3">

                <h4>Top Product Categories</h4>

                <!-- ul Start -->
                <ul>

                <?php 

                    $get_p_cats = "SELECT * FROM product_categories";

                    $run_p_cats = mysqli_query($con, $get_p_cats);

                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                        $p_cat_id = $row_p_cats['p_cat_id'];

                        $p_cat_title = $row_p_cats['p_cat_title'];

                        echo "

                            <li>

                                <a href='../shop.php?p_cat=$p_cat_id'>

                                    $p_cat_title

                                </a>

                            </li>

                        ";

                    }

                ?>

                </ul>
                <!-- ul End -->

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- col-sm-6 col-md-3 End -->

            <!-- col-sm-6 col-md-3 Start -->
            <div class="col-sm-6 col-md-3">

                <h4>Find Us</h4>

                <!-- p Start -->
                <p>

                    <strong>JANRA HandIT Solutions</strong>
                    <br/>Philippines

                </p>
                <!-- p End -->

                <a href="../contact.php">Check Our Contact Page</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- col-sm-6 col-md-3 End -->

            <!-- col-sm-6 col-md-3 Start -->
            <div class="col-sm-6 col-md-3">

                <h4>Get The News</h4>

                <p class="text-muted">
                    Dont miss our latest update products.
                </p>

                <!-- form Start -->
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=M-devMedia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post">

                    <!-- input-group Start -->
                    <div class="input-group">

                        <input type="text" class="form-control" name="email">

                        <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>

                        <!-- input-group-btn Start -->
                        <span class="input-group-btn">

                            <input type="submit" value="subscribe" class="btn btn-default">

                        </span>
                        <!-- input-group-btn End -->

                    </div>
                    <!-- input-group End -->

                </form>
                <!-- form End -->

                <hr>

                <h4>Keep In Touch</h4>

                <p class="social">

                    <a href="../#" class="fa fa-facebook"></a>
                    <a href="../#" class="fa fa-twitter"></a>
                    <a href="../#" class="fa fa-instagram"></a>
                    <a href="../#" class="fa fa-google-plus"></a>
                    <a href="../#" class="fa fa-envelope"></a>

                </p>

            </div>
            <!-- col-sm-6 col-md-3 End -->

        </div>
        <!-- row End -->

    </div>
    <!-- container End -->

</div>
<!-- #footer End -->

<!-- #copyright Start -->
<div id="copyright">

    <!-- container Start -->
    <div class="container">

        <!-- col-md-6 Start -->
        <div class="col-md-6">

            <p class="pull-left">&copy; 2022 JANRA HandIT Solutions All Rights Reserved.</p>

        </div>
        <!-- col-md-6 End -->

        <!-- col-md-6 Start -->
        <div class="col-md-6">

            <p class="pull-right">Theme by: <a href="#">Corpuz</a></p>

        </div>
        <!-- col-md-6 End -->

    </div>
    <!-- container End -->

</div>
<!-- #copyright End -->