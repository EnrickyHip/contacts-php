<?php

require_once __DIR__ . "../../dotenv.php";

define('DATABASE_HOST', $_ENV["DATABASE_HOST"]);
define('DATABASE_NAME', $_ENV["DATABASE_NAME"]);
define('DATABASE_USER', $_ENV["DATABASE_USER"]);
define('DATABASE_PASSWORD', $_ENV["DATABASE_PASSWORD"]);