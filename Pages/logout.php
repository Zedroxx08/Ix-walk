<?php
session_start();
session_destroy();//Detruit la sessions côté serveur
header('Location: ../index.php');
exit();