<?php
include("shared/connect.php");
include("shared/layout/header.php");
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Lato", sans-serif
  }

  .w3-bar,
  h1,
  button {
    font-family: "Montserrat", sans-serif
  }

  .fa-anchor,
  .fa-coffee {
    font-size: 200px
  }
</style>

<body>



  <!-- Header -->
  <header class="w3-container w3-red w3-center" style="padding:128px 16px">
    <h1 class="w3-margin w3-jumbo">Rainbow Six Study Breast Cancer</h1>
    <p class="w3-xlarge">We create awareness around breast cancer, and empower and support people affected by it.</p>
    <a href="login.php">
      <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>
    </a>

  </header>

  <!-- First Grid -->
  <div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-twothird">
        <h1>Raise Awareness on Breast Cancer</h1>
        <h5 class="w3-padding-32">Save the future of many lives</h5>

        <p class="w3-text-grey">To create broader awareness that early detection and treatment of breast cancer can save
          lives, we have run numerous Awareness programmes.</p>
      </div>

      <div class="w3-third w3-center">
        <img class="img-fluid" src="./assets/girlsmiling.jpg" alt="girl smiling" width="500" height="600">
      </div>
    </div>
  </div>

  <!-- Second Grid -->
  <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
      <div class="w3-third w3-center">
        <br><br>
        <img class="img-fluid" src="./assets/womenempower.jpg" alt="girl macho" width="250" height="700">
      </div>

      <div class="w3-twothird">
        <h1>Supporting Women Globally</h1>
        <h5 class="w3-padding-32">Prevention is best medicine for causality</h5>

        <p class="w3-text-grey">We want to support future women and look out for this potential life changing condition. We
          know how diffictult is to go through any health issue. Our website will try to introduce ways of alleviating and
          preventing breast cancer for emerging. </p>
      </div>
    </div>
  </div>

  <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: You never know how strong you are until being strong is the only
      choice you have left.</h1>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-64 w3-center w3-opacity">
    <p>Brought to you by RSS Corporation.</p>
  </footer>

  <script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>

</body>

</html>

<?php
include("shared/layout/script.php");
include("shared/layout/footer.php");
