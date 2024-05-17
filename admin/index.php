<?php
include('../php/dbConnection.php');
include('../php/chart1.php');
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
     <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
     <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
     <script defer src="../scripts/script.js"></script>
     <title>TSAS DASHBOARD HOME</title>
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
                    <a href="./" class="py-2 px-5 block hover:bg-gray-200 bg-[#add4]">
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
                    <a href="./subAllocation.php" class="hover:bg-gray-200 py-2 px-2 block hover:bg-[#add4]">
                         <i class='bx bx-user'></i>
                         <span class="px-3">Subject Allocation</span>
                    </a>
               </div>
          </div>
     </aside>
     <main class="w-full h-full p-4 flex flex-col justify-center relative">
          <header class="flex justify-between absolute top-0 left-[1rem] right-[1rem] bg-white p-2 px-5 text-gray-500">
               <div>Dashbord</div>
               <div>Dashbord/<span>Home</span></div>
          </header>
          <div class="grid grid-cols-2 w-full h-full mt-[3rem] gap-[1rem]">
               <div class="w-full h-full rounded-2xl bg-white px-[1rem] py-[.4rem] flex flex-col max-h-[10cm]">
                    <h2 class="text-2xl text-center font-bold mb-2">Over View</h2>
                    <div class="grid gap-3 items-center justify-center w-full" style="grid-template-columns: repeat(auto-fill, minmax(200px , 1fr));">
<?php
$sql1 = "SELECT * FROM courses;";
$query1 = $connection->query($sql1);
$totCourse = $query1->num_rows;
?>
                         <div class="w-11/12 h-fit rounded-xl bg-[#949FED] text-center py-1 px-4">
                              <i class='bx bxs-pear text-xl rounded-full text-blue-300 border-2 border-blue-300 p-2'></i>
                              <p class="text-xl">Courses</p>
                              <span><?php echo $totCourse; ?></span>
                         </div>
<?php
$sql2 = "SELECT * FROM teacher;";
$query2 = $connection->query($sql2);
$totTeachers = $query2->num_rows;
?>
                         <div class="w-11/12 h-fit rounded-xl bg-[#495AED] text-center py-1 px-4">
                              <i class='bx bxs-pear text-xl rounded-full text-blue-300 border-2 border-blue-300 p-2'></i>
                              <p class="text-xl">Teachers</p>
                              <span><?php echo $totTeachers; ?></span>
                         </div>
<?php
$sql3 = "SELECT * FROM subjects;";
$query3 = $connection->query($sql3);
$totSubjects = $query3->num_rows;
?>
                         <div class="w-11/12 h-fit rounded-xl bg-[#070CF9] text-center py-1 px-4">
                              <i class='bx bxs-pear text-xl rounded-full text-blue-300 border-2 border-blue-300 p-2'></i>
                              <p class="text-xl">Subjects</p>
                              <span><?php echo $totSubjects; ?></span>
                         </div>
                    </div>
               </div>
               <div class="w-full h-full rounded-2xl bg-white">
                    <div>
                         <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
               </div>
               <div class="w-full h-full max-h-[7cm] rounded-2xl bg-white p-3 overflow-y-auto">
                    <h1 class='text-xl font-bold indent-6'>Recently Added Teachers</h1>
                    <table class="w-full h-fit text-center">
<?php
$sql4 = "SELECT t.firstname, t.lastname, c.branch_name, c.course_name, a.ID FROM teacher as t, courses as c, suballocation as a WHERE a.CourseID = c.ID AND a.TeacherID = t.ID ORDER BY a.ID DESC LIMIT 2;";
$query4 = $connection->query($sql4);
if ($query4->num_rows > 0) {
     while ($row = $query4->fetch_assoc()) {
?>
          <tr class="shadow-bottom">
               <td class="py-[1rem]"><img src="../images/Vector.png" alt="Image" class="w-10 h-6"></td>
               <td class="py-[1rem]"><span><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></span></td>
               <td class="py-[1rem]"><?php echo $row['branch_name']; ?></td>
               <td class="py-[1rem]"><?php echo $row['course_name'] ?></td>
          </tr>
<?php
     }
} else {
     echo "No New Teacher Added";
}
?>
                    </table>
               </div>
               <div class="w-full h-10/12 max-h-[7cm] rounded-2xl bg-white px-[2rem] p-[1rem]">
                    <span class="w-4/5 h-full"><img class="w-full h-full" src="../images/Order.jpg" alt=""></span>
               </div>
          </div>
     </main>
     <script>
window.onload = function () {
 
var totalVisitors = <?php echo $totalVisitors ?>;
var visitorsData = {
	"TSAS SOCIETY": [{
		click: visitorsChartDrilldownHandler,
		cursor: "pointer",
		explodeOnClick: false,
		innerRadius: "75%",
		legendMarkerType: "square",
		name: "TSAS SOCIETY",
		radius: "100%",
		showInLegend: true,
		startAngle: 90,
		type: "doughnut",
		dataPoints: <?php echo json_encode($newVsReturningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}],
	"New Visitors": [{
		color: "#E7823A",
		name: "New Visitors",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($newVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}],
	"Returning Visitors": [{
		color: "#546BC1",
		name: "Returning Visitors",
		type: "column",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($returningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
	}]
};
 
var newVSReturningVisitorsOptions = {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "TSAS SOCIETY"
	},
	legend: {
		fontFamily: "calibri",
		fontSize: 14,
		itemTextFormatter: function (e) {
			return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";  
		}
	},
	data: []
};
 
var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
chart.options.data = visitorsData["TSAS SOCIETY"];
chart.render();
 
function visitorsChartDrilldownHandler(e) {
	chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
	chart.options.data = visitorsData[e.dataPoint.name];
	chart.options.title = { text: e.dataPoint.name }
	chart.render();
	$("#backButton").toggleClass("invisible");
}
}
</script>
</body>
</html>