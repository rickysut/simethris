<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">

                    <div id="calendar" class="page-layout simple full-width">

                        <!-- HEADER -->
                        <div class="page-header bg-primary text-auto p-6">

                            <!-- HEADER CONTENT-->
                            <div class="header-content d-flex flex-column justify-content-between">

                                <!-- HEADER TOP -->
                                <div class="header-top d-flex flex-column flex-sm-row align-items-center  justify-content-center justify-content-sm-between">

                                    <div class="logo row align-items-center no-gutters mb-4 mb-sm-0">
                                        <i class="logo-icon icon-calendar-today mr-4"></i>
                                        <span class="logo-text h4">Calendar</span>
                                    </div>

                             
                                </div>
                                <!-- / HEADER TOP -->

                                <!-- HEADER BOTTOM -->
                                <div class="header-bottom row align-items-center justify-content-center">

                                </div>
                                <!-- / HEADER BOTTOM -->
                            </div>
                            <!-- / HEADER CONTENT -->

                            <!-- ADD EVENT BUTTON -->
                            <button id="add-event-button" type="button" class="btn btn-danger btn-fab add_calendar" aria-label="Add event">
                                <i class="icon icon-plus"></i>
                            </button>
                            <!-- / ADD EVENT BUTTON -->

                        </div>
                        <!-- / HEADER -->

                        <!-- CONTENT -->
                        <div class="page-content p-6">
                            <div id="calendarIO"></div>
                        </div>
						
                        <!-- / CONTENT -->
                    </div>

                    
    </div>
				
  <?php $this->load->view('back/template/footer'); ?>
	
	</div>
	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/fullcalendar/dist/fullcalendar.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/fullcalendar/dist/fullcalendar.print.min.css" media="print" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/moment/min/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/fullcalendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/apps/calendar/calendar.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>      
<script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data)
            });
    });

    $(document).on('click', '.add_calendar', function(){
        $('#create_modal input[name=calendar_id]').val(0);
        $('#create_modal').modal('show');  
    })

    $(document).on('submit', '#form_create', function(){

        var element = $(this);
        var eventData;
        $.ajax({
            url     : backend_url+'calendar/save',
            type    : element.attr('method'),
            data    : element.serialize(),
            dataType: 'JSON',
            beforeSend: function()
            {
                element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(data)
            {
                if(data.status)
                {   
                    eventData = {
                        id          : data.id,
                        title       : $('#create_modal input[name=title]').val(),
                        description : $('#create_modal textarea[name=description]').val(),
                        start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color       : $('#create_modal select[name=color]').val()
                    };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
        return false;
    })

    function editDropResize(event)
    {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end)
        {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }
        else
        {
            end = start;
        }
        
        $.ajax({
            url     : backend_url+'calendar/save',
            type    : 'POST',
            data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
            dataType: 'JSON',
            beforeSend: function()
            {
            },
            success: function(data)
            {
                if(data.status)
                {   
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                }
                else
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }         
        });
    }

    function save()
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                            title       : $('#create_modal input[name=title]').val(),
                            description : $('#create_modal textarea[name=description]').val(),
                            start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color       : $('#create_modal select[name=color]').val()
                        };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
            return false;
        })
    }

    function deteil(event)
    {
        $('#create_modal input[name=calendar_id]').val(event.id);
        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
        $('#create_modal input[name=title]').val(event.title);
        $('#create_modal input[name=description]').val(event.description);
        $('#create_modal select[name=color]').val(event.color);
        $('#create_modal .delete_calendar').show();
        $('#create_modal').modal('show');
    }

    function editData(event)
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        event.title         = $('#create_modal input[name=title]').val();
                        event.description   = $('#create_modal textarea[name=description]').val();
                        event.start         = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end           = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color         = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
            return false;
        })
    }

    function deleteData(event)
    {
        $('#create_modal .delete_calendar').click(function(){
            $.ajax({
                url     : backend_url+'calendar/delete',
                type    : 'POST',
                data    : 'id='+event.id,
                dataType: 'JSON',
                beforeSend: function()
                {
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        $('#calendarIO').fullCalendar('removeEvents',event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html(data.notif);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('#form_create').find('.alert').css('display', 'block');
                    $('#form_create').find('.alert').html('Wrong server, please save again');
                }         
            });
        })
    }

</script>

</div>
		<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" action="POST" id="form_create">
						<input type="hidden" name="calendar_id" value="0">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Create calendar event</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>				
							<div class="modal-body">

								<div class="form-row">
									<div class="alert alert-danger" style="display: none;"></div>
								</div>
								<div class="form-row">
									<input type="text" name="title" class="form-control">
									<label for="title">Title</label>
								</div>

								<div class="form-row">
									<textarea name="description" class="form-control"></textarea>
									<label for="description">Description</label>
								</div>

								<div class="form-row">
										<select name="color" class="form-control">
											<option value="">Choose</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
											<option style="color:#008000;" value="#008000">&#9724; Green</option>                       
											<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
											<option style="color:#000;" value="#000">&#9724; Black</option>
										</select>
									<label for="color">Color</label>
								</div>

								<div class="form-row">
										<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
											<input type="text" name="start_date" class="form-control" readonly>
											<span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
										</div>
									<label for="start_date">Start Date</label>
								</div>

								<div class="form-row">
										<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
											<input type="text" name="end_date" class="form-control" readonly>
											<span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
										</div>
									<label for="end_date">End Date</label>
								</div>

							</div>
							<div class="modal-footer">
								<a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a>
								<a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
								<button type="submit" class="btn green">Submit</button>
							</div>
					</form>
				</div>
			</div>
		</div>	       											
    </main>
</body>

</html>