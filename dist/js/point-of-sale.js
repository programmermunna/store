// initial products
const products = [
  {
    id: "1",
    name: "Asus Laptop",
    code: "F3492384",
    sell_price: "12000",
    image:
      "https://images.jdmagicbox.com/quickquotes/images_main/second-hand-laptop-327324548-2nf90.jpg",

    garage: "C",
    route: "1",
    buy_price: "21000",
    category: "Electronics",
    seller: "John",
    buying_date: "10-10-2020",
    expire_date: "not-expired",
  },
  {
    id: "2",
    name: "Desktop Computer (CPU)",
    code: "A3D49384",
    sell_price: "15000",
    image:
      "https://images.jdmagicbox.com/quickquotes/images_main/Computer-CPU-327422658-e243q.jpg",
    garage: "B",
    route: "91",
    buy_price: "28000",
    category: "Electronics",
    seller: "Smith",
    buying_date: "10-10-2019",
    expire_date: "not-expired",
  },
  {
    id: "2",
    name: "Desktop Computer (CPU)",
    code: "A3D49384",
    sell_price: "15000",
    image:
      "https://images.jdmagicbox.com/quickquotes/images_main/Computer-CPU-327422658-e243q.jpg",
    garage: "B",
    route: "91",
    buy_price: "28000",
    category: "Electronics",
    seller: "Smith",
    buying_date: "10-10-2019",
    expire_date: "not-expired",
  },
  {
    id: "2",
    name: "Desktop Computer (CPU)",
    code: "A3D49384",
    sell_price: "15000",
    image:
      "https://images.jdmagicbox.com/quickquotes/images_main/Computer-CPU-327422658-e243q.jpg",
    garage: "B",
    route: "91",
    buy_price: "28000",
    category: "Electronics",
    seller: "Smith",
    buying_date: "10-10-2019",
    expire_date: "not-expired",
  },
];

// show all products
function make_show(items) {
  const pos_products_wrapper = document.getElementById("pos_products_wrapper");
  pos_products_wrapper.innerHTML = "";
  items.map((product, i) => {
    pos_products_wrapper.innerHTML += `
  <tr class="${i % 2 === 0 ? "bg-gray-50" : "bg-white"}">
    <td class="p-3 border whitespace-nowrap">
      <div class="text-center">${product.name}</div>
    </td>
    <td class="p-3 border whitespace-nowrap">
      <div class="w-full h-full flex_center">
        <img
        class="rounded-sm"
          src="${product.image}"
          width="60"
          height="60"
          alt="${product.name}"
        />
    </div>
  </td>

  <td class="p-3 border whitespace-nowrap">
  <div class="text-center">${product.category}</div>
</td>
<td class="p-3 border whitespace-nowrap">
  <div class="text-center">${product.code}</div>
</td>

<td class="p-3 border whitespace-nowrap">
<div class="w-full flex_center">
  <button
  onclick="set_selected_by_click_pluc_icon(${product.id})"
    class="btn w-7 h-7 flex_center rounded focus:ring bg-teal-500 text-white text-xl"
  >
    +
  </button>
</div>
</td>
  </tr>

      `;
  });
}

