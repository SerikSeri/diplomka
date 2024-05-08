<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'Төлем статусы жаңартылды!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Тапсырыстар жіберілді.</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">Тапсырыстар жіберілді.</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Жіберілген күні : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p>Аты : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Номері : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> Мекен-жай : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> Барлық товарлар саны : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Жалпы бағасы : <span>Тг.<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> Төлем әдісі : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
            <option value="Күтілуде">Күтілуде</option>
            <option value="Жеткізілді">Жектізілді</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="Жанарту" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('бұл тапсырысын жою керек пе?');">Жою</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">әлі де тапсырыстар жіберілмеген!</p>';
      }
   ?>

</div>

</section>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>