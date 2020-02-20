<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="../img/laptop.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Get your laptop now!</h5>
                  <p style="color: black">Students will get a 20% discount (only when you can show a school pass</p>
              </div>
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="../img/macbookpro2.jpeg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Get your very own Macbook Pro 2018!</h5>
                  <p style="color: black">This laptop has recently arrived and is ready to be taken home with you.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="../img/phones.jpeg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                  <h5>The newest IPhones have arrived to TopShop</h5>
                  <p style="color: black">The new IPhone 11 (Pro) has arrived to TopShop. Students will get a 20% discount.</p>
              </div>
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>

  <div class="content">
    <form class='loginform' name="login" method="POST" enctype="multipart/form-data" target="" action="">
      <p id="page_title">Login</p>
        <input required type="email" name="email" placeholder="example@gmail.com">
        <input required type="password" name="password" placeholder="******">
      <div class="icon_container">
        <input onclick="window.location.href = 'start.php';" type="submit" class="icon" id="submit" name="submit" value="&rarr;">
      </div>

      <p>No account yet? Register <a href="../register/register.php">here!</a></p>
      <?php
      if(isset($_POST['submit'])) {
        $note = "";
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        try {
          $sql = "SELECT * FROM client WHERE email = ?";
          $stmt = $connection->prepare($sql);
          $stmt->execute(array($email));
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if($result) {
            $passindb = $result['password'];
            $role = $result['role'];
            if(password_verify($password, $passindb)) {
              $_SESSION['ID'] = session_id();
              $_SESSION['USER_ID'] = $result['ID'];
              $_SESSION['USER_NAME'] = $result['firstname'];
              $_SESSION['EMAIL'] = $result['email'];
              $_SESSION['STATUS'] = 'ACTIVE';
              $_SESSION['ROLE'] = $role;

            if($role == 0) {
              echo "<script>location.href='index.php?page=login;</script>'";
            } elseif ($role == 1) {
              echo "<script>location.href='index.php?page=login;</script>'";
            } else {
              $note = "No access<br>";
            }

            } else {
              $note = "Try again!<br>";
            }
            } else {
              $note = "Try again!<br>";
            }
          } catch(PDOException $e) {
              echo $e->getMessage();
          }
            echo "<div id='note'>$note</div>";
            }


      ?>

        <hr>

        <!-- Javascript loading -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
