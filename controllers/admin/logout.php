<?php

session_start();

session_destroy();

header("Location: " . ROOT . "/admin/login");
