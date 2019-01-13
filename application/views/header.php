<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    <link rel="stylesheet" href="../../public/css/main.css">
    <script src="../../public/js/jquery-3.3.1.min.js"></script>
    <script src="../../public/js/main.js"></script>

</head>
<body>
    <div class="header">
        <p><a href="/">TODO</a></p>
        <div class="right_header">
            <ul>
                <?php if (isset($_SESSION['user_name'])): ?>
                <li> <?php echo 'hi, '. $_SESSION['user_name']; ?></li>
                <li><a href="/archive">archive</a></li>
                <li><a href="/logout">Log out</a></li>
                <?php endif; ?>

            </ul>
        </div>


</div>