(() => {
  const side_nav = document.getElementById("side_nav");
  const toggle_nav_text = document.getElementById("toggle_nav_text");
  function toggle() {
    if (side_nav.classList.contains("active_mobile_view")) {
      side_nav.classList.remove("active_mobile_view");
    } else {
      side_nav.classList.add("active_mobile_view");
    }
  }
  toggle_nav_text.addEventListener("click", function () {
    toggle();
  });

  window.addEventListener("resize", () => {
    if (document.documentElement.clientWidth <= 850) {
      side_nav.classList.add("active_mobile_view");
    } else {
      side_nav.classList.remove("active_mobile_view");
    }
  });
  window.addEventListener("load", () => {
    if (document.documentElement.clientWidth <= 850) {
      side_nav.classList.add("active_mobile_view");
    }
  });
})();

const nav_link_toggler = document.querySelectorAll(".nav_btn_toggler");
const all_nav_btn = document.querySelectorAll(".nav_btn");
const all_sub_link = document.querySelectorAll(".sub_link");
let active_index;
nav_link_toggler.forEach((_, i) => {
  nav_link_toggler[i].addEventListener("click", function () {
    nav_link_toggler.forEach((_, j) => {
      nav_link_toggler[j].lastElementChild.innerHTML = "+";
      nav_link_toggler[j].nextElementSibling.classList.remove("show_nav_items");
      nav_link_toggler[j].nextElementSibling.classList.remove(
        "show_nav_items2"
      );
      nav_link_toggler[j].nextElementSibling.classList.add("hide_nav_items2");
      nav_link_toggler[j].nextElementSibling.classList.add("hide_nav_items");
    });

    nav_link_toggler[i].lastElementChild.innerHTML = "-";
    if (
      nav_link_toggler[i].nextElementSibling.classList.contains(
        "hide_nav_items"
      )
    ) {
      nav_link_toggler[i].nextElementSibling.classList.remove(
        "hide_nav_items2"
      );
      nav_link_toggler[i].nextElementSibling.classList.add("show_nav_items2");
      setTimeout(() => {
        nav_link_toggler[i].nextElementSibling.classList.remove(
          "hide_nav_items"
        );
        nav_link_toggler[i].nextElementSibling.classList.add("show_nav_items");
      }, 100);
    } else {
      nav_link_toggler[i].nextElementSibling.classList.add("hide_nav_items");
      nav_link_toggler[i].nextElementSibling.classList.remove("show_nav_items");
      setTimeout(() => {
        nav_link_toggler[i].nextElementSibling.classList.add("hide_nav_items2");
        nav_link_toggler[i].nextElementSibling.classList.remove(
          "show_nav_items2"
        );
      }, 100);
    }

    if (active_index === i) {
      nav_link_toggler[i].lastElementChild.innerHTML = "+";
      nav_link_toggler[i].nextElementSibling.classList.remove("show_nav_items");
      nav_link_toggler[i].nextElementSibling.classList.remove(
        "show_nav_items2"
      );
      nav_link_toggler[i].nextElementSibling.classList.add("hide_nav_items2");
      nav_link_toggler[i].nextElementSibling.classList.add("hide_nav_items");
      active_index = null;
    } else {
      active_index = i;
    }
  });
});
all_nav_btn.forEach((ele, i) => {
  ele.addEventListener("click", function () {
    localStorage.setItem("active_nav_link_i", i);
    if (ele.childElementCount < 3) {
      localStorage.removeItem("active_nav_link_text_i");
    }
  });
});
all_sub_link.forEach((ele, i) => {
  ele.addEventListener("click", function () {
    localStorage.setItem("active_nav_link_text_i", i);
  });
});

let show_nav = true;
function toggle_nav() {
  show_nav = !show_nav;
  if (show_nav) {
    document.getElementById("side_nav").style.display = "block";
    document.querySelector(".header_brand").style.display = "block";
  } else {
    document.querySelector(".header_brand").style.display = "none";
    document.getElementById("side_nav").style.display = "none";
  }
}

window.addEventListener("load", () => {
  const i = localStorage.getItem("active_nav_link_i");
  const i2 = localStorage.getItem("active_nav_link_text_i");
  if (i2) {
    all_sub_link[i2].classList.add("active_text_link");
  }

  if (i) {
    all_nav_btn[i].classList.add("bg-gray-100");
    all_nav_btn[i].classList.add("shadow");

    const count = all_nav_btn[i].childElementCount;
    if (count > 2) {
      if (document.documentElement.clientWidth >= 850) {
        all_nav_btn[i].nextElementSibling.classList.remove("hide_nav_items");
        all_nav_btn[i].nextElementSibling.classList.remove("hide_nav_items2");
        all_nav_btn[i].nextElementSibling.classList.add("show_nav_items");
        all_nav_btn[i].nextElementSibling.classList.add("show_nav_items2");
        all_nav_btn[i].lastElementChild.innerHTML = "-";
      }
    }
  } else {
    all_nav_btn[0].classList.add("bg-gray-100");
    all_nav_btn[0].classList.add("shadow");
  }
});
