<script src="<?php echo base_url();?>js/nicdark_plugins.js" type="text/javascript"></script>
<script src='<?php echo base_url();?>js/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>js/calendar/fullcalendar.min.js'></script>

<script>
$(document).ready(function() {
	sort_rest();
	function sort_rest() {
		var student_id = <?php echo $student_id ?>;
		var teach_language = $( '#sort_teach' ).val();
		var speak_language = $( "#sort_speak" ).val();
		var sort_price = $( "#sort_price" ).val();
		var sort_rating = $( "#sort_rating" ).val();
		var sort_status = $( "#sort_status" ).val();
		var skip = 0;
		var limit = 0;
		
		params = {'student_id': student_id, 'teach_language': teach_language, 'speak_in': speak_language, 'sort_price': sort_price, 'sort_rating': sort_rating, 'skip': skip, 'limit': limit , 'status': sort_status};
		
		var url = "<?php echo base_url();?>index.php/teacher_rest/find_teachers";
		$.ajax({
	        url         : url,
	        type        : 'POST',
	        ContentType : 'application/json',
	        data        : JSON.stringify(params)
	    }).done(function(response){
	    	var template = '';
	    	for(var i = 0; i<response.result_data.length; i++) {
	    		var teacher = response.result_data[i];
	    		var teach_language_str = '';
	    		var status_image_path = "<?php echo base_url(); ?>img/status/online-icon.png";
	    		if(teacher.status == 0) {							// online status
	    			status_image_path = "<?php echo base_url(); ?>img/status/online-icon.png";
	    		} else {											// offline status
	    			status_image_path = "<?php echo base_url(); ?>img/status/offline-icon.png";
	    		}
	    		for(var j = 0; j<teacher.teach_languages.length; j++) {
	    			if(j > 0)
	    				teach_language_str += ", ";
	    			teach_language_str += teacher.teach_languages[j].language_name;
	    		}
	    		var id = 'item_' + i;
		    	template += '<div id=' + id + ' class="nicdark_section nicdark_border_top_1_solid_grey nicdark_padding_40_20 nicdark_box_sizing_border_box item_div_shadow handpoointer style_prevu_kit">' +

						            '<div class="nicdark_display_table nicdark_float_left">' +
						                        
						                '<div class="nicdark_display_table_cell nicdark_vertical_align_middle">' +
						                    '<img alt="" class="nicdark_width_50_all_iphone nicdark_border_radius_100_percentage " width="100" src="<?php echo base_url(); ?>img/default/default_student.png">' +
						                    
						                    '<div class="nicdark_section nicdark_height_5"></div>' +
						                    '<h1 class="nicdark_color_black nicdark_font_size_10" style="text-align: center;"><span>' + teacher.rate_schedule + '</span><span> Credit/Session</span></h1>' +
						                    '<h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>' + teacher.rate_demand + '</span><span> Credit/On Demand</span></h1>' +
						                    '<div class="nicdark_section nicdark_height_10"></div>' +
						                    '<h1 class="nicdark_color_black nicdark_font_size_10"  style="text-align: center;"><span>' + teacher.taught_total + '</span><span> Lessons Taught</span></h1>' +
						                    '<img alt="" style="float: right; margin-top: -55pt" src=' + status_image_path + '>' +
						                '</div>' +
						                '<div class="nicdark_display_table_cell">' +
						                	'<div style="width: 20pt;"></div>' +
						                '</div>' +
						                '<div class="nicdark_display_table_cell">' +
						                    '<h3 class=""><font color="#000000"><strong>' + teacher.teacher_name + '</strong></font></h3>' +
						                    '<div class="nicdark_section nicdark_height_20"></div>' +
						                    '<p class="nicdark_color_grey nicdark_font_size_15"class="nicdark_color_grey"><span style="width: 100pt;">Japan (GMT +9)</span><span>3.5/5</span></p>' +
						                    '<div class="nicdark_section nicdark_height_5"></div>' +
						                    '<p class="nicdark_color_grey nicdark_font_size_15" class="nicdark_color_grey"><span>Teaches: </span><span>' + teach_language_str + '</span></p>' +
						                    '<div class="nicdark_section nicdark_height_5"></div>' +
						                    '<div class="nicdark_section">' +
						                    	
						                    	'<p class="nicdark_color_grey nicdark_font_size_15">' + teacher.overview + '</p>' +
						                 
						                    '</div>' +
						                '</div>' +
						            '</div>' +
						        '</div>' +
						        '<div class="nicdark_section nicdark_height_20"></div>';

			}
	    	document.getElementById("teachers_div").innerHTML = "";
	    	$('#teachers_div').html(template);
	    	
	    	for(var i = 0; i<response.result_data.length; i++) {
	    		var id = 'item_' + i;
	    		$('#' + id).click(function(){
	    			var url = "<?php echo site_url('student/show_teacher_profile') ?>";
	    			// window.location.href = url;
	    			window.open(url);
	    		});
	    	}
	    	 
	    }).fail(function(jqXHR, textStatus, errorThrown){
	        alert('FAILED! ERROR: ');
	       	
	   	});
	}
	$('#sort_status').change(function(){
		sort_rest();
	});

	$('#sort_teach').change(function(){
		sort_rest();
	});

	$('#sort_speak').change(function(){
		sort_rest();
	});

	$('#sort_rating').change(function(){
		sort_rest();
	});

	$('#sort_price').change(function(){
		sort_rest();
	});
});



