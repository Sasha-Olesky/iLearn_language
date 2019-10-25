<?php include "include/header/header.php"; ?>


    <div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center_bottom">
        <div>
            <!--LOGO-->
            <a href="<?php echo site_url('student') ?>"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" width="170" src="<?php echo base_url();?>img/logos/iLearnLanguage-transparent-logo.svg"></a>
              
            <div class="nicdark_section nicdark_height_80"></div>

            <div class="nicdark_container nicdark_clearfix signup-container" style="width: 60%;">

                <h1 class="nicdark_font_size_30 nicdark_color_black" style="text-align: center;"><strong>Sign up as Student</strong></h1>
                </br>
                <form method="POST" action="main_page">
                    
                    <h1 class="nicdark_font_size_15 nicdark_color_black">DISPLAY NAME</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="display_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">EMAIL</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="user_email" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PASSWORD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="password" name="user_password" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>                    
                    
                    <h1 class="nicdark_font_size_15 nicdark_color_black">REENTER PASSWORD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="password" name="confirm_pw" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>     

                    <h1 class="nicdark_font_size_15 nicdark_color_black">RESIDING IN</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="residing_in" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>     

                    <h1 class="nicdark_font_size_15 nicdark_color_black">COUNTRY CODE</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="country_code" style="width: 100%; height: 30pt">
                        <?php
                        for($i=0; $i < count($country_codes); $i ++ ) {
                            $temp = $country_codes[$i];
                            $country_code = $temp['isd'];
                            $country_code_title = $temp['name']."(+".$country_code.")";
                        ?>
                        <option value=<?php echo $country_code ?>><?php echo $country_code_title ?></option>
                        <?php } ?>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PHONE</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="phone_number" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>   

                    <input type="submit" name="fist-step" class="login loginmodal-submit" value="Next">
                </form>
            </div>
        </div>
        <div class="nicdark_section nicdark_height_80"></div>
    </div>


    </div>
</div>
<?php include "include/footer/footer.php"; ?>