// Icons
const sort_ascending_icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
  <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
</svg>`;

const sort_descending_icon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
  <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
</svg>`;

const search_svg = `<svg
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

const notification_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
/>
</svg>`;

const users_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-blue-500"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"
/>
</svg>`;

const expand_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5 text-white"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="2"
>
<path
  stroke-linecap="round"
  stroke-linejoin="round"
  d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"
/>
</svg>`;

const message_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
  clip-rule="evenodd"
/>
</svg>`;

const user_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-gray-700"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
  clip-rule="evenodd"
/>
</svg>`;

const setting_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-gray-700"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
  clip-rule="evenodd"
/>
</svg>`;

const lock_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-gray-700"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
  clip-rule="evenodd"
/>
</svg>`;

const logout_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-gray-700"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
  clip-rule="evenodd"
/>
</svg>`;

const dashboard_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
/>
</svg>`;
const pos_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
<path
  fill-rule="evenodd"
  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
  clip-rule="evenodd"
/>
</svg>`;
const customer_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
/>
</svg>`;
const seller_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
/>
</svg>`;

const category_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"
/>
</svg>`;
const product_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"
/>
</svg>`;
const order_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
/>
</svg>`;

const setting_svg2 = `<svg
xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
  clip-rule="evenodd"
/>
</svg>`;

const chevronleft_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-6 w-6 text-white"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  fill-rule="evenodd"
  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
  clip-rule="evenodd"
/>
</svg>`;

const cart_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5"
viewBox="0 0 20 20"
fill="currentColor"
>
<path
  d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
/>
</svg>`;

const eye_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-5 w-5"
viewBox="0 0 20 20"
fill="currentColor"
>
<path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
<path
  fill-rule="evenodd"
  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
  clip-rule="evenodd"
/>
</svg>`;

const edit_svg = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>`;

const exclamation_svg = `<svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
</svg>`;

const check_svg = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
</svg>`;

const menu_svg = `<svg
xmlns="http://www.w3.org/2000/svg"
class="h-6 w-6"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor"
stroke-width="2"
>
<path
  stroke-linecap="round"
  stroke-linejoin="round"
  d="M4 6h16M4 12h16M4 18h16"
/>
</svg>`;

// set icons
window.addEventListener("load", () => {
  document
    .querySelectorAll(".menu_icon")
    .forEach((ele) => (ele.innerHTML = menu_svg));

  document
    .querySelectorAll(".check_icon")
    .forEach((ele) => (ele.innerHTML = check_svg));

  document
    .querySelectorAll(".exclamation_icon")
    .forEach((ele) => (ele.innerHTML = exclamation_svg));

  document
    .querySelectorAll(".edit_icon")
    .forEach((ele) => (ele.innerHTML = edit_svg));

  document
    .querySelectorAll(".user_icon")
    .forEach((ele) => (ele.innerHTML = user_svg));
  document
    .querySelectorAll(".setting_icon")
    .forEach((ele) => (ele.innerHTML = setting_svg));
  document
    .querySelectorAll(".lock_icon")
    .forEach((ele) => (ele.innerHTML = lock_svg));
  document
    .querySelectorAll(".logout_icon")
    .forEach((ele) => (ele.innerHTML = logout_svg));

  document
    .querySelectorAll(".search_icon")
    .forEach((ele) => (ele.innerHTML = search_svg));

  document
    .querySelectorAll(".notification_icon")
    .forEach((ele) => (ele.innerHTML += notification_svg));

  document
    .querySelectorAll(".users_icon")
    .forEach((ele) => (ele.innerHTML = users_svg));

  document
    .querySelectorAll(".expand_icon")
    .forEach((ele) => (ele.innerHTML = expand_svg));

  document
    .querySelectorAll(".message_icon")
    .forEach((ele) => (ele.innerHTML = message_svg));

  document
    .querySelectorAll(".dashboard_icon")
    .forEach((ele) => (ele.innerHTML = dashboard_svg));

  document
    .querySelectorAll(".pos_icon")
    .forEach((ele) => (ele.innerHTML = pos_svg));

  document
    .querySelectorAll(".customer_icon")
    .forEach((ele) => (ele.innerHTML = customer_svg));

  document
    .querySelectorAll(".seller_icon")
    .forEach((ele) => (ele.innerHTML = seller_svg));

  document
    .querySelectorAll(".category_icon")
    .forEach((ele) => (ele.innerHTML = category_svg));

  document
    .querySelectorAll(".product_icon")
    .forEach((ele) => (ele.innerHTML = product_svg));

  document
    .querySelectorAll(".order_icon")
    .forEach((ele) => (ele.innerHTML = order_svg));

  document
    .querySelectorAll(".setting_icon2")
    .forEach((ele) => (ele.innerHTML = setting_svg2));

  document
    .querySelectorAll(".chevronleft_icon")
    .forEach((ele) => (ele.innerHTML = chevronleft_svg));

  document
    .querySelectorAll(".cart_icon")
    .forEach((ele) => (ele.innerHTML = cart_svg));
  document
    .querySelectorAll(".eye_icon")
    .forEach((ele) => (ele.innerHTML = eye_svg));
});
