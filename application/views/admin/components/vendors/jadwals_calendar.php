<?php $system = $this->Xin_model->read_setting_info(1); ?>
<?php
if(isset($_POST['calendar_jadwal_date'])){
	$jadwals_date = $_POST['calendar_jadwal_date'];
} else {
	$jadwals_date = date('Y-m');
}
?>
<script type="text/javascript">
$(document).ready(function(){
	
	/* initialize the calendar
	-----------------------------------------------------------------*/
	$('#calendar_hr').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		views: {
			listDay: { buttonText: 'list day' },
			listWeek: { buttonText: 'list week' }
		  },
		  
		jadwalRender: function(jadwal, element) {
		element.attr('title',jadwal.title).tooltip();
		element.attr('href', 'javascript:void(0);');
        element.click(function() {
			if(jadwal.unq==0){
				$.ajax({
					url : site_url+"jadwals/read_jadwal_record/",
					type: "GET",
					data: 'jd=1&is_ajax=1&mode=modal&data=view_jadwal&jadwal_id='+jadwal.jadwal_id,
					success: function (response) {
						if(response) {
							$('.payroll_template_modal').modal('show')
							$("#ajax_modal_payroll").html(response);
						}
					}
				});
			} else {
				$.ajax({
					url : site_url+"meetings/read_meeting_record/",
					type: "GET",
					data: 'jd=1&is_ajax=1&mode=modal&data=view_meeting&meeting_id='+jadwal.meeting_id,
					success: function (response) {
						if(response) {
							$('.payroll_template_modal').modal('show');
							$("#ajax_modal_payroll").html(response);
						}
					}
				});
			}
        });
		
		},
		dayClick: function(date, jsJadwal, view) {
        date_last_clicked = $(this);
			var jadwal_date = date.format();
			$('#exact_date').val(jadwal_date);
			var jadwalInfo = $("#module-opt");
            var mousex = jsJadwal.pageX + 20; //Get X coodrinates
            var mousey = jsJadwal.pageY + 20; //Get Y coordinates
            var tipWidth = jadwalInfo.width(); //Find width of tooltip
            var tipHeight = jadwalInfo.height(); //Find height of tooltip

            //Distance of element from the right edge of viewport
            var tipVisX = $(window).width() - (mousex + tipWidth);
            //Distance of element from the bottom of viewport
            var tipVisY = $(window).height() - (mousey + tipHeight);

            if (tipVisX < 20) { //If tooltip exceeds the X coordinate of viewport
                mousex = jsJadwal.pageX - tipWidth - 20;
            } if (tipVisY < 20) { //If tooltip exceeds the Y coordinate of viewport
                mousey = jsJadwal.pageY - tipHeight - 20;
            }
            //Absolute position the tooltip according to mouse position
            jadwalInfo.css({ top: mousey, left: mousex });
            jadwalInfo.show(); //Show tool tip
		},
		defaultDate: '<?php echo $jadwals_date;?>',
		jadwalLimit: true, // allow "more" link when too many jadwals
		navLinks: true, // can click day/week names to navigate views
		selectable: true,
		jadwals: [
			<?php foreach($all_jadwals->result() as $jadwals):?>
			{
				jadwal_id: '<?php echo $jadwals->jadwal_id?>',
				unq: '0',
				title: '<?php echo $jadwals->jadwal_title?>',
				start: '<?php echo $jadwals->jadwal_date?>T<?php echo $jadwals->jadwal_time?>',
				color: '#2D95BF'
			},
			<?php endforeach;?>
			<?php foreach($all_meetings->result() as $meetings):?>
			{
				meeting_id: '<?php echo $meetings->meeting_id?>',
				unq: '1',
				title: '<?php echo $meetings->meeting_title?>',
				start: '<?php echo $meetings->meeting_date?>T<?php echo $meetings->meeting_time?>',
				color: '#48CFAE'
			},
			<?php endforeach;?>
		]
	});
	$('.fc-icon-x').click(function() {
		$('#module-opt').hide();
	});
	$('.view-modal-data').on('show.bs.modal', function (jadwal) {
		var button = $(jadwal.relatedTarget);
		var ex_date = $('#exact_date').val();
		var recrd =  button.data('record');
		var modal = $(this);
		$.ajax({
		url : site_url+"jadwals/add_jadwal_record/",
		type: "GET",
		data: 'jd=1&is_ajax=1&mode=modal&data=jadwal&jadwal_date='+ex_date+"&record="+recrd,
		success: function (response) {
			if(response) {
				$("#ajax_modal_view").html(response);
			}
		}
		});
	});
	
	/* initialize the external jadwals
	-----------------------------------------------------------------*/

	$('#external-jadwals .fc-jadwal').each(function() {

		// Different colors for jadwals
        $(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});

		// store data so the calendar knows to render an jadwal upon drop
		$(this).data('jadwal', {
			title: $.trim($(this).text()), // use the element's text as the jadwal title
			color: $(this).data('color'),
			stick: true // maintain when user navigates (see docs on the renderJadwal method)
		});

	});


});
</script>

<div id="module-opt" class="fc-popover fc-more-popover" style="display:none;">
  <div class="fc-header fc-widget-header"> <span class="fc-close fc-icon fc-icon-x"></span><span class="fc-title">Add Options</span>
    <div class="fc-clear"></div>
  </div>
  <div class="fc-body fc-widget-content">
    <div class="fc-event-container">
    	<a data-toggle="modal" data-target=".view-modal-data" data-record="0" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable">
      <div class="fc-content"> <span class="fc-title">Jadwals</span></div>
      </a><a data-toggle="modal" data-target=".view-modal-data" data-record="1" class="fc-day-grid-event fc-h-event fc-event fc-start fc-end  fc-draggable">
      <div class="fc-content"> <span class="fc-title">Meetings</span></div>
      </a></div>
  </div>
</div>
<style type="text/css">
.trumbowyg-box.trumbowyg-editor-visible {
  min-height: 90px !important;
}

.trumbowyg-editor {
  min-height: 90px !important;
}
.fc-day:hover, .fc-day-number:hover, .fc-content:hover{cursor: pointer;}

.fc-close {
    font-size: .9em !important;
    margin-top: 2px !important;
}
.fc-close {
    float: right !important;
}

.fc-close {
    color: #666 !important;
}
.fc-event.fc-draggable, .fc-event[href], .fc-popover .fc-header .fc-close {
    cursor: pointer;
}
.fc-widget-header {
    background: #E4EBF1 !important;
}
.fc-widget-content {
	background: #FFFFFF;
}

.hide-calendar .ui-datepicker-calendar { display:none !important; }
.hide-calendar .ui-priority-secondary { display:none !important; }
</style>