$(document).ready(function() {
		/*student find a teacher */
	$('#find-teacher-calendar').fullCalendar({
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

</script>




<!-- chat css -->
<link rel="stylesheet" href="<?php echo base_url();?>css/chat/style.css">

<div class="nicdark_section" id="tabs-1">
	<!-- description of this page -->
	<div style="background-color: #0F59A5;">
		<div class="nicdark_container nicdark_clearfix des_height nicdark_padding_left_20" style="display: table; overflow: hidden;">
			<div style="display: table-cell; vertical-align: middle;">
				
				<img alt="" src="<?php echo base_url();?>img/main_icons/search.png" class="top_main_img_style">
				
				<h1 class="nicdark_color_black nicdark_font_size_30 nicdark_line_height_50">
		            <font color="#ffffff">Find a Teacher</font>
		        </h1>

		        <p class="top_main_des_style">
		            <font color="#ffffff">iLearnLanguage's teachers are your key to foreign language fluency. Browse qualified, native-speaking English teachers & tutors to that can help you learn English.</strong>
		        </p>


	    	</div>
		</div>
	</div>

		<!-- content of this page -->
	<div class="" style="color: #000;">
		<!-- teacher status setting -->
		<div class="nicdark_display_table nicdark_float_left custom-container" style="width: 100%;">
			<div class="nicdark_container nicdark_clearfix">
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12"><font color="gray"> STATUS </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<select id="sort_status" style="width: 100%; height: 34pt">
		                <option value=-1>All</option>
		                <option value=0>Online</option>
		                <option value=1>Offline</option>
		                <option value=3>Featured</option>
	           		</select>
				</div>

				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 10pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12"><font color="gray"> Teacher Teaches in </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<select id="sort_teach" style="width: 100%; height: 34pt">
		                <option value='Any'>Any</option>
		                <?php
                        echo json_encode($countries);
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $countries[$i] ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
	           		</select>
				</div>

				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 10pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12"><font color="gray"> Teacher Speaks in </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<select id="sort_speak" style="width: 100%; height: 34pt">
		                <option value='Any'>Any</option>
		                <?php
                        echo json_encode($countries);
                        for($i=0; $i < count($countries); $i ++ ) {
                        ?>
                        <option value=<?php echo $countries[$i] ?>><?php echo $countries[$i] ?></option>
                        <?php } ?>
	           		</select>
				</div>

				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 10pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12"><font color="gray"> Rating </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<select id="sort_rating" style="width: 100%; height: 34pt">
		                <option value=-1>Sort by Rating</option>
		                <option value=0>Sort by Rating Low - High</option>
		                <option value=1>Sort by Rating High - Low</option>
	           		</select>
				</div>

				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 10pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12"><font color="gray"> Price </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<select id="sort_price" style="width: 100%; height: 34pt">
		                <option value=-1>Sort by Price</option>
		                <option value=0>Sort by Price Low - High</option>
		                <option value=1>Sort by price High - Low</option>
	           		</select>
				</div>
			
<!-- 				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 20pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12" style="margin-top: -8pt;"><font color="gray"> Rating </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<div id="rating_slider" style="width: 200pt; margin-top: 13pt;"></div>
				</div>

				<div class="nicdark_display_table_cell nicdark_vertical_align_middle" style="width: 30pt;"></div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<p class="nicdark_section nicdark_font_size_12" style="margin-top: -8pt;"><font color="gray"> Price </font></p>
					<div class="nicdark_section nicdark_height_5"></div>
					<div id="price_slider" style="width: 200pt; margin-top: 13pt;"></div>
				</div> -->
			</div>
		</div>
	</div>


	<!-- content of this page -->
	<div class="nicdark_container nicdark_clearfix" style="color: #000;">
		<div>
			<div class="nicdark_width_66_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
				<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
					<div class="nicdark_section">

					    <div id="teachers_div" class="nicdark_section">

					    </div>
					</div>
				</div>
			</div>

			<!--- calendar view -->
		    <div class="nicdark_width_33_percentage nicdark_width_100_percentage_ipad_port nicdark_width_100_percentage_all_iphone nicdark_float_left">
		    	<div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">
			    	<div class="nicdark_section nicdark_height_30"></div>
				    <div class="nicdark_section nicdark_height_30"></div>
			    	<div id="find-teacher-calendar"></div>
		    	</div>
		    </div>
		</div>
	</div>
</div>


</div>
</div>