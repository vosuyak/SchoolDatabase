<?php
// Get the Student data
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
$ulid = filter_input(INPUT_POST, 'ulid');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($room_id == null || $room_id == false ||
        $ulid == null || $name == null || $price == null || $price == false) {
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('php/database.php');

    // Add the Student to the database  
    $query = 'INSERT INTO students
                 (roomID, studentUlid, studentName, studentYear)
              VALUES
                 (:room_id, :ulid, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->bindValue(':ulid', $ulid);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    // Display the Student List page
    include('index.php');
}
?>
