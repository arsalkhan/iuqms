<!--Content Area Starts here-->
        <div class="content_area_homepage">
        	<div class="heading1 heading1_size">TRY UQMS</div>
            <div class="clear"></div>
            <div class="heading1 sub_heading">Feel The Difference In Your Skin</div>
                <div id="slider1">
                    <a class="buttons prev" href="#">left</a>
                        <div class="viewport">
                            <ul class="overview">
							<?php if(count($products) > '0'){
                            foreach($products as $data){  
                            ?>
                                <li><img src="<?php echo PRODUCTIMAGE.$data['image']; ?>" width="241px" height="125px" /></li>
                             <?php } 
							}else { echo 'no product found!';}?>
                            </ul>
                        </div>
                        <a class="buttons next" href="#">right</a>
                </div>
                <div class="clear"></div>
            <div class="content2_heading"><u>Welcome To IUQMS Soap & Candle Co.</u></div>
            <div class="clear"></div>
            <div class="content_txt2"><br/>At IUQMS Soap & Candle Co. it is our mission to consistently provide
             the highest quality of hand-crafted soaps, candles, and skin care, made with only all-natural and
             organic ingredients, while maintaining excellent customer service.<br/><br/><br/></div> 
        </div>
 <!--Content Area end here-->