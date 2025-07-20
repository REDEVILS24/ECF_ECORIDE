<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/profil.css">
    <link rel="stylesheet" href="/assets/styles/chartes.css">
    <title>Mon Profil</title>
</head>

<body>
    <h1>MON PROFIL</h1>
    <section class="container">
        <section class="section_info item1">
            <section>
                <div class="nom info_utilisateur">
                    <strong>Nom :</strong> <span id="nom"></span>
                </div>
                <div class="prenom info_utilisateur">
                    <strong>Prénom :</strong> <span id="prenom"></span>
                </div>
                <div class="pseudo info_utilisateur">
                    <strong>Pseudo :</strong> <span id="pseudo"></span>
                </div>
                <div class="email info_utilisateur">
                    <strong>Email :</strong> <span id="email"></span>
                </div>
            </section>
            <section>
                <div class="date_naissance info_utilisateur">
                    <strong>Date de naissance :</strong> <span id="date_naissance"></span>
                </div>
                <div class="role info_utilisateur">
                    <strong>Rôle :</strong> <span id="role"></span>
                </div>
                <div class="credits info_utilisateur">
                    <strong>Crédits :</strong> <span id="credits"></span> €
                </div>
            </section>
        </section>

        <section class="bouton_profil item4">

            <div>
                <a href="/templates/home/voiture.php">
                    <button class="mes_voitures modifier_profil" type="button">Mes voitures</button>
                </a>
            </div>
            <div>
                <a href="../../templates/home/preferences.php">
                    <button class="mes_preferences modifier_profil" type="button">Mes preferences</button>
                </a>
            </div>
            <div>
                <button class="modifier_profil" type="button">Modifier le profil</button>
            </div>
            <div>
                <button class="supprimer_compte" type="button">Supprimer le compte</button>
            </div>
        </section>

        <aside class="img_profil item3">
            <div class="note">
                <img src="/IMAGE/note.jpg" alt="Note utilisateur">
            </div>
            <div class="pp">
                <img src="/IMAGE/photoprofil.jpg" alt="Photo de profil">
            </div>
        </aside>
    </section>
    <script src="/assets/scripts/monProfil.js"></script>
</body>

</html>