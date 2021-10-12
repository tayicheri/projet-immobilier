tabRegex = {
  nom: /^[\p{L}\s]{2,15}$/u,
  prenom: /^[\p{L}\s]{2,15}$/u,
  email: /^[a-zA-Z]+[\w]+[@][a-z\.\-]{1,20}[\.][a-z]{1,3}$/,
  tel: /^[+]?[0-9]{8,}$/,
  adresse: /^[0-9]*\s[a-zA-Z]*\s[a-zA-Z]*/,
  mdp: /./,
};

function validationClient(idform, typesTest) {
  $("#" + idform).submit(function (event) {
    let form = $(event.target);

    let nomForm = [];
    $("#" + idform + " input").each(function () {
      if ($(this).attr("type") != "file") {
        nomForm.push($(this).attr("name"));
      }
    });
    console.log(nomForm);

    let valeurForm = [];

    for (i = 0; i < nomForm.length; i++) {
      if (nomForm[i] == "rgpd") {
        valeurForm.push($("#" + nomForm[i]).prop("checked"));
      } else {
        valeurForm.push($("#" + nomForm[i]).val());
      }
    }
    console.log(valeurForm);

    let validation = parcourNomform(nomForm, valeurForm, typesTest);
    console.log(validation, nomForm);
    if (validation != typesTest.length) {
      event.preventDefault();
      return false;
      //traitementen cas d'erreur
    } else {
      return true;
    }
  });
}

function parcourNomform(form, valeur, typeTabregex) {
  let f = 0;

  for (i = 0; i < typeTabregex.length; i++) {
    if (tabRegex[typeTabregex[i]]) {
      $("[name=" + form[i] + "]").removeClass("bg-danger text-white");
      tabRegex[typeTabregex[i]].test(valeur[i])
        ? (f += 1)
        : $("[name=" + form[i] + "]").addClass("bg-danger text-white");
    } else if (typeTabregex[i] == "mdpC") {
      $("[name=" + form[i] + "]").removeClass("bg-danger text-white");
      valeur[i] == valeur[i - 1]
        ? (f += 1)
        : $("[name=" + form[i] + "]").addClass("bg-danger text-white");
    } else if (typeTabregex[i] == "rgpd") {
      $("[name=" + form[i] + "]").parent().removeClass("bg-danger text-white");
      valeur[i]
        ? (f += 1)
        : $("[name=" + form[i] + "]").parent().addClass("bg-danger text-white");
    } else {
      f += 1;
    }
  }

  return f;
}
