<!DOCTYPE html>
<html>

<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="header">
        <div class="navbar">
            <a href="./index.php">Home</a>
            <a href="./index.php?op=create">Create</a>
        </div>
    </div>

    <?php if(isset($msg)) {echo $msg;} ?>