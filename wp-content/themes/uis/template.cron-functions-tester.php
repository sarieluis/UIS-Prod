<?php
// Template Name: Cron Functions Tester
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php get_header(); ?>



<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <title><?php the_title() ?></title>
   <script>
       setInterval('window.location.reload()', 185000);

       function startTimer(duration, display) {
           var timer = duration, minutes, seconds;
           setInterval(function () {
               minutes = parseInt(timer / 60, 10)
               seconds = parseInt(timer % 60, 10);

               minutes = minutes < 10 ? "0" + minutes : minutes;
               seconds = seconds < 10 ? "0" + seconds : seconds;

               display.textContent = minutes + ":" + seconds;

               if (--timer < 0) {
                   timer = duration;
               }
           }, 1000);
       }

       window.onload = function () {
           var fiveMinutes = 60 * 3,
               display = document.querySelector('#time');
           startTimer(fiveMinutes, display);

       };

   </script>

</head>
<body>


<div>Page refresh in <span id="time">03:00</span> minutes!</div>




</body>
</html>

<?php
uis_sf_leads_sync_func();
?>

<?php get_footer(); ?>
