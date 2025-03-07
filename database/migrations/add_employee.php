<?php
// Database connection
$host = 'localhost';
$dbname = 'leavesysdb';
$username = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $gender = $_POST['Gender'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $departmentID = $_POST['DepartmentID'];
    $gradeID = $_POST['GradeID'];
    $positionID = $_POST['PositionID'];
    $supervisorID = !empty($_POST['SupervisorID']) ? $_POST['SupervisorID'] : null; // Optional

    // Insert into employees table
    $sql = "INSERT INTO employees (FirstName, LastName, Gender, DateOfBirth, DepartmentID, GradeID, PositionID, SupervisorID) 
            VALUES (:FirstName, :LastName, :Gender, :DateOfBirth, :DepartmentID, :GradeID, :PositionID, :SupervisorID)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':FirstName' => $firstName,
            ':LastName' => $lastName,
            ':Gender' => $gender,
            ':DateOfBirth' => $dateOfBirth,
            ':DepartmentID' => $departmentID,
            ':GradeID' => $gradeID,
            ':PositionID' => $positionID,
            ':SupervisorID' => $supervisorID,
        ]);
        echo "Employee added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
