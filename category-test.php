<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->

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
                <small>Categories test</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div style="background: #fff;border-radius: 5px;box-shadow: 0px 5px 10px #dfdfdf;" class="main_content_container">            

                <div class="p-6">
                  <div class="pb-4 flex justify-between">
                    <p style="visibility: hidden;"></p>
                    <?php if(isset($msg)){ ?><div class="alert_success"><?php echo $msg; ?></div> <?php }?>
                    <!-- <button class="show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add New
                        Category</button> -->
                    </div>
                    <!-- <ul class="categories_ul"></ul> -->




<?php 
$category = mysqli_query($conn, "SELECT * FROM category");
// $arr = array();
while ($row = mysqli_fetch_assoc($category)) {
    $arr[] = $row;
}

function buildTree(Array $data, $parent = 0) {
    $tree = array();
    foreach ($data as $d) {
        if ($d['parent_id'] == $parent) {
            $children = buildTree($data, $d['id']);
            // set a trivial key
            if (!empty($children)) {
                $d['_children'] = $children;
            }
            $tree[] = $d;
        }
    }
    return $tree;
}

$rand = rand();

$arr = buildTree($arr);

function printTree($arr, $r = 0, $p = null) {
    foreach ($arr as $i => $t) {
        $dash = ($t['parent_id'] == 0) ? '' : str_repeat('&nbsp&nbsp&nbsp&nbsp&nbsp', $r) .' ';
        echo "<div class='full_row'>";
        echo  "<div class='cat_div'>$dash<span class='plus_icon'>+</span>", $t['category'];
        echo "<span class='action_button'><a href='?id=".$t['id']."'>Edit</a> || <a href='?id=".$t['id']."'>Delete</a></span>";
        echo "</div></div>";

       
        if (isset($t['_children'])) {
            echo "<div calss='next'>";
            printTree($t['_children'], ++$r, $t['parent_id']);
            --$r;
            echo "</div>";
        }
    }
}

printTree($arr);


?>
 

<style>
    .full_row{
        width: 100%;
        margin:10px 0;
    }

    .cat_div{
        padding:5px;
        border-bottom:1px solid #dfdfdf;
        
    }
    .plus_icon{
        color:#317EEB;
        border:1px solid #dfdfdf;
        padding:0 5px;
        margin-right: 10px;
        cursor: pointer;
    }
    .action_button{
        float: right;
    }
    .next{
        display: none;
    }
    
</style>

<script>
    let full_row = document.querySelector(".full_row");
    let cat_div = document.querySelector(".cat_div");
    let plus_icon = document.querySelector(".plus_icon");

    plus_icon.addEventListener("click",()=>{
        console.dir(full_row);
    })

</script>






                </div>
            </div>
        </section>
    </section>
</main>



<!-- Side Navbar Links -->
<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->