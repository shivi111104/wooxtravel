<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php 

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/wooxtravel/index.php');
        exit;
    }

?>
    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AY3t3sq-Kr9hdJTGluLsvpYTQah4IS1otv30_0a2c7YewkO4xRpW8H9xMsZIHnG7CeyEf88TdKy7E40T&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div style="margin-top: 200px;" id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: "<?php echo $_SESSION['payment']; ?>" // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='index.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>

<?php require "includes/footer.php"; ?>
