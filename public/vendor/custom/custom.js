jQuery('#confirm-success').click(function()
{
    jQuery('#modal-success').hide();
});
jQuery('#confirm-warning').click(function () {
    jQuery('#modal-warning').hide();
});
jQuery('#confirm-error').click(function () {
    jQuery('#modal-error').hide();
});
jQuery('#confirm-photo').click(function () {
    jQuery('#modal-photo').hide();
});
jQuery('#confirm-fabricante').click(function () {
    jQuery('#modal-fabricante').hide();
});
jQuery('#confirm-modelo').click(function () {
    jQuery('#modal-modelo').hide();
});
jQuery('#confirm-delete').click(function () {
    jQuery('#modal-delete').hide();
});
jQuery('#confirm-delete-manut').click(function () {
    jQuery('#modal-delete-manut').hide();
});
jQuery('#confirm-anexo').click(function () {
    jQuery('#modal-anexo').hide();
});

// $(function () {
//     //Initialize Select2 Elements
//     $('.select2').select2()

//     //Datemask dd/mm/yyyy
//     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//     //Datemask2 mm/dd/yyyy
//     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//     //Money Euro
//     $('[data-mask]').inputmask()

//     //Date range picker
//     $('#reservation').daterangepicker()
//     //Date range picker with time picker
//     $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
//     //Date range as a button
//     $('#daterange-btn').daterangepicker(
//       {
//         ranges   : {
//           'Today'       : [moment(), moment()],
//           'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//           'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
//           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//           'This Month'  : [moment().startOf('month'), moment().endOf('month')],
//           'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//         },
//         startDate: moment().subtract(29, 'days'),
//         endDate  : moment()
//       },
//       function (start, end) {
//         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
//       }
//     )

//     //Date picker
//     $('#datepicker').datepicker({
//       autoclose: true
//     })

//     //iCheck for checkbox and radio inputs
//     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//       checkboxClass: 'icheckbox_minimal-blue',
//       radioClass   : 'iradio_minimal-blue'
//     })
//     //Red color scheme for iCheck
//     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
//       checkboxClass: 'icheckbox_minimal-red',
//       radioClass   : 'iradio_minimal-red'
//     })
//     //Flat red color scheme for iCheck
//     $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
//       checkboxClass: 'icheckbox_flat-green',
//       radioClass   : 'iradio_flat-green'
//     })

//     //Colorpicker
//     $('.my-colorpicker1').colorpicker()
//     //color picker with addon
//     $('.my-colorpicker2').colorpicker()

//     //Timepicker
//     $('.timepicker').timepicker({
//       showInputs: false
//     })
//   })


//   jQuery(function($){
//     $("#campoData").mask("99/99/9999");
//     $("#campoTelefone").mask("(999) 999-9999");
//     $("#campoSenha").mask("***-****");
//     });