<?php
require_once('database.php');

if(isset($_POST['catagory'])&&isset($_POST['sp'])){
   
    $prnt=$_POST['catagory'];
    $sp=$_POST['sp'];

    $prn1=mysqli_query($conn, "SELECT * FROM category WHERE parent='$prnt'");                                        
    if(mysqli_num_rows($prn1)>0){ 
       while($row1=mysqli_fetch_array($prn1)){
       ?>
           <tr id="<?php echo $row1['category']; ?>">
            <td>
            <div><?php 
            $coun= 4+$sp; 
            for($i=0;$i<=$coun;$i++){
                echo "&nbsp";
            }

            $prn=$row1['category'];    
            $prn3=mysqli_query($conn, "SELECT * FROM category WHERE parent='$prn'");                                                      
            
            ?>
                <button class="<?php echo $row1['category']; ?>  <?php
                    if(mysqli_num_rows($prn3)>0){ echo "plus_btn subbutton"; } ?>" onclick="getChild('<?php echo $row1['category']; ?>',<?php echo 4+$sp; ?> )" class=''>
                <?php
                    if(mysqli_num_rows($prn3)>0){
                echo "+";
                    } ?>
            
            </button>
                <span><?php echo $row1['category']; ?></span>
            </div>
        </td>
        <td>
            <div>
                <a href="id=<?php echo $row1['id'] ?>">Edit</a>
                <a href="id=<?php echo $row1['id'] ?>">Delete</a>
            </div>
        </td>
        
    </tr>


        <?php
        }
    }else{
        echo 0;
    }
}

?>