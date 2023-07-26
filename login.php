<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
  // Redirect the user to the home page
  header('Location: dashboard.php');
  exit;
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];


// Connect to the database
$db = new mysqli('localhost', 'root', 'c9XH#34vGs%h#fJs', 'handtriage');

// Check if the username and password exist in the database
$query = $db->query("SELECT * FROM Usuarios WHERE usuario='$username' AND password='$password'");

// If the user exists, set the session variable and redirect the user to the home page
if ($query->num_rows > 0) {
  $_SESSION['username'] = $username;
  header('Location: dashboard.php');
  exit;
} else {
  // The user does not exist, show an error message
  header('Location: index.php?q=Error');
  exit;
}

?>