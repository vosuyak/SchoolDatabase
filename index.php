<?php
require_once('php/database.php');

        // Get category ID
        if (!isset($room_id)) {
            $room_id = filter_input(INPUT_GET, 'room_id', 
                    FILTER_VALIDATE_INT);
            if ($room_id == NULL || $room_id == FALSE) {
                $room_id = 1;
            }
        }

// Get name for selected category
        $queryCategory = 'SELECT * FROM rooms
                        WHERE roomID = :room_id';
        $statement1 = $db->prepare($queryCategory);
        $statement1->bindValue(':room_id', $room_id);
        $statement1->execute();
        $room = $statement1->fetch();
        $room_name = $room['roomName'];
        $statement1->closeCursor();


// Get all rooms
        $query = 'SELECT * FROM rooms
                            ORDER BY roomID';
        $statement = $db->prepare($query);
        $statement->execute();
        $rooms = $statement->fetchAll();
        $statement->closeCursor();

// Get students for selected category
        $queryStudents = 'SELECT * FROM students
                        WHERE roomID = :room_id
                        ORDER BY studentID';
        $statement3 = $db->prepare($queryStudents);
        $statement3->bindValue(':room_id', $room_id);
        $statement3->execute();
        $students = $statement3->fetchAll();
        $statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>School App</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./bower_components/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>

<!-- the body section -->
    <body>
    <?php include 'php/header.php'; ?>


    <!-- This is the main content -->
    <main>

        <aside>
            <div class="schools-title">
                <h2>Class Rooms</h2>
            </div>
            <nav>
                <ul>
                    <?php foreach ($rooms as $room) : ?>
                    <li><i class="fa fa-building"></i><a href=".?room_id=<?php echo $room['roomID']; ?>">
                            <?php echo $room['roomName']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>          
        </aside>

        <section>
            <!-- display a table of students -->
            <h2><?php echo $room_name; ?></h2>
            
            <table>
                <tr>
                    <th>Ulid</th>
                    <th>Name</th>
                    <th class="right">Age</th>
                    <th></th>
                </tr>

                <?php foreach ($students as $student) : ?>
                <tr class="student-info">
                    <td class="student-major"><?php echo $student['studentUlid']; ?></td>
                    <td class="student-name"><?php echo $student['studentName']; ?></td>
                    <td class="student-year"><?php echo $student['studentYear']; ?></td>
                    <td>
                        <form action="delete_student.php" method="post">
                        <input type="hidden" name="student_id"
                            value="<?php echo $student['studentID']; ?>">
                        <input type="hidden" name="room_id"
                            value="<?php echo $student['roomID']; ?>">
                        <input class="delete-student-btn"type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <button class="add-btn btn"><a href="add_student_form.php">Add Student</a></button>
            <button class="list-btn btn"><a href="room_list.php">List rooms</a></button>        
        </section>
    </main>
    </body>
</html>