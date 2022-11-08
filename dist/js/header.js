// Full Screen Toggler
let on_full_screen = false;
function toggle_full_screen() {
  if (!on_full_screen) {
    document.documentElement
      .requestFullscreen()
      .then(() => (on_full_screen = true));
  } else {
    document.exitFullscreen().then(() => (on_full_screen = false));
  }
}

// Header Search Toggler For Mobile Device
const header_search_form = document.getElementById("header_search_form");
const search_toggle = document.getElementById("search_toggle");
(() => {
  let show_search = false;
  search_toggle.addEventListener("click", function () {
    show_search = !show_search;
    if (show_search) {
      this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>`;
      header_search_form.style.transform = "scaleY(1)";
    } else {
      header_search_form.style.transform = "scaleY(0)";
      this.innerHTML = `<svg
  xmlns="http://www.w3.org/2000/svg"
  class="h-5 w-5"
  viewBox="0 0 20 20"
  fill="currentColor"
>
  <path
    fill-rule="evenodd"
    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
    clip-rule="evenodd"
  />
</svg>`;
    }
  });
})();

// Header Profile Options Toggler
const profile_options = document.getElementById("profile_options");
let profile_options_overlay = document.getElementById(
  "profile_options_overlay"
);
const header_profile_image = document.getElementById("header_profile_image");
let show_options = false;
(() => {
  function toggle() {
    show_options = !show_options;
    if (show_options) {
      profile_options.style.transform = "scaleY(1)";
      profile_options_overlay.style.display = "flex";
    } else {
      profile_options.style.transform = "scaleY(0)";
      profile_options_overlay.style.display = "none";
    }
  }
  header_profile_image.addEventListener("click", () => {
    toggle();
  });
  profile_options_overlay.addEventListener("click", () => {
    toggle();
  });
})();

// Sort functionality
let reverse_sort = false;
let sorted_text = "";
function make_sort(get_sort, items = [], icon_element) {
  let sort = get_sort.toString();
  const sorted = items.sort(function (x, y) {
    let a = x[sort];
    let b = y[sort];
    if (typeof a === "string") {
      a = a.toUpperCase();
      b = b.toUpperCase();
    }
    return a == b ? 0 : a > b ? 1 : -1;
  });

  icon_element.innerHTML = sort_ascending_icon;
  make_show(sorted);

  if (sorted_text !== sort) {
    reverse_sort = false;
  }
  if (sorted_text === sort) {
    reverse_sort = !reverse_sort;
    if (reverse_sort) {
      make_show(sorted.reverse());
      icon_element.innerHTML = sort_descending_icon;
    } else {
      make_show(sorted);
      icon_element.innerHTML = sort_ascending_icon;
    }
  }
  sorted_text = sort;
}

// Load event for all pages
const all_sort_icon = document.querySelectorAll(".sort_icon");
window.addEventListener("load", () => {
  all_sort_icon.forEach((ele) => {
    ele.innerHTML = sort_ascending_icon;
    ele.parentElement.setAttribute(
      "title",
      `Sort by ${ele.previousElementSibling.innerText}`
    );
  });

  localStorage.removeItem("pos_selected");

  setTimeout(() => {
    document.querySelectorAll(".go_home").forEach((ele) => {
      ele.addEventListener("click", () => {
        localStorage.clear();
      });
    });
  }, 100);
});

// function
function adjust_active_icon(is_all) {
  localStorage.removeItem("active_nav_link_text_i");
  if (is_all) {
    localStorage.clear();
  }
}

// Print Page
function print_page() {
  window.print();
}

// Popup Message
const popup_message = document.getElementById("popup_message");
function show_popup_message(message) {
  popup_message.innerHTML += `
  <div class="flex_center gap-2 fixed top-20 right-16 z-50 p-2 rounded bg-green-600 text-white">
  <span>✔</span>
  <span>${message}</span>
  </div>
  `;
  setTimeout(() => {
    popup_message.innerHTML = "";
  }, 1500);
}
