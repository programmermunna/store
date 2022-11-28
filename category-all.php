<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php

if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $category_parent = $_POST['parent_category'];

    $category_insert = mysqli_query($conn,"INSERT INTO category(admin_id,category,parent_id) VALUE($id,'$category','$category_parent')");

    if($category_insert){
        $msg = "Created a new category";
        header("location:category-all.php?msg=$msg");
    }else{
        echo "not";
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $up_category = $_POST['up_category'];

    $category_update = mysqli_query($conn,"UPDATE category SET category='$up_category' WHERE id=$id");
    if($category_update){
      $msg = "Updated category";
      header("location:category-all.php?msg=$msg");
  }else{
      echo "not";
  } 
}  


?>

<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php"); ?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Details Title -->
        <div class="page_details">
            <div>
                <a href="index.php" class="go_home"><small>Home</small></a>
                <small>/</small>
                <small>All Categories</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div style="background: #fff;border-radius: 5px;box-shadow: 0px 5px 10px #dfdfdf;" class="main_content_container">            

                <div class="p-6" style="overflow:auto">
                  <div class="pb-4 flex justify-between">
                    <p style="visibility: hidden;"></p>
                    <?php if(isset($msg)){ ?><div class="alert_success"><?php echo $msg; ?></div> <?php }?>
                    <button class="show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add
                        Category</button>
                    </div>
                    <ul class="categories_ul"></ul>
                </div>

                  <form action="" method="POST">
                    <div class="add_category_wrapper" style="display: none;">
                        <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                        <div class="fixed w-[96%] md:w-[500px] inset-0 m-auto bg-white rounded shadow z-50 h-fit">
                        <h3 class="p-4 border-b text-center">
                        <h3 class="p-4 border-b text-center">
                            Add New Category
                        </h3>
                        <div class="p-4 relative">
                            <label for="parent_cat">Parent Category</label>
                            <input required id="parent_cat" placeholder="Select Category" type="search" class="input mt-2">
                            <input name="parent_category" type="hidden" id="category-hidden-id">

                            <script>
                                console.log(document.getElementsByName("parent_category"));
                            </script>

                            <div class="relative categories_ul_ref_parent" style="display: none;">
                            <ul class="categories_ul_ref ring-2 mt-2 ring-gray-100 rounded"></ul>
                            <button class="hide_categories_ul_ref_parent absolute right-2 top-2 text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">hide</button>
                            </div>


                        </div>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Category Name</label>
                            <input name="category" id="cat_name" placeholder="Select Category" type="text" class="input">
                        </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                          <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="submit">Create</button>
                          <button class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                        </div>
                    </div>
                  </form>

                  <!-- -----------edit category -->
                  <form action="" method="POST">
                    <div id="edit_popup" class="add_category_wrapper" style="display: none;">
                        <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                        <div class="fixed w-[96%] md:w-[500px] inset-0 m-auto bg-white rounded shadow z-50 h-fit">
                        <h1 class="p-4 border-b">
                            Edite Category
                        </h1>

                        <div class="p-4 space-y-2">
                            <label for="cat_name">Category Name</label>
                            <input name="up_category" id="edit_cat_name" type="text" class="input">
                            <input type="hidden" name="id" value="" id="up_cat">

                        </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                          <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="update">Update</button>
                          <button class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                        </div>
                    </div>
                  </form>

            </div>
        </section>
    </section>
</main>



<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

