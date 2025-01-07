document.addEventListener("DOMContentLoaded", function () {
  const accordionButtons = document.querySelectorAll(".accordion-button");

  accordionButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const currentPanel = this.getAttribute("data-mdb-target");
      const panels = document.querySelectorAll(".accordion-collapse");

      panels.forEach((panel) => {
        if (panel.id !== currentPanel.substring(1)) {
          panel.classList.remove("show");
        }
      });

      const targetPanel = document.querySelector(currentPanel);
      targetPanel.classList.toggle("show");
    });
  });
});
