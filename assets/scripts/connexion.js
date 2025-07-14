document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-connexion");
  const email = document.querySelector('input[name="email"]');
  const mdp = document.querySelector('input[name="mdp"]');

  function validerConnexion(event) {
    event.preventDefault();

    const emailValue = email.value;
    const mdpValue = mdp.value;

    const donnees = {
      endpoint: "login",
      email: emailValue,
      mdp: mdpValue,
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
          alert("Connexion réussie !");
          // Redirection vers le dashboard ou page d'accueil
          window.location.href = "/templates/home/index.php"; // ← Adapte selon tes pages
        } else {
          alert("Email ou mot de passe incorrect");
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Problème de connexion");
      });
  }

  form.addEventListener("submit", validerConnexion);
});
