let initial_cat_level = 0;

function MakeCategoriesList(categories, parentID) {
    const list = [];
    let children;

    if (parentID) {
        children = categories.filter((c) => c.parent_id === parentID);
    } else {
        children = categories.filter((c) => c.parent_id === "0");
    }

    children?.map((c, i) => {
        list.push({
            ...c,
            children: MakeCategoriesList(categories, c.id),
        });
    });

    return list;
}

const converted = MakeCategoriesList(categories) || [
    { id: "", category: "", parent_id: "" },
];

// Render Categories 1
const all_categories_ul = document.querySelectorAll(".categories_ul");
const renderCategories = (get_categories) => {
    const show_categories = [];
    get_categories?.map((c, i) => {
        const Random = Math.random();
        show_categories.push(
            `<li>
       <div class="flex items-center justify-between hover:bg-gray-100">
        <div style="padding-left:${6}px;" >
          ${c?.children?.length > 0
                ? `<button data-parent="${c?.category + Random
                }" class="child_categories_toggler text-lg font-semibold text-cyan-800 w-5 h-5 border focus:ring inline-flex items-center justify-center rounded" data-target="${c?.parent_id
                }" >+</button>`
                : `<button class="w-5"></button>`
            }

          <span class="pl-2 cursor-pointer p-2 hover:bg-gray-100 rounded">${c?.category
            }</span>
        </div>
        <div class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
        <a class="cat_btn cat_btn1 edit_btn" data-name="${c?.category}" data-id="${c?.id}"> Edit </a> 
        <a class="cat_btn cat_btn2" href="delete.php?src=category&&id=${c?.id}"> Delete </a> 
        </div>
       </div>
    ${c.children.length > 0
                ? `<div>

      <ul data-parent="${c?.category + Random
                }" class="child_categories hidden">${renderCategories(c.children)}</ul>

      </div>`
                : " "
            }
  </li>`
        );
    });

    return show_categories;
};
all_categories_ul.forEach((ele) => {
    ele.innerHTML = renderCategories(converted).join("").replace(/,/g, "");
});

// Render Categories 2 (For Select)
const parent_cat = document.getElementById("parent_cat");
const categories_ul_ref_parent = document.querySelector(
    ".categories_ul_ref_parent"
);

const hide_categories_ul_ref_parent = document.querySelector(
    ".hide_categories_ul_ref_parent"
);

hide_categories_ul_ref_parent.addEventListener("click", function () {
    categories_ul_ref_parent.style.display = "none";
});

if (
    parent_cat) {


    parent_cat.addEventListener("focus", function () {
        categories_ul_ref_parent.style.display = "block";
    });
}

const all_categories_ul_ref = document.querySelectorAll(".categories_ul_ref");
const renderCategories_ref = (get_categories) => {
    const show_categories = [];
    get_categories?.map((c, i) => {
        const Random = Math.random();
        show_categories.push(
            `<li>
        <button style="padding-left:${6}px;" >
          ${c?.children?.length > 0
                ? `<button type="button" data-parent="${c?.category + Random
                }" class="child_categories_toggler text-lg font-semibold text-cyan-800 w-5 h-5 border focus:ring inline-flex items-center justify-center rounded" data-target="${c?.parent_id
                }" >+</button>`
                : `<button class="w-5"></button>`
            }

          <span data-id="${c?.id}" class="select_ref_cat cursor-pointer px-2 py-1 ml-2 hover:bg-gray-100 rounded">${c?.category
            }</span>
        </button>
  ${c.children.length > 0
                ? `<div>

      <ul data-parent="${c?.category + Random
                }" class="child_categories hidden">${renderCategories_ref(
                    c.children
                )}</ul>

      </div>`
                : " "
            }
  </li>`
        );
    });

    return show_categories;
};
all_categories_ul_ref.forEach((ele) => {
    console.log('work')
    ele.innerHTML = renderCategories_ref(converted).join("").replace(/,/g, "");
});

window.addEventListener("DOMContentLoaded", function () {
    const all_child_categories_toggler = this.document.querySelectorAll(
        ".child_categories_toggler"
    );
    const all_child_categories =
        this.document.querySelectorAll(".child_categories");

        all_child_categories_toggler?.forEach((btn) => {
        let open = false;

        btn.addEventListener("click", function (e) {
            open = !open;
            const click_target = this?.dataset?.parent;
            all_child_categories?.forEach((ul) => {
                const ul_target = ul?.dataset?.parent;
                if (click_target === ul_target) {
                    if (open) {
                        ul.classList.remove("hidden");
                        btn.innerHTML = "-";
                    } else {
                        ul.classList.add("hidden");
                        btn.innerHTML = "+";
                    }
                }
            });
        });

        const all_edit_btn = document.querySelectorAll('.edit_btn')
        all_edit_btn.forEach((btn) => {
            btn.addEventListener('click', function () {
                const id = this?.dataset?.id
                const name = this?.dataset?.name
                document.getElementById('up_cat').value = id
                document.getElementById('edit_cat_name').value = name
            })
        })

    });

    const all_select_ref_cat = this.document.querySelectorAll(".select_ref_cat");
    all_select_ref_cat.forEach((btn) => {
        btn.addEventListener("click", function () {
            parent_cat.value = btn?.innerText?.trim();
            const categoryHiddenId = document.getElementById('category-hidden-id')
            categoryHiddenId.value = btn?.dataset?.id
            categories_ul_ref_parent.style.display = "none";
        });
    });
});


//add category area
const all_show_add_new_cat = document.querySelectorAll(".show_add_new_cat");
const all_hide_add_new_cat = document.querySelectorAll(".hide_add_new_cat");
const add_category_wrapper = document.querySelector(".add_category_wrapper");

all_show_add_new_cat.forEach((btn) => {
    btn.addEventListener("click", function () {
        add_category_wrapper.style.display = "block";
    });
});

all_hide_add_new_cat.forEach((ele) => {
    ele.addEventListener("click", function () {
        add_category_wrapper.style.display = "none";
    });
});

const allCategoryBtn = document.querySelectorAll(".cat_btn1");
const edit_popup = document.getElementById("edit_popup");
const edit_cat_name = document.getElementById("edit_cat_name");


allCategoryBtn.forEach(bt => {
    bt.addEventListener('click', function () {
        edit_popup.style.display = "block";
    })
})

