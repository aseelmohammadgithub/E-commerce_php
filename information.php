<?php

session_start();

echo "welcome ".$_SESSION['username'] ;
echo "<br>";
echo " and your password ".$_SESSION['password'];


?>