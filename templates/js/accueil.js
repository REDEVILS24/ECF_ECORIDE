document.addEventListener("DOMContentLoaded", function () {
  // Votre code ici
  console.log("Le DOM est complètement chargé.");
  const inputs = document.querySelectorAll(".input");

  function inputVide(inputElement) {
    if (inputElement.value === "") {
      console.log("test");
    } else {
      console.log("ça ne fonctionne pas" + inputElement.value);
    }
  }

  inputs.forEach(inputVide);
});
