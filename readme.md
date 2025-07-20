# ECORIDE

## Description

Création d'un site de covoiturage éco-responsable avec utilisation de voitures électriques en priorité.

Ce projet a été développé dans le cadre de ma formation. La création de cette ECF a pour but de déployer mes compétences et la compréhension des différentes technologies pour la création de sites web, autant en FRONT qu'en BACK.

L'application permet aux utilisateurs de proposer et rechercher des trajets en covoiturage, avec un système de crédits intégré et une interface intuitive.

## Fonctionnalités principales

### Système d'inscription et authentification

- L'inscription de l'utilisateur est définie par défaut en "passager"
- Enregistrement des données utilisateur en base MySQL
- Gestion dynamique du menu selon l'état de connexion

### Navigation conditionnelle

- **Utilisateur connecté :** accès aux onglets covoiturage, réservation, déconnexion et profil
- **Utilisateur non connecté :** accès uniquement aux onglets accueil, connexion et contact

### Système de covoiturage

- Création de trajets par les utilisateurs connectés
- Recherche et sélection de covoiturages disponibles
- Système de crédits automatique selon le rôle (conducteur/passager)
- Gestion des réservations avec confirmation

## Technologies utilisées

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP 8, PDO
- **Base de données:** MongoDB, MYSQL
- **Serveur:** Apache/Nginx
- **Conteneurisation:** Docker
- **Gestion de version:** Git

## Installation locale

### Prérequis

- Docker et Docker Compose installés
- Git (pour cloner le projet)
- Composer (gestionnaire de dépendances PHP)
- Navigateur web moderne

### Étapes d'installation

1. **Cloner le projet**
   ```bash
   git clone [https://github.com/REDEVILS24/ECF_ECORIDE]
   cd ecoride
   ```
2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```
3. **Démarrer les services Docker**
   ```bash
   docker-compose up -d
   ```
4. **Accéder à l'application**

- Site web : http://localhost:8082
- PhpMyAdmin : http://localhost:8081
- MongoDB Express : http://localhost:8083

## Utilisation

### Comptes de test disponibles

| Rôle                              | Email               | Mot de passe | Crédits |
| --------------------------------- | ------------------- | ------------ | ------- |
| Admin                             | admin@ecoride.com   | Admin123!    | 100     |
| utilisateur (avec voitures)       | conducteur@test.com | Conduc123!   | 75      |
| utilisateur (passager uniquement) | passager@test.com   | Pass123!     | 50      |

### Guide rapide

1. Connectez-vous avec un des comptes ci-dessus
2. Créez un trajet avec le premier utilisateur
3. Réservez ce trajet avec le second utilisateur
4. Testez les fonctionnalités de gestion

## Auteur

**Nom :** [Taieb MIMOUNI]
**Formation :** Graduate Développeur Web et Web Mobile
**Date de réalisation :** Juillet 2025
**Contact :** [taieb.mimouni@hotmail.fr]

---

_Projet réalisé dans le cadre de l'ECF - Tous droits réservés_
