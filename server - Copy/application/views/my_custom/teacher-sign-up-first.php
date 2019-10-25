<?php include "include/header/header.php"; ?>


    <div class="nicdark_section nicdark_background_size_cover nicdark_background_position_center_bottom">
        <div>
            <!--LOGO-->
            <a href="<?php echo site_url('student') ?>"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" width="170" src="<?php echo base_url();?>img/logos/iLearnLanguage-transparent-logo.svg"></a>
              
            <div class="nicdark_section nicdark_height_80"></div>

            <div class="nicdark_container nicdark_clearfix signup-container" style="width: 60%;">

                <h1 class="nicdark_font_size_30 nicdark_color_black" style="text-align: center;"><strong>Step 1</strong></h1>
                </br>
                <form method="POST" action="first_signup_action">
                    <!-- Account Information -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>ACCOUNT INFORMATION</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">FULL NAME</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="full_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">DISPLAY NAME</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="display_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">EMAIL</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="email" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PASSWORD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="password" name="password" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>                    
                    
                    <h1 class="nicdark_font_size_15 nicdark_color_black">REENTER PASSWORD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="password" name="confirm_pw" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>     

                    <!-- Language Preferences -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>LANGUAGE PREFERENCES</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">LANGUAGES THAT I AM CERTIFIED/TRAINED TO TEACH</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="teach_language" style="width: 100%; height: 30pt">
                        <?php
                        echo json_encode($countries);
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $i ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">MY NATIVE LANGUAGE</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="native_language" style="width: 100%; height: 30pt">
                        <?php
                        echo json_encode($countries);
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $i ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">LANGUAGES IM FLUENT IN</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="fluent_language" style="width: 100%; height: 30pt">
                        <?php
                        echo json_encode($countries);
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $i ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <!-- Personal Information -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>PERSONAL INFORMATION</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">GENDER</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="gender" style="width: 100%; height: 30pt">
                        <option value="M">Select...</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">DATE OF BIRTH</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <div style="width: 100%">
                        <select name="dob_month" style="float: left; width: 49%; height: 30pt;">
                            <option value=0>Month</option>
                            <?php
                            for($i=1; $i < 13; $i++) {
                                ?>
                                <option value=<?php echo $i ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                        <div style="float: left; width: 2%; height:30pt;"></div>
                        <select name="dob_day" style="float: right; width: 49%; height: 30pt;">
                            <option value=0>Day</option>
                            <?php
                            for($i=1; $i < 32; $i++) {
                                ?>
                                <option value=<?php echo $i ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">FROM</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select name="from_country" style="width: 100%; height: 30pt">
                        <?php
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $i ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">RESIDING IN</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="residing_in" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PAYPAL ACT</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="paypal_id" placeholder="">
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_12 nicdark_color_black">Teachers need a Paypal account in order to get paid.</h1>
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
                    <input type="text" name="mobile_number" placeholder="">
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