
$(document).ready(function () {


  function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }

  function toggleElemnts() {
    let imgecharger_imput = `
        <label class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white"
                        for="file_input">Image Charger</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="file_input" type="file" name="charger_img">
    `;
    let tipecharger_input = `
        <label for="tipecharger"
                        class="block mb-2 text-sm text-gray-900 dark:text-white font-bold font-poppins">Tipe Charger
                    </label>
        <input type="text" id="tipecharger" name="tipe_charger"
            class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required />
    `;
    let pln_input = `
        <label for="pln"
            class="block mb-2 text-sm font-bold font-poppins text-gray-900 dark:text-white">ID PLN </label>
        <input type="number" maxlength="11" id="pln" name="id_pelangganPLN"
            class="border-0 border-b-2 text-gray-900 text-sm w-full p-2.5 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required />
    `;
    if ($('#jeniskemitraan').val() === 'Basic') {
      $('#pln-input').removeClass('hidden');
      $('#pln-input').append(pln_input);
      $('#tipecharger-input').removeClass('hidden');
      $('#tipecharger-input').append(tipecharger_input);
      $('#imagecharger-input').removeClass('hidden');
      $('#imagecharger-input').append(imgecharger_imput);
    } else {
      $('#pln-input').addClass('hidden');
      $('#pln-input label').remove();
      $('#pln-input input').remove();
      $('#tipecharger-input').addClass('hidden');
      $('#tipecharger-input label').remove();
      $('#tipecharger-input input').remove();
      $('#imagecharger-input').addClass('hidden');
      $('#imagecharger-input label').remove();
      $('#imagecharger-input input').remove();
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