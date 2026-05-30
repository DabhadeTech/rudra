```php
<?php
session_start();
include('../database/db.php');

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admins WHERE email='$email'"
    );

    $admin = mysqli_fetch_assoc($query);

    if($admin && password_verify($password,$admin['password'])){

        $_SESSION['admin_id'] = $admin['id'];

        header("Location: dashboard.php");
        exit();

    }else{

        echo "Invalid Login";

    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<div class="flex items-center justify-center min-h-screen">

<form method="POST"
      class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md">

<h2 class="text-3xl font-bold mb-6 text-center">
Admin Login
</h2>

<input
type="email"
name="email"
placeholder="Email"
class="w-full border p-3 mb-4 rounded-lg"
required>

<input
type="password"
name="password"
placeholder="Password"
class="w-full border p-3 mb-4 rounded-lg"
required>

<button
name="login"
class="w-full bg-blue-700 text-white p-3 rounded-lg">

Login

</button>

</form>

</div>

</body>
</html>
```
