<?php
require('php/database.php');
        $query = 'SELECT *
                FROM rooms
                ORDER BY roomID';
        $statement = $db->prepare($query);
        $statement->execute();
        $rooms = $statement->fetchAll();
        $statement->closeCursor();

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
    <main class="form-area">
        <h1>Title</h1>        
        <form action="add_student.php" method="post"
              id="add_student_form">
            <div class="form-group">
                        <label>Category:</label>
                        <select name="room_id">
                        <?php foreach ($rooms as $room) : ?>
                            <option value="<?php echo $room['roomID']; ?>">
                                <?php echo $room['roomName']; ?>
                            </option>
                        <?php endforeach; ?>
                        </select><br>
            </div>

                <div class="form-group">
                            <label>Ulid:</label>
                            <input type="text" name="ulid"><br>
                </div>
                <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" name="name"><br>
                </div>
                <div class="form-group">
                            <label>Year:</label>
                            <input type="text" name="price"><br>
                </div>
                <div class="form-group">
                            <input class="submit-btn" type="submit" value="Add Student"><br>
                </div>
                <div class="form-group">
                    <p>
                        <a href="index.php">View Student List</a>
                    </p>
                </div>
        </form>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> School Database</p>
    </footer>
</body>
</html>