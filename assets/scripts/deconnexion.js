document.addEventListener("DOMContentLoaded", function () {
  const deco = document.getElementById("btn-deconnexion");

  function deconnexion(e) {
    e.preventDefault();
    const donnees = {
      endpoint: "logout",
    };

    fetch("/api/users.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result === 1) {
          window.location.href = "/templates/home/index.php";
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
        alert("Problème de deconnexion");
      });
  }

  deco.addEventListener("click", deconnexion);
});
