jQuery(function() {

// We can attach the `fileselect` event to all file inputs on the page
jQuery(document).on('change', ':file', function() {
  console.log("entro al change file");
  var input = jQuery(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
  jQuery("#imagen2").val(label);

});



// We can watch for our custom `fileselect` event like this
jQuery(document).ready( function() {
    jQuery(':file').on('fileselect', function(event, numFiles, label) {
      console.log("entro al fileselect");
        var input = jQuery(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }

    });

});

});
