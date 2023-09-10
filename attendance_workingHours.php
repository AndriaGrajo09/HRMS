<!DOCTYPE html>
<html>
<head>
    <title>Working Hours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Working Hours</h1>
    <a href="index.php">Back to Home</a>
    <h2>Employee: <?php echo $employee['name']; ?></h2>
    <p>Working Hours: <?php echo $workingHours; ?> hours</p>
</body>
</html>