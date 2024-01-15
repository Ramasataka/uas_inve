<?php

include '../../header.php';

$title = 'KOMPUTER.CO | HOMEPAGE';
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
?>

<body>
    <h1>SELAMAT DATANG KARYAWAN</h1>
</body>