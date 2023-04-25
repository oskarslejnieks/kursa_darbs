<?php

session_start(); //to end session we need to have it running
session_unset(); // unset all the different session variables
session_destroy(); // destroy sesion

header("location: ../index.php?error=none");
