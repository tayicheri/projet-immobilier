$("#customFile").change(function (e) {
  let val = $(this).val();
  val = val.split("\\");
  $("#labelCustomFile").text(val[val.length - 1]);
});

// <div class="custom-file col-md-12">
// <input type="file" class="custom-file-input" id="customFile">
// <label class="custom-file-label col-md-12" id="labelCustomFile" for="customFile"></label>
// </div>

function generationAjax(url, donnee, donneeType, idDiv) {
  let request = $.ajax({
    type: "POST",
    url: url,
    data: donnee,

    dataType: donneeType,
  });

  request.done(function (retour) {
    //Code à jouer en cas d'éxécution sans erreur du script du PHP
    $("#" + idDiv).html(retour);
  });
  request.fail(function (http_error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP

    let server_msg = http_error.responseText;
    let code = http_error.status;
    let code_label = http_error.statusText;
    alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
  });
}
