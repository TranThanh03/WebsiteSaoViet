<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/error.css">
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <?php if(isset($_REQUEST['idTask'])):?>
            <a href="index.php?controller=calendarContent&action=index&idTask=<?=$_REQUEST['idTask']?>" class="back-button">Go Back</a>    
        <?php else:?>
            <a href="index.php?controller=home&action=index" class="back-button">Go Back</a>
        <?php endif;?>
    </div>
</body>
</html>
