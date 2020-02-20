<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8">
    <title>Webshop</title>
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>

  <script>
  function logout() {
    var logout = confirm("Are you sure to log out?");
    if(logout) {
      location.href="../pages/index.php?page=logout";
    }
  }

  </script>

      <?php

      if(isset($_SESSION['ID']) && $_SESSION['STATUS'] == 'ACTIVE') {
        if($_SESSION['ROLE'] == 0) {
      ?>

          <div class="nav">
              <a href="" class="logo">TOPSHOP</a>
              <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
              <ul class="menu">
                  <li onclick="location.href='index.php?page=login'">Home</li>
                  <li onclick="location.href='index.php?page=webshop'">Laptop Shop</li>
                  <li onclick="location.href='index.php?page=phoneshop'">Phone Shop</li>
                  <li onclick="logout()">Logout</li>
                  <button class="dropbtn" onclick="myFunction()">Account
                      <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content" id="myDropdown">
                      <li><?php echo $_SESSION['USER_NAME'];?></li>
                      <li onclick="location.href='index.php?page=edit_profile'">Account</li>
                  </div>
              </ul>
          </div>

    <?php } elseif($_SESSION['ROLE'] == 1) {?>

      <header class="header">
            <a href="" class="logo">TOPSHOP</a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
             <ul>
                 <li onclick="location.href='index.php?page=login'">Home</li>
                 <li onclick="location.href='index.php?page=webshop'">Laptop Shop</li>
                 <li onclick="location.href='index.php?page=phoneshop'">Phone Shop</li>
                 <li onclick="location.href='index.php?page=laptops'">Laptops</li>
                 <li onclick="location.href='index.php?page=phones'">Phones</li>
                 <li onclick="location.href='index.php?page=clients'">Clients</li>
                 <li onclick="location.href='index.php?page=rapport'">Rapport</li>
                 <li onclick="logout()">Logout</li>
                 <button class="dropbtn" onclick="myFunction()">Account
                     <i class="fa fa-caret-down"></i>
                 </button>
                 <div class="dropdown-content" id="myDropdown">
                     <li><?php echo $_SESSION['USER_NAME'];?></li>
                     <li onclick="location.href='index.php?page=edit_profile'">Account</li>
                 </div>
             </ul>
        </div>
      </header>


      <?php
        }
      }
      ?>

  <script>
      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(e) {
          if (!e.target.matches('.dropbtn')) {
              var myDropdown = document.getElementById("myDropdown");
              if (myDropdown.classList.contains('show')) {
                  myDropdown.classList.remove('show');
              }
          }
      }
  </script>
  </body>
</html>
