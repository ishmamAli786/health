<?php
session_start();

//Input_feilds Validation
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include("config/db.php");
?>