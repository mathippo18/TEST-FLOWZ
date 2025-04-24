<?php

class ColissimoTracker
{
    private string $apiKey;
    private string $trackingNumber;

    public function __construct(string $apiKey, string $trackingNumber)
    {
        $this->apiKey = $apiKey;
        $this->trackingNumber = $trackingNumber;
    }

    public function getTrackingInfo(): array
    {
        $url = "https://api.laposte.fr/suivi/v2/idships/{$this->trackingNumber}?lang=fr_FR";
        $headers = [
            "X-Okapi-Key: {$this->apiKey}"
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
