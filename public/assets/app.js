document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector("[data-menu-button]");
  const menu = document.querySelector("[data-mobile-menu]");

  if (menuButton && menu) {
    menuButton.addEventListener("click", () => {
      menu.classList.toggle("open");
      const icon = menuButton.querySelector("i");
      if (icon) {
        icon.className = menu.classList.contains("open")
          ? "ti ti-x text-2xl"
          : "ti ti-menu-2 text-2xl";
      }
    });
  }

  const reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 },
    );

    reveals.forEach((item, index) => {
      item.style.transitionDelay = `${Math.min(index * 55, 360)}ms`;
      observer.observe(item);
    });
  } else {
    reveals.forEach((item) => item.classList.add("is-visible"));
  }

  document.querySelectorAll("[data-favorite]").forEach((button) => {
    button.addEventListener("click", () => {
      button.classList.toggle("text-red-500");
      button.classList.toggle("bg-red-50");
      const icon = button.querySelector("i");
      if (icon) icon.classList.toggle("ti-heart-filled");
    });
  });

  document.querySelectorAll("[data-tab]").forEach((tab) => {
    tab.addEventListener("click", () => {
      const group = tab.closest("[data-tab-group]") || document;
      group.querySelectorAll("[data-tab]").forEach((item) => {
        item.classList.remove("btn-primary");
        item.classList.add("btn-soft");
      });
      tab.classList.remove("btn-soft");
      tab.classList.add("btn-primary");
    });
  });
});
