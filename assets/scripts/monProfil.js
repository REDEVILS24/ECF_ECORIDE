document.addEventListener("DOMContentLoaded", function () {
  function afficher() {
    const donnees = {
      endpoint: "profile",
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
        if (data.user) {
          document.getElementById("nom").textContent = data.user.nom;
          document.getElementById("prenom").textContent = data.user.prenom;
          document.getElementById("pseudo").textContent = data.user.pseudo;
          document.getElementById("email").textContent = data.user.email;
          document.getElementById("date_naissance").textContent =
            data.user.date_naissance;
          document.getElementById("role").textContent = data.user.role;
          document.getElementById("credits").textContent = data.user.credits;
        } else {
          alert("Erreur lors du chargement des données");
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Erreur lors du chargement des données");
      });
  }

  afficher();
});
