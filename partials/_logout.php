<?php
session_start();
echo "Logging you out..Please wait...";
session_destroy();
header("location:/phpcodes/forum/index.php?logout=true");

?>