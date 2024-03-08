# Plateforme de Gestion et Réservation d'Événements
## Introduction
Bienvenue sur la plateforme de gestion et réservation d'événements de la société "Evento". Cette plateforme novatrice vise à fournir une expérience utilisateur optimale aux participants, organisateurs et administrateurs en offrant une gamme de fonctionnalités robustes pour la découverte, la réservation et la gestion des événements.

## Fonctionnalités Requises
### Utilisateur
Inscription : Les utilisateurs peuvent s'inscrire en fournissant leur nom, leur adresse e-mail et un mot de passe.
Connexion : Les utilisateurs peuvent se connecter à leur compte en utilisant leurs identifiants.
Réinitialisation de Mot de Passe : Les utilisateurs peuvent réinitialiser leur mot de passe en cas d'oubli en recevant un e-mail de réinitialisation.
Consultation des Événements : Les utilisateurs peuvent consulter la liste des événements disponibles sur la plateforme avec pagination pour faciliter la navigation.
Filtrage des Événements : Les utilisateurs peuvent filtrer les événements par catégorie.
Recherche d'Événements : Les utilisateurs peuvent rechercher des événements par titre.
Visualisation des Détails : Les utilisateurs peuvent visualiser les détails d'un événement, y compris sa description, sa date, son lieu et le nombre de places disponibles.
Réservation d'une Place : Les utilisateurs peuvent réserver une place pour un événement.
Génération de Ticket : Les utilisateurs peuvent générer un ticket une fois leur réservation confirmée.
### Organisateur
Création d'Événement : Les organisateurs peuvent créer un nouvel événement en spécifiant son titre, sa description, sa date, son lieu, sa catégorie et le nombre de places disponibles.
Gestion d'Événements : Les organisateurs peuvent gérer leurs événements, y compris la modification et la suppression.
Statistiques : Les organisateurs ont accès à des statistiques sur les réservations de leurs événements.
Validation de Réservations : Les organisateurs peuvent choisir entre une acceptation automatique des réservations ou une validation manuelle.
### Administrateur
Gestion des Utilisateurs : Les administrateurs peuvent gérer les utilisateurs en restreignant leur accès.
Gestion des Catégories : Les administrateurs peuvent gérer les catégories d'événements en ajoutant, modifiant ou supprimant des catégories.
Validation des Événements : Les administrateurs peuvent valider les événements créés par les organisateurs avant leur publication sur la plateforme.
Statistiques : Les administrateurs ont accès à des statistiques générales sur la plateforme.
## Configuration
Pour configurer et exécuter la plateforme, veuillez suivre les étapes suivantes :

Installation des Dépendances : Exécutez composer install pour installer les dépendances PHP.
Configuration de la Base de Données : Configurez les paramètres de connexion à la base de données dans le fichier .env.
Migration de la Base de Données : Exécutez php artisan migrate pour exécuter les migrations et créer les tables de base de données.
Lancement du Serveur : Exécutez php artisan serve pour lancer le serveur de développement.
Accès à la Plateforme : Accédez à la plateforme à l'adresse http://localhost:8000.