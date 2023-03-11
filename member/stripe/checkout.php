<?php
  include '../authorization.php';
  include 'C:\xampp\htdocs\HulkZone\connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buy cool new product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <div class="product">
        <img src="../images/pay.jpg" alt="payment pic" />
        <div class="description">
          <?php
            $paymentAmount = $_GET['amount'];

            $type = $_GET['type'];

            if (isset($_GET['employeeID'])) {
              $employeeID = $_GET['employeeID'];
            } else {
              $employeeID = "";
            }

            echo "<h3>Payment</h3> <h5>Rs. $paymentAmount</h5>";
          ?>

        </div>
      </div>

      <form action="http://localhost/HulkZone/member/stripe/checkout_process.php" method="POST">
        
        <input type="hidden" name="paymentAmount" value="<?php echo $paymentAmount; ?>">
        
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        
        <?php 
          if (isset($_GET['employeeID'])) 
          { 
        ?>
          <input type="hidden" name="employeeID" value="<?php echo $employeeID?>">
        <?php 
          } 
        ?>
        
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
  <script type="text/javascript">
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