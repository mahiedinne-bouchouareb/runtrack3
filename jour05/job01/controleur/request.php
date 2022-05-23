<?php

$content = trim(file_get_contents("php://input"));
$json = json_decode($content, true);
if (isset($json["action"])) {
    $action = $json["action"];
} else {
    $action = "";
}


switch ($action) {
    case 'connexion': {
            echo json_encode($json["data"]);
            break;
        }
}
