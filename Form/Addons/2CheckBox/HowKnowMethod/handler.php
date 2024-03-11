<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    echo "It method is Post";
} elseif ($method === "GET") {
    echo "It method is Get";
}
