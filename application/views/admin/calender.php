<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
              <div class="card-box">
                  <h4 class="header-title">Calender View</h4>
                    <div id="calendar"></div>



              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
      $(document).ready(function() {
      $('#calendar').fullCalendar({
        header: {
     	   left: 'prev,next today',
     	   center: 'title',
     	   right: 'month,basicWeek,basicDay'
     	   },
     	   defaultDate: new Date(),
     	   editable: false,
     	   eventLimit: true, // allow "more" link when too many events
     	   // events:"<?php echo base_url() ?>event/getall_act_event",
     	   eventSources: [
     	   {
     	   url: '<?php echo base_url() ?>salescontroller/get_daywise_sales_list',
     	   color: 'black',
     	   textColor: 'white'
     	   }
     	   ],
     	   eventMouseover: function(calEvent, jsEvent)
     	   {
     		   var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background-color:#000;color:#fff;position:absolute;z-index:10001;padding:20px;">' + calEvent.description + '</div>';

     		   var $tooltip = $(tooltip).appendTo('body');

     		   $(this).mouseover(function(e)
     		   {
     			   $(this).css('z-index', 10000);
     			   $tooltip.fadeIn('500');
     			   $tooltip.fadeTo('10', 1.9);
     		   }).mousemove(function(e)
     		   {
     			   $tooltip.css('top', e.pageY + 10);
     			   $tooltip.css('left', e.pageX + 20);
     		   });
     	   },

     	   eventMouseout: function(calEvent, jsEvent)
     	   {
     		   $(this).css('z-index', 8);
     		   $('.tooltipevent').remove();
     	   },

     	   });
         });




      </script>
<style>
.fc-row.fc-week.fc-widget-content{
  height: 100px !important;
}
</style>
