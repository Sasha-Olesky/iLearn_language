<?php include "include/header/header.php"; ?>
	
	<?php include "include/header/student-main-tab.php" ?>


	<script src="<?php echo base_url();?>js/nicdark_plugins.js" type="text/javascript"></script>
	<script src='<?php echo base_url();?>js/calendar/moment.min.js'></script>
	<script src='<?php echo base_url();?>js/calendar/fullcalendar.min.js'></script>

	<script>
	$(document).ready(function() {
		$(document).ready(function() {
		/*student find a teacher */
			$('#teacher-schedule-calendar').fullCalendar({
				header: false,
				contentHeight: 'auto',
				defaultView: 'agendaWeek',
				defaultDate: Date(),
				selectable: false,
				selectHelper: false,
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: [
					{
						title: 'Long Event',
						start: '2016-06-07',
						end: '2016-06-10'
					}
				]
			});
		});
	});
	</script>

    <!-- content view start -->
    <div class="nicdark_section">
	<div class="nicdark_container nicdark_clearfix" style="color: #000;">

		<!-- left view start -->
		<div class="nicdark_width_66_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
			<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
				<!-- profile view start-->
		    	<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

		            <div class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">
		            	<h3 class=""><strong>Profile</strong></h3>
		            </div>
		            <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
		                <div class="nicdark_section">
			                
			                <div class="videoWrapper">
							    <!-- Copy & Pasted from YouTube -->
							    <iframe width="560" height="349" src="https://www.youtube.com/embed/Q1rnN4r1vds" frameborder="0" allowfullscreen></iframe>
							</div>

							<!--START teacher-->
					        <div class="nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box">

					            <div class="nicdark_display_table nicdark_float_left">
					                        
					                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
					                    
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <div class="nicdark_section nicdark_height_10"></div>
					                    <h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>7</span><span> Lessons Taught</span></h1>
					                    <img alt="" style="float: right; margin-top: -55pt" src="<?php echo base_url(); ?>img/status/online-icon.png">
					                </div>
					                <div class="nicdark_display_table_cell">
					                	<div style="width: 20pt;"></div>
					                </div>
					                <div class="nicdark_display_table_cell">
					                    <h3 class=""><font color="#000000"><strong>John Doe</strong></font></h3>
					                    <div class="nicdark_section nicdark_height_20"></div>
					                    <p class="nicdark_color_grey nicdark_font_size_15"class="nicdark_color_grey"><span style="width: 100pt;">Japan (GMT +9)</span><span>3.5/5</span></p>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <p class="nicdark_color_grey nicdark_font_size_15" class="nicdark_color_grey"><span>Teaches: </span><span>English, French</span></p>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <div class="nicdark_section">
					                    	
					                    	<p class="nicdark_color_grey nicdark_font_size_15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
					                    	Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. 
					                    	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. </p>
					                 
					                    </div>
					                </div>
					            </div>
					        </div>
					        <!--END teacher-->
			            </div>
		        	</div>  
		    	</div>
				<!-- profile view end -->

				<div class="nicdark_section nicdark_height_30"></div>

				<!-- schedule view start -->
				<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

		            <div class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">
		            	<h3 class=""><strong>Schedule</strong></h3>
		            </div>
		            <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
		                <div class="nicdark_section">
			                
			                <div id="teacher-schedule-calendar"></div>
			            </div>
		        	</div>  
		    	</div>
				<!-- schedule view end -->
	    	</div>
		</div>
		<!-- left view end -->

		<!-- right view start -->
		<div class="nicdark_width_33_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
    		<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
    			<!-- private sessions start -->
    			<div class="nicdark_section nicdark_bg_white nicdark_border_1_solid_grey">

		            <div class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_bottom_1_solid_grey nicdark_text_align_center">
		            	<h3 class=""><strong>Private Sessions</strong></h3>
		            </div>
		            <div class="nicdark_section nicdark_padding_10 nicdark_box_sizing_border_box">
		                <div class="nicdark_section">
		                	<div class="nicdark_section nicdark_height_10"></div>
			                <h1 class="nicdark_color_black nicdark_font_size_15" style="text-align: center;"><span>1</span><span> Credit/Session</span></h1>
			                <div class="nicdark_section nicdark_height_20"></div>
					        <h1 class="nicdark_color_black nicdark_font_size_15"  style="text-align: center;"><span>3</span><span> Credit/On Demand</span></h1>
					        <div class="nicdark_section nicdark_height_10"></div>
							
							<div class="" style="margin-left: 10pt; margin-right: 20pt;">
								<div class="nicdark_section nicdark_height_20"></div>			                
				                <a class="nicdark_display_inline_block nicdark_color_white nicdark_first_font nicdark_bg_green nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" style="width: 100%; text-align: center;" href="#">Book Trial Lesson</a>
				                <div class="nicdark_section nicdark_height_10"></div>
				                <p style="text-align: center;">or</p>
				                <div class="nicdark_section nicdark_height_10"></div>
				                <a class="nicdark_display_inline_block nicdark_color_white nicdark_first_font nicdark_bg_green nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" style="width: 100%; text-align: center;" href="#">Schedule a Lesson</a>
				                <div class="nicdark_section nicdark_height_20"></div>
				                <a class="nicdark_display_inline_block nicdark_color_white nicdark_first_font nicdark_bg_green nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" style="width: 100%; text-align: center;" href="#">Message</a>
				                <div class="nicdark_section nicdark_height_20"></div>
				                <a class="nicdark_display_inline_block nicdark_color_white nicdark_first_font nicdark_bg_green nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13" style="width: 100%; text-align: center;" href="#">Call to Start Lesson</a>
			            	</div>
			            </div>
		        	</div>  
		    	</div>
    			<!-- private sessions end -->
    		</div>
    	</div>
    	<!-- right view end -->
    </div>
	<!-- content view end -->



	</div>
    </div>
</div>
<?php include "include/footer/footer.php"; ?>