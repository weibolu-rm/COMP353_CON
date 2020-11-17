<?php

// destroying the session and redirecting to index
session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();