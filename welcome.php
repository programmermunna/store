<?php include("common/home-header.php")?>
        <main>
			<section class="cta section">
                <div class="container-sm">
                    <div class="cta-inner section-inner">
                        <div class="cta-header text-center">
                            <h2 class="section-title mt-0">Congratulations</h2>
                            <p class="section-paragraph">Congratulations for purchese (Store Management Software).
                                You can Chack your Email. We will send you admin details of this software soon. Thanks
                            </p>
							<div class="cta-cta"><a class="button button-primary" href="home.php">Go To Home</a></div>
					    </div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


