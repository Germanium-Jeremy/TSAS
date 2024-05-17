<?php
include('../php/dbConnection.php');

if(isset($_POST['save'])) {
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $tel = $_POST['tel'];
     $email = $_POST['email'];
     $gender = $_POST['gender'];
     $date = $_POST['date'];
     $religion = $_POST['religion'];
     $address = $_POST['address'];
     $sql ="INSERT INTO teacher (FirstName, LastName, MobileNumber, email, Gender, Dob, Religion, Address) VALUES ('$fname', '$lname', '$tel', '$email', '$gender', '$date', '$religion', '$address');";
     if($query=$connection->query($sql)) {
          echo "<script>alert('Teacher Added Successfully')</script>";
     } else {
          echo "<script>alert('Teacher Added unSuccessfully');</script>";
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
     <title>TSAS DASHBOARD ADD TEACHER</title>
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
                              <a href="./addTeacher.php" class="p-1 hover:bg-gray-200 bg-[#add4]">Add Teacher</a>
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
               <div>Dashbord/<span>Teacher Management</span></div>
          </header>
          <form method="post" class="flex flex-col w-full h-full mt-[2rem] bg-white p-[2rem]">
               <h1 class="text-xl font-bold">Add Teacher</h1>
               <div class="grid w-full h-fit gap-5 p-2 py-[2rem]" style="grid-template-columns: repeat(auto-fill, minmax(250px , 1fr));">
                    <div class=''>
                         <label class='block'>First Name</label>
                         <input type="text" required class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]" placeholder="John" name="fname">
                    </div>
                    <div class=''>
                         <label class='block'>Last Name</label>
                         <input type="text" required class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]" placeholder="Doe" name="lname">
                    </div>
                    <div class=''>
                         <label class='block'>Mobile Number</label>
                         <input type="tel" required class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]" placeholder="0790 000 000" name="tel">
                    </div>
                    <div class=''>
                         <label class='block'>Email</label>
                         <input type="email" required class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]" placeholder="email@example.com" name="email">
                    </div>
                    <div class=''>
                         <label class='block'>Gender</label>
                         <select name="gender" class="bg-gray-200 w-full" required>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                         </select>
                    </div>
                    <div class=''>
                         <label class='block'>Birth of Date</label>
                         <input type="date" required name="date" class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]">
                    </div>
                    <div class=''>
                         <label class='block'>Religion</label>
                         <select required name="religion" class="bg-gray-200 w-full rounded-sm outline-none indent-[1rem]">
                              <option value="Catholic">Catholics</option>
                              <option value="Adventist">Adventist</option>
                              <option value="Protestant">Protestant</option>
                              <option value="Muslim">Muslim</option>
                              <option value="Anglican">Anglican</option>
                              <option value="Other">Other</option>
                         </select>
                    </div>
                    <div class=''>
                         <label class='block'>Address</label>
                         <input required type="text" name="address" class="bg-gray-200 w-full p-2 rounded-sm outline-none indent-[1rem]" placeholder="Kigali, Nyamirambo">
                    </div>
               </div>
               <div>
                    <div class="mb-[1rem]">
                         <p class="mb-[1rem]">Upload Teacher Photo &#40;150 &times; 150&#41;</p>
                         <input type="file" name="profile" >
                    </div>
                    <div class="w-1/3 flex justify-between">
                         <button type="submit" name="save" class='px-4 py-1 bg-red-500 text-white rounded-md'>Save</button>
                         <button type="reset" class="px-4 py-1 bg-gray-600 text-white rounded-md">Reset</button>
                    </div>
               </div>
          </form>
     </main>
</body>
</html>