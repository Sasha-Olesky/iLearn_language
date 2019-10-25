<?php include "include/header/header.php"; ?>
    
    <div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center_bottom">
        <div>
            <!--LOGO-->
            <a href="<?php echo site_url('student') ?>"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" width="170" src="<?php echo base_url();?>img/logos/iLearnLanguage-transparent-logo.svg"></a>
              
            <div class="nicdark_section nicdark_height_80"></div>

            <div class="nicdark_container nicdark_clearfix signup-container" style="width: 60%;">

                <h1 class="nicdark_font_size_30 nicdark_color_black" style="text-align: center;"><strong>Step 2</strong></h1>
                </br>
                
                <div class="nicdark_section nicdark_height_20"></div>
                <div style="width: 100%; text-align: center;">
                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="300" src="<?php echo base_url(); ?>img/default/default_student.png">
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="file" style="display: inline-block;" name="image" />
                </div>
                <div class="nicdark_section nicdark_height_20"></div>


                <form method="POST" action="second_signup_action">
                    <!-- Account Information -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>TEACHING INFORMATION</strong></h1>
                    <div class="nicdark_section nicdark_height_10"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">EXPECTED HOURLY RATE</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="hour_rate" placeholder="">
                    <div class="nicdark_section nicdark_height_5"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black">Expected salary for 60mins of teaching in USD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">TEACHER BIO</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="overview" placeholder="">
                    <div class="nicdark_section nicdark_height_5"></div>

                    <!-- webcam view -->
                    <!-- <div style="text-align: center;">
                        <div id="my_camera" style="display: inline-block;"></div>
                        <div id="results"  style="display: inline-block;"></div>
                    </div> -->
                    <!-- A button for taking snaps -->
                    <!-- <input type="button" value="Take Snapshot" onClick="take_snapshot()"> -->

                    <!-- user photo -->
                    <h1 class="nicdark_font_size_15 nicdark_color_black">PROFILE PHOTO</h1>
                    <div class="nicdark_section nicdark_height_10"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">UPLOAD CERTIFICATES</h1>
                    <!-- next button -->
                    <div class="nicdark_section nicdark_height_15"></div>
                    
                    <input type="submit" name="fist-step" class="login loginmodal-submit" value="SAVE AND CONTINUE">
                </form>
                
            </div>
        </div>
        <div class="nicdark_section nicdark_height_80"></div>
    </div>
<?php include "include/footer/footer.php"; ?>