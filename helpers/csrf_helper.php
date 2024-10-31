<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function generate_csrf_token()
{

    if (empty($_SESSION['csrf_token']) || csrf_token_expired()) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['csrf_token_time'] = time();
    }
    return $_SESSION['csrf_token'];
}

function validate_csrf_token($token)
{
    return isset($_SESSION['csrf_token']) &&
        hash_equals($_SESSION['csrf_token'], $token) &&
        !csrf_token_expired();
}


function csrf_token_expired()
{
    $expiry_time = getenv('CSRF_TOKEN_EXPIRY') ?: 3600;
    return time() - ($_SESSION['csrf_token_time'] ?? 0) > $expiry_time;
}

function csrf_token_field()
{
    $token = generate_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}
