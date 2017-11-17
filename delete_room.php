<?php
require_once('php/database.php');

// Get IDs
$room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);

// Delete the Student from the database
if ($room_id != false) {
    $query = 'DELETE FROM rooms
              WHERE roomID = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();    
}

// Display the Student List page
include('room_list.php');