<?php 

    include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Insert Product</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>

<!-- row Start -->
<div class="row">

    <!-- col-lg-12 Start -->
    <div class="col-lg-12">

        <!-- breadcrumb Start -->
        <ol class="breadcrumb">

            <!-- active Start -->
            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / Insert Products

            </li>
            <!-- active End -->

        </ol>
        <!-- breadcrumb End -->

    </div>
    <!-- col-lg-12 End -->

</div>
<!-- row End -->

<!-- row Start -->
<div class="row">

    <!-- col-lg-12 Start -->
    <div class="col-lg-12">

        <!-- panel panel-default Start -->
        <div class="panel panel-default">

            <!-- panel-heading Start -->
            <div class="panel-heading">

                <!-- panel-title Start -->
                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Insert Product 

                </h3>
                <!-- panel-title End -->

            </div>
            <!-- panel-heading End -->

            <!-- panel-body Start -->
            <div class="panel-body">

                <!-- form-horizontal Start -->
                <form method="post" class="form-horizontal" enctype="multipart/form-data">

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label">Product Title</label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_title" type="text" class="form-control" required>

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label">Product Category</label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <!-- form-control Start -->
                            <select name="product_cat" class="form-control">

                                <option>Select Product Categories</option>

                                <?php 

                                    $get_p_cats = "SELECT * FROM product_categories";
                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo "

                                            <option value='$p_cat_id'>$p_cat_title</option>

                                        ";

                                    }

                                ?>

                            </select>
                            <!-- form-control End -->

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label">Category</label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <!-- form-control Start -->
                            <select name="cat" class="form-control">

                                <option>Select Category</option>

                                <?php 

                                    $get_cat = "SELECT * FROM categories";
                                    $run_cat = mysqli_query($con, $get_cat);

                                    while ($row_cat = mysqli_fetch_array($run_cat)) {

                                        $cat_id = $row_cat['cat_id'];
                                        $cat_title = $row_cat['cat_title'];

                                        echo "

                                            <option value='$cat_id'> $cat_title </option>

                                        ";

                                    }

                                ?>

                            </select>
                            <!-- form-control End -->

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Image 1 </label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_img1" type="file" class="form-control" required>

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label">Product Image 2</label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_img2" type="file" class="form-control">

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label">Product Image 3</label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_img3" type="file" class="form-control form-height-custom">

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Price </label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_price" type="text" class="form-control" required>

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Keywords </label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="product_keywords" type="text" class="form-control" required>

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Desc </label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                    <!-- form-group Start -->
                    <div class="form-group">

                        <label class="col-md-3 control-label"></label> 

                        <!-- col-md-6 Start -->
                        <div class="col-md-6">

                            <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

                        </div>
                        <!-- col-md-6 End -->

                    </div>
                    <!-- form-group End -->

                </form>
                <!-- form-horizontal End -->

            </div>
            <!-- panel-body End -->

        </div>
        <!-- canel panel-default End -->

    </div>
    <!-- col-lg-12 End -->

</div>
<!-- row End -->

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>

</body>
</html>

<?php 

    if (isset($_POST['submit'])) {

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");

        $insert_product = "INSERT INTO products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc) VALUES ('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc')";

        $run_product = mysqli_query($con, $insert_product);

        if ($run_product) {

            echo "<script>alert('Product has been added sucessfully.')</script>";
            echo "<script>window.open('insert_product.php','_self')</script>";

        }

    }

?>