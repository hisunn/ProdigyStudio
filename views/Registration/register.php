<?php
define('name', 'Prodigy Studio');
include "../../module/register/Registration.php";

if (isset($_POST['reg_user_ticketer'])) {
	$usertype = $_GET['user'];
	$ticketbuyer = new Registration($_POST['username'], $_POST['email'], $_POST['password_1'], $_POST['password_2'],$_POST['fname'],$_POST['lname']);
	$ticketbuyer->setUserType($usertype);
	$ticketbuyer->validateCredentials();
}
if (isset($_POST['reg_user_organizer'])) {
	$usertype = $_GET['user'];
	$organizer = new Registration($_POST['username'], $_POST['email'], $_POST['password_1'], $_POST['password_2'],$_POST['fname'],$_POST['lname']);
	$organizer->setUserType($usertype);
	$organizer->validateCredentials();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/dist/output.css" rel="stylesheet">
	<link rel="shortcut icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
	<link rel="icon" href="../../Img/prodigyLogo_Black_.svg" type="image/x-icon">
	<title><?= name ?></title>
</head>

<body>
	<main>
		<?php if (isset($_GET['error'])) {
			echo '<h1 class=""; >' . $_GET['error'] . '</h1>';
		} ?>
		<div class="h-full 2xl:h-screen bg-gradient-to-tr from-blue-800 to-purple-700 flex justify-center items-center">
			<div class="2xl:w-2/5 2xl:my-40 ">
				<form class="bg-white p-10 rounded-lg shadow-lg min-w-full my-5 2xl:my-0" method="POST" action="">

					<?php if ($_GET['user'] == 'ticketer') { ?>
						<h2 class="inline-block text-5xl font-bold text-gray-900">Create Account</h2><a href="../index.php"><img class="inline-block mb-5 ml-auto lg:ml-56 border-2  hover:border-black transition-all rounded-full w-0 xl:w-24" src="../../Img/prodigyLogo_Black.png" alt="logo"></a><br>
						<h1 class=" text-2xl mb-6 text-gray-600 font-bold font-sans">Hello Music lovers :)</h1>
						<p>Fill your credentials and lets get started !</p> <br>
					<?php } ?>
					<?php if ($_GET['user'] == 'organizer') { ?>
						<h2 class="inline-block text-5xl font-bold text-gray-900">Create Account</h2><a href="../index.php"><img class="inline-block mb-5 ml-auto lg:ml-56 border-2 hover:border-black transition-all  rounded-full w-0 xl:w-24" src="../../Img/prodigyLogo_Black.png" alt="logo"></a> <br>
						<h1 class="text-2xl mb-6 text-gray-600 font-bold font-sans">Hello Organizers !</h1>
						<p>Fill your credentials and lets get started !</p> <br>
					<?php } ?>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="username">First Name</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="fname" id="fname" placeholder="first name" />
					</div>	<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="username">Last Name</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="lname" id="lname" placeholder="last name" />
					</div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="username">Username</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="username" />
					</div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="email" name="email" id="email" placeholder="@email" />
					</div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password_1" id="password_1" placeholder="password" />
					</div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Confirm password</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password_2" id="password_2" placeholder="confirm password" />
					</div>
					<?php if (isset($_GET['user'])) { ?>
						<button name="<?php echo 'reg_user_' . $_GET['user'] ?>" type="submit" class="w-full mt-6 bg-indigo-600 hover:bg-white hover:text-indigo-700 border hover:border-indigo-700 transition-all rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
					<?php } ?>
					<?php if ($_GET['user'] == 'ticketer') { ?>
						<p class="text-center mt-2">Are you an event organizer ? <a class="text-blue-800" href="register.php?user=organizer"> Click Here</a> </p>
					<?php } ?>
					<?php if ($_GET['user'] == 'organizer') { ?>
						<p class="text-center mt-2">Are you a ticket buyer ? <a class="text-blue-800" href="register.php?user=ticketer"> Click Here</a></p>
					<?php } ?>
				</form>  
			</div>
		</div>
	</main> 

<?php include "../Template/footer.php" ?>