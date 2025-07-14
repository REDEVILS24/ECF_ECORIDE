document.addEventListener("DOMContentLoaded", function () {
  // Récupérer le formulaire et le bouton
  const form = document.getElementById("form-inscription");
  const nom = document.querySelector('input[name="nom"]');
  const prenom = document.querySelector('input[name="prenom"]');
  const pseudo = document.querySelector('input[name="pseudo"]');
  const date_naissance = document.querySelector('input[name="date_naissance"]');
  const email = document.querySelector('input[name="email"]');
  const mdp = document.querySelector('input[name="mdp"]');
  const reset = document.querySelector("reset");
  const bouton = document.getElementById("btn-inscription");
  const adresse = document.querySelector('input[name="adresse"]');
  const codePostal = document.querySelector('input[name="codePostal"]');
  const ville = document.querySelector('input[name="ville"]');
  const permis = document.querySelector('input[name="permis"]');

  function validerInscription(e) {
    e.preventDefault();

    const nomValue = nom.value;
    const prenomValue = prenom.value;
    const pseudoValue = pseudo.value;
    const date_naissanceValue = date_naissance.value;
    const emailValue = email.value;
    const mdpValue = mdp.value;
    const adresseValue = adresse.value || "";
    const codePostalValue = codePostal.value || 0;
    const villeValue = ville.value || "";
    const permisValue = permis.value || "";

    const donnees = {
      endpoint: "create",
      nom: nomValue,
      prenom: prenomValue,
      pseudo: pseudoValue,
      date_naissance: date_naissanceValue,
      email: emailValue,
      mdp: mdpValue,
      adresse: adresseValue,
      codePostal: codePostalValue,
      ville: villeValue,
      permis: permisValue,
    };

    fetch("/api/users.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result === 1) {
          alert("Inscription réussie !");
          window.location.href = "/templates/home/connexion.php";
        } else {
          alert("Erreur lors de l'inscription");
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Problème de connexion");
      });
  }

  form.addEventListener("submit", validerInscription);
});
