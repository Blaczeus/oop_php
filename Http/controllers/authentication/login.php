<?php
use Core\Session;

view("authentication/login.view.php", [
    'errors' => Session::get('errors')
]);

