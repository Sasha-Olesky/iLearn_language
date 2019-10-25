<div class="nicdark_section" id="tabs-5">
	<!-- description of this page -->
	<div style="background-color: #0F59A5;">
		<div class="nicdark_container nicdark_clearfix des_height nicdark_padding_left_20" style="display: table; overflow: hidden;">
			<div style="display: table-cell; vertical-align: middle;">
                <img alt="" src="<?php echo base_url();?>img/main_icons/profile_settting.png" class="top_main_img_style">
				<h1 class="nicdark_color_black nicdark_font_size_30 nicdark_line_height_50">
		            <font color="#ffffff">Student Profile</font>
		        </h1>

		        <p class="top_main_des_style">
		            <font color="#ffffff">On this page, you can edit your profile.</strong>
		        </p>
	    	</div>
		</div>
	</div>


	<!-- content of this page -->
	<div class="nicdark_container nicdark_clearfix" style="color: #000;">
        <div class=" custom-container">
                
                <div class="nicdark_section nicdark_height_20"></div>
                <div style="width: 100%; text-align: center;">
                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="300" src="<?php echo base_url(); ?>img/default/default_student.png">
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="file" style="display: inline-block;" name="image" />
                </div>
                <div class="nicdark_section nicdark_height_10"></div>

                <form method="POST" action="">
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
                    <input type="text" name="full_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PASSWORD</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="password" name="pass" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>                    

                    <!-- Language Preferences -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>LANGUAGE PREFERENCES</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <div class="nicdark_section nicdark_height_10"></div>
                    <select style="width: 100%; height: 30pt">
                        <option value="United State">United State</option>
                        <option value="Japan">Japan</option>
                        <option value="Sincgars">Sincgars</option>
                        <option value="France">France</option>
                        <option value="Gemany">Gemany</option>
                        <option value="Barzil">Barzil</option>
                        <option value="Australia">Australia</option>
                        <option value="Switherland">Switherland</option>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <!-- Personal Information -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>PERSONAL INFORMATION</strong></h1>
                    <div class="nicdark_section nicdark_height_5"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">GENDER</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <select style="width: 100%; height: 30pt">
                        <option value="Select">Select...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">DATE OF BIRTH</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <div style="width: 100%">
                        <select style="float: left; width: 49%; height: 30pt;">
                            <option value="Month">Month</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <div style="float: left; width: 2%; height:30pt;"></div>
                        <select style="float: right; width: 49%; height: 30pt;">
                            <option value="Day">Day</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="nicdark_section nicdark_height_15"></div>
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">RESIDING IN</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="full_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>

                    <h1 class="nicdark_font_size_15 nicdark_color_black">PHONE</h1>
                    <div class="nicdark_section nicdark_height_10"></div>
                    <input type="text" name="full_name" placeholder="">
                    <div class="nicdark_section nicdark_height_15"></div>                    

                    
                
                    <!-- Account Settings -->
                    <div class="nicdark_section nicdark_height_10"></div>
                    <h1 class="nicdark_font_size_15 nicdark_color_black"><strong>ACCOUNT SETTINGS</strong></h1>
                    <div class="nicdark_section nicdark_height_10"></div>

                    <!-- webcam view -->
                    <!-- <div style="text-align: center;">
                        <div id="my_camera" style="display: inline-block;"></div>
                        <div id="results"  style="display: inline-block;"></div>
                    </div> -->
                    <!-- A button for taking snaps -->
                    <!-- <input type="button" value="Take Snapshot" onClick="take_snapshot()"> -->

                    
                    <!-- next button -->
                    <input type="submit" name="fist-step" class="login loginmodal-submit" value="Log out">
                </form>
            </div>
	</div>
</div>

</div>
</div>