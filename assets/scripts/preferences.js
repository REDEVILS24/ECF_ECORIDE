document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-preferences");
  const btnPreference = document.getElementById("btn-preferences");
  const fumeur_accepte = document.querySelector(
    'input[type="checkbox"][name="fumeur_accepte"]'
  );
  const animaux_acceptes = document.querySelector(
    'input[type="checkbox"][name="animaux_acceptes"]'
  );
  const type_musique = document.querySelector('select[name="type_musique"]');
  const discussion = document.querySelector('select[name="discussion"]');
  const temperature = document.querySelector('select[name="temperature"]');
  const pauses = document.querySelector(
    'input[type="checkbox"][name="pauses"]'
  );

  function ajoutPreferences(e) {
    e.preventDefault();

    const fumeur_accepteValue = fumeur_accepte.checked;
    const animaux_acceptesValue = animaux_acceptes.checked;
    const type_musiqueValue = type_musique.value;
    const discussionValue = discussion.value;
    const temperatureValue = temperature.value;
    const pausesValue = pauses.checked;

    const donnees = {
      endpoint: "insert",
      fumeur_accepte: fumeur_accepteValue,
      animaux_acceptes: animaux_acceptesValue,
      type_musique: type_musiqueValue,
      discussion: discussionValue,
      temperature: temperatureValue,
      pauses: pausesValue,
    };

    fetch("/api/preferences.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(donnees),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.result === 1) {
          alert("preference crée ! ");
          window.location.href = "/templates/home/profil.php";
        } else {
          alert("erreur ! ");
        }
      })
      .catch((error) => {
        console.error("Erreur", error);
        alert("Probleme de création");
      });
  }
  form.addEventListener("submit", ajoutPreferences);
});
