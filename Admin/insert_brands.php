<?php

include('../includes/connect.php');

if(isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // select data from database
    $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_select = mysqli_query($connection, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0) {
        echo "<script>alert('This brand is present inside the database.')</script>";
    } else {

        // Insert data into databse
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($connection, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully.')</script>";
        }
    }
}

?>

<h3 class="text-center mb-3">Insert Brands</h3>

<!-- Brands Form -->
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="brands" aria-describedby="basic-addon1" autocomplete="off">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-primary text-white rounded-3 p-2 my-3 border-0" name="insert_brand" value="Insert brands">
    </div>
</form>