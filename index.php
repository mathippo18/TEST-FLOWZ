<?php
require 'src/ColissimoTracker.php';
require 'src/Mailer.php';
require 'src/CSVExporter.php';

$apiKey = 'TA_CLE_API';
$trackingNumber = '6A58894858306';
$tracker = new ColissimoTracker($apiKey, $trackingNumber);

$data = $tracker->getTrackingInfo();
$events = $data['shipment']['event'];
$last = end($events);

$statuts = array_map(fn($e) => [
    'code' => $e['code'],
    'date' => $e['date'],
    'message' => $e['message'],
], $events);

CSVExporter::export($statuts, 'statuts.csv');

if (strpos(strtolower($last['message']), 'livré') !== false) {
    Mailer::send('poinsot.matheo@gmail.com', "Colis livré", "Le colis {$trackingNumber} est bien livré.", 'media/works.jpg');
} else {
    Mailer::send('poinsot.matheo@gmail.com', "Colis en cours", "Le colis {$trackingNumber} est encore en cours de livraison.");
}