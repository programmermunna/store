<?php include("common/home-header.php")?>
<?php 
if($landing_id<1){
    $msg = "Please Login First";
    header("location:user-login.php?msg=$msg");
}
if(isset($_POST['submit'])){    
    $user_id = $user_info['id'];
    $years = $_POST['years'];
    $years_num = $years;
    $years = ($years*365)*86400;
    $years = time()+$years;
    $pmn_method = $_POST['pmn_method'];
    $pmn_number = $_POST['pmn_number'];
    $trans_id = $_POST['trans_id'];
    $amount = $_POST['amount'];
    $time = time();

    $insert = mysqli_query($conn,"INSERT INTO orders(`user_id`, `years`, `years_num`, `pmn_method`, `pmn_number`, `trans_id`, `amount`, `time`) VALUE('$user_id', '$years','$years_num','$pmn_method', '$pmn_number', '$trans_id', '$amount', '$time')");
    if($insert){
        $msg = "Congratulations for Order!";
        header("location:welcome.php?msg=$msg");
    }
}

?>
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">

						<div class="hero-copy" style="padding-top:0;">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="order">
                                <div class="order-itmes">
                                    <label for="name">Name</label>
                                    <input disabled  value="<?php echo $user_info['name']?>">
                                </div>
                                <div class="order-itmes">
                                    <label for="email">Email</label>
                                    <input disabled value="<?php echo $user_info['email']?>">
                                </div> 
                                <div class="order-itmes">
                                    <label for="address">Address</label>
                                    <input disabled name="address" type="text" value="<?php echo $user_info['address']?>">
                                </div> 
                                <div class="order-itmes">
                                    <label for="years">Select Time</label>
                                    <select name="years">
                                        <option value="1">1 Year</option>
                                        <option value="2">2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="4">5 Years</option>
                                        <option value="Lifetime">Lifetime</option>
                                    </select>
                                </div> 
                                <div class="order-itmes">
                                    <label for="pmn_method">Payment Method</label>
                                    <select name="pmn_method">
                                        <option value="Bkash">Bkash (0123456789)</option>
                                        <option value="Nogod">Nogod (0123456789)</option>
                                        <option value="Rocket">Rocket (0123456789)</option>
                                        <option value="Upay">Upay (0123456789)</option>
                                    </select>
                                </div> 
                                <div class="order-itmes">
                                    <label for="pmn_number">Payment Number</label>
                                    <input required name="pmn_number" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="trans_id">Transaction  Id</label>
                                    <input required name="trans_id" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="amount">Amount</label>
                                    <input required name="amount" type="number">
                                </div>
                                <input name="submit" class="submit_btn" type="submit" value="Submit">
                            </div>
                            </form>
						</div>

						<div class="hero-media">
							<img class="template_img" src="upload/store.jpg">
                            <h3>Lorem ipsum dolor sit, amet consectetur adipisicing</h3>
                            <p style="font-size:15px;font-style:italic">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A ut, velit eos quibusdam deleniti consectetur quis, illum excepturi similique deserunt officia dignissimos obcaecati? Ratione alias, odit voluptatem tempora aut natus illum veniam optio minus facilis dolor sit impedit sapiente iusto aspernatur nam temporibus accusantium nihil, saepe dolore laborum deleniti voluptas. Esse sunt non consequuntur consequatur quae! Cumque, consectetur. Totam delectus tempore eveniet labore nihil necessitatibus corporis possimus sit ut quidem deserunt quis mollitia debitis, dolores distinctio quibusdam commodi atque nemo maxime. Porro consectetur voluptates aliquam modi. Cum beatae odit quae recusandae vel, odio, cumque, perspiciatis harum animi dolores placeat laboriosam.</p>

						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
