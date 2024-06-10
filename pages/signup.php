<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sign Up</title>
</head>
<body>
     


     <?php
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
?>
          <table class="text-center bg-white overflow-y-auto w-3/4 max-md:w-full rounded-lg shadow-md">
               <thead class="px-5">
                    <tr class="shadow-bottom text-white bg-gradient-to-l from-[#0c0e50] to-[#1b20b6] px-[5px]">
                         <th class="py-[1rem]">Teacher Names</th>
                         <th class="py-[1rem]">Teacher Email</th>
                         <th class="py-[1rem]">Subjects Taught</th>
                    </tr>
               </thead>
               <tbody>
<?php
          if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
?>
                 
<?php
         }
?>
             
<?php
     } else {
?>
          <tr class="shadow-bottom">
               <td colspan='3' class="py-[.5rem]">No Results Found</td>
          </tr>
<?php
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




</body>
</html>