<?php
require_once 'core/init.php';

// $user = DB::getInstance()->query("SELECT * FROM users");

// if(!$user->count()) {
// 	echo 'no user';
// } else {
// 	echo $user->first()->username;
// }


//	INSERT DATA //
// $user = DB::getInstance()->insert('users', array(
// 	'username' => 'Dale',
// 	'password' => 'password',
// 	'salt' => 'salt'
// 	));

//	UPDATE DATA //
// $userInsert = DB::getInstance()->update('users', 3, array(
// 	'password' => 'newpassword',
// 	'name' => 'Dale Garrett'
// 	));

// SUCCESSFUL REGISTER
// if(Session::exists('success')) {
// 	echo Session::flash('success');
// }

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

// echo Session::get(Config::get('session/session_name'));

$user = new User();
if($user->isLoggedIn()) {
	// echo 'Logged in.';
?>
	<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
	<ul>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change Password</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are administrator</p>';
	}

} else {
	// echo 'not logged in';
	echo '<p>You need to <a href="login.php">Login</a> or <a href="register.php">Register</a></p>';
}