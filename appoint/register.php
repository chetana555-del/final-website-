<?php


	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];


		$_SESSION['fullname'] = $fullname;
		$_SESSION['email'] = $email;

		

		
		
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: loginsignup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password,fullname,address,contact) VALUES (:email, :password, :fullname, :address, :contact)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'fullname'=>$fullname, 'address'=>$address, 'contact'=>$phone]);
					$userid = $conn->lastInsertId();

					

					//Load phpmailer
					$_SESSION['error'] = 'Thank you for registering ';
				header('location: loginsignup.php');
		    		                            
				    


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: loginsignup.php');
	}

?>