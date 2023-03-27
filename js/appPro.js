const navSlide = () => {
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".links");
    const navLinks = document.querySelectorAll(".links li");
  
    burger.addEventListener("click", () => {
      nav.classList.toggle("nav-active");
  
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = "";
          console.log(link.style.animation);
        } else {
          link.style.animation = `navLinkFade 0.5 ease forwards ${index / 7}s`;
        }
        console.log(index / 7 + 1);
      });
      burger.classList.toggle("toggle");
    });
  };

  navSlide();

  document.querySelector(".container").addEventListener("click", () => {
    document
      .querySelector(".productos")
      .scrollIntoView({ behavior: "smooth", block: "start" });
  });

  