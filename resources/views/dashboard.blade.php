@extends('layouts.app')
@section('content')

<div class="row">
    <h1>Dashboard</h1>

     <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #feb47b;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}




</style>  -->


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>




    {{-- <form action="javascript:void(0)" name="dashboard" id="dashboard" method="post">
        @csrf

        <div class="">
            <label for="">name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="">
            <label for="">email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="">
            <label for="">username</label>
            <input type="text" name="username" id="username">
        </div>
        <select id="usertype" name="usertype" class="form-select mt-1 block w-full">
            <option value="admin">Admin</option>
            <option value="superadmin">Super Admin</option>
            <option value="guest">Guest</option>
        </select>
        <div class="">
            <label for="">password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit" value="submit" id="submit">Submit</button>
    </form> --}}

</div>

<table id="userDataTable" class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>id</th>
            <th>username</th>
            <th>name</th>
            <th>email</th>
            <th>user type</th>
            <!-- <th>preview</th> -->
            <th>status</th>
            <th>action</th>

            
        </tr>
    </thead>

    <tbody>


    </tbody>

</table>

            <th><button class="sort-btn btn btn-outline-secondary" data-sort-by="username">Sort by Username</button></th>
            <th><button class="sort-btn btn btn-outline-secondary" data-sort-by="name">Sort by Name</button></th>
            <th><button class="sort-btn btn btn-outline-secondary" data-sort-by="email">Sort by Email</button></th>

  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Users Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="javascript:void(0)" name="dashboard" id="dashboardUpdate" method="post">
                @csrf

                <input type="hidden" name="userId" id="userId">


            
          
                <div class="form-group">
                    <label for="" class="col-form-label">name</label>
                    <input type="text" name="name" id="nameUpdate" class="form-control">
                </div>

                <div class="form-group">
                    <label for="" class="col-form-label">email</label>
                    <input type="email" name="email" id="emailUpdate" class="form-control">
                </div>

                <div class="form-group">
                    <label for="" class="col-form-label">username</label>
                    <input type="text" name="username" id="usernameUpdate" class="form-control">
                </div>

                <select id="usertypeUpdate" name="usertypeUpdate" class="form-select mt-1 block w-full">
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                    <option value="guest">Guest</option>
                </select>

                    <select id="statusUpdate" name="statusUpdate" class="form-select mt-1 block w-full">
                        <option value="0">deactive</option>
                        <option value="1">active</option>
                    </select>

                    <div class="modal-footer">
                <button type="submit" value="submit" id="submit"  class="btn btn-primary close">Save Changes</button>

                <div>


            </form>
        </div>
      </div>
    </div>
  


  


<!-- Large modal -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<!-- -------------------- -->





