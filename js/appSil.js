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
      .querySelector(".texto1")
      .scrollIntoView({ behavior: "smooth", block: "center"});
  });

  document.addEventListener("click", e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]")
    if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return
  
    let currentDropdown
    if (isDropdownButton) {
      currentDropdown = e.target.closest("[data-dropdown]")
      currentDropdown.classList.toggle("active")
    }
  
    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
      if (dropdown === currentDropdown) return
      dropdown.classList.remove("active")
    })
  })


  // nav

let navHome = Array.from(document.querySelectorAll('.navHome'))
console.log(navHome)

let navNosotros = Array.from(document.querySelectorAll('.navNosotros'))
console.log(navNosotros)

let navServicios = Array.from(document.querySelectorAll('.navServicios'))
console.log(navServicios)

let navClientes = Array.from(document.querySelectorAll('.navClientes'))
console.log(navHome)

let navContacto = Array.from(document.querySelectorAll('.navContacto'))
console.log(navHome)


document.addEventListener("click", e => {
  const isDropdownButton = e.target.matches("[data-dropdown-button]")
  if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

  let currentDropdown
  if (isDropdownButton) {
    currentDropdown = e.target.closest("[data-dropdown]")
    currentDropdown.classList.toggle("active")
  }

  document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
    if (dropdown === currentDropdown) return
    dropdown.classList.remove("active")
  })
})

navHome.forEach((item) => item.addEventListener('click',() =>{
  window.scrollTo({
    top:0,
    behavior: 'smooth'
  });
}))

navNosotros.forEach((item) => item.addEventListener('click',() =>{
  let el = document.querySelector('.nosotros')
   el.scrollIntoView({behavior:"smooth", block: "end"})
  
}))

navServicios.forEach((item) => item.addEventListener('click',() =>{
  let el = document.querySelector('.servicios')
   el.scrollIntoView({behavior:"smooth", block: "end"})
  
}))

navClientes.forEach((item) => item.addEventListener('click',() =>{
  let el = document.querySelector('.clientes')
   el.scrollIntoView({behavior:"smooth"})
  
}))

navContacto.forEach((item) => item.addEventListener('click',() =>{
  let el = document.querySelector('.contacto')
   el.scrollIntoView({behavior:"smooth"})
  
}))
























function collapseSection1(element) {
    // get the height of the element's inner content, regardless of its actual size
    var sectionHeight = element.scrollHeight;
  
    // temporarily disable all css transitions
    
    var elementTransition = element.style.transition;
    
    element.style.transition = "";
  
    // on the next frame (as soon as the previous style change has taken effect),
    // explicitly set the element's height to its current pixel height, so we
    // aren't transitioning out of 'auto'
    requestAnimationFrame(function () {
      element.style.height = sectionHeight + "px";
      element.style.transition = elementTransition;
  
      // on the next frame (as soon as the previous style change has taken effect),
      // have the element transition to height: 0
      requestAnimationFrame(function () {
        element.style.height = 0 + "px";
      });
    });
  
    // mark the section as "currently collapsed"
    element.setAttribute("data-collapsed", "true");
  }

 let colaps = Array.from(document.querySelectorAll('.collapsible'))
 colaps.forEach((item) => collapseSection(item) )



function collapseSection(element) {
  // get the height of the element's inner content, regardless of its actual size
  var sectionHeight = element.scrollHeight;

  // temporarily disable all css transitions
  var elementTransition = element.style.transition;
  element.style.transition = "";

  // on the next frame (as soon as the previous style change has taken effect),
  // explicitly set the element's height to its current pixel height, so we
  // aren't transitioning out of 'auto'
  requestAnimationFrame(function () {
    element.style.height = sectionHeight + "px";
    element.style.transition = elementTransition;

    // on the next frame (as soon as the previous style change has taken effect),
    // have the element transition to height: 0
    requestAnimationFrame(function () {
      element.style.height = 0 + "px";
    });
  });

  // mark the section as "currently collapsed"
  element.setAttribute("data-collapsed", "true");
}

function expandSection(element) {
  // get the height of the element's inner content, regardless of its actual size
  var sectionHeight = element.scrollHeight;

  // have the element transition to the height of its inner content
  element.style.height = sectionHeight + "px";

  // when the next css transition finishes (which should be the one we just triggered)
  element.addEventListener("transitionend", function (e) {
    // remove this event listener so it only gets triggered once
    element.removeEventListener("transitionend", arguments.callee);

    // remove "height" from the element's inline styles, so it can return to its initial value
    element.style.height = null;
  });

  // mark the section as "currently not collapsed"
  element.setAttribute("data-collapsed", "false");
}

// document
//   .querySelector(".toggle-button")
//   .addEventListener("click", function (e) {
//     var section = document.querySelector(".section.collapsible");
//     var isCollapsed = section.getAttribute("data-collapsed") === "true";

//     if (isCollapsed) {
//       expandSection(section);
//       section.setAttribute("data-collapsed", "false");
//     } else {
//       collapseSection(section);
//     }
//   });

// let buttons = Array.from(document.querySelectorAll(".toggle-button"));
// console.log(buttons)
// buttons.forEach((item) =>
//   item.addEventListener("click", function (e) {
//     var section = document.querySelector(".section.collapsible");
//     console.log(section)
//     var isCollapsed = section.getAttribute("data-collapsed") === "true";
//     if (isCollapsed) {
//       expandSection(section);
//       section.setAttribute("data-collapsed", "false");
//     } else {
//       collapseSection(section);
//     }
//   })
// );



  let button2 = document.getElementById('creatividad')
button2.addEventListener("click", function (e) {
    var section = document.querySelector("#creatividad1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })

  let button3 = document.getElementById('socialmedia')
button3.addEventListener("click", function (e) {
    var section = document.querySelector("#socialmedia1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })

  let button4 = document.getElementById('producciondigital')
button4.addEventListener("click", function (e) {
    var section = document.querySelector("#producciondigital1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })
  let button5 = document.getElementById('lubricidad')
button5.addEventListener("click", function (e) {
    var section = document.querySelector("#lubricidad1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })
  let button6 = document.getElementById('hidrorrep')
button6.addEventListener("click", function (e) {
    var section = document.querySelector("#hidrorrep1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })
  let button7 = document.getElementById('principales')
button7.addEventListener("click", function (e) {
    var section = document.querySelector("#principales1");
    console.log(section)
    var isCollapsed = section.getAttribute("data-collapsed") === "true";
    if (isCollapsed) {
      expandSection(section);
      section.setAttribute("data-collapsed", "false");
    } else {
      collapseSection(section);
    }
  })
  












