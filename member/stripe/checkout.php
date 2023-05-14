<?php
  include '../authorization.php';
  include 'C:\xampp\htdocs\HulkZone\connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Member | Payment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../../asset/images/gymLogo.png"/>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <!-- image -->
    <div class="half-container"></div>
    
    <div class="first-half-container"  style="width:40%; justify-content: center; align-items:center; flex-direction: column;">
      <h2>Payment Details</h2>
      <section>
        <img src="../images/pay.jpg" alt="payment pic" />
        
        <?php
          $paymentAmount = $_GET['amount'];

          $type = $_GET['type'];

          if (isset($_GET['employeeID'])) {
            $employeeID = $_GET['employeeID'];
          } else {
            $employeeID = "";
          }

          $sql = "select * from user where userID = $_SESSION[userID]";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $fullname = $row['fName'] . " " . $row["lName"];
        ?>

      <form action="http://localhost/HulkZone/member/stripe/checkout_process.php" method="POST">
        <input type="hidden" name="paymentAmount" value="<?php echo $paymentAmount; ?>">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $fullname; ?>" readonly>
        <label>Payment Amount (LKR)</label>
        <input type="text" name="amt" value="<?php echo "Rs. " . $paymentAmount; ?>" readonly>
        <label>Date</label>
        <input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
        <?php if (isset($_GET['employeeID'])) { ?>
          <input type="hidden" name="employeeID" value="<?php echo $employeeID?>">
        <?php } ?>
        <button type="submit" id="checkout-button">Proceed to Pay</button>
      </form>

        
      </section>
    </div>
  </body>
  <script type="text/javascript">
    //publishable key
    var stripe = Stripe("pk_test_51MihJyAQ8qDWFtDVOUaCZ1X7qfobYysvcIGOuZnBEY5VJcQnulANqSQP8SDdVDFdSIr6g5ugd0jlUQv5nQ4cF1QE00uCxcV2AQ");
    var checkoutButton = document.getElementById("checkout-button");

    checkoutButton.addEventListener("click", function(){
      fetch("http://localhost/HulkZone/member/stripe/",{
        method:"POST",
      })
      .then(function(response){
        return response.json();
      })
      .then(function(session){
        return stripe.redirectToCheckout({sessionId:session})
      })
    })
  </script>
</html>