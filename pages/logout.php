<?php

if(!isset($_SESSION['ID']) && $_SESSION['STATUS'] != "ACTIVE") {
    echo "<script>alert('You have no permission to access this page');
                  location.href='index.php';</script>";
}
unset($_SESSION['ID']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['STATUS']);
unset($_SESSION['EMAIL']);
unset($_SESSION['ROLE']);

session_destroy();
$connection = null;
echo "<script>location.href='". $_SERVER['PHP_SELF'] . "'</script>";
