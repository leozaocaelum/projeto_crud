<?php

function navActive($pg, $key) {
  if($pg == $key) { 
    return "active"; 
  }
}

function getConn() {
  $host = "127.0.0.1";
  $user = "root";
  $pass = "";
  $db   = "fp_73";
  return mysqli_connect($host, $user, $pass, $db);
}

function getProductById($conn, $id) {
  $query = "SELECT * FROM produtos WHERE id={$id}";
  return mysqli_query($conn, $query);
}

function getProducts($conn) {
  $query = "SELECT * FROM produtos";
  return mysqli_query($conn, $query);
}

function getProduct($result) {
  return mysqli_fetch_assoc($result);
}

function addProduct($conn, $nome, $preco, $quant) {
  $query = "INSERT INTO produtos
              ( nome, preco, quant )
            VALUES
              ( '{$nome}', {$preco}, '{$quant}' )"; 
  
  return mysqli_query($conn, $query);
}

function removeProduct($conn, $id) {
  if($id && is_numeric($id)) {
    $query = "DELETE FROM produtos WHERE id={$id}";
    return mysqli_query($conn, $query);
  }
  return false;
}

function updateProduct($conn, $id, $nome, $quant, $preco) {
  if($id && is_numeric($id)) {
    $query = "UPDATE 
              produtos
            SET
              nome = '{$nome}',
              quant = '{$quant}',
              preco = '{$preco}'
            WHERE
              id = '{$id}'
            ";
    return mysqli_query($conn, $query);
  }
  return false;
}
