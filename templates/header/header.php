<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/charte.css">
    <link rel="stylesheet" href="/assets/styles/styles.css">
    <link rel="stylesheet" href="/assets/styles/header.css">
    <title>ECORIDE</title>
</head>

<body>
    <section class="head">
        <div class="navigation">
            <a href="/templates/home/index.php">
                <img src="/IMAGE/LOGO_ICONE/6bc25e61-f87a-4edf-a690-72058f38ab68.jpg" alt="Ecoride logo"
                    class="logo nav-gauche"></a>
            <a href="/templates/home/index.php">
                <h1 class="titre">ECORIDE</h1>
            </a>

        </div>

        <div class="navigation">

            <nav>
                <ul class="liste">
                    <li><a href="/templates/home/index.php">Accueil</a></li>
                    <li><a href="/templates/home/covoiturage.php" class="menu-connecte">Covoiturage</a></li>
                    <li><a href="/templates/home/inscription.php" class="menu-non-connecte">Inscription</a></li>
                    <li><a href="/templates/home/reservation.php">Reservation</a></li>
                    <li><a href="/templates/home/connexion.php" class="menu-non-connecte">Connexion</a></li>
                    <li><a href="/templates/home/index.php" id="btn-deconnexion" class="menu-connecte">Deconnexion</a>
                    </li>
                    <li><a href="/templates/home/profil.php" class="menu-connecte">Mon profil</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="navigation recherche_responsive">
                        <input type="search" name="recherche">
                        <button class="btn_recherche">Rechercher</button>
                    </li>
                </ul>

            </nav>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>


    </section>



    <script>
        document.getElementById('hamburger').addEventListener('click', function () {
            document.querySelector('.liste').classList.toggle('active');
        });

    </script>
    <script src="/assets/scripts/deconnexion.js"></script>
    <script src="/assets/scripts/affichage.js"></script>
</body>

</html>