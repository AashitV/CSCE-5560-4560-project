<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$payload = @file_get_contents('php://input');
$event = json_decode($payload, true);

if (!$event) {
    http_response_code(400);
    exit;
}

require 'database.php';

if ($event['type'] === 'checkout.session.completed') {
    $session = $event['data']['object'];

    $email = $session['customer_details']['email'];

    if ($email) {
        $stmt = $pdo->prepare("UPDATE users SET is_paying = 1 WHERE email = ?");
        $stmt->execute([$email]);
    }
}

http_response_code(200);
?>
