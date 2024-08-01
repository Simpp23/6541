<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>Information about Product</h1>
        <form action="6541_w04_01_memberSale.php" method="post">
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" id="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '';?>">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input class="form-control" type="text" name="amount" id="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : '';?>">
            </div>
            
            <label for="">Member ?</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="member" id="true" value="1" <?php echo isset($_POST['member']) && $_POST['member']==1 ? 'checked' : '';?>>
                <label for="true">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="member" id="false" value="0" <?php echo isset($_POST['member']) && $_POST['member']==0 ? 'checked' : '';?>>
                <label for="false">No</label>
            </div class="">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>

            <hr>
            <h1>Result :</h1>
            <div id=result>
                 <?php
                 if(isset($_POST['price']) && isset($_POST['amount'])){
                      $price =  $_POST['price'];
                      $amount = $_POST['amount'];

                      if(is_numeric($price) && is_numeric($amount)) {
                                $price =  floatval($price);
                                $amount = floatval($amount);

                        $total = $price * $amount;

                        $discount = $total * 0.1;
                        if(isset($_POST['member']) && $_POST['member'] == 1){
                             $total_paid = $total - $discount;
                            echo "Price of product: $price <br>";
                            echo "Amount of product: $amount <br>";
                            echo "Total price: $total <br>";
                            echo "Discount: $discount <br>";
                            echo "Total Paid: $total_paid <br>";
                        }else{
                             echo "Price of product: $price <br>";
                            echo "Amount of product: $amount <br>";
                            echo "Total Paid: $total <br>";

                        }

                      }else{
                        echo "Please input Vilid numeric value for Price and Amount. by sim sim ;)";
                      }

                }else{
                    echo "Please input Price and Amount. by sim sim ;)";

                }
                ?>
            </div>

            <button type="clear" onclick="clearAllData()" class="btn btn-danger mt-3">Clear All Data</button>
        </form>
    </div>

    <script>
        function clearAllData() {
            document.getElementById("result").innerHTML = "";
            document.getElementById("price").value = "";
            document.getElementById("false").checked = false;
            document.getElementById("true").checked = false;
            document.getElementById("amount").value = "";
        }
    </script>
    
</body>
</html>