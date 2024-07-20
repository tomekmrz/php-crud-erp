<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $product_name = $_POST['product_name'];
    $location_id = $_POST['location_id'];
    $product_quantity = $_POST['product_quantity'];
    $supplier_id = $_POST['supplier_id'];
    $received_date = $_POST['received_date'];

    // Prepare SQL query
    $sql = "INSERT INTO `warehouse`(`id`, `product_name`, `location_id`, `product_quantity`, `supplier_id`, `received_date`) 
            VALUES (NULL, '$product_name', '$location_id', '$product_quantity', '$supplier_id', '$received_date')";

    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        header("Location: warehouse.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Update Warehouse Status</title>
</head>

<body>
    <br>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Product to Warehouse</h3>
            <p class="text-muted">Complete the form below to add a new product</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Product Name:</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Screw M8" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Product Location:</label>
                        <input type="text" class="form-control" name="location_id" placeholder="Aisle 4 Shelf 2" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Quantity:</label>
                    <input type="number" class="form-control" name="product_quantity" placeholder="100" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier:</label>
                    <input type="text" class="form-control" name="supplier_id" placeholder="BDFactory" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Received Date:</label>
                    <input type="date" class="form-control" name="received_date" required>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="warehouse.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
