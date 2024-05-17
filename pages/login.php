<?php
include('../php/dbConnection.php');

if(isset($_POST['login'])) {
     $email=$_POST['email'];
     $password=$_POST['password'];
     $sql ="SELECT * FROM admin_data WHERE email = '$email' and password='$password';";
     $query=$connection->query($sql);
     if($query->num_rows > 0) {
          header('location:../admin/index.php');
     } else {
          echo "<script>alert('Invalid Details');</script>";
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/style.css">
     <link rel="shortcut icon" href="../images/tsas.png" type="image/x-icon">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://cdn.tailwindcss.com"></script>
     <script defer src="../scripts/script.js"></script>
     <title>TSAS Login</title>
</head>
<body class="flex justify-center h-screen w-screen">
     <div class="w-full h-full flex flex-col justify-center items-center">
          <h1 class="text-2xl text-[#1b20b6] text-center font-bold">Administrator<span class="block text-xl">Acount</span></h1>
          <form method="post" class="w-1/2 h-2/3 py-[1rem] px-[2rem] my-3 bg-gray-200 rounded-2xl shadow-lg">
               <div class="w-full my-7">
                    <label for="email" class="block text-xl pb-2">Email</label>
                    <input type="email" name="email" class="w-full rounded-lg outline-none py-2 indent-2 border border-black bg-transparent" placeholder="Enter Your Email" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
               </div>
               <div class="w-full my-7">
                    <label for="password" class="block text-xl pb-2">Password</label>
                    <input type="password" name="password" class="w-full rounded-lg outline-none py-2 indent-2 border border-black bg-transparent" placeholder="Enter Your Password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
               </div>
               <div class="w-full my-7 flex justify-between">
                    <span>
                         <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>>
                         <label for="remember">Remember Me</label>
                    </span>
                    <a href="#">forgot Password</a>
               </div>
               <div class="w-full my-7">
                    <button type="submit" name="login" class="text-white text-center w-full py-2 bg-gradient-to-r from-[#0c0e50] to-[#1b20b6] rounded-lg">Log in</button>
               </div>
          </form>
     </div>
     <div class="w-2/3 h-full">
          <img src="../images/comp1.png" alt="Comp1" class="w-full h-full">
     </div>
</body>
</html>
