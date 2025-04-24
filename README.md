# Test de Recrutement - Développeur Web PHP (Sprinteur - Avril 2025)

## Objectif

Ce projet a été réalisé dans le cadre du test technique proposé par Sprinteur.  
Il a pour but de récupérer les statuts d’un colis via l’API Colissimo de La Poste, puis d’envoyer un e-mail selon le statut, et enfin d’exporter les données sous forme de fichier CSV.

## Fonctionnalités

- Utilisation de PHP 8.2 avec une approche orientée objet
- Appel à l’API Colissimo pour récupérer les événements liés à un numéro de colis
- Analyse du dernier statut récupéré :
  - Si le colis est toujours en cours de livraison → envoi d’un e-mail informatif
  - Si le colis est livré → envoi d’un e-mail avec une pièce jointe (ex : image)
- Génération automatique d’un fichier `statuts.csv` contenant les statuts détaillés

## Structure du projet

```
/mon_projet
│
├── src/
│   ├── ColissimoTracker.php      → Gestion de l’appel à l’API
│   ├── Mailer.php                → Envoi des e-mails
│   └── CSVExporter.php          → Génération du fichier CSV
│
├── media/
│   └── joindre.jpg              → Pièce jointe utilisée si colis livré
│
├── .env                         → (optionnel) pour stocker la clé API
├── index.php                    → Script principal
├── statuts.csv                 → Fichier CSV généré
└── README.md
```

## Prérequis

- PHP 8.2
- Une clé API valide pour accéder à l’API Colissimo (à obtenir sur https://developer.laposte.fr)
- Serveur SMTP configuré localement pour la fonction `mail()` de PHP

## Instructions

1. Remplacer la variable `TA_CLE_API` dans le fichier `index.php` par votre clé API personnelle.
2. Exécuter le script via la ligne de commande :
   ```
   php index.php
   ```
3. Vérifier :
   - Le contenu du fichier `statuts.csv`
   - La réception de l’e-mail envoyé selon le statut du colis

## Remarques

- Si vous ne pouvez pas créer un compte développeur chez La Poste (particulier), vous pouvez simuler la réponse de l’API en modifiant manuellement la méthode `getTrackingInfo()` dans `ColissimoTracker`.
- Le code est découpé de façon modulaire pour faciliter les tests, la maintenance et l’évolution du projet.

## Réalisé par

**Mathéo**  
Avril 2025
