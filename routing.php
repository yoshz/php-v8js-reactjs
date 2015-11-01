<?php

if (file_exists(__DIR__ . '/web/' . $_SERVER['REQUEST_URI'])) {
    return false; // serve the requested resource as-is.
}

require_once __DIR__ . '/web/index.php';