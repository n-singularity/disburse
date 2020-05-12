<?php
require_once __DIR__ . '/vendor/autoload.php';

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "testDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE `testDb`.`disburses` (
  `id` INT NOT NULL,
  `amount` DECIMAL NULL,
  `status` VARCHAR(45) NULL,
  `timestamp` DATETIME NULL,
  `bank_code` VARCHAR(45) NULL,
  `account_number` VARCHAR(45) NULL,
  `beneficiary_name` VARCHAR(45) NULL,
  `remark` VARCHAR(255) NULL,
  `receipt` VARCHAR(255) NULL,
  `time_served` DATETIME NULL,
  `fee` DECIMAL NULL,
  PRIMARY KEY (`id`));
";

if ($conn->query($sql) === TRUE) {
    echo "migration success\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."\n";
}

$conn->close();
