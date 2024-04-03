<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

session_destroy();
header("Location: index.php");
die();
?>
</body>
</html>