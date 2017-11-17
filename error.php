<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>School App</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" type="text/css" href="./bower_components/font-awesome/css/font-awesome.min.css">
</head>

<!-- the body section -->
<body>
    <?php include 'php/header.php'; ?>


    <!-- This is the main content -->
    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Schools</p>
    </footer>
</body>
</html>