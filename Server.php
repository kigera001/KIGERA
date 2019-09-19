<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'pms');

	// variable declaration
    $firstname = "";
    $lastname = "";
	$username = "";
    $user_type = "";
	$email    = "";
    $medicine_company="";
    $madicine_name="";
    $madicine_batch_number="";
    $mfg_date="";
    $expiry_date="";
    $date_of_entry="";
    $quantity="";
    $price_per_unit="";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}
    //call the add_medicine() btn function if add_btn is clicked
    if (isset($_POST['add_btn'])) {
		add_medicine();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location:loginA.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
        $firstname    =  e($_POST['firstname']);
        $lastname    =  e($_POST['lastname']);
		$username    =  e($_POST['username']);
        $user_type    =  e($_POST['usertype']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
        $verification_code  =  e($_POST['verificationcode']);

		// form validation: ensure that the form is correctly filled
        if (empty($firstname)) { 
			array_push($errors, "First Name is required"); 
		}
        if (empty($lastname)) { 
			array_push($errors, "Last Name is required"); 
		}
		if (empty($username)) { 
			array_push($errors, "Username is required");
		}
        if (empty($user_type)) { 
			array_push($errors, "Usertype is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
        if (empty($verification_code)) { 
			array_push($errors, "Verification code is required"); 
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);
            $verification_code=md5($verification_code);//encrypt the password before saving in the database

			if (isset($_POST['usertype'])) {
				$user_type = e($_POST['usertype']);
				$query = "INSERT INTO users (firstname, lastname, username, usertype, email, password, verificationcode) 
						  VALUES('$firstname','$lastname','$username', '$user_type', '$email', '$password', '$verification_code')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: ADMINhome.php');
			}else{
				$query = "INSERT INTO users (firstname, lastname, username, usertype, email, password, verificationcode) 
						  VALUES('$firstname', '$lastname','$username', 'user', '$email', '$password', '$verification_code')";
				mysqli_query($db, $query);
                $_SESSION['success']  = "You are successfully created!!";
				header('location: login.php');

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: ADMINhome.php');				
			}

		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

    // ADD MEDICINE
	function add_medicine(){
		global $db, $errors;

		// receive all input values from the form
        if (isset($medicine_company)) { ($_POST['medicine company']);
                                      }
        $medicine_name=(isset($_POST['medicine name']));
        $medicine_batch_number= (isset($_POST['medicine batch number']));
        $mfg_date= (isset($_POST['mfg date']));
        $expiry_date= (isset($_POST['expiry date']));
        $date_of_entry= (isset($_POST['date of entry']));
        $quantity= (isset($_POST['quantity(total units)']));
        $price_per_unit= (isset($_POST['price per unit']));

		// form validation: ensure that the form is correctly filled
        if (empty($medicine_company)) { 
			array_push($errors, "Medicine Company is required"); 
		}
        if (empty($medicine_name)) { 
			array_push($errors, "Medicine Name is required"); 
		}
		if (empty($medicine_batch_number)) { 
			array_push($errors, "Medicine batch number is required");
		}
        if (empty($mfg_date)) { 
			array_push($errors, "Mfg date is required"); 
		}
		if (empty($expiry_date)) { 
			array_push($errors, "Expiry Date is required"); 
		}
		if (empty($date_of_entry)) { 
			array_push($errors, "Date of Entry is required"); 
		}
		if (empty($quantity)) {
			array_push($errors, "Quantity is required");
		}
        if (empty($price_per_unit)) { 
			array_push($errors, "Price is required"); 
		}

		// add medicine if there are no errors in the form
		if (count($errors) == 0) {

			$query = "INSERT INTO medicine (medicine company, medicine name, medicine batch number, mfg date, expiry date, date of entry, quantity(total units), price per unit) 
						  VALUES('$medicine_company','$medicine_name','$medicine_batch_number', '$mfg_date', '$expiry_date', '$date_of_entry', '$quantity', '$price_per_unit')";
                mysqli_query($db, $query);
				$_SESSION['success']  = "New Medicine Added!!";
				header('location:addmedicine.php');
			}

		}


	// return user array from their s.no

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
                
				if ($logged_in_user['usertype'] == 'admin') {
                    

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ADMINhome.php');		  
				}else {
				array_push($errors, "Wrong username/password ");
			}
               
		}
	}
    }

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>