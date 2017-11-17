
<?php
// Get the Student data
$roomName = filter_input(INPUT_POST, 'roomName');


   // Validate inputs
if ($roomName == null ) {
    $error = "Invalid Student data. Check all fields and try again.";
    include('error.php');
} else{ 
    require_once('php/database.php');

    // Add the Student to the database  
    $query = 'INSERT INTO rooms
                 (roomName )
              VALUES
                 (:roomName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':roomName', $roomName);
    $statement->execute();
    $statement->closeCursor();

    // Display the Student List page
    include('room_list.php');
}
?>