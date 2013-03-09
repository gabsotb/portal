$(document).ready(function()
{
  
 
  $('#investment_application_registration_number').keyup(function(key)
  {
    if (this.value.length >= 3 || this.value == '')
    {
     // $('#loader').show();
      $('#investment_table').load(
        $(this).parents('form').attr('action'),
        { query: this.value + '*' },
        function() { $('#loader').hide(); }
      );
    }
  });
});