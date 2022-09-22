<?php 
session_start();


/**
 * @param Connect-DB;
 */

$connect = mysqli_connect('localhost', 'hasan', 'hasan', 'cinema');
$db = new PDO(
    'mysql:host=localhost;dbname=cinema;charset=utf8',
    'hasan',
    'hasan',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

// call the register() function if register_btn is clicked
// if (isset($_POST['register_btn'])) {

// REGISTER USER
function registered(){
	global $connect, $errors, $username, $email;

	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		echo $errors. "Username is required"; 
	}
	if (empty($email)) { 
		echo $errors. "Email is required"; 
	}
	if (empty($password_1)) { 
		echo $errors. "Password is required"; 
	}
	if ($password_1 != $password_2) {
		echo $errors. "The two passwords do not match";
	}

	// register user if there are no errors in the form
	if ($errors == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO login (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($connect, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: ./admin/home.php');
		}else{
			$query = "INSERT INTO login (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($connect, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($connect);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index_login.php');				
		}
	}
}


// return user array from their id
function getUserById($id){
	global $connect;
	$query = "SELECT * FROM login WHERE id=" . $id;
	$result = mysqli_query($connect, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $connect;
	return mysqli_real_escape_string($connect, trim($val));
}

function display_error() {
	global $errors;

	// if (count($errors) > 0){
	// 		foreach ($errors as $error){
	// 			$error ;
	// 		}
		 
	// }
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $connect, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		echo $errors. "Username is required";
	}
	if (empty($password)) {
		echo $errors. "Password is required";
	}

	// attempt login if no errors on form
	if ($errors == 0) {
		$password = md5($password);

		$query = "SELECT * FROM login WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($connect, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: ./index_login.php');
			}
		}else {
			echo $errors. "Wrong username/password combination";
		}
	}
}


// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}