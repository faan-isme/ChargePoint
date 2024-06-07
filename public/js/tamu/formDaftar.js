
$(document).ready(function() {

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    function toggleElemnts(){
        if ($('#jeniskemitraan').val() === 'Basic') {
            $('#pln-input').removeClass('hidden');
            $('#tipecharger-input').removeClass('hidden');
            $('#imagecharger-input').removeClass('hidden');
          } else {
            $('#pln-input').addClass('hidden');
            $('#tipecharger-input').addClass('hidden');
            $('#imagecharger-input').addClass('hidden');
          }
    };
    // Set the select value based on URL parameter
    var program = getUrlParameter('program');
    if (program) {
        $('#jeniskemitraan').val(program);
        toggleElemnts();
    };
    // Set the select value based on Form
    $('#jeniskemitraan').change(toggleElemnts);
  });