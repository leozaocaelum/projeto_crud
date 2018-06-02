<?php
include_once("inc/utils.php");

$conn = getConn();

if($conn && $_POST) {
  $removed = removeProduct($conn, $_POST['id']);
  if($removed) {
    header("Location: lista.php?action=remove&message=success");
  } else {
    header("Location: lista.php?action=remove&message=failed");
  }
}