// show all selected products
function show_selected_products() {
  const selected_products_wrapper = document.getElementById(
    "selected_products_wrapper"
  );
  selected_products_wrapper.innerHTML = "";
  const selected_products = JSON.parse(localStorage.getItem("pos_selected"));

  if (selected_products.length === 0) {
    selected_products_wrapper.innerHTML = `<tr>
    <td class="pt-5 pl-5">No data</td>
  </tr>`;
    return;
  }

  selected_products.map((product, i) => {
    selected_products_wrapper.innerHTML += `
    
    <tr>
    <td class="p-3 border text-center">${product.name}</td>
    <td class="p-3 border text-center">
      <div class="text-center flex_center gap-1">
        <input
          value="${product.quantity || 1}"
          type="number"
          class="selected_quantity_input w-12 p-1 rounded border-2 text-center"
        />
        <button
        data-id="${product.id}"
        class="quantity_check_bnt btn w-7 h-7 flex_center rounded focus:ring bg-teal-500 text-white text-xl"
        >
          ✔
        </button>
      </div>
    </td>
    <td class="p-3 border text-center">${product.sell_price}</td>
    <td class="p-3 border text-center">${
      product.quantity * product.sell_price
    }</td>
    <td class="p-3 border text-center">
      <div class="w-full flex_center">
        <button
        onclick="delete_selected_product(${product.id})"
          class="btn px-2 py-1 rounded focus:ring bg-red-500 text-white text-xs"
        >
          Delete
        </button>
      </div>
    </td>
  </tr>
    `;
  });

  quantity_handler();

  document.querySelectorAll(".selected_quantity_input").forEach((input) => {
    input.addEventListener("change", (e) => {
      const value = e.target.value;
      if (value < 1) {
        e.target.value = 1;
      }
    });
  });
  const get_total_quantity = selected_products.reduce(
    (acc, obj) => parseInt(acc) + parseInt(obj.quantity),
    0
  );
  const vat = get_total_quantity * 50;
  const get_subtotal = selected_products.reduce(
    (acc, obj) =>
      parseInt(acc) + parseInt(obj.sell_price) * parseInt(obj.quantity),
    0
  );
  const total = get_subtotal + vat;

  document.getElementById("pos_quantity").innerText =
    typeof get_total_quantity === "number" ? get_total_quantity : "0";

  document.getElementById("pos_vat").innerText = vat.toLocaleString() || "0";

  document.getElementById("pos_subtotal").innerText =
    typeof get_subtotal === "number" ? get_subtotal.toLocaleString() : "0";

  document.getElementById("pos_total").innerText = total.toLocaleString() || 0;
}

// set selected product by click "PLUS" Icon button
function set_selected_by_click_pluc_icon(id) {
  const prev_selected = JSON.parse(localStorage.getItem("pos_selected")) || [];
  const get_index = products.findIndex((p) => p.id === id.toString());
  const get_product = products[get_index];
  const inluded_index = prev_selected.findIndex((p) => p.id === id.toString());
  if (inluded_index > -1) {
    update_selected_products(
      id.toString(),
      parseInt(prev_selected[inluded_index].quantity) + 1
    );
  } else {
    localStorage.setItem(
      "pos_selected",
      JSON.stringify([
        ...prev_selected,
        { ...get_product, quantity: 1, sub_total: get_product.price },
      ])
    );
    show_selected_products();
  }
  show_popup_message("Product Added!");
}

// update selected products "Quantity" and "Sub Total"
function update_selected_products(id, new_quantity) {
  const prev_selected = JSON.parse(localStorage.getItem("pos_selected")) || [];
  const updated_selected = prev_selected.map((p) => {
    if (p.id === id) {
      return {
        ...p,
        sub_total: p.price * new_quantity,
        quantity: new_quantity,
      };
    } else {
      return p;
    }
  });
  localStorage.setItem("pos_selected", JSON.stringify(updated_selected));
  show_selected_products();
}

// quantity input handler by click check button
function quantity_handler() {
  const all_quantity_check_bnt = document.querySelectorAll(
    ".quantity_check_bnt"
  );

  all_quantity_check_bnt.forEach((btn) => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      const new_quantity = btn.previousElementSibling.value;
      update_selected_products(id, new_quantity);
    });
  });
}

// delete selected product by click delete button
function delete_selected_product(id) {
  const previous = JSON.parse(localStorage.getItem("pos_selected"));
  const updated = previous.filter((p) => p.id !== id.toString());
  localStorage.setItem("pos_selected", JSON.stringify(updated));
  show_selected_products();
}

const all_table_th_div = document.querySelectorAll(".table_th_div");
all_table_th_div.forEach((ele, i) => {
  ele.addEventListener("click", function () {
    for (let i = 0; i < all_table_th_div.length; i++) {
      all_table_th_div[i].children[1].classList.remove("active");
    }
    this.children[1].classList.add("active");

    // Called Sort func
    make_sort(
      this.children[0].innerText.toLowerCase(),
      products,
      this.children[1]
    );
  });
});

function create_invoice() {
  location.replace("pos-invoice.php");
}

window.addEventListener("load", () => {
  make_show(products);
});
