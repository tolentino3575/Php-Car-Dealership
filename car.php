<?php
  class Car
  {
    private $make_model;
    private $price;
    private $miles;

    function setMakeModel($new_model)
    {
      $this->make_model = $new_model;
    }
    function setPrice($newPrice)
    {
      $this->price = $newPrice;
    }
    function setMiles($newMiles)
    {
      $this->miles = $newMiles;
    }

    function getMakeModel()
    {
      return $this->make_model;
    }
    function getPrice()
    {
      return $this->price;
    }
    function getMiles()
    {
      return $this->miles;
    }

    function worthBuying($max_price)
    {
        return $this->price <= ($max_price + 100);
    }

    function maxMiles($max_miles)
    {
      return $this->miles <= ($max_miles + 1000);
    }
  }

  $porsche = new Car();
  $porsche->setMakeModel("2014 Porsche 911");
  $porsche->setPrice(114991);
  $porsche->setMiles(7864);

  $ford = new Car();
  $ford->setMakeModel("2011 Ford F450");
  $ford->setPrice(55995);
  $ford->setMiles(14241);

  $lexus = new Car();
  $lexus->setMakeModel("2013 Lexus RX 350");
  $lexus->setPrice(44700);
  $lexus->setMiles(20000);

  $mercedes = new Car();
  $mercedes->setMakeModel("Mercedes Benz CLS550");
  $mercedes->setPrice(39900);
  $mercedes->setMiles(37979);

  $cars = array($porsche, $ford, $lexus, $mercedes);

  $cars_matching_search = array();
  foreach ($cars as $car) {
    if ($car->worthBuying($_GET['price']) && $car->maxMiles($_GET['miles'])) {
      array_push($cars_matching_search, $car);
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  </head>
  <body>
    <div class="container">
      <h3>Dealership</h3>
      <ul>
        <?php
          foreach($cars_matching_search as $car) {
            $new_make_model = $car->getMakeModel();
            echo "<li>Model: $new_make_model </li>";
            $new_price = $car->getPrice();
            echo "<li>Price: $new_price </li>";
            $new_miles = $car->getMiles();
            echo "<li>Miles: $new_miles </li>";
          }
          if(empty($cars_matching_search)){
            echo "no";
          }
        ?>
      </ul>
    </div>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  </body>
</html>
