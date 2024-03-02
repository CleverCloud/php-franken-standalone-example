<?php

$json_default = '{ &quot;test&quot;: { &quot;foo&quot;: &quot;bar&quot; } }';

$json = htmlspecialchars_decode($_GET['json'] ?? $json_default);
$is_valid = json_validate($json);

header('Content-Type: application/json');
if (json_validate($json) == 1) {
    echo $json;
} else {
    http_response_code(500);
    echo json_encode(['error' => 'You must provide a valid JSON object.']);
}