<script src="<?php echo base_url();?>js/nicdark_plugins.js" type="text/javascript"></script>
<script src='<?php echo base_url();?>js/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>js/calendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
		
			/* teacher timetable setting calendar */
		$('#timetable-calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultView: 'agendaWeek',
			defaultDate: Date(),
			selectable: true,
			selectHelper: true,
			eventClick: function(event) {
					// opens events in a popup window
					if (confirm("Do you want to delet it?") == true) {
						$('#timetable-calendar').fullCalendar("removeEvents", event._id);
				    } else {
				        
				    }
					return true;
				},
			select: function(start, end) {
				title = '';
				var eventData;
				
				eventData = {
					title: title,
					start: start,
					end: end
				};
				$('#timetable-calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($timetable_calendar_data); ?>
		});


		// save changes
		$('#save_changes').click(function() {
            data = $('#timetable-calendar').fullCalendar('clientEvents');
            var buildingEvents = $.map(data, function(item) {
            	var d = new Date(item.start);
				var d_start = new Date(item.start);
				var d_end = new Date(item.end);
				d.setHours ( d.getHours() - 8);
				d_start.setHours ( d_start.getHours() - 8);
				d_end.setHours ( d_end.getHours() - 8);
				var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
				var start_time = d_start.getHours() + ':' + d_start.getMinutes();
				var end_time = d_end.getHours() + ':' + d_end.getMinutes();

			    return {
			        date: d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate(),
			        start_time: d_start.getHours() + ':' + d_start.getMinutes(),
			        end_time: d_end.getHours() + ':' + d_end.getMinutes()
			    };
			});

            var teacher_id = <?php echo $teacher_id; ?>;
			// send request
			params = {'teacher_id': teacher_id, 'events': buildingEvents};

			var url = "<?php echo base_url();?>index.php/lesson/set_timetable";
			$.ajax({
                url         : url,
                type        : 'POST',
                ContentType : 'application/json',
                data        : JSON.stringify(params)
            }).done(function(response){
            	// alert(JSON.stringify(response));
            	 alert('save successfully');
            }).fail(function(jqXHR, textStatus, errorThrown){
                alert('FAILED! ERROR: ');
               
            });
			
        });
		
	});

</script>


<div class="nicdark_section" id="tabs-3">
	<!-- description of this page -->
	<div style="background-color: #0F59A5;">
		<div class="nicdark_container nicdark_clearfix des_height nicdark_padding_left_20" style="display: table; overflow: hidden;">
			<div style="display: table-cell; vertical-align: middle;">
				<img alt="" src="<?php echo base_url();?>img/main_icons/timetable.png" class="top_main_img_style">
				<h1 class="nicdark_color_black nicdark_font_size_30 nicdark_line_height_50">
		            <font color="#ffffff">My Timetable</font>
		        </h1>

		        <p class="top_main_des_style"> 
		            <font color="#ffffff"> On this view you are also able to change your status (Online/Offline/Busy).</strong>
		        </p>
		        <p class="top_main_des_style">
		            <font color="#ffffff">On here you will be able to set his/her available timetable for the platform.</strong>
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
					<select style="width: 100%; height: 34pt">
		                <option value="online">Online</option>
		                <option value="offline">Offline</option>
		                <option value="busy">Busy</option>
	           		</select>
				</div>
				<div class="nicdark_display_table_cell nicdark_vertical_align_middle">
					<div style="margin-left: 10pt;">
						<div class="nicdark_section nicdark_height_5"></div>
						<p class="nicdark_section nicdark_font_size_12"><font color="gray"> ONLINE IN HOURS </font></p>
						<input type="text" name="available_hour" placeholder="" style="margin-top: 5pt;">
					</div>
				</div>
				
				<button id="save_changes" type="button" class="btn btn-primary btn-sm" style="border-radius: 15pt; margin-right: 10pt; float: right; margin-top: -35pt;">Save Changes</button>
				
			</div>
		</div>
	</div>


    <!--- calendar view -->
    <div class="nicdark_container nicdark_clearfix " style="color: #000;">
    	<div class="nicdark_section nicdark_height_30"></div>
	    <h3><font color="#000000"><strong>YOUR SCHEDULE</strong></font></h3>
	    <div class="nicdark_section nicdark_height_30"></div>
    	<div id='timetable-calendar'></div>
    	<div class="nicdark_section nicdark_height_20"></div>
    </div>
</div>


</div>
</div>

