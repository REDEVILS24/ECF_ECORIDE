import Route from "./Route.js";
export const websiteName = "EcoRide";

// Définition de toutes les routes de l'application EcoRide
export const allRoutes = [
  // === PAGES PUBLIQUES ===

  // Page d'accueil avec hero section
  new Route(
    "/Home",
    "Accueil",
    "/templates/home/index.html",
    [], // Accessible à tous
    "/assets/controllers/home.js"
  ),

  // Page de recherche et liste des covoiturages
  new Route(
    "/covoiturage",
    "Rechercher un trajet",
    "/templates/covoiturage.html",
    [],
    "/assets/controllers/covoiturage.js"
  ),

  // Page de contact
  new Route("/contact", "Contact", "/templates/contact.html", []),

  // === PAGES D'AUTHENTIFICATION ===

  // Page de connexion (uniquement pour les non-connectés)
  new Route(
    "/connexion",
    "Connexion",
    "/templates/body/accueil.html",
    ["disconnected"], // Uniquement pour les utilisateurs non connectés
    "/assets/controllers/auth.js"
  ),

  // Page d'inscription (uniquement pour les non-connectés)
  new Route(
    "/inscription",
    "Inscription",
    "/templates/formulaire/inscription.html",
    ["disconnected"],
    "/assets/controllers/auth.js"
  ),

  // === PAGES UTILISATEUR CONNECTÉ ===

  // Profil utilisateur (utilisateurs connectés uniquement)
  new Route(
    "/profil",
    "Mon Profil",
    "/templates/utilisateur/profil.html",
    ["user", "admin"], // Utilisateurs connectés
    "/assets/controllers/profil.js"
  ),

  // Proposer un nouveau trajet
  new Route(
    "/covoiturage/nouveau",
    "Proposer un trajet",
    "/templates/formulaire/covoiturage.html",
    ["user", "admin"],
    "/assets/controllers/covoiturage.js"
  ),

  // Mes trajets (trajets proposés par l'utilisateur)
  new Route(
    "/mes-trajets",
    "Mes trajets",
    "/templates/utilisateur/mes-trajets.html",
    ["user", "admin"],
    "/assets/controllers/mes-trajets.js"
  ),

  // Mes réservations (trajets réservés par l'utilisateur)
  new Route(
    "/mes-reservations",
    "Mes réservations",
    "/templates/utilisateur/mes-reservations.html",
    ["user", "admin"],
    "/assets/controllers/mes-reservations.js"
  ),

  // Détail d'un trajet spécifique
  new Route(
    "/trajet",
    "Détail du trajet",
    "/templates/trajet-detail.html",
    [],
    "/assets/controllers/trajet-detail.js"
  ),

  // === PAGES ADMIN ===

  // Dashboard administrateur
  new Route(
    "/admin",
    "Administration",
    "/templates/admin/dashboard.html",
    ["admin"], // Administrateurs uniquement
    "/assets/controllers/admin.js"
  ),

  // Gestion des utilisateurs
  new Route(
    "/admin/utilisateurs",
    "Gestion des utilisateurs",
    "/templates/admin/utilisateurs.html",
    ["admin"],
    "/assets/controllers/admin-users.js"
  ),

  // Gestion des trajets
  new Route(
    "/admin/trajets",
    "Gestion des trajets",
    "/templates/admin/trajets.html",
    ["admin"],
    "/assets/controllers/admin-trajets.js"
  ),

  // === PAGES INFORMATIVES ===

  // À propos / Qui sommes-nous
  new Route(
    "/a-propos",
    "À propos d'EcoRide",
    "/templates/pages/a-propos.html",
    []
  ),

  // Conditions d'utilisation
  new Route(
    "/conditions",
    "Conditions d'utilisation",
    "/templates/pages/conditions.html",
    []
  ),

  // Politique de confidentialité
  new Route(
    "/confidentialite",
    "Politique de confidentialité",
    "/templates/pages/confidentialite.html",
    []
  ),

  // Comment ça marche
  new Route(
    "/comment-ca-marche",
    "Comment ça marche",
    "/templates/pages/comment-ca-marche.html",
    []
  ),
];

// === FONCTIONS UTILITAIRES ===

// Fonction pour obtenir une route par son URL
export const getRouteByUrl = (url) => {
  return allRoutes.find((route) => route.url === url) || null;
};

// Fonction pour obtenir toutes les routes publiques
export const getPublicRoutes = () => {
  return allRoutes.filter((route) => route.authorize.length === 0);
};

// Fonction pour obtenir les routes d'un rôle spécifique
export const getRoutesByRole = (role) => {
  return allRoutes.filter(
    (route) => route.authorize.length === 0 || route.authorize.includes(role)
  );
};
