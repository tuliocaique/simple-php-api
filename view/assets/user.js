function getDatatableUsers() {
    $('#user-datatable').DataTable({
        "ajax": {
            "type": "GET",
            "contentType": "application/json",
            "url": "api/userAPI.php",
            "async": true,
            "serverSide": true,
            "dataSrc": "users",
            "order": [[3, "desc"]],
            "error": function (xhr, error, code) {
                console.log(error);
                console.log(code);
            }
        },
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "country"},
            {
                "mRender": function (meta, type, data, info) {
                    return '<div class="row"><div class="col-md-6"><button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-row="' + info.row + '" data-id="' + data.id + '" data-target="#modalEditUser"><i class="fas fa-user-edit"></i> Edit</button></div><div class="col-md-6"><button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-row="' + info.row + '" data-id="' + data.id + '" data-target="#modalDeleteUser"><i class="fas fa-user-minus"></i> Delete</button></div></div>';
                }
            }
        ]
    });
}

function getUserInfo(id) {
    $.ajax({
        type: "GET",
        url: "api/userAPI.php?id=" + id,
        dataType: "json",
        success: function (result) {
            $("#editUserId").val(result.user['id']);
            $("#editName").val(result.user['name']);
            $("#editEmail").val(result.user['email']);
            $("#editPassword").val(result.user['password']);
            $("#editCountry").val(result.user['country']);
        },
        error: function (result) {
            console.error(result);
        }
    });
}

function addUser() {
    let content = $("#addUser").serialize();
    $.ajax({
        type: "POST",
        url: "api/userAPI.php",
        data: content,
        dataType: "json",
        success: function () {
            $('#modalAddUser').modal('hide');
            $('#addUser')[0].reset();
            $('#user-datatable').DataTable().ajax.reload();
        },
        error: function (result) {
            console.error(result);
        }
    });
}

function editUser() {
    let content = $("#editUser").serialize();
    $.ajax({
        type: "PUT",
        url: "api/userAPI.php",
        data: content,
        dataType: "json",
        success: function () {
            $('#modalEditUser').modal('hide');
            $('#editUser')[0].reset();
            $('#user-datatable').DataTable().ajax.reload();
        },
        error: function (result) {
            console.error(result);
        }
    });
}

function deleteUser() {
    let content = $("#deleteUser").serialize();
    $.ajax({
        type: "DELETE",
        url: "api/userAPI.php",
        data: content,
        dataType: "json",
        success: function () {
            $('#modalDeleteUser').modal('hide');
            $('#user-datatable').DataTable().ajax.reload();
        },
        error: function (result) {
            console.error(result);
        }
    });
}


$(document).ready(function () {
    getDatatableUsers();

    $("#addUser").submit(function (event) {
        addUser();
        event.preventDefault();
    });

    $("#editUser").submit(function (event) {
        editUser();
        event.preventDefault();
    });

    $("#deleteUser").submit(function (event) {
        deleteUser();
        event.preventDefault();
    });

    $('#user-datatable tbody').on('click', '.btn-edit', function () {
        getUserInfo($(this).data("id"));
    });

    $('#user-datatable tbody').on('click', '.btn-delete', function () {
        $("#deleteUserId").val($(this).data("id"));
    });
});