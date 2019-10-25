
<script src="<?php echo base_url();?>js/nicdark_plugins.js" type="text/javascript"></script>
<script src='<?php echo base_url();?>js/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>js/calendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView: 'agendaWeek',
			defaultDate: Date(),
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($upcoming_calendar_data); ?>
		});
		
	});

</script>


<div class="nicdark_section" id="teacher_mylesson" style="background-color: #F8F8F8;">
	<!-- description of this page -->
	<div style="background-color: #0F59A5;">
		<div class="nicdark_container nicdark_clearfix des_height nicdark_padding_left_20" style="display: table; overflow: hidden;">
			<div style="display: table-cell; vertical-align: middle;">
				<img alt="" src="<?php echo base_url();?>img/main_icons/lessons.png" class="top_main_img_style">
				
				<h1 class="nicdark_color_black nicdark_font_size_30 nicdark_line_height_50">
		            <font color="#ffffff">My Lesson</font>
		        </h1>

		        <p class="top_main_des_style">
		            <font color="#ffffff">It shows the lesson requested or upcoming to tacher and teacher can start lesson.</strong>
		        </p>
	    	</div>
		</div>
	</div>


	<!-- content of this page -->
	<div class="nicdark_container nicdark_clearfix" style="color: #000;">
		<div class="nicdark_width_33_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
			<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
				<div class="nicdark_section">
					<div class="nicdark_section nicdark_height_30"></div>
				    <h3><font color="#000000"><strong>REQUESTED LESSONS</strong></font></h3>
				    <div class="nicdark_section nicdark_height_30"></div>

				    <div class="nicdark_section">

				    	<?php foreach($requested_lessons as $requested_lesson) {
				    		?>
					        <!--START teacher-->
					        <div class="nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box" style="background-color: #fff;">

					            <div class="nicdark_display_table nicdark_float_left">
					                        
					                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					                    <img alt="" class="nicdark_width_50_all_iphone nicdark_margin_right_20 nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
					                </div>

					                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					                    <h3 class=""><font color="#000000"><strong><?php echo $requested_lesson['student_name']; ?></strong></font></h3>
					                    <div class="nicdark_section nicdark_height_20"></div>
					                    <h5 class="nicdark_color_grey"><?php echo $requested_lesson['residing_in']; ?></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey"><?php echo $requested_lesson['date']; ?></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey"><span><?php echo $requested_lesson['start_time']; ?></span><span> - </span><span><?php echo $requested_lesson['end_time'] ?></span></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey" style="visibility: hidden;"><span>2</span><span>credit / 45minutes</span></h5>
					                    <div class="nicdark_section nicdark_height_20"></div>
					                    
					                </div>

					            </div>
					            <div class="nicdark_section" style="clear: right;">
			                    	<p style="float: right;">
										<button type="button" class="btn btn-primary btn-sm" style="border-radius: 15pt; margin-right: 10pt">Accept</button>
									  	<button type="button" class="btn btn-default btn-sm"  style="border-radius: 15pt;">Decline</button>
									</p>
			                    </div>
					            
					        </div>
					        <div class="nicdark_section nicdark_height_20"></div>
					        <!--END teacher-->
					    <?php } ?>

				    </div>
				</div>
			</div>
	    </div>





	    <!--- calendar view -->
	    <div class="nicdark_width_66_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
	    	<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
		    	<div class="nicdark_section nicdark_height_30"></div>
		    	<div class="nicdark_tabs">
			    	<h3><font color="#000000"><strong style="margin-left: 10%;">UPCOMING LESSONS</strong></font></h3>
		    		<!-- Rounded Button Group -->
					<ul class="button-group-ul" style="float: right; margin: 0pt; margin-top: -20pt;">
					  <li class="button-group-li"><a href="#tabs-7">Row View</a></li>
					  <li class="button-group-li"><a href="#tabs-8">Month View</a></li>
					</ul>
			    	
			    	<div style="height: 23pt;"></div>

			    	<!-- Row View Tab -->
			    	<div class="nicdark_section" id="tabs-7">


			    		<?php foreach ($upcoming_lessons as $upcoming_lesson) { ?>
				    		<!--START teacher-->
					        <div class="nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box" style="background-color: #fff;">

					            <div class="nicdark_display_table nicdark_float_left">
					                        
					                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					                    <img alt="" class="nicdark_width_50_all_iphone nicdark_margin_right_20 nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">
					                </div>

					                <div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					                    <h3 class=""><font color="#000000"><strong><?php echo $upcoming_lesson['student_name']; ?></strong></font></h3>
					                    <div class="nicdark_section nicdark_height_20"></div>
					                    <h5 class="nicdark_color_grey"><?php echo $upcoming_lesson['residing_in']; ?></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey"><?php echo $upcoming_lesson['date']; ?></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey"><span><?php echo $upcoming_lesson['start_time']; ?></span><span> - </span><span><?php echo $upcoming_lesson['end_time'] ?></span></h5>
					                    <div class="nicdark_section nicdark_height_5"></div>
					                    <h5 class="nicdark_color_grey"><span><?php echo $upcoming_lesson['hour_rate']; ?></span><span>credit / 45minutes</span></h5>

					                    <div class="nicdark_section nicdark_height_20"></div>
					                    
					                </div>

					            </div>
					            <div class="nicdark_section" style="clear: right; margin-top: 3pt;">
			                    	<p style="float: right;">
										<button type="button" class="btn btn-primary btn-sm" style="border-radius: 15pt; margin-right: 10pt">Message</button>
									  	<button type="button" class="btn btn-default btn-sm"  style="border-radius: 15pt;">Start Lesson</button>
									</p>
			                    </div>
					            
					        </div>
					        <!--END teacher-->
					    <?php } ?>

			    	</div>

			    	<!-- Month View Tab -->
			    	<div class="nicdark_section" id="tabs-8">
			    		<div class="nicdark_section nicdark_height_30"></div>
		    			<div id='calendar' style="clear: left;"></div>
			    	</div>
				</div>
		    </div>
	    </div>
	</div>
</div>

</div>
</div>