@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        // Fetch user data when the document is ready
        fetchUserData();

        // Function to fetch user data
        function fetchUserData(sortBy = 'username') {
            $.ajax({
                url: "{{ route('user.get') }}"
                , type: "GET"
                , data: {
                    sortBy: sortBy
                }
                , success: function(response) {
                    var tableBody = $("#userDataTable tbody");
                    tableBody.empty(); // Clear existing rows

                    $.each(response, function(index, user) {
                        var badge = user.status == 1 ? '<span class="badge badge-success">active</span>' : '<span class="badge badge-secondary">deactive</span>';

                        var row = '<tr>' +
                            '<td>' + (++index) + '</td>' +
                            '<td>' + user.id + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td>' + user.name + '</td>' +
                            '<td>' + user.email + '</td>' +
                            '<td>' + user.user_type + '</td>' +
                            // '<td>'+ '<button class="view btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-user-id="' + user.id + '">View</button>' +
                            '<td>' + badge + '</td>' +
                            '<td>'+ '<button class="update btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-user-id="' + user.id + '">Update</button>' +
                             '<td>' +'<button class="delete btn btn-danger" data-user-id="' + user.id + '">Delete</button>' +
                            '</td>' +
                            '</tr>';

                          
                        tableBody.append(row);
                    });
                }
                , error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).on('click', ".view", function() {
    var userId = $(this).data("user-id");

    $('#exampleModal').modal('show');
    $('.close').hide();

    $.ajax({
        url: "{{ route('user.find') }}",
        type: "GET",
        data: {
            userId: $(this).data('user-id'),
        },
        success: function(response) {
            $('#nameUpdate').val(response.name);
            $('#emailUpdate').val(response.email);
            $('#usernameUpdate').val(response.username);
            $('#usertypeUpdate').val(response.user_type);
            $('#usertypeUpdate').trigger('change');
            $('#statusUpdate').val(response.status);
            $('#statusUpdate').trigger('change');
            $('#userId').val(response.id);
            // Set the switch checkbox based on the status received from the backend
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});


        $(document).on('click', ".update", function() {
    var userId = $(this).data("user-id");

    $('#exampleModal').modal('show');

    $.ajax({
        url: "{{ route('user.find') }}",
        type: "GET",
        data: {
            userId: $(this).data('user-id'),
        },
        success: function(response) {
            $('#nameUpdate').val(response.name);
            $('#emailUpdate').val(response.email);
            $('#usernameUpdate').val(response.username);
            $('#usertypeUpdate').val(response.user_type);
            $('#usertypeUpdate').trigger('change');
            $('#statusUpdate').val(response.status);
            $('#statusUpdate').trigger('change');
            $('#userId').val(response.id);
            // Set the switch checkbox based on the status received from the backend
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

        $(document).on('click', '.delete', function(){
            $.ajax({
                url:"{{ route('user.delete') }}",
                type:"GET",
                data:{
                    userId:$(this).data('user-id'),
                }, //all are the commas and semicolun are important 
                success: function(response){
                    fetchUserData();
                },
                error: function(xhr, status, error){
                    console.error(error);
                }

            });
        });

        $(document).on('click', '.sort-btn', function() {

            var sortBy = $(this).data('sort-by');

            // fetch user data
            $.ajax({
                url: "{{ route('user.get') }}"
                , type: "GET"
                , data: {
                    sortBy: sortBy
                }
                , success: function(response) {
                    var tableBody = $("#userDataTable tbody");
                    tableBody.empty(); //clear rows

                    $.each(response, function(index, user) {
                        var row = '<tr>' +
                            '<td>' + (++index) + '</td>' +
                            '<td>' + user.id + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td>' + user.name + '</td>' +
                            '<td>' + user.email + '</td>' +
                            '<td>' + user.user_type + '</td>' +
                            '<td>' + '<button>preview</button>' + '</td>' +
                            '<td>' + user.status + '</td>' +
                            '</tr>';
                        tableBody.append(row);
                    });
                }
                , error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

  
                // form updation
                $("#dashboardUpdate").validate({
                        rules: {
                            nameUpdate: {
                    required: "Enter your name",
                    maxlength: "Not valid"
                },
                emailUpdate: {
                    required: "Enter your email",
                    maxlength: "Not valid",
                    email: "Enter a valid email" // Changed message for email validation
                },
                usernameUpdate: {
                    required: "Enter username",
                    maxlength: "Not valid"
                },
                    usertypeUpdate: {
                        required: true,
                        maxlength: 50
                    }
                },
                messages: {
                    nameUpdate: {
                        required: "Enter your name",
                        maxlength: "Not valid"
                    },
                    emailUpdate: {
                        required: "Enter your email",
                        maxlength: "Not valid",
                        email: "Enter a valid email" 
                    },
                    usernameUpdate: {
                        required: "Enter username",
                        maxlength: "Not valid"
                    },
                    usertypeUpdate: {
                        required: "Select user type",
                        maxlength: "Not valid"
                    }
                },
                    submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#submit').html('please wait..');
                    $('#submit').attr("disabled", true);

                    $.ajax({
                        url: "{{ route('user.update') }}",
                        type: "POST",
                        data: {
                            userId:$(this).data('user-id'),
                            formData: $('#dashboardUpdate').serialize()
                        },
                        success: function(response) {
                            $('#submit').html('Submit');
                            $('#submit').attr('disabled', false);
                            alert('Ajax form has been submitted successfully');
                            fetchUserData();
                            document.getElementById('dashboardUpdate').reset();
                        }
                    });
                }
            });
    });

</script>
@endsection
