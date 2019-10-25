<!-- chat css -->
<link rel="stylesheet" href="<?php echo base_url();?>css/chat/style.css">
<script src="<?php echo base_url();?>js/nicdark_plugins.js" type="text/javascript"></script>
<script src='<?php echo base_url();?>js/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>js/calendar/fullcalendar.min.js'></script>

<script>
$(document).ready(function() {
		/*student find a teacher */
	$('#favourite-calendar').fullCalendar({
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
				title: 'Meeting',
				start: '2016-08-12T10:30:00',
				end: '2016-08-22T12:30:00'
			},
			{
				title: 'Lunch',
				start: '2016-08-21T12:00:00'
			},
			{
				title: 'Meeting',
				start: '2016-08-22T14:30:00'
			},
			{
				title: 'Happy Hour',
				start: '2016-08-12T17:30:00'
			},
			{
				title: 'Dinner',
				start: '2016-08-12T20:00:00'
			},
			{
				title: 'Birthday Party',
				start: '2016-08-23T07:00:00'
			},
			{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2016-06-28'
			}
		]
	});
});

$(document).on('click', ".teacher_profile", function() {
	var url = "<?php echo site_url('student/show_teacher_profile') ?>";
	// window.location.href = url;
	window.open(url);
});
</script>

<div class="nicdark_section" id="tabs-3">
	<!-- description of this page -->
	<div style="background-color: #0F59A5;">
		<div class="nicdark_container nicdark_clearfix des_height nicdark_padding_left_20" style="display: table; overflow: hidden;">
			<div style="display: table-cell; vertical-align: middle;">
				<img alt="" src="<?php echo base_url();?>img/main_icons/add_favourite.png" class="top_main_img_style">

				<h1 class="nicdark_color_black nicdark_font_size_30 nicdark_line_height_50">
		            <font color="#ffffff">Favourites</font>
		        </h1>

		        <p class="top_main_des_style">
		            <font color="#ffffff">Student can bookmark the teachers. And teachers, whom student had a lesson with will be automatically be added to the favorites list.</strong>
		        </p>
	    	</div>
		</div>
	</div>

	
	<!-- content of this page -->
	<div class="nicdark_container nicdark_clearfix" style="color: #000;">
		<div class="nicdark_width_66_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">

			<div class="nicdark_section">
				<div class="nicdark_section nicdark_height_20"></div>
			    <div class="nicdark_section">

			        <!--START teacher-->
			        <div class="teacher_profile nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box item_div_shadow handpoointer style_prevu_kit">

			            <div class="nicdark_display_table nicdark_float_left">
			                        
			                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
			                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
			                    
			                    <div class="nicdark_section nicdark_height_5"></div>
			                    <h1 class="nicdark_color_black nicdark_font_size_10" style="text-align: center;"><span>1</span><span> Credit/Session</span></h1>
			                    <h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>3</span><span> Credit/On Demand</span></h1>
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
			        <div class="nicdark_section nicdark_height_20"></div>
			        <!--END teacher-->

			        <!--START teacher-->
			        <div class="teacher_profile nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box item_div_shadow handpoointer style_prevu_kit">

			            <div class="nicdark_display_table nicdark_float_left">
			                        
			                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
			                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
			                    
			                    <div class="nicdark_section nicdark_height_5"></div>
			                    <h1 class="nicdark_color_black nicdark_font_size_10" style="text-align: center;"><span>1</span><span> Credit/Session</span></h1>
			                    <h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>3</span><span> Credit/On Demand</span></h1>
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
			        <div class="nicdark_section nicdark_height_20"></div>
			        <!--END teacher-->

			        <!--START teacher-->
			        <div class="teacher_profile nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box item_div_shadow handpoointer style_prevu_kit">

			            <div class="nicdark_display_table nicdark_float_left">
			                        
			                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
			                    <img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
			                    
			                    <div class="nicdark_section nicdark_height_5"></div>
			                    <h1 class="nicdark_color_black nicdark_font_size_10" style="text-align: center;"><span>1</span><span> Credit/Session</span></h1>
			                    <h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>3</span><span> Credit/On Demand</span></h1>
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
			        <div class="nicdark_section nicdark_height_20"></div>
			        <!--END teacher-->
			        
			    </div>
			</div>
	    </div>
	    <!--- calendar view -->
	    <div class="nicdark_width_33_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
	    	<div class="nicdark_section nicdark_height_30"></div>
		    <div class="nicdark_section nicdark_height_30"></div>
	    	<div id='favourite-calendar'></div>
	    </div>
	</div>
</div>

</div>
</div>
