<?php
session_start();
require_once '../_inc/functions.php';
require_once '../_inc/header.php';
require_once '../_inc/nav.php';
checkAuthentication();
?>

<form method="post" action="processForm.php">
  <input type="hidden" name="id" value="">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
  <br>
  <label for="description">Description:</label>
  <textarea name="description" id="description"></textarea>
  <br>
  <label for="release_date">Release date:</label>
  <input type="date" name="release_date" id="release_date">
  <br>
  <label for="poster">Poster:</label>
  <input type="text" name="poster" id="poster">
  <br>
  <label for="price">Price:</label>
  <input type="text" name="price" id="price">
  <br>
  <input type="submit" value="Submit">
</form>

<?php require_once '../_inc/footer.php'; ?>
