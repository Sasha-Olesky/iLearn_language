<?php include "include/header/header.php"; ?>
    
    <div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center_bottom">
        <div>
            <!--LOGO-->
            <a href="<?php echo site_url('student') ?>"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" width="170" src="<?php echo base_url();?>img/logos/iLearnLanguage-transparent-logo.svg"></a>
              
            <div class="nicdark_section nicdark_height_80"></div>

            <div class="nicdark_container nicdark_clearfix signup-container" style="width: 60%;">

                <h1 class="nicdark_font_size_30 nicdark_color_black" style="text-align: center;"><strong>Step 3</strong></h1>
                </br>
                
                <!-- Account Information -->
                <div class="nicdark_section nicdark_height_10"></div>
                <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>VIDEO INTRODUCTION</strong></h1>
                <div class="nicdark_section nicdark_height_10"></div>
                <form type="width=30%; text-align: center;"> 
                    <input type="submit" name="fist-step" class="login loginmodal-submit" value="RECORD VIDEO">
                </form>
                <div class="nicdark_section nicdark_height_10"></div>

                
                <form method="POST" action="main_page" style="width: 100%;">
                    <!-- Availability -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>AVAILABILITY</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">AVAILABLE HOURS TO TEACH PER WEEK</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="week_hours" style="width: 100%; height: 30pt">
                        <option value="Select...">Select...</option>
                        <option value="less than 30hrs">less than 30hrs</option>
                        <option value="more than 30hrs">more than 30hrs</option>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>CONTRACT</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><input type="checkbox"/>TERMS AND CONDITIONS</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_12 nicdark_color_black">Teachers need a Paypal account in order to get paid.</h1>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <!-- next button -->
                    <input type="submit" name="fist-step" class="login loginmodal-submit" value="SAVE AND APPLY">
                </form>
                
            </div>
        </div>
        <div class="nicdark_section nicdark_height_80"></div>
    </div>
<?php include "include/footer/footer.php"; ?>