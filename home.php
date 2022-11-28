<?php include("common/home-header.php")?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0"><?php echo $product['title']?></h1>
	                        <p style="text-align:left;" class="hero-paragraph"><?php echo $product['summery']?></p>
	                        <div class="hero-cta">
								<a style="margin-right:5px" class="button button-primary" href="order.php">Buy it now</a>
								<a style="background:#3B82F6" class="button button-primary" target="_blank" href="login.php">See Demo</a>
							</div>
						</div>
						<div class="hero-media" style="margin-top:55px">
						<img class="template_img" src="upload/<?php echo $product['file']?>">
						<h3 style="text-align:center"><?php echo $product['price']?>৳/Year</h3>
						</div>
                    </div>
                </div>
            </section>

            <section class="features section">
                <div class="container">
					<div class="features-inner section-inner has-bottom-divider">
						<div style="text-align:left;" class="features-header text-center">
								<?php echo $product['content']?>
                        </div>
                    </div>
                </div>
            </section>

			<section class="cta section">
                <div class="container">
                    <div class="cta-inner section-inner">
                        <div class="cta-header">
                            <h2 class="section-title mt-0">Get it and Switch</h2>
                            <p class="section-paragraph"><?php echo $product['mini_content']?></p>
					    </div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
