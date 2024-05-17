<?php
include('../php/dbConnection.php');

$table = 'subAllocation';

if(isset($_POST['save'])) {
     $course = $_POST['course'];
     $teacher = $_POST['teacher'];
     $subject = $_POST['subject'];
     $sql ="INSERT INTO suballocation (CourseID, TeacherID, SubjectID) VALUES ($course, $teacher, $subject);";
     try {
          $query = $connection->query($sql);
          if ($query) {
              echo "<script>alert('Subject Allocation Successfully')</script>";
          } else {
              throw new Exception("Query execution failed");
          }
     } catch (Exception $e) {
          echo "<script>alert('Subject Allocation Unsuccessful: " . $e->getMessage() . "');</script>";
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
     <title>TSAS DASHBOARD SUBALLOCATION</title>
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
                    <a href="./subject.php" class="py-2 px-5 block hover:bg-gray-200">
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
                    <a href="./subAllocation.php" class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#aee4] bg-[#add4]">
                         <i class='bx bx-user'></i>
                         <span class="px-3">Subject Allocation</span>
                    </a>
               </div>
          </div>
     </aside>
     <main class="w-full h-full p-4 flex flex-col justify-center relative">
          <header class="flex justify-between absolute left-[1rem] right-[1rem] top-0 bg-white p-2 text-gray-500">
               <div>Dashbord</div>
               <div>Dashbord/<span>Subject Allocation</span></div>
          </header>
          <div class="flex flex-row w-full h-full mt-[2rem] gap-[1rem]">
               <div class="w-2/3 h-full rounded-2xl flex justify-center p-4">
                    <form method="post" class="bg-white w-full h-fit py-3 rounded-2xl shadow-2xl">
                         <div class="px-[2rem] py-3 w-full">
                              <h1 class="text-[#273240] text-center text-2xl font-bold">Subject Allocation</h1>
                         </div>
                         <div class="px-[2rem] py-3 w-full">
                              <label class="text-md font-semibold">Course Name</label>
                              <select name="course" class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
     <?php
     $sql2 = "SELECT * FROM courses";
     $query2 = $connection->query($sql2);
     if ($query2->num_rows > 0) {
          while ($row = $query2->fetch_assoc()) {
     ?>
                                   <option value="<?php echo $row['ID'] ?>"><?php echo $row['Course_Name']; ?></option>
     <?php
          }
     } else {
          echo "No teachers found";
     }
     ?>
                              </select>
                         </div>
                         <div class="px-[2rem] py-3 w-full">
                              <label class="text-md font-semibold">Teacher</label>
                              <select name="teacher" class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
     <?php
     $sql3 = "SELECT * FROM teacher";
     $query3 = $connection->query($sql3);
     if ($query3->num_rows > 0) {
          while ($row = $query3->fetch_assoc()) {
     ?>
                                   <option value="<?php echo $row['ID'] ?>"><?php echo $row['FirstName'].'&nbsp;'.$row['LastName']; ?></option>
     <?php
          }
     } else {
          echo "No teachers found";
     }
     ?>
                              </select>
                         </div>
                         <div class="px-[2rem] py-3 w-full">
                              <label class="text-md font-semibold">Subject</label>
                              <select name="subject" class="w-full indent-2 outline-none border-2 border-gray-700 rounded-xl" required>
     <?php
     $sql4 = "SELECT * FROM subjects";
     $query4 = $connection->query($sql4);
     if ($query4->num_rows > 0) {
          while ($row = $query4->fetch_assoc()) {
     ?>
                                   <option value="<?php echo $row['ID']; ?>"><?php echo $row['SubjectFullname']; ?></option>
     <?php
          }
     } else {
          echo "No teachers found";
     }
     ?>
                              </select>
                         </div>
                         <div class="w-full flex justify-between px-[2rem] py-3">
                              <button type="submit" name="save" class="px-[1rem] py-1 bg-[#1b20b6] text-white rounded-lg">Save</button>
                              <button type="reset" class="px-[1rem] py-1 bg-gray-600 text-white rounded-lg">Reset</button>
                         </div>
                    </form>
               </div>
               <div class="w-full min-w-[20cm] overflow-y-auto h-full max-h-[17.3cm] rounded-2xl bg-white px-[1rem] py-[2rem]">
                    <h2 class="text-xl font-bold indent-[3rem] py-3">All Subjects Allocations</h2>
                    <table class="w-full h-fit text-center pt-[3rem]">
                         <thead class="">
                              <tr class="shadow-bottom">
                                   <th class="py-[1rem]">S.no</th>
                                   <th class="py-[1rem]">Emplo.name</th>
                                   <th class="py-[1rem]">Course NAme</th>
                                   <th class="py-[1rem]">Subject Name</th>
                                   <th class="py-[1rem]">Allo.date</th>
                                   <th class="py-[1rem]">Action</th>
                              </tr>
                         </thead>
                         <tbody>
<?php
$sql1 = " SELECT c.Course_name, s.SubjectFullname, t.FirstName, t.LastName, a.ID, a.AllocationDate FROM courses AS c, subjects AS s, teacher AS t, suballocation AS a WHERE c.ID = a.CourseID AND t.ID = a.TeacherID AND s.ID = a.subjectID ORDER BY a.ID DESC;";
$query1 = $connection->query($sql1);
if ($query1->num_rows > 0) {
     while ($row = $query1->fetch_assoc()) {
?>
               <tr class="shadow-bottom">
                    <td class="py-[1rem]"><?php echo $row['ID']; ?></td>
                    <td class="py-[1rem]"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></td>
                    <td class="py-[1rem]"><?php echo $row['Course_name']; ?></td>
                    <td class="py-[1rem]"><?php echo $row['SubjectFullname']; ?></td>
                    <td class="py-[1rem] text-xs"><?php echo $row['AllocationDate']; ?></td>
                    <td class="py-[1rem]">
                         <button class="px-2 py-1 bg-red-600 text-white rounded-lg" onclick="deleteRecord(<?php echo $row['ID'] . ', \'' . $table . '\''; ?>)">Delete</button>
                    </td>
               </tr>
<?php
     }
} else {
     echo "No Subject Allication found";
}
?>
                         </tbody>
                    </table>
               </div>
          </div>
     </main>
</body>
</html>