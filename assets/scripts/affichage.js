document.addEventListener("DOMContentLoaded", function () {
  console.log("=== SCRIPT AFFICHAGE CHARGÉ ===");
  gererAffichageMenu();

  function gererAffichageMenu() {
    console.log("=== GESTION DU MENU ===");
    const menuConnecte = document.querySelectorAll(".menu-connecte");
    const menuNonConnecte = document.querySelectorAll(".menu-non-connecte");

    fetch("/api/users.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ endpoint: "checkSession" }),
    })
      .then((r) => r.json())
      .then((data) => {
        if (data.connected) {
          menuConnecte.forEach((affichage) => {
            affichage.style.display = "block";
          });
          menuNonConnecte.forEach((affichage) => {
            affichage.style.display = "none";
          });
        } else {
          menuNonConnecte.forEach((affichage) => {
            affichage.style.display = "block";
          });
          menuConnecte.forEach((affichage) => {
            affichage.style.display = "none";
          });
        }
      })
      .catch((error) => {
        console.error("Erreur:", error);
      });
  }
});
