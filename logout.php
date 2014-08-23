<?php
require_once("conf.php");
unset($_SESSION['usuario']);
header("Location: " . URL);
exit();