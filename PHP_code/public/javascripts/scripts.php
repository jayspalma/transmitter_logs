  <link rel="stylesheet" href="javascripts/jquery-ui.css">
  <script src="javascripts/jquery-3.4.1.js"></script>
  <script src="javascripts/jquery-ui.js"></script>

<!--   <script>
 $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      showOn: "button",
      buttonImage: "images/calendar.jpg",
      buttonImageOnly: true,
      buttonText: "Select Date"
    });
  } );
  </script> -->


<script>

  $(document).ready(function(){
    $("#datepickerstart").datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      showOn: "button",
      buttonImage: "images/calendar.jpg",
      buttonImageOnly: true,
      buttonText: "Select Date"
    });
    $("#datepickerend").datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      showOn: "button",
      buttonImage: "images/calendar.jpg",
      buttonImageOnly: true,
      buttonText: "Select Date"
    });

    $("#searchform").submit(function(event){
      var fromdate = $("#datepickerstart").val();
      var todate = $("#datepickerend").val();
      
      if(fromdate === "" && todate === ""){
  
      }else if(fromdate === "" || todate === ""){
          event.preventDefault();
          $(".error-messages").text("Both Start Date and End Date must").fadeIn();
      }

    });




  });



</script>


