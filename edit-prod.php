<?php
include "db_conn.php";

// Get the ID from the URL parameter
$id = $_GET["id"];

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    // Prepare the SQL query to update the record
    $sql = "UPDATE `production` SET 
            `customer_id`='$customer_id',
            `product_id`='$product_id', 
            `quantity`='$quantity', 
            `order_date`='$order_date', 
            `status`='$status', 
            `priority`='$priority' 
            WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Redirect to the production page with a success message
        header("Location: production.php?msg=Data updated successfully");
        exit();
    } else {
        // Display an error message if the query failed
        echo "Failed: " . mysqli_error($conn);
    }
}

// Prepare the SQL query to fetch the record to be updated
$sql = "SELECT * FROM `production` WHERE order_id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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

  <title>Edit Product Information</title>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Product Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <div class="container d-flex justify-content-center">
    <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Customer Name:</label>
                <input type="text" class="form-control" name="customer_id" placeholder="Customer name" value="<?php echo $row['customer_id']; ?>">
            </div>
            <div class="col">
                <label class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="product_id" placeholder="Product name" value="<?php echo $row['product_id']; ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity:</label>
            <input type="number" class="form-control" name="quantity" placeholder="1" value="<?php echo $row['quantity']; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Order Date:</label>
            <input type="date" class="form-control" name="order_date" value="<?php echo $row['order_date']; ?>">
        </div>

        <!-- Order Status -->
        <div class="form-group mb-3">
            <label>Order Status:</label><br>
            <input type="radio" class="form-check-input" name="status" id="registered" value="registered" <?php if($row['status'] == 'registered') echo 'checked'; ?>>
            <label for="registered" class="form-input-label">Registered</label>
            <input type="radio" class="form-check-input" name="status" id="in_production" value="in_production" <?php if($row['status'] == 'in_production') echo 'checked'; ?>>
            <label for="in_production" class="form-input-label">In Production</label>
            <input type="radio" class="form-check-input" name="status" id="completed" value="completed" <?php if($row['status'] == 'completed') echo 'checked'; ?>>
            <label for="completed" class="form-input-label">Completed</label>
        </div>

        <!-- Order Priority -->
        <div class="form-group mb-4">
            <label>Order Priority:</label><br>
            <input type="radio" class="form-check-input" name="priority" id="low" value="low" <?php if($row['priority'] == 'low') echo 'checked'; ?>>
            <label for="low" class="form-input-label">Low</label>
            <input type="radio" class="form-check-input" name="priority" id="medium" value="medium" <?php if($row['priority'] == 'medium') echo 'checked'; ?>>
            <label for="medium" class="form-input-label">Medium</label>
            <input type="radio" class="form-check-input" name="priority" id="high" value="high" <?php if($row['priority'] == 'high') echo 'checked'; ?>>
            <label for="high" class="form-input-label">High</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="prod.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
