<?php
require_once('php/database.php');

// Get IDs
$student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);

// Delete the Student from the database
if ($student_id != false && $room_id != false) {
    $query = 'DELETE FROM students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Student List page
include('index.php');