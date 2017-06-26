<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cd.php";

    $app = new Silex\Application();

    $app->get("/", function() {
      $first_cd = new CD("Master of Reality", "Black Sabbath", "images/as1.jpg", 10.99);
      $second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "images/cc1.jpg", 10.99);
      $third_cd = new CD("Nevermind", "Nirvana", "images/cc2.jpg", 10.99);
      $fourth_cd = new CD("I don't get it", "Pork Lion", "images/sg1.jpg", 49.99);
      $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

      $output = "";
      foreach ($cds as $album) {
          $output = $output . "<div class='row'>
              <div class='col-md-6'>
                  <img src=" . $album->getCoverArt() . ">
              </div>
              <div class='col-md-6'>
                  <p>" . $album->getTitle() . "</p>
                  <p>By " . $album->getArtist() . "</p>
                  <p>$" . $album->getPrice() . "</p>
              </div>
          </div>
          ";
      }
      return $output;
  });

    return $app;
?>
