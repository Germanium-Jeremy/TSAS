<?php
include '../php/dbConnection.php';

if (isset($_GET['id'])) {
     $id = $_GET['id'];
     renderEditForm($id);
 } else {
     echo "There is an Error getting data";
}
if (isset($_POST['submitEdit'])) {
     $editFullname = $_POST['editFullname'];
     $editShortname = $_POST['editShortname'];
     $editCode = $_POST['editCode'];
     $sql2 = "UPDATE subjects SET SubjectFullname = '$editFullname', SubjectShortname = '$editShortname', SubjectCode = '$editCode' WHERE ID = $id";
     if ($connection->query($sql2)) {
          header('location:../admin/subject.php');
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
     <title>Edit Subject</title>
</head>
<body>
<?php
function renderEditForm($id) {
     global $connection;
?>
<form method="post" class="fixed top-[3cm] left-[10cm] right-[10cm] bg-slate-300 rounded-2xl shadow-2xl py-[2rem] px-[4rem] z-10 flex flex-col">
     <h2 class="text-center text-xl font-bold">EDIT THIS RECORD</h2>
     <div class="py-2 relative">
          <label for="course" class="text-lg font-semibold">Edit Course</label>
          <select name="editCourse" id="editCourse" class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl">
<?php
$sql = "select s.*, c.Course_Name from subjects as s, courses as c where s.ID = $id and s.CourseID = c.ID";
$query = $connection->query($sql);
if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {
?>
               <option value="<?php echo $row['CourseID']; ?>"><?php echo $row['Course_Name']; ?></option>
<?php
     }
} else {
     echo "No Subject found";
}
?>
          </select>
     </div>
<?php
$sql = "select s.*, c.Course_Name from subjects as s, courses as c where s.ID = $id and s.CourseID = c.ID";
$query = $connection->query($sql);
if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {
?>
     <div class="py-2">
          <label for="branch" class="text-lg font-semibold">Edit Subject FullName</label>
          <input type="text" name="editFullname" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['SubjectFullname']; ?>">
     </div>
     <div class="py-2">
          <label for="branch" class="text-lg font-semibold">Edit Subject ShortName</label>
          <input type="text" name="editShortname" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['SubjectShortname']; ?>">
     </div>
     <div class="py-2">
          <label for="branch" class="text-lg font-semibold">Edit Subject Code</label>
          <input type="text" name="editCode" class="w-full indent-2 p-2 outline-none border-2 border-gray-700 rounded-xl" value="<?php echo $row['SubjectCode']; ?>">
     </div>
<?php
     }
} else {
     echo "No Subject found";
}
?>
     <button type="submit" name="submitEdit" class="self-center px-[2rem] p-2 bg-[#1b20b6] text-white rounded-md my-[2rem]">Edit</button>
</form>
<?php
     }
?>
</body>
</html>