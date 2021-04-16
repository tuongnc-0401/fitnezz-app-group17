<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> 

<?php 
    include("includes/db.inc.php");
    session_start();
    $_SESSION['customerName'] = $_POST["customerName"];
    $_SESSION['phone'] = $_POST["phone"];
    $_SESSION['address'] = $_POST["address"];
    $_SESSION['today'] = $_POST['today'];
    $_SESSION['time'] = $_POST['time'];
    //shorten the variables
    $namePlayer = $_SESSION['customerName'];
    $phonePlayer = $_SESSION['phone'];
    $addressPlayer = $_SESSION['address'];
    $todayPlayer = $_SESSION['today'];
    $timePlayer = $_SESSION['time'];
    $totalPlayer = $_SESSION["total"];
    // hard code this but no hard code for late
    $user_id = $_SESSION['userId'];
    $status = 0;
    $order_id = 1;

    echo $_SESSION['customerName'];
    echo $_SESSION['phone'];
    echo $_SESSION['address'];
    echo $_SESSION['today'];
    echo $_SESSION['time'];
    echo "|||";
    echo 'post ne' . $_POST["name0"]; 
    echo "|||";
    echo $_SESSION["total"];

    echo '<br>';
    

    $query = "INSERT INTO orders(user_id, date_order, time_order, address, phone_number, status, total, name_user) 
                            VALUES ('$user_id','$todayPlayer','$timePlayer','$addressPlayer','$phonePlayer','$status','$totalPlayer','$namePlayer')";
    $result = mysqli_query($conn, $query);
    if($result){
         echo "Insert successfull";
         $last_id = mysqli_insert_id($conn);
         for ($i = 0; $i < $_SESSION['count']; $i++){
            $name = "name" . $i;
            $quantity = "quantity" . $i;
            $price = "price" . $i;
            $note = "note" . $i;
            $product_name = $_SESSION[$name];
            $product_quantity = $_SESSION[$quantity];
            $product_price = $_SESSION[$price];
            $product_note = $_SESSION[$note];
            $result_conga = mysqli_query($conn, "select pro_id from product_combo where pro_name = '$product_name'");
            $conga = mysqli_fetch_array($result_conga);
            echo '<br>'.$conga['pro_id']. '<br>';
            $id_di = $conga['pro_id'];
            
            echo $product_name. '<br>';
            echo $product_quantity. '<br>';
            echo $product_price. '<br>';
            echo $product_note. '<br>';
            $query02 = "INSERT INTO order_details (order_id, pro_id, quantity, sub_total, note, pro_name) 
            VALUES ('$last_id', '$id_di', '$product_quantity', '$product_price', '$product_note', '$product_name')";
            $result1 = mysqli_query($conn, $query02);
            if($result1){
                 echo "Insert successfull";
            }else{
                echo "Insert Fails: " . mysqli_connect_error($conn);
                echo $last_id;
            }
        }
         
    }else{
        echo "Insert Fails: " . mysqli_connect_error($conn);
    }
   
    header("Location: profile.php")

    
    
?>