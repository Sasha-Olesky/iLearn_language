<!--START search container-->
<div class="nicdark_display_table nicdark_transition_all_08_ease nicdark_navigation_3_search_content nicdark_bg_greydark_alpha_9 nicdark_position_fixed nicdark_width_100_percentage nicdark_height_100_percentage nicdark_z_index_1_negative nicdark_opacity_0 main_color">

    <!--close-->
    <div class="nicdark_cursor_zoom_out nicdark_navigation_3_close_search_content nicdark_width_100_percentage nicdark_height_100_percentage nicdark_position_absolute nicdark_z_index_1_negative"></div>


    <div class="nicdark_display_table_cell nicdark_vertical_align_middle nicdark_text_align_center">
        <div class="nicdark_width_700 nicdark_width_250_all_iphone nicdark_display_inline_block">
            <div class="nicdark_width_80_percentage nicdark_padding_5 nicdark_box_sizing_border_box nicdark_float_left nicdark_position_relative">
                <input class="nicdark_border_width_2 nicdark_background_none nicdark_border_top_width_0 nicdark_border_right_width_0 nicdark_border_left_width_0 nicdark_first_font nicdark_color_white nicdark_placeholder_color_white nicdark_font_size_30 nicdark_line_height_30" type="text" placeholder="Search">
            </div>
            <div class="nicdark_width_20_percentage nicdark_padding_10 nicdark_box_sizing_border_box nicdark_float_left nicdark_position_relative">
                <a class="nicdark_width_55 nicdark_height_55 nicdark_display_inline_block nicdark_text_align_center nicdark_box_sizing_border_box nicdark_bg_green nicdark_padding_15 nicdark_border_radius_3 " href="courses.php">
                    <img alt="" width="25" src="<?php echo base_url();?>img/icons/icon-search-white.svg">
                </a>   
            </div>
        </div>
    </div>
            


</div>
<!--END search container-->
<div class="nicdark_section">

    <div class="nicdark_section main_color">
        <!--start nicdark_container-->
        <div class="nicdark_container nicdark_clearfix">

            <div class="grid grid_6 nicdark_padding_botttom_10 nicdark_padding_top_10 nicdark_text_align_center_responsive">

            </div>

            <div class="grid grid_6 nicdark_text_align_right nicdark_border_top_1_solid_orangedark_responsive nicdark_text_align_center_responsive nicdark_padding_botttom_10 nicdark_padding_top_10 " >

              
                <div class="nicdark_navigation_top_header_3">
                    <ul>
                        <li>
                            <img alt="" class="nicdark_margin_right_10 nicdark_float_left" width="15" src="<?php echo base_url();?>img/icons/icon-user-white.svg">
                            <a class="teacher-login nicdark_color_white" href="#">Log In</a>
                            <div class="modal fade" id="teacherlogin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                              <div class="dismiss_click" style="width: 100%; height: 100%; background: #000; opacity: 0.6; position: fixed; left: 0; top: 0;"></div>
                              <div class="modal-dialog">                                
                                    <div class="loginmodal-container">
                                        <h1>Login to Your Account</h1><br>
                                      <form id="signup-form" action="<?php echo site_url('teacher/login') ?>" method="POST">
                                        <input type="text" name="user_email" placeholder="Username">
                                        <input type="password" name="user_password" placeholder="Password">
                                        <input type="submit" name="login" class="login loginmodal-submit" value="Log In">
                                      </form>
                                        
                                      <div class="login-help">
                                        <a href="#" class="register-bnt">Register</a> - <a href="#">Forgot Password</a>
                                      </div>
                                    </div>
                                </div>
                              </div>
                        </li>
                        <li>
                            <img alt="" class="nicdark_margin_right_10 nicdark_float_left" width="15" src="<?php echo base_url();?>img/icons/icon-login-white.svg">
                            <a class="nicdark_color_white" href="<?php echo site_url('teacher/start_signup'); ?>" >Sign Up</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
        <!--end container-->

    </div>

</div>

<!--LOGO-->
<a href="<?php echo site_url('student') ?>"><img alt="" class="nicdark_position_absolute nicdark_left_15 nicdark_top_20" style="margin-top: 20pt;" width="170" src="<?php echo base_url();?>img/logos/iLearnLanguage-transparent-logo.svg" style="margin-top: -2pt;"></a>

