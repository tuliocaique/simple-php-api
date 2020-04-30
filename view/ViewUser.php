<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <title>List users</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="card bg-white shadow-sm mt-5">
            <div class="card-body p-5">
                <button type="button" class="btn btn-success btn-icon mb-4" data-toggle="modal" data-target="#modalAddUser"><i class="fas fa-user-plus"></i> New User</button>
                <!-- datatable start -->
                <table id="user-datatable" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- datatable ends -->
            </div>
        </div>
    </div>


    <!-- begin: modal add user -->
    <div class="modal fade text-left" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAddUser" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel160"><i class="fas fa-user-plus"></i> New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form class="form form-horizontal" id="addUser">
                    <div class="modal-body p-5">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="addNome">Name</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" id="addNome" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="addEmail">Email</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="email" class="form-control" id="addEmail" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="addPassword">Password</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" id="addPassword" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="addCountry">Country</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" id="addCountry" name="country" placeholder="Country" maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-success ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Confirm</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end: modal add user -->

    <!-- begin: modal edit user -->
    <div class="modal fade text-left" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUser" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160"><i class="fas fa-user-edit"></i> Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form class="form form-horizontal" id="editUser" enctype="multipart/form-data">
                    <input type="hidden" id="editUserId" name="id">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="editName">Name</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" id="editName" name="name" placeholder="Name" required>
                                        <div class="form-control-position">
                                            <i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editEmail">Email</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="email" class="form-control" id="editEmail" name="email" placeholder="Email" required>
                                        <div class="form-control-position">
                                            <i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editPassword">Password</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="password" class="form-control" id="editPassword" name="password" placeholder="Password" required>
                                        <div class="form-control-position">
                                            <i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="editPassword">Country</label>
                                </div>
                                <div class="col-md-8 form-group ">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" id="editCountry" name="country" placeholder="Country" maxlength="2" required>
                                        <div class="form-control-position">
                                            <i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Confirm</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end: modal edit user -->

    <!-- begin: modal delete user -->
    <div class="modal fade text-left" id="modalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="modalDeleteUser" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel160"><i class="fas fa-user-minus"></i> Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <h5>Are you sure you want to delete this user? After confirmation, this action cannot be undone.</h5>
                </div>
                <div class="modal-footer">
                    <form class="form form-horizontal" id="deleteUser">
                        <input type="hidden" id="deleteUserId" name="id">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-danger ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Confirm</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end: modal delete user -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="view/assets/user.js"></script>
</body>
</html>