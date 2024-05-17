<?php
include('../php/dbConnection.php');
$table = 'teacher';
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
     <title>TSAS DASHBOARD TEACHER MANAGEMENT</title>
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
                    <button class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#add4] relative bg-[#add4]" id="teacherDrop">
                         <i class='bx bx-user' id="drop"></i>
                         <span class="px-3">Teacher</span>
                         <div class="hidden flex-col text-left absolute left-[5rem] -top-[-30px] w-[10rem] bg-slate-50" id="teacherCont">
                              <a href="./addTeacher.php" class="p-1 hover:bg-gray-200">Add Teacher</a>
                              <a href="./management.php" class="p-1 hover:bg-gray-200 bg-[#add4]">Teacher Management</a>
                         </div>
                    </button>
                    <a href="./subAllocation.php" class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#aee4]">
                         <i class='bx bx-user'></i>
                         <span class="px-3">Subject Allocation</span>
                    </a>
               </div>
          </div>
     </aside>
     <main class="w-full h-full p-4 flex flex-col justify-center relative">
          <header class="flex justify-between absolute left-[1rem] right-[1rem] top-0 bg-white p-2 text-gray-500">
               <div>Dashbord</div>
               <div>Dashbord/<span>Teacher Management</span></div>
          </header>
          <div class="flex flex-row w-full h-full mt-[2rem] gap-[1rem]">
          <div class="w-full h-full rounded-2xl bg-white p-[2rem] max-h-[17.3cm] overflow-y-auto">
                    <h2 class="text-xl font-bold indent-[3rem] py-3">Manage Teachers</h2>
                    <table class="w-full h-fit text-center pt-[3rem]">
                         <thead class="">
                              <tr class="shadow-bottom">
                                   <th class="py-[1rem]">S.no</th>
                                   <th class="py-[1rem]">Teacher Name</th>
                                   <th class="py-[1rem]">Mobile Number</th>
                                   <th class="py-[1rem]">Email</th>
                                   <th class="py-[1rem]">Gender</th>
                                   <th class="py-[1rem]">BirthDate</th>
                                   <th class="py-[1rem]">Joining Date</th>
                                   <th class="py-[1rem]">Action</th>
                              </tr>
                         </thead>
                         <tbody>
<?php
$sql1 = "SELECT * FROM teacher ORDER BY ID DESC;";
$query1 = $connection->query($sql1);
if ($query1->num_rows > 0) {
     while ($row = $query1->fetch_assoc()) {
?>
                              <tr class="shadow-bottom">
                                   <td class="py-[1rem]"><?php echo $row['ID']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['MobileNumber']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['Email']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['Gender']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['Dob']; ?></td>
                                   <td class="py-[1rem]"><?php echo $row['JoiningDate']; ?></td>
                                   <td class="py-[1rem]">
                                        <button class="inline px-2 py-1 rounded-lg text-white bg-green-700" onclick="showEditForm(<?php echo $row['ID'] ?>,'teacher')">Edit Details</button> 
                                   </td>
                              </tr>
<?php
     }
} else {
     echo "No teachers found";
}
?>
                         </tbody>
                    </table>
               </div>
          </div>
     </main>
</body>
</html>