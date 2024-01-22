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
<main class="d-flex text-bg-dark">
    <!-- sidebar -->
    <?php
    include '../../sidebar.php';
    ?>
    <!-- sidebar -->
</main>
</body>