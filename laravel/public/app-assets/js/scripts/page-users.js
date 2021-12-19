$(document).ready(function () {

    var id_table = "#users_datatable";
  // variable declaration
  var usersTable;
  var usersDataArray = [];
  // datatable initialization
  if ($("#users_datatable").length > 0) {
    usersTable = $("#users_datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0, 8, 9]
      }]
    });
  };
  // on click selected users data from table(page named page-users-list)
  // to store into local storage to get rendered on second page named page-users-view
  $(document).on("click","#users_datatable tr", function () {
    $(this).find("td").each(function () {
      usersDataArray.push($(this).text().trim())
    })

    localStorage.setItem("usersId", usersDataArray[1]);
    //localStorage.setItem("usersFullName", usersDataArray[2]);
    localStorage.setItem("usersStatus", usersDataArray[3]);
    localStorage.setItem("usersLevel", usersDataArray[4]);
    localStorage.setItem("usersMail", usersDataArray[5]);
  })
  // render stored local storage data on page named page-users-view
  if (localStorage.usersId !== undefined) {
    $(".users-view-id").html(localStorage.getItem("usersId"));
    //$(".users-view-username").html(localStorage.getItem("usersFullName"));
    $(".users-view-name").html(localStorage.getItem("usersStatus"));
    $(".users-view-verified").html(localStorage.getItem("usersLevel"));
    $(".users-view-role").html(localStorage.getItem("usersMail"));
  }
  // page users list verified filter
  $("#users-list-verified").on("change", function () {
    var usersVerifiedSelect = $("#users-list-verified").val();
    usersTable.search(usersVerifiedSelect).draw();
  });
  // page users list role filter
  $("#users-list-role").on("change", function () {
    var usersRoleSelect = $("#users-list-role").val();
    // console.log(usersRoleSelect);
    usersTable.search(usersRoleSelect).draw();
  });



  // Input, Select, Textarea validations except submit button validation initialization
  if ($(".users-edit").length > 0) {
    $("#accountForm, #infotabForm").validate({
      rules: {
        username: {
          required: true,
          minlength: 5
        },
        name: {
          required: true
        },
        email: {
          required: true
        },
        datepicker: {
          required: true
        },
        address: {
          required: true
        }
      },
      errorElement: 'div'
    });
    $("#infotabForm").validate({
      rules: {
        datepicker: {
          required: true
        },
        address: {
          required: true
        }
      },
      errorElement: 'div'
    });
  }
});
