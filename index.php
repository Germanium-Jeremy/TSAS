<?php
include('php/dbConnection.php');
function showsearch($searched) {
     global $connection;
     $sql = "SELECT t.*, a.*, s.* 
             FROM teacher AS t 
             JOIN subAllocation AS a ON t.ID = a.TeacherID 
             JOIN subjects AS s ON a.SubjectID = s.ID 
             WHERE t.FirstName LIKE '%$searched%' 
             OR t.LastName LIKE '%$searched%' 
             OR t.Email LIKE '%$searched%' 
             OR s.SubjectFullname LIKE '%$searched%' 
             OR a.AllocationDate LIKE '%$searched%';";
     $result = $connection->query($sql);
     if ($result->num_rows > 0) {
 ?>
         <table class="w-full max-h-3/4 h-fit text-center pt-[3rem] fixed bottom-0 bg-white z-[7] overflow-y-auto" id="results">
             <thead class="relative">
                 <tr class="shadow-bottom">
                     <th class="py-[1rem]">S.no</th>
                     <th class="py-[1rem]">Teacher Names</th>
                     <th class="py-[1rem]">Teacher Email</th>
                     <th class="py-[1rem]">Subjects Taught</th>
                     <th class="py-[1rem]">Allocation Date</th>
                 </tr>
             </thead>
             <tbody>
<?php
         while ($row = $result->fetch_assoc()) {
?>
                 <tr class="shadow-bottom">
                     <td class="py-[.5rem]"><?php echo $row['ID']; ?></td>
                     <td class="py-[.5rem]"><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
                     <td class="py-[.5rem]"><?php echo $row['Email']; ?></td>
                     <td class="py-[.5rem]"><?php echo $row['SubjectFullname']; ?></td>
                     <td class="py-[.5rem]"><?php echo $row['AllocationDate']; ?></td>
                 </tr>
<?php
         }
?>
             </tbody>
         </table>
<?php
     } else {
         echo '<p class="text-center p-[1rem] bg-red-600 text-2xl">No Results Found</p>';
     }
}
if (isset($_POST['search'])) {
     $searched = $_POST['search'];
     if (!empty($searched)) {
          showsearch($searched);
     } else {
          echo '<script>alert("No data to search")</script>';
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./styles/style.css">
     <link rel="shortcut icon" href="./images/tsas.png" type="image/x-icon">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://cdn.tailwindcss.com"></script>
     <script defer src="./scripts/script.js"></script>
     <script defer src="./scripts/deleteFunction.js"></script>
     <title>TSAS</title>
</head>
<body class="bg-[#eee] h-fit w-screen">
<div class="z-[5] w-full h-[10vh] mb-[2rem]">
     <header class="px-8 py-3 w-1/2 flex flex-row justify-between float-right">
          <div class="px-6 py-1 bg-[#1b20b6] rounded-3xl font-bold text-md text-white"><a href="./">Home</a></div>
          <div class="px-6 py-1 rounded-3xl font-bold text-md"><a href="./pages/login.php">Login</a></div>
     </header>
</div>
<div class="w-full h-[6vh] relative py-2 z-[2]">
     <form class="rounded-2xl w-1/2 p-1 flex bg-gradient-to-l from-[#0c0e50] to-[#1b20b6] absolute right-[3rem]" method="post">
          <i class='bx bx-search-alt-2' style="color: white; font-size: 1rem; font-weight: bold; padding: .5rem"></i>
          <input type="search" name="search" placeholder="Search teacher by name or emp id" class="w-full border-none indent-7 bg-transparent outline-none text-white active:bg-transparent">
     </form>
</div>
     <img src="./images/images.png" alt="Clouds" class="fixed -z-10 -top-[1.25cm] left-[18%]">
     <img src="./images/images.png" alt="Clouds" class="fixed -z-10 bottom-20 left-[3%]">
<main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 py-[2cm]">
     <div class="relative -top-[4cm] ml-[2cm]">
          <img src="./images/comp.png" alt="Comp" class="w-[14cm] h-[8cm]">
          <img src="./images/bebi.png" alt="Comp" class="w-[6cm] h-[7cm] absolute -top-[1cm] z-[-1]">
          <img src="./images/blackbord.png" alt="Comp" class="w-[8cm] h-[5cm] absolute -top-0 left-[6cm]">
          <span class="text-white font-bold text-2xl absolute top-[2cm] left-[9cm]">TSAS</span>
     </div>
     <div class="relative w-full right-[2cm] border-4 border-[#1b20b6] rounded-[1cm] bg-gray-300 p-3 flex flex-col justify-center items-center">
          <h1 class="text-center text-2xl text-transparent bg-clip-text font-bold bg-gradient-to-t from-[#0c0e50] to-[#1b20b6]">TSAS</h1>
          <h3 class="text-[#1b20b6] text-center font-bold">Welcome to our Teacher's Subject Allocation System!</h3>
          <p class="text-center">Our web-based Teacher's Subject Allocation System is designed to streamline and optimize the 
               process of assigning subjects to teachers in an educational institution. With this 
               system, we aim to efficiently allocate subjects to teachers based on their qualifications, 
               expertise, and availability, ensuring a balanced and fair distribution of teaching responsibilities.
          </p>
          <a href="./pages/login.php" class="px-3 p-1 text-white font-bold bg-gradient-to-l from-[#0c0e50] to-[#1b20b6] rounded-xl my-2">Continue</a>
     </div>
</main>
<footer class="bg-gradient-to-t from-[#0c0e50] to-[#1b20b6] px-8 py-1 text-white text-center">
     <div class="flex justify-between">
          <div class="text-center">
               <img src="./images/tsas.png" alt="TSAS" class="w-24 h-24">
          </div>
          <div class="text-center">
               <a href="#" class="text-white text-sm block leading-tight">Terms of Service</a>
               <a href="#" class="text-white text-sm block leading-tight">General Terms and Conditions</a>
               <a href="#" class="text-white text-sm block leading-tight">Privacy Policy</a>
               <a href="#" class="text-white text-sm block leading-tight">Cookie Policy</a>
               <a href="#" class="text-white text-sm block leading-tight">Imprint</a>
          </div>
          <div class="text-center flex flex-col">
               <span class="text-center">
                    <a href="#" class="text-white block">Email: teachconnect@gmail.com</a>
                    <a href="#" class="text-white block">Address: Rwanda , Nyabihu</a>
               </span>
               <span class="py-5 text-center text-white text-xl">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-xing'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
               </span>
          </div>
     </div>
     <a href="#">&copy; tsas.com , RCA teacher's system brand</a>
</footer>
</body>
</html>