<?php

session_start();
session_cache_expire();
session_unset();

session_destroy();

header('Location: /login');



?>