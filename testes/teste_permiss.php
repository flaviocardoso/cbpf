<?php
switch ($_SESSION['nivel']) {
  case 3:
    include("user.php");
    break;
  case 2:
    // code...
    break;
  case 1:
    include("admin.php");
    break;
}
?>
