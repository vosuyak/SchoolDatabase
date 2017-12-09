<?php
require_once('php/database.php');

// Get category ID
if (!isset($roomName)) {
    $roomName = filter_input(INPUT_GET, 'roomName', 
            FILTER_VALIDATE_INT);
    if ($roomName == NULL || $roomName == FALSE) {
        $room_id = 1;
    }
}
// Get name for selected category
$queryCategory = 'SELECT * FROM rooms
                  WHERE roomName = :roomName';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':roomName', $roomName);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['roomName'];
$statement1->closeCursor();


// Get all rooms
$query = 'SELECT * FROM rooms
                       ORDER BY roomID';
$statement = $db->prepare($query);
$statement->execute();
$rooms = $statement->fetchAll();
$statement->closeCursor();

// Get students for selected category
$querystudents = 'SELECT * FROM rooms
                  WHERE roomName = :roomName
                  ORDER BY studentID';
$statement3 = $db->prepare($querystudents);
$statement3->bindValue(':roomName', $roomName);
$statement3->execute();
$students = $statement3->fetchAll();
$statement3->closeCursor();


?>


<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>School App</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" type="text/css" href="./bower_components/font-awesome/css/font-awesome.min.css">
</head>

<!-- the body section -->
<body>

<?php include 'php/header.php'; ?>

<!-- This is the main content -->
<main>


    <aside>
        <div class="left-nav">
            <div class="schools-list">
                <h2 style="color:white;text-align:center;">Add Room</h2>
            </div>
            <form action="add_room.php" method="post"
                id="add_categoy.php">

                <input type="text" name="roomName">
                <input class="list-btn" type="submit" value="Add"><br>

            </form>
        </div>
        <button class="list-btn btn"><a style="text-decoration:none; color:black;" href="index.php">List rooms</a></button>
    </aside>


    <section>
        <h2>Room List</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>

            </tr>
            
            <?php foreach ($rooms as $category) : ?>
                <tr class="student-info">
                    <td><?php echo $category['roomName']; ?></td>
                    
                    <td>
                        <form action="delete_room.php" method="post">
                            <input type="hidden" name="room_id"
                                value="<?php echo $category['roomID']; ?>">
                            <input class="delete-student-btn" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>

            <!-- add ulid for the rest of the table here -->
        
        </table>
    </section>

    </main>

</body>
</html>