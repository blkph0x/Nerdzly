<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/conn.php';
if(isset($_POST['register'])){
try {
    $userId = $auth->registerWithUniqueUsername($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
        // send `$selector` and `$token` to the user (e.g. via email)
    });

    // we have signed up a new user with the ID `$userId`
}
catch (\Delight\Auth\InvalidEmailException $e) {
    // invalid email address
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    // invalid password
}
catch (\Delight\Auth\UserAlreadyExistsException $e) {
    // user already exists
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    // too many requests
}

}
if(isset($_POST['login'])){
try {
    $auth->login($_POST['email'], $_POST['password']);

    // user is logged in
echo 'logged in';
}
catch (\Delight\Auth\InvalidEmailException $e) {
    echo " wrong email address";
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    echo "wrong password";
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    echo "email not verified";
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    echo "too many requests";
}
}



