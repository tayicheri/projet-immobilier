$("#customFile").change(function (e) {
  let val = $(this).val();
  val = val.split("\\");
  $("#labelCustomFile").text(val[val.length - 1]);
});


// <div class="custom-file col-md-12">
// <input type="file" class="custom-file-input" id="customFile">
// <label class="custom-file-label col-md-12" id="labelCustomFile" for="customFile"></label>
// </div>