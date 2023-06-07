<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/style.css">
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const date = new Date();
      let hours = date.getHours();
      let minutes = date.getMinutes();
      let seconds = date.getSeconds();

      function time() {
        setInterval(incrementSeconds, 1000);
        function incrementSeconds() {
          seconds += 1;
          if (seconds >= 59) {
            minutes += 1;
            seconds = 0;
            if (minutes >= 60) {
              hours += 1;
              minutes = 0;
              seconds = 0;
            } if (hours >= 23 && minutes >= 59 && seconds >= 59) {
              hours = 0;
              minutes = 0;
              seconds = 0;
            }
          }
          document.querySelector('.time').innerHTML = hours + ":" + minutes + ":" + seconds;
        }
      }
      time();
    })
  </script>
  <title>Projekat</title>
</head>


<body>
  <?php
  include "functions.php";
  ?>
  <!-- BS4 carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo rand10(); ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src=" <?php echo rand10(); ?>" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src=" <?php echo rand10(); ?>" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

  <!-- menu -->
  <menu>
    <div>
      <form action="index.php" method="post">
        <input type="submit" value="Love" name="love">
      </form>
    </div>
    <div>
      <form action="index.php" method="post">
        <input type="submit" value="Work" name="work">
      </form>
    </div>
    <div>
      <form action="index.php" method="post">
        <input type="submit" value="Motivation" name="motivation">
      </form>
    </div>
    <div>
      <form action="index.php" method="post">
        <input type="submit" value="Health" name="health">
      </form>
    </div>
  </menu>
  <!-- na submit -->
  <?php
  if (isset($_POST['love'])) {
    echo "<p>" . extractQuote('love') . "</p>";
  }
  if (isset($_POST['work'])) {
    echo "<p>" . extractQuote('work') . "</p>";
  }
  if (isset($_POST['motivation'])) {
    echo "<p>" . extractQuote('motivation') . "</p>";
  }
  if (isset($_POST['health'])) {
    echo "<p>" . extractQuote('health') . "</p>";
  }
  ?>
  <!-- prilikom ucitavanja -->
  <?php
  $quoteLength = randQuote();
  if (!strlen($quoteLength) >= 1) {
    echo "<p style='border: none'>" . randQuote() . "</p>";
  } else {
    echo "<p>" . randQuote() . "</p>";
  }
  ?>



  <!-- footer -->
  <footer>
    <?php
    echo dateNow();
    ?>
    <span class="time"></span>
  </footer>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>



</body>

</html>