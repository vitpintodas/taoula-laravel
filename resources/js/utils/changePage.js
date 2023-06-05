export const changePage = () => {
  const toggleSection = (hashSplit) => {
      // Comme pour le menu, on enlève la classe active à la section en cours
      const activeDiv = document.querySelector("div.active");
      if (activeDiv) {
          activeDiv.classList.remove("active");
      }

      // et on essaie de trouver la section correspondante et l'afficher, en y ajoutant la classe active
      const divElement = document.querySelector(`${hashSplit}-test`);
      if (divElement) {
          divElement.classList.add("active");
      }
  };

  const handleHashChange = () => {
      const hash = window.location.hash;
      const hashSplit = hash.split("#");

      switch (hash) {
          case "#un":
          case "#deux":
          case "#trois":
          case "#quatre":
          case "#cinq":
              toggleSection(hash);
              break;

          default:
              // Page inconnue
              break;
      }
  };

  // On link la fonction "handleHashChange" à l'événement hashchange pour être averti d'un changement de hash dans l'url
  window.addEventListener("hashchange", handleHashChange);

  // Exécute la fonction une première fois pour gérer le hash initial
  handleHashChange();
};
