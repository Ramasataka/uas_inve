<?php
$title = 'KOMPUTER.CO | HOMEPAGE';
include '../../header.php';
$check = $system->checkLogin();
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
   <h1>SELAMAT DATANG ADMIN</h1>
   <form action="" method="POST">
   <button type="input" name="logout" class="btn btn-primary">LOGOUT</button>
   </form>
</body>