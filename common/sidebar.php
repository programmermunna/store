<nav id="side_nav" class="side_nav">
        <a href="index.php">
          <button class="btn nav_btn">
            <span class="nav_icon dashboard_icon"> </span>
            <span class="nav_text">Dashboard</span>
          </button>
        </a>

        <a href="pos-index.php?order=<?php echo $rand = rand(1000,99999999);?>">
          <button class="btn nav_btn">
            <span class="nav_icon pos_icon"> </span>
            <span class="nav_text">POS</span>
          </button>
        </a>

        <div class="relative">
          <button class="btn nav_btn nav_btn_toggler">
            <span class="nav_icon customer_icon"> </span>
            <span class="nav_text">Customer</span>
            <span class="nav_toggle_icon">+</span>
          </button>
          <div class="hidden hide_nav_items nav_items">
            <a href="customer-new.php">
              <button class="sub_link">Add Customer</button>
            </a>
            <a href="customer-all.php">
              <button class="sub_link">All Customer's</button>
            </a>
          </div>
        </div>

        <div class="relative">
          <button class="btn nav_btn nav_btn_toggler">
            <span class="nav_icon category_icon"> </span>
            <span class="nav_text">Brand & Category</span>
            <span class="nav_toggle_icon">+</span>
          </button>
          <div class="hidden hide_nav_items nav_items">
            <a href="brand.php">
              <button class="sub_link">Brand's</button>
            </a>
            <a href="category-all.php">
              <button class="sub_link">Categorie's</button>
            </a>
            <a href="category-test.php">
              <button class="sub_link">test</button>
            </a>
          </div>
        </div>

        <div class="relative">
          <button class="btn nav_btn nav_btn_toggler">
            <span class="nav_icon product_icon"> </span>
            <span class="nav_text">Product</span>
            <span class="nav_toggle_icon">+</span>
          </button>
          <div class="hidden hide_nav_items nav_items">
            <a href="product-new.php">
              <button class="sub_link">Add Product</button>
            </a>
            <a href="product-all.php">
              <button class="sub_link">All Products</button>
            </a>
          </div>
        </div>

        <div class="relative">
          <button class="btn nav_btn nav_btn_toggler">
            <span class="nav_icon order_icon"> </span>
            <span class="nav_text">Order</span>
            <span class="nav_toggle_icon">+</span>
          </button>
          <div class="hidden hide_nav_items nav_items">
            <a href="order-pending.php">
              <button class="sub_link">Pending Order's</button>
            </a>
            <a href="order-success.php">
              <button class="sub_link">Success Order's</button>
            </a>
          </div>
        </div>

        <div class="relative">
          <button class="btn nav_btn nav_btn_toggler">
            <span class="nav_icon order_icon"> </span>
            <span class="nav_text">Setting</span>
            <span class="nav_toggle_icon">+</span>
          </button>
          <div class="hidden hide_nav_items nav_items">            
          <a href="admin-setting.php">
              <button class="sub_link">Admin Setting</button>
            </a>          
          <a href="mail-setting.php">
              <button class="sub_link">Mail Setting</button>
            </a>
            <a href="setting-index.php">
              <button class="sub_link">Website Setting</button>
            </a>
          </div>
        </div>

        <!-- Toggle Nav Text -->
        <div id="toggle_nav_text">
          <button class="btn">
            <span class="chevronleft_icon"></span>
          </button>
        </div>
      </nav>