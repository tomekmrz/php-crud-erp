<?php
include "db_conn.php";
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

  <title>Production</title>
</head>
<body>
  <br>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $msg . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>
    <a href="add-new-prod.php" class="btn btn-dark mb-3">Add New Order</a>
    <a href="index.php" class="btn btn-dark mb-3">Return</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ORDER ID</th>
          <th scope="col">CUSTOMER ID</th>
          <th scope="col">PRODUCT ID</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">ORDER DATE</th>
          <th scope="col">STATUS</th>
          <th scope="col">PRIORITY</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `production`";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row["order_id"] ?></td>
              <td><?php echo $row["customer_id"] ?></td>
              <td><?php echo $row["product_id"] ?></td>
              <td><?php echo $row["quantity"] ?></td>
              <td><?php echo $row["order_date"] ?></td>
              <td><?php echo $row["status"] ?></td>
              <td><?php echo $row["priority"] ?></td>
              <td>
                <a href="edit-prod.php?id=<?php echo $row['order_id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete-prod.php?id=<?php echo $row["order_id"] ?>" class="link-dark" onclick="return confirm('Are you sure you want to delete this order?');"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
            </tr>
            <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="8" class="text-center">No orders found.</td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
