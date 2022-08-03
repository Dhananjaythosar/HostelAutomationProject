<!--logout-->
<?php 
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('You are logout from your account'); document.location = '../../index.php'; </script>";
?>