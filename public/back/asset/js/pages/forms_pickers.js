// Bootstrap Datepicker
$(function() {
 
// Bootstrap Material DateTimePicker
$(function() {
  $('.b-m-dtp-date').bootstrapMaterialDatePicker({
    weekStart: 0,
    time: false,
    clearButton: true
  });

  $('.b-m-dtp-time').bootstrapMaterialDatePicker({
    date: false,
    shortTime: false,
    format: 'HH:mm'
  });

  $('.b-m-dtp-datetime').bootstrapMaterialDatePicker({
    weekStart: 1,
    format : 'dddd DD MMMM YYYY - HH:mm',
    shortTime: true,
    nowButton : true,
    minDate : new Date()
  });
});

});
