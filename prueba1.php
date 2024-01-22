
<?php
require 'nav.php';
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Slider Example</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Bootstrap Slider CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Bootstrap Slider JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
</head>
<body>

<div class="container mt-5 text-center">
  <h2>Bootstrap Slider Example</h2>

  <div id="sliderContainer" class="d-inline-block">
    <!-- Range slider from 1 to 100 -->
    <input id="mySlider" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[1, 100]"/>
  </div>
  

  <!-- Label for displaying selected range -->
  <label for="selectedRange">   Rango Seleccionado:</label>
  <span id="selectedRange">1 - 100</span>
</div>

<script>
  // Initialize the slider
  var mySlider = new Slider("#mySlider", {
    id: "mySlider",
    min: 1,
    max: 100,
    range: true,
    value: [1, 100]
  });

  // Function to update the label with the selected range
  function updateSelectedRangeLabel() {
    var selectedRange = mySlider.getValue()[0] + " - " + mySlider.getValue()[1];
    $("#selectedRange").text(selectedRange);
  }

  // Update the label when sliding
  mySlider.on("slide", function() {
    updateSelectedRangeLabel();
    // Set the background color of the selection to red and track to green
    $("#mySlider .slider-selection").css("background", "red");
    $("#mySlider .slider-track-low, #mySlider .slider-track-high").css("background", "green");
  });

  // Update the label when sliding stops
  mySlider.on("slideStop", function() {
    updateSelectedRangeLabel();
    // Set the background color of the selection to red and track to green
    $("#mySlider .slider-selection").css("background", "red");
    $("#mySlider .slider-track-low, #mySlider .slider-track-high").css("background", "green");
  });
</script>

<style type="text/css">
  #mySlider .slider-selection {
    background: red; /* Set selection color to red */
  }

  #mySlider .slider-track-low,
  #mySlider .slider-track-high {
    background: green; /* Set track color to green */
  }

  #sliderContainer {
    margin-bottom: 20px; /* Adjust margin as needed */
  }
  .slider.slider-horizontal .slider-tick, .slider.slider-horizontal .slider-handle {
    margin-left: -15px;
}
</style>

</body>
</html>
