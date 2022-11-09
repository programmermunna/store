<?php include("common/home-header.php")?>
<?php 
if($user_id<1){
    $msg = "Please Login First";
    header("location:user-login.php?msg=$msg");
}
?>
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">

						<div class="hero-copy" style="padding-top:0;">
                            <form action="">
                            <div class="order">
                                <div class="order-itmes">
                                    <label for="name">Full Name</label>
                                    <input name="name" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="email">Email</label>
                                    <input name="email" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="address">Address</label>
                                    <input name="address" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="pmn_method">Payment Method</label>
                                    <input name="pmn_method" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="pmn_number">Payment Number</label>
                                    <input name="pmn_number" type="text">
                                </div> 
                                <div class="order-itmes">
                                    <label for="trans_id">Transaction  Id</label>
                                    <input name="trans_id" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="ammount">Amount</label>
                                    <input name="ammount" type="text">
                                </div>
                                <input name="name" class="submit_btn" type="submit" value="Submit">
                            </div>
                            </form>
						</div>

						<div class="hero-media">
							<img style="width:100%;height: 350px;" src="https://static.wixstatic.com/media/ea6ac8_b6b0cbe25615488e855f515846354dda~mv2.jpg/v1/fill/w_640,h_420,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/ea6ac8_b6b0cbe25615488e855f515846354dda~mv2.jpg">
                            <h3>Lorem ipsum dolor sit, amet consectetur adipisicing</h3>
                            <p style="font-size:15px;font-style:italic">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A ut, velit eos quibusdam deleniti consectetur quis, illum excepturi similique deserunt officia dignissimos obcaecati? Ratione alias, odit voluptatem tempora aut natus illum veniam optio minus facilis dolor sit impedit sapiente iusto aspernatur nam temporibus accusantium nihil, saepe dolore laborum deleniti voluptas. Esse sunt non consequuntur consequatur quae! Cumque, consectetur. Totam delectus tempore eveniet labore nihil necessitatibus corporis possimus sit ut quidem deserunt quis mollitia debitis, dolores distinctio quibusdam commodi atque nemo maxime. Porro consectetur voluptates aliquam modi. Cum beatae odit quae recusandae vel, odio, cumque, perspiciatis harum animi dolores placeat laboriosam.</p>

						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
