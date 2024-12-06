<?php

use Workerman\Worker;

require_once __DIR__ . '/vendor/autoload.php';

// package to install
// composer require workerman/workerman

// to start the socker server
// php websocket-server.php start

// Create a WebSocket server
$ws_worker = new Worker("websocket://0.0.0.0:6001");

// Number of processes for the server
$ws_worker->count = 1;

// Clients
$ws_worker->onConnect = function ($connection) {
    echo "New connection\n";
};

// Handle incoming messages
$ws_worker->onMessage = function ($connection, $data) use ($ws_worker) {
    echo "Received message: $data\n";

    // Broadcast the message to all clients
    foreach ($ws_worker->connections as $client) {
        $result = "This is message i received " . $data;
        $client->send($result);
    }
};

// Handle connection close
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};


Worker::runAll();
