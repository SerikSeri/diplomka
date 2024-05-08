<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Біз туралы</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/23.png" alt="">
      </div>

      <div class="content">
         <h3>Әзірлеушінің Хабарламасы:</h3>
         <p>Бәріне Сәлем ! Мен Серік Ыбырай. Astana Polytechnic Колледжінің Есептеу техникасы және бағдарламалық қамтамасыз ету факультетің студенті. Мен веб-сайттарды, бағдарламаларды жобалағанды және жаңа нәрселерді зерттегенді ұнатамын. Жаңа нәрселерді үйрену-менің хоббиім.</p>

        
         <a href="contact.php" class="btn">Бізбен хабарласу</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading"></h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>