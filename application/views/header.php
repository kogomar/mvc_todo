<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <link rel="stylesheet" href="../../public/css/main.css">
    <script src="../../public/js/main.js"></script>
    <script src="../../public/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="header">
    <p>TODO</p>
    <p>
        <?php if (isset($_SESSION['user_name'])):
        echo $_SESSION['user_name'];
             endif;?>
    </p>
</div>