<?php

require_once "database.php";

unset($_SESSION);
session_unset();
session_destroy();


redirect("customer_login.php");