<!DOCTYPE html>
<html>

<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header">
        <h1>My Website</h1>
        <p>A website created by me.</p>
    </div>

    <div class="navbar">
        <a href="./index.php?act=contacts">Contacts</a>
        <a href="./index.php?act=products">Products</a>
    </div>
    <div class="row">
        <div class="side">
            <div class="dropdown"></div>
            <div class="searchBar"></div>
            <div class="fakeimg" style="height:200px;">Image</div>
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3>More Text</h3>
            <p>Lorem ipsum dolor sit ame.</p>
            <div class="fakeimg" style="height:60px;">Image</div><br>
            <div class="fakeimg" style="height:60px;">Image</div><br>
            <div class="fakeimg" style="height:60px;">Image</div>
        </div>
        <div class="main">
            <?= isset($_REQUEST['message']) ? "<p>" . $_REQUEST['message'] . "</p>" : null; ?>