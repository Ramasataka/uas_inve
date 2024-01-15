<?php

$title = 'KOMPUTER.CO';
include 'header.php';

if (isset($_POST['kirim_data'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $system->login($username, $password);
}

?>

<body>
<div class="flash">
        <?= Flasher::flash() ?>
    </div>
    <div class="container">
        <form action="" method="POST">
            
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>

        <div class="mb-3">
            <label for="username">Password</label>
            <input type="password" name="password">
        </div>

        <div class="mb">
            <input type="submit" name="kirim_data" value="kirim">
        </div>

        </form>
    </div>
</body>