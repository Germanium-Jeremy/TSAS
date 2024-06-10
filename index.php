<?php
include('php/dbConnection.php');
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
<header class="flex justify-between fixed top-0 right-0 left-0 p-[.5rem] px-[3rem] max-sm:px-[.3rem] bg-white">
     <a href="./" class="text-2xl text-transparent font-bold bg-gradient-to-l from-[#0c0e50] to-[#1b20b6] bg-clip-text">TSAS</a>
     <div class="flex gap-[1rem]">
          <a href="./pages/login.php" class="button text-lg">Admin</a>
          <a href="./pages/signup.php" class="button text-lg">Create Account</a>
     </div>
</header>
<main class="bg-img w-full h-fit mt-[3rem] p-[2rem] flex flex-col justify-center items-center gap-[2rem]">
     <h2 class="text-white text-xl font-semibold w-3/4 max-md:w-full text-center">
          Our web-based Teacher's Subject Allocation System is designed to streamline and optimize the 
          process of assigning subjects to teachers in an educational institution. With this system, 
          we aim to efficiently allocate subjects to teachers based on their qualifications, expertise, 
          and availability, ensuring a balanced and fair distribution of teaching responsibilities.
     </h2>
     <form class="flex w-3/5 max-md:w-full bg-slate-400 rounded-md overflow-hidden" method="post">
          <input type="search" name="search" class="w-full p-2 text-black indent-[1rem] outline-none" placeholder="Search teacher by name or emp id" >
          <button type="submit" class="button">Search</button>
     </form>
</main>

<section class="flex flex-col justify-center items-center p-[2rem] my-[2rem]">
<?php
if (isset($_POST['search'])) {
     $searched = $_POST['search'];
     if (!empty($searched)) {
          showsearch($searched);
     } else {
          echo '<script>alert("No data to search")</script>';
     }
}
function showsearch($searched) {
     global $connection;
     $sql = "SELECT t.*, a.*, s.* FROM teacher AS t JOIN subAllocation AS a ON t.ID = a.TeacherID JOIN subjects AS s ON a.SubjectID = s.ID 
             WHERE t.FirstName LIKE '%$searched%' OR t.LastName LIKE '%$searched%' OR t.Email LIKE '%$searched%' 
             OR s.SubjectFullname LIKE '%$searched%' OR a.AllocationDate LIKE '%$searched%';";
     $result = $connection->query($sql);
?>
          <table class="text-center bg-white overflow-y-auto w-3/4 max-md:w-full rounded-lg shadow-md">
               <thead class="">
                    <tr class="shadow-bottom text-white max-sm:text-sm max-[440px]:text-[13px] bg-gradient-to-l from-[#0c0e50] to-[#1b20b6]">
                         <th class="py-[1rem] max-[440px]:py-[.2rem]">Teacher Names</th>
                         <th class="py-[1rem] max-[440px]:py-[.2rem]">Teacher Email</th>
                         <th class="py-[1rem] max-[440px]:py-[.2rem]">Subjects Taught</th>
                    </tr>
               </thead>
               <tbody>
<?php
if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
?>
                    <tr class="shadow-bottom max-sm:text-sm">
                         <td class="py-[.5rem]"><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
                         <td class="py-[.5rem]"><?php echo $row['Email']; ?></td>
                         <td class="py-[.5rem]"><?php echo $row['SubjectFullname']; ?></td>
                    </tr>
<?php
     }
} else {
?>
                    <tr class="shadow-bottom">
                         <td colspan='3' class="py-[.5rem]">No Results Found</td>
                    </tr>
<?php
}
?>
               </tbody>
          </table>
<?php
}
?>
</section>
<main class="my-[3rem] p-[1rem]">
<?php
$sql1 = "SELECT s.SubjectShortname, s.CourseID, c.Branch_Name FROM subjects AS s, courses AS c WHERE c.ID = s.CourseID;";
$result1 = $connection->query($sql1);
if ($result1->num_rows > 0){
?>
          <h2 class="text-black text-xl font-semibold text-center mb-[2rem]">We Teach The This Subjects</h2>
          <div class="grid lg:grid-cols-4 max-lg:grid-cols-3 max-md:grid-cols-2 max-sm:grid-cols-1 justify-center items-center gap-[2rem] px-[1rem]">
<?php
     while ($row1 = $result1->fetch_assoc()){
?>
               <article class="rounded-md bg-white flex flex-col p-[1rem] justify-center max-sm:px-[2rem] shadow-md">
                    <h3>Subject: <?php echo $row1['SubjectShortname'] ?></h3>
                    <h3>Branch: <?php echo $row1['Branch_Name'] ?></h3>
               </article>
<?php
     }
?>
          </div>
<?php
} else {
?>
     <h2 class="text-black text-xl font-semibold text-center">There are no subjects yet!</h2>
<?php
}
?>
</main>
     <img src="./images/images.png" alt="Clouds" class="fixed -z-10 top-[1cm] left-[78%]">
     <img src="./images/images.png" alt="Clouds" class="fixed -z-10 bottom-20 left-[3%]">
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