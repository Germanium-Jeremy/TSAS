<?php
include '../php/dbConnection.php';

if (isset($_GET['id'])) {
     $id = $_GET['id'];
     renderEditForm($id);
 } else {
     echo "There is an Error getting data";
}
if (isset($_POST['submitEdit'])) {
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $mobileNumber = $_POST['mobileNumber'];
     $email = $_POST['email'];
     $sql2 = "UPDATE teacher SET FirstName = '$firstName', LastName = '$lastName', MobileNumber = '$mobileNumber', Email = '$email' WHERE ID = $id";
     if ($connection->query($sql2)) {
          header('location:../admin/management.php');
     } else {
          echo "<script>alert('Failed to update course')</script>";
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
     <title>Edit Teacher</title>
</head>
<body>
<?php
function renderEditForm($id) {
     global $connection;
?>
<form method="post" class="fixed top-[1cm] left-[10cm] right-[10cm] bg-slate-300 rounded-2xl shadow-2xl px-[4rem] z-10 flex flex-col">
     <h2 class="text-center text-xl font-bold mt-[2rem]">EDIT THIS RECORD</h2>
<?php
$sql = "SELECT * FROM teacher WHERE ID = $id;";
$query = $connection->query($sql);
if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {
?>
     <div class="py-2 relative">
          <label for="course" class="text-lg font-semibold">Edit First Name</label>
          <input type="text" name="firstName" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['FirstName']; ?>">
     </div>
     <div class="py-2 relative">
          <label for="course" class="text-lg font-semibold">Edit Last Name</label>
          <input type="text" name="lastName" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['LastName']; ?>">
     </div>
     <div class="py-2 relative">
          <label for="course" class="text-lg font-semibold">Edit Phone Number</label>
          <input type="text" name="mobileNumber" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['MobileNumber']; ?>">
     </div>
     <div class="py-2 relative">
          <label for="course" class="text-lg font-semibold">Edit Email</label>
          <input type="text" name="email" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['Email']; ?>">
     </div>
<?php
     }
} else {
     echo "<script>alert('Failed to update teacher')</script>";
}
?>
     <button type="submit" name="submitEdit" class="self-center px-[2rem] p-2 bg-[#1b20b6] text-white rounded-md my-[2rem]">Edit</button>
</form>
<?php
     }
?>
</body>
</html>