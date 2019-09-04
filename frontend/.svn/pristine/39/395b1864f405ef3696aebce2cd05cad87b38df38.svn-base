<?php
header("Content-Type: text/html;charset=utf-8");

$con = mysqli_connect("localhost", "root", "root");

if (mysqli_connect_error()) {
    die("数据库连接失败: " . mysqli_connect_error());
}

mysqli_select_db($con, "student");

mysqli_set_charset($con, "utf8");

$queryOne = "select * from pre_student where age >= 20";
$resultOne = mysqli_query($con, $queryOne);

function showStudent($result){
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["student_name"]."  ".$row["age"];
        echo "<br>";
    }
}

showStudent($resultOne);

$queryTwo = "select * from pre_student where student_id >=5 and student_id <=10";
$resultTwo = mysqli_query($con, $queryTwo);

echo "<br>";
showStudent($resultTwo);

$queryThree = "select max(score) from score where subject_id = 2";
$resultThree = mysqli_query($con, $queryThree);

while ($row = mysqli_fetch_assoc($resultThree)) {
    echo "<br>";
    echo $row["max(score)"];
    echo "<br>";
}

$queryFour = "select min(score) from score where subject_id = 2";
$resultFour = mysqli_query($con, $queryFour);

while ($row = mysqli_fetch_assoc($resultFour)) {
    echo "<br>";
    echo $row["min(score)"];
    echo "<br>";
}

$queryFive = "select * from pre_student where student_name like '%张%'";
$resultFive = mysqli_query($con, $queryFive);

echo "<br>";
showStudent($resultFive);

$querySix = "select count(department_id) from department";
$resultSix = mysqli_query($con, $querySix);

while ($row = mysqli_fetch_assoc($resultSix)) {
    echo "<br>";
    echo $row["count(department_id)"];
    echo "<br>";
}

$querySeven = "select avg(score) from score where subject_id = 2";
$resultSeven = mysqli_query($con, $querySeven);

while ($row = mysqli_fetch_assoc($resultSeven)) {
    echo "<br>";
    echo $row["avg(score)"];
    echo "<br>";
}

$queryEight = "select avg(score) from score where student_id = 1";
$resultEight = mysqli_query($con, $queryEight);

while ($row = mysqli_fetch_assoc($resultEight)) {
    echo "<br>";
    echo $row["avg(score)"];
    echo "<br>";
}

function showSum($con, $subject){
    $queryNine = "select sum(score) from score where subject_id = ".$subject;
    $resultNine = mysqli_query($con, $queryNine);

    while ($row = mysqli_fetch_assoc($resultNine)) {
        echo "<br>";
        echo $row["sum(score)"];
        echo "<br>";
    }
}

showSum($con, 1);
showSum($con, 2);
showSum($con, 3);

$queryTen = "select student_name from pre_student where age = 18";
$resultTen = mysqli_query($con, $queryTen);

while ($row = mysqli_fetch_assoc($resultTen)) {
    echo "<br>";
    echo $row["student_name"];
    echo "<br>";
}

$queryEleven = "select subject_name, credit, score from pre_student, score, subject where pre_student.student_id = score.student_id 
and subject.subject_id = score.subject_id and student_name = '张学友'";
$resultEleven = mysqli_query($con, $queryEleven);

while ($row = mysqli_fetch_assoc($resultEleven)){
    echo "<br>";
    echo $row["subject_name"]."  ".$row["credit"]."  ".$row["score"];
    echo "<br>";
}

$queryTwelve = "select count(*) from score, subject where score.subject_id = subject.subject_id and subject_name = '数学'";
$resultTwelve = mysqli_query($con, $queryTwelve);

while ($row = mysqli_fetch_assoc($resultTwelve)){
    echo "<br>";
    echo $row["count(*)"];
    echo "<br>";
}

$queryThirdteen = "select student_name from pre_student, department where pre_student.department_id = department.department_id and department_name = '计算机'";
$resultThirdteen = mysqli_query($con, $queryThirdteen);

echo "<br>";
while ($row = mysqli_fetch_assoc($resultThirdteen)){
    echo $row["student_name"];
    echo "<br>";
}

$queryFourteen = "select pre_student.student_id, student_name, subject_name, score from pre_student, score, department, subject where pre_student.student_id = score.student_id
and pre_student.department_id = department.department_id and score.subject_id = subject.subject_id and department_name = '计算机' and type = '选修' order by student_id";
$resultFourteen = mysqli_query($con, $queryFourteen);

echo "<br>";
while ($row = mysqli_fetch_assoc($resultFourteen)){
    echo $row["student_id"]."  ".$row["student_name"]."  ".$row["subject_name"]."  ".$row["score"];
    echo "<br>";
}

$queryFifteen = "select student_name from pre_student where student_id = (select max(student_id) from pre_student where student_id < 8)";
$resultFifteen = mysqli_query($con, $queryFifteen);

while ($row = mysqli_fetch_assoc($resultFifteen)){
    echo "<br>";
    echo $row["student_name"];
    echo "<br>";
}

$querySixteen = "select student_name from pre_student where student_id = (select min(student_id) from pre_student where student_id > 8)";
$resultSixteen = mysqli_query($con, $querySixteen);

while ($row = mysqli_fetch_assoc($resultSixteen)){
    echo "<br>";
    echo $row["student_name"];
    echo "<br>";
}

mysqli_close($con);