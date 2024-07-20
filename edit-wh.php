<?php
include "db_conn.php";

// Get the ID from the URL parameter
$id = $_GET["id"];

// Check if the form is submitted
if (isset($_POST["submit"])) {
  $product_name = $_POST['product_name'];
  $location_id = $_POST['location_id'];
  $product_quantity = $_POST['product_quantity'];
  $supplier_id = $_POST['supplier_id'];
  $received_date = $_POST['received_date'];

  // Prepare the SQL query to update the record
  $sql = "UPDATE `warehouse` SET 
          `product_name`='$product_name', 
          `location_id`='$location_id', 
          `product_quantity`='$product_quantity', 
          `supplier_id`='$supplier_id', 
          `received_date`='$received_date' 
          WHERE id = $id";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful
  if ($result) {
    // Redirect to the warehouse page with a success message
    header("Location: warehouse.php?msg=Data updated successfully");
    exit();
  } else {
    // Display an error message if the query failed
    echo "Failed: " . mysqli_error($conn);
  }
}

// Prepare the SQL query to fetch the record to be updated
$sql = "SELECT * FROM `warehouse` WHERE id = $id LIMIT 1";
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
            <label class="form-label">Product Name:</label>
            <input type="text" class="form-control" name="product_name" placeholder="Screw M8" value="<?php echo $row['product_name']; ?>">
          </div>

          <div class="col">
            <label class="form-label">Product Location:</label>
            <input type="text" class="form-control" name="location_id" placeholder="Aisle 4 Shelf 2" value="<?php echo $row['location_id']; ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Product Quantity:</label>
          <input type="number" class="form-control" name="product_quantity" placeholder="100" value="<?php echo $row['product_quantity']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Supplier:</label>
          <input type="text" class="form-control" name="supplier_id" placeholder="BDFactory" value="<?php echo $row['supplier_id']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Received Date:</label>
          <input type="date" class="form-control" name="received_date" value="<?php echo $row['received_date']; ?>">
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="warehouse.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
