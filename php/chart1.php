<?php
include 'dbConnection.php';

$sql = "SELECT * FROM courses;";
$query = $connection->query($sql);
$totCourses = $query->num_rows;
 
$sql1 = "SELECT * FROM subjects;";
$query1 = $connection->query($sql1);
$totSubjects = $query1->num_rows;
 
$sql2 = "SELECT * FROM teacher;";
$quer2 = $connection->query($sql2);
$totTeachers = $quer2->num_rows;
 
$totalVisitors = $totCourses + $totSubjects + $totTeachers;

$newVsReturningVisitorsDataPoints = array(
	array("y"=> $totTeachers, "name"=> "Teachers", "color"=> "#495AED"),
	array("y"=> $totSubjects, "name"=> "Subjects", "color"=> "#070CF9"),
	array("y"=> $totCourses, "name"=> "Courses", "color"=> "#949FED")
); 

$newVisitorsDataPoints = array(
	array("x"=> 1420050600000 , "y"=> 33000),
	array("x"=> 1422729000000 , "y"=> 35960),
	array("x"=> 1425148200000 , "y"=> 42160),
	array("x"=> 1427826600000 , "y"=> 42240),
	array("x"=> 1430418600000 , "y"=> 43200),
	array("x"=> 1433097000000 , "y"=> 40600),
	array("x"=> 1435689000000 , "y"=> 42560),
	array("x"=> 1438367400000 , "y"=> 44280),
	array("x"=> 1441045800000 , "y"=> 44800),
	array("x"=> 1443637800000 , "y"=> 48720),
	array("x"=> 1446316200000 , "y"=> 50840),
	array("x"=> 1448908200000 , "y"=> 51600)
);
 
$returningVisitorsDataPoints = array(
	array("x"=> 1420050600000 , "y"=> 22000),
	array("x"=> 1422729000000 , "y"=> 26040),
	array("x"=> 1425148200000 , "y"=> 25840),
	array("x"=> 1427826600000 , "y"=> 23760),
	array("x"=> 1430418600000 , "y"=> 28800),
	array("x"=> 1433097000000 , "y"=> 29400),
	array("x"=> 1435689000000 , "y"=> 33440),
	array("x"=> 1438367400000 , "y"=> 37720),
	array("x"=> 1441045800000 , "y"=> 35200),
	array("x"=> 1443637800000 , "y"=> 35280),
	array("x"=> 1446316200000 , "y"=> 31160),
	array("x"=> 1448908200000 , "y"=> 34400)
);
?>