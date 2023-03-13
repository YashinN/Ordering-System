
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
    <link rel="stylesheet" href="./Css/main.css">
    <title>Ordering System</title>
</head>
<body>

     <?php 

        if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $username = trim($username);

            $_SESSION['quantity'] = $_POST['quantity'];
            $_SESSION['glazeType'] = $_POST['glaze'];
            $_SESSION['toppings'] = $_POST['toppings'];
            $_SESSION['filling'] = $_POST['filling'];
            $_SESSION['username'] = $username;
            
            if(empty($username)){
                ?> <style>.userError{display: block}</style> <?php
            } else {

                header("Location: payment.php");


            }
        }
    
    ?> 

    <div class="container main-wrapper">
        <header class = "p-5">
            <div class = "row mb-5">
                <h1 class = "display-3">Dropping Donuts...</h1>
            </div>
           
            <div class = "row donut-row">
                <div class = "col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                    <img class = "img-fluid header-img"src="./images/glaze1.png" alt="">
                </div>

                <div class = "col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                    <img class ="img-flud header-img" src="./images/glaze2.png" alt="">
                </div>

                <div class = "col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                    <img class ="img-fluid header-img"src="./images/glaze3.png" alt="">
                </div>

                <div class = "col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                    <img class ="img-fluid header-img"src="./images/glaze4.png" alt="">
                   
                </div>
            </div>
        </header>

        <div class="container p-0">
            <form action="" method ="post">
                <div class="go p-5">
                    <div class = "col-12">
                        <label for="username" class="form-label fs-1">Enter Username</label>
                        <p class = "userError">Please enter a username</p>
                        <input type="text" class="form-control" name ="username" id="username" placeholder="username">
                    </div>
                </div>
                
                <div class="container mb-5">
                    <h5 class = "display-6 text-center section-label mb-5">Choose Your Glaze</h5>
                    <div class="row gy-3 ">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-3">
                            <div class = "glaze-item px-2 py-3">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="glaze" id = "plain">Plain</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input glaze-check" type="radio" name="glaze" id="plain" value ="plain" checked>
                                    <img class = "radio-img"src="./images/glaze4.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-3">
                            <div class = "glaze-item px-2 py-3">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="chocolate" id = "chocolate">Chocolate</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input glaze-check"  type="radio" name="glaze" id="chocolate" value ="chocolate">
                                    <img class = "radio-img" src="./images/glaze2.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-3">

                            <div class = "glaze-item px-2 py-3">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="glaze" id = "bubblegum">Bubblegum</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input glaze-check" name ="glaze" id = "bubblegum" type="radio" name="glaze" id="bubblegum" value ="bubblegum">
                                    <img class = "radio-img" src="./images/glaze3.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-3">
                            <div class = "glaze-item px-2 py-3">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="glaze" id = "banana">Banana</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input glaze-check" name ="glaze" id = "banana" type="radio" name="glaze" id="banana" value ="banana">
                                    <img class = "radio-img"src="../images/glaze5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mb-5">
                    <h5 class = "text-center display-6 mb-5 section-label">Add Toppings</h5>
                    <p class = "errorToppings">Max 3 Toppings Allowed</p>
                    <div class="row gy-3 ">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center ">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Sprinkles</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name = "toppings[]" value="sprinkles" id="">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Choc Chips</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name ="toppings[]"  value="choc chips" id="">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center ">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Tofee Bits</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name = "toppings[]" value="tofee bits" id="">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Strawberries</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name = "toppings[]" value="strawberries" id="">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center ">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Almonds</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name = "toppings[]" value="almonds" id="">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="toppings[]">Oreo</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input toppings" type="checkbox" name = "toppings[]" value="oreo" id="flexCheckDefault">
                                    <img class = "toppings-img" src="./images/topping1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mb-5">
                    <h5 class = "text-center section-label display-6 mb-5">Add a Filling</h5>
                    <div class="row gy-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex px-2">
                            <div class = "glaze-item px-2 py-2" id = "empty">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="filling" id = "none">None</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input fillings"  type="radio" name="filling" id="none" value="none" checked>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-2">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="filling" id = "custard">Custard</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input fillings"  type="radio" name="filling" id="custard" value ="custard">
                                    <img class = "topping-img"src="./images/filling-3.webp" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-2">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="filling">Peppermint</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input fillings" type="radio" name="filling" id="peppermint" value = "peppermint">
                                    <img class = "radio-img"src="./images/filling-2.webp" alt="">
                                </div>
                            </div>
                        </div>


                        

                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-flex justify-content-center px-2">
                            <div class = "glaze-item px-2 py-2">
                                <div class = "row text-center">
                                    <label class="form-check-label label fs-4" for="filling" id ="chocolate">Chocolate</label>
                                </div>
                               
                                <div class = "item">
                                    <input class="form-check-input fillings"  type="radio" name="filling" id="chocolate" value = "chocolate">
                                    <img class = "radio-img"src="./images/filling-1.webp" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                </div> 

                <div class="container mb-5">
                    <div class = "row">
                        
                        <div class="col-6 px-3">
                            <label for="quanity" class="form-label fs-1 mb-3 input-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name ="quantity"  placeholder ="1" value="1">
                        </div>
                
                        <div class="col-6 px-3">
                            <label for="Quanity" class="form-label fs-1 mb-3 input-label">Total</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">R</span>
                                    <input type="text" class="form-control rt" id = "money" aria-label="Amount (to the nearest dollar)" value="0">
                                     <span class="input-group-text">.00</span>
                                 </div>
                         </div>
                     </div>

                     <div class ="row">
                        <input type="submit" name = "submit" id ="submit">
                     </div>
                </div>
            </form>
        </div>
    </div>




    <!-- Boostrap JS & Poppers -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="./Scropts/script.js"></script>
</body>
</html>