<?php
require dirname($_SERVER['DOCUMENT_ROOT']) . DIRECTORY_SEPARATOR . "bootstrap.php";
require dirname($_SERVER['DOCUMENT_ROOT']) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . 'db.php';

use System\Request;
use System\Router;
use System\Session;

try {
    Session::sessionStart();
    (new Router())->run(new Request());
} catch (\Exception $ex) {
    die('Exception: ' . $ex->getMessage() . ' - ' . $ex->getFile() . ' - ' . $ex->getLine());
} catch (\Throwable $th) {
    die('Throwable: ' . $th->getMessage() . ' - ' . $th->getFile() . ' - ' . $th->getLine());
}
