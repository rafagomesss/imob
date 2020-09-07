<?php
require dirname($_SERVER['DOCUMENT_ROOT']) . DIRECTORY_SEPARATOR . "bootstrap.php";

use System\Request;
use System\Router;

try {
    Router::run(new Request());
} catch (\Exception $ex) {
    die('Exception: ' . $ex->getMessage());
} catch (\Throwable $th) {
    die('Throwable: ' . $th->getMessage());
}
