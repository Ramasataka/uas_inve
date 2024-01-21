<?php

include '../../header.php';
$check = $system->checkLogin();
$title = 'KOMPUTER.CO | HOMEPAGE';
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
if(isset($_POST['logout']))
{
   $system->logout();
}
?>

<body>
    <h1>SELAMAT DATANG KARYAWAN</h1>
    <form action="" method="POST">
   <button type="input" name="logout" class="btn btn-primary">LOGOUT</button>
   </form>
</body>