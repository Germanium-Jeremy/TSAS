<?php
include('../php/dbConnection.php');

$table = 'Subjects';

if (isset($_POST['save'])) {
     $course = $_POST['course'];
     $subject = $_POST['subject'];
     $short = $_POST['short'];
     $code = $_POST['code'];
     $sql3 = "INSERT INTO subjects (CourseID, SubjectFullname, SubjectShortname, SubjectCode) VALUES ('$course', '$subject', '$short', '$code')";
     if ($query3 = $connection ->query($sql3)) {
          echo "<script>alert('Subject Added Successfully')</script>";
     } else {
          echo "<script>alert('Subject Added Unsuccessfully')</script>";
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
     <script defer src="../scripts/deleteFunction.js"></script>
     <title>TSAS DASHBOARD SUBJECT</title>
</head>
<body class="flex flex-row justify-center bg-slate-300 h-screen w-full">
     <aside class="h-full w-1/5 bg-slate-100 p-4 py-[2rem]">
          <div class="bg-white p-2 flex">
               <img src="../images/vector.png" class="w-8 h-full" alt="User">
               <span class="text-gray-500 mx-auto my-auto">TSAS Admin</span>
          </div>
          <div class="flex flex-col justify-center py-[2rem]">
               <h2 class="p-2 px-5 text-gray-500">MENU</h2>
               <div class="text-gray-500">
                    <a href="./" class="py-2 px-5 block hover:bg-gray-200">
                         <i class='bx bxs-copy'></i>
                         <span class="px-3">Dashbord</span>
                    </a>
                    <a href="./courses.php" class="py-2 px-5 block hover:bg-gray-200">
                         <i class='bx bx-cart'></i>
                         <span class="px-3">Courses</span>
                    </a>
                    <a href="./subject.php" class="py-2 px-5 block hover:bg-gray-200 bg-[#add4]">
                         <i class='bx bx-detail'></i>
                         <span class="px-3">Subject</span>
                    </a>
               </div>
          </div>
          <div class="flex flex-col justify-center">
          <h2 class="p-2 px-3 text-gray-500 text-xs">OTHERS</h2>
               <div class="text-gray-500 relative">
                    <button class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#add4] relative" id="teacherDrop">
                         <i class='bx bx-user' id="drop"></i>
                         <span class="px-3">Teacher</span>
                         <div class="hidden flex-col text-left absolute left-[5rem] -top-[-30px] w-[10rem] bg-slate-50" id="teacherCont">
                              <a href="./addTeacher.php" class="p-1 hover:bg-gray-200">Add Teacher</a>
                              <a href="./management.php" class="p-1 hover:bg-gray-200">Teacher Management</a>
                         </div>
                    </button>
                    <a href="./subAllocation.php" class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#add4]">
                         <i class='bx bx-user'></i>
                         <span class="px-3">Subject Allocation</span>
                    </a>
               </div>
          </div>
     </aside>
     <main class="w-full h-full p-4 flex flex-col justify-center relative">
          <header class="flex justify-between absolute left-[1rem] right-[1rem] top-0 bg-white p-2 text-gray-500">
               <div>Dashbord</div>
               <div>Dashbord/<span>Subject</span></div>
          </header>
          <div class="flex flex-row w-full h-full mt-[2rem] gap-[1rem]">
               <div class="w-2/3 h-full rounded-2xl flex justify-center p-4">
                    <form method="post" class="bg-white w-full h-fit py-3 rounded-2xl shadow-2xl">
                         <div class="px-[2rem] py-2 w-full">
                              <h1 class="text-[#273240] text-center text-2xl font-bold">Create a new subject</h1>
                         </div>
                         <div class="px-[2rem] py-2 w-full">
                              <label class="text-md font-semibold">Course Name</label>
                              <select name="course"  class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
     <?php
     $sql2 = "SELECT * FROM courses";
     $query2 = $connection->query($sql2);
     if ($query2->num_rows > 0) {
          while ($row = $query2->fetch_assoc()) {
     ?>
                                  <option value="<?php echo $row['ID']; ?>"><?php echo $row['Course_Name']; ?></option>
     <?php
          }
     } else {
          echo "No Subject found";
     }
     ?>
                              </select>
                         </div>

                         <div class="px-[2rem] py-2 w-full">
                              <label class="text-md font-semibold">Subject full name</label>
                              <select name="subject"  class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
     <?php
     $sql2 = "SELECT * FROM courses";
     $query2 = $connection->query($sql2);
     if ($query2->num_rows > 0) {
          while ($row = $query2->fetch_assoc()) {
     ?>
                                  <option value="<?php echo $row['Course_Name']; ?>"><?php echo $row['Course_Name']; ?></option>
     <?php
          }
     } else {
          echo "No Subject found";
     }
     ?>
                              </select>
                         </div>
                         <div class="px-[2rem] py-2 w-full">
                              <label class="text-md font-semibold">Subject short name </label>
                              <input type="text" name="short" class="w-full p-2 indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
                         </div>
                         <div class="px-[2rem] py-2 w-full">
                              <label class="text-md font-semibold">Subject code</label>
                              <input type="text" name="code" class="w-full p-2 indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
                         </div>
                         <div class="w-full flex justify-between px-[2rem] py-2">
                              <button type="submit" name="save" class="px-[1rem] py-1 bg-[#1b20b6] text-white rounded-lg">Save</button>
                              <button type="reset" class="px-[1rem] py-1 bg-gray-600 text-white rounded-lg">Reset</button>
                         </div>
                    </form>
               </div>
               <div class="w-full h-full max-h-[17cm] rounded-2xl bg-white p-[1rem] self-center overflow-y-auto">
                    <h2 class="text-xl font-bold indent-[3rem] py-2">All subjects</h2>
                    <table class="w-full h-fit text-center">
                         <thead class="">
                              <tr class="shadow-bottom">
                                   <th class="py-[1rem]">S.no</th>
                                   <th class="py-[1rem]">C.Name</th>
                                   <th class="py-[1rem]">S.fullName</th>
                                   <th class="py-[1rem]">S.shortName</th>
                                   <th class="py-[1rem]">sub.code</th>
                                   <th class="py-[1rem]">Action</th>
                              </tr>
                         </thead>
                         <tbody>
<?php
$sql1 = "SELECT s.*, c.Course_Name FROM subjects AS s, courses AS c WHERE s.CourseID = c.ID ORDER BY s.ID DESC;";
$query1 = $connection->query($sql1);
if ($query1->num_rows > 0) {
     while ($row = $query1->fetch_assoc()) {
?>
                              <tr class="shadow-bottom">
                                   <td class="py-[.5rem]"><?php echo $row['ID']; ?></td>
                                   <td class="py-[.5rem]"><?php echo $row['Course_Name']; ?></td>
                                   <td class="py-[.5rem]"><?php echo $row['SubjectFullname']; ?></td>
                                   <td class="py-[.5rem]"><?php echo $row['SubjectShortname']; ?></td>
                                   <td class="py-[.5rem]"><?php echo $row['SubjectCode']; ?></td>
                                   <td class="py-[.5rem]">
                                        <button class="inline p-1 text-blue-500" onclick="showEditForm(<?php echo $row['ID'] ?>,'subject')"><i class='bx bx-edit text-xl'></i></button> 
                                        <button onclick="deleteRecord(<?php echo $row['ID'] . ', \'' . $table . '\''; ?>)"><i class='bx bx-x rounded-full text-white bg-red-500 p-[5px]'></i></button> 
                                   </td>
                              </tr>
<?php
     }
} else {
     echo "No Subject found";
}
?>
                         </tbody>
                    </table>
               </div>
          </div>
     </main>
</body>
</html>