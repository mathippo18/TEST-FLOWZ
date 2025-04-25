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
        // MOCK - Simulation de réponse API
        return [
            "shipment" => [
                "event" => [
                    [
                        "code" => "ARRIVED",
                        "date" => "2025-04-22T14:35:00Z",
                        "message" => "Colis arrivé à l’agence de distribution"
                    ],
                    [
                        "code" => "DELIVERED",
                        "date" => "2025-04-23T09:20:00Z",
                        "message" => "Colis livré"
                    ]
                ]
            ]
        ];
    }
}
