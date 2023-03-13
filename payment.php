<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap Css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="./checkout.css">

    <title>Payment</title>
</head>
<body>

    <?php 

        $unitCost = calcPriceOfDonut($_SESSION['glazeType'], $_SESSION['toppings'], $_SESSION['filling']);

        $totalCost = getOrderTotal($unitCost,$_SESSION['quantity']);

        function calcPriceOfDonut($glazeType,$toppings,$filling):int{
            $donutCost = 4;

            if($glazeType !== 'plain'){
                $donutCost += 2;
            }

            $donutCost += count($toppings) * 2;

            if($filling !== 'none'){
                $donutCost += 2;
            }

            return $donutCost;
        }

        function getOrderTotal($cost,$quantity):int{
            return $cost * $quantity;
        }

        
    
    
    ?>


    <!-- Header Section -->
    <header class="container">
        <h1>Your Order</h1>
    </header>
    <!-- Header Section End -->


    <!-- Order Itmes Section -->
    <div class ="container order-wrapper">
        <div class = "container">
            <section class="row gy-3 my-4">
                
                <div class = "col">
                    <h3 class="">Glaze Type</h3>
                    <div class="item-container">
                        <h4><?php echo $_SESSION['glazeType'] ?></h4>
                        <img class =""src="./kisspng-doughnut-dessert-bakery-cake-donut-png-image-collection-5a7820a5d3cce0.3589088715178221178675.png" alt="">
                    </div>
                </div>

                <div class = "col">
                    <h3>Filling</h3>
                    <div class="item-container">
                        <h4><?php echo $_SESSION['filling']?></h4>
                        <img class =""src="./kisspng-doughnut-dessert-bakery-cake-donut-png-image-collection-5a7820a5d3cce0.3589088715178221178675.png" alt="">
                    </div>
                </div>
            </section>

            <section class="row gy-3 mb-4">
                <h3 class ="">Toppings</h3>
                <div class = "col">
                    <div class="item-container">
                        <h4><?php echo $_SESSION['toppings'][0]?></h4>
                        <img class =""src="./kisspng-doughnut-dessert-bakery-cake-donut-png-image-collection-5a7820a5d3cce0.3589088715178221178675.png" alt="">
                    </div>
                </div>

                <div class = "col">
                    <div class="item-container">
                        <h4><?php echo $_SESSION['toppings'][1]?></h4>
                        <img class =""src="./kisspng-doughnut-dessert-bakery-cake-donut-png-image-collection-5a7820a5d3cce0.3589088715178221178675.png" alt="">
                    </div>
                </div>

                <div class = "col">
                    <div class="item-container">
                        <h4><?php echo $_SESSION['toppings'][2]?></h4>
                        <img class =""src="./kisspng-doughnut-dessert-bakery-cake-donut-png-image-collection-5a7820a5d3cce0.3589088715178221178675.png" alt="">
                    </div>
                </div> 
            </section>
        </div>
    </div>

    <!-- Order Items Section End -->

    <!-- Ceckout Section -->
    <section class="container total-section text-center row">

        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 my-auto output">
            <h4 class="">Quantity</h4>
            <span><?php echo $_SESSION['quantity'] ?></span>
        </div>

        <div class="col-6 col-sm-6  col-md-4 col-lg-4 col-xl-4 my-auto output">
            <h4 class ="">Unit Price</h4>
            <span><?php echo $unitCost ?></span>
            
        </div>

        <div class="col-6 col-sm-6 col-md-4 col-lg-4 my-auto col-xl-4 output">
            <h4 class="">Sub-Total</h4>
            <span><?php echo $totalCost; ?></span>
        </div>

    </section>
    <!-- Cehckout Section End -->


    <!-- Boostrap JS & Poppers -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="./script.js"></script>
</body>
</html>