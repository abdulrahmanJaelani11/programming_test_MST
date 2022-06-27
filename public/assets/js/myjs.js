$("input").click(function () {
  $(this).removeClass("is-invalid");
});

// Login
function simpan(url) {
  $.ajax({
    url: url,
    type: "post",
    data: $("form").serialize(),
    dataType: "json",
    success: function (data) {
      //   console.log(data);
      if (data.status == 400) {
        if (data.username) {
          $("#username").addClass("is-invalid");
          $(".invalid-username").text(data.username);
        }
        if (data.password) {
          $("#password").addClass("is-invalid");
          $(".invalid-password").text(data.password);
        }
      }
      if (data.status == 200) {
        window.location = "beranda";
      }
    },
  });
}

function getTable(url) {
  $.ajax({
    url: url,
    type: "post",
    dataType: "json",
    success: function (data) {
      console.log(data); 
      $("#table").html(data);
    },
  });
}

// Menampilkan Form
function tampilForm(idform, bg, classForm = null) {
  $("#id").val(idform);
  console.log(bg)
  $("."+bg).slideDown()
  $("#" + classForm).slideDown();
  
}

// Menghilangkan Form
function hideForm(classForm) {
  $("#" + classForm).slideToggle();
}

// Menyimpan Data
function save(url, classForm, urlTable = null, classCardForm = null) {
  $.ajax({
    url: url,
    type: "post",
    data: $("." + classForm).serialize(),
    dataType: "json",
    success: function (data) {
      // $('#customer').attr('readonly', true)
      console.log(data);
      if (data.status == 200) {
        Swal.fire("Berhasil", data.pesan, "success");
        getTable(urlTable);
        hideForm(classCardForm);
        // $('input').val('')
      }
      if (data.status == 400) {
        if (data.pesan.spesifik1) {
          Swal.fire("Opsss..", data.pesan.spesifik1, "error");
        }
        if (data.pesan.spesifik2) {
          Swal.fire("Opsss..", data.pesan.spesifik2, "error");
        }
      }
    },
  });
}

// delete Data
function hapus(url, linkTable = null) {
  $.ajax({
    url: url,
    type: "post",
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (data.status == 200) {
        Swal.fire("Berhasil", data.pesan, "success");
        getTable(linkTable);
      }
    },
  });
}
