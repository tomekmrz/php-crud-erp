<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    // Prepare SQL query
    $sql = "INSERT INTO production (customer_id, product_id, quantity, order_date, status, priority) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisss", $customer_id, $product_id, $quantity, $order_date, $status, $priority);

    // Execute query
    if ($stmt->execute()) {
        header("Location: prod.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
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
    
    <title>Add New Order</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Register New Order</h3>
            <p class="text-muted">Complete the form below to add a new order to the database</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Customer Name:</label>
                        <input type="text" class="form-control" name="customer_id" placeholder="Customer name" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Product Name:</label>
                        <input type="text" class="form-control" name="product_id" placeholder="Product name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" placeholder="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Order Date:</label>
                    <input type="date" class="form-control" name="order_date" required>
                </div>

                <div class="form-group mb-3">
                    <label>Order Status:</label>
                    <div>
                        <input type="radio" class="form-check-input" name="status" id="registered" value="registered" required>
                        <label for="registered" class="form-check-label">Registered</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="status" id="in_production" value="in_production">
                        <label for="in_production" class="form-check-label">In Production</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="status" id="completed" value="completed">
                        <label for="completed" class="form-check-label">Completed</label>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label>Order Priority:</label>
                    <div>
                        <input type="radio" class="form-check-input" name="priority" id="low" value="low" required>
                        <label for="low" class="form-check-label">Low</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="priority" id="medium" value="medium">
                        <label for="medium" class="form-check-label">Medium</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="priority" id="high" value="high">
                        <label for="high" class="form-check-label">High</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="prod.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
