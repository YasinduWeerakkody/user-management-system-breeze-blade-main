@extends('layouts.app')
@section('content')

<div class="row">

    <h1>Admin Page</h1>

    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}


</style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


 
    <!-- <form action="javascript:void(0)" name="dashboard" id="dashboard" method="post">
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
    </form> -->


  <table id="userDataTable" class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>id</th>
            <th>username</th>
            <th>name</th>
            <th>email</th>
            <th>user type</th>
            <th>preview</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>

    <tbody>


    </tbody>

    

</table>
  

    
</div>


<!-- edit -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Add New Users</button>

<th><button class="btn btn-outline-secondary" data-sort-by="username">Sort by Username</button></th>
<th><button class="btn btn-outline-secondary" data-sort-by="name">Sort by Name</button></th>
<th><button class="btn btn-outline-secondary" data-sort-by="email">Sort by Email</button></th>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <!-- <form action="javascript:void(0)" name="dashboard" id="dashboard" method="post"> -->

         <form method="post" action="{{route('user.store')}}">
        @csrf
        @method('post')
          <div class="form-group">
            <label for="" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="" class="col-form-label">User Name:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>

          <select id="usertype" name="usertype" class="form-select mt-1 block w-full">
            <option value="admin">Admin</option>
            <option value="superadmin">Super Admin</option>
            <option value="guest">Guest</option>
        </select>

          <div class="form-group">
            <label for="" class="col-form-label">password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>




          
        </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="submit" id="submit">Save</button>
       
      </div>
    </div>
  </div>
</div>




<!-- Modal -->

<!-- Large modal -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                        var row = '<tr>' +
                            '<td>' + (++index) + '</td>' +
                            '<td>' + user.id + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td>' + user.name + '</td>' +
                            '<td>' + user.email + '</td>' +
                            '<td>' + user.user_type + '</td>' +
                            '<td>' + '<button class="update btn btn-success" >preview</button>' + '</td>' +
                            '<td>' + user.status + '</td>' +
                            '<td>'+ '<button class="update btn btn-primary"  data-user-id="' + user.id + ' ">Update</button>' +

                            '<td>'
                                   + '<button class="delete btn btn-danger" data-user-id="' + user.id + '">Delete</button>' +
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

        // form submision
        $("#dashboard").validate({
                rules: {
                    name: {
                        required: true
                        , maxlength: 50
                    }
                    , email: {
                        required: true
                        , maxlength: 50
                    }
                    , username: {
                        required: true
                        , maxlength: 50
                    }
                    , usertype: {
                        required: true
                        , maxlength: 50
                    }
                    , password: {
                        required: true
                        , maxlength: 6
                    }
                }
                , messages: {
                    name: {
                        required: "enter your name"
                        , maxlength: "not valid"
                    }
                    , email: {
                        required: "enter your email"
                        , maxlength: "not valid"
                        , email: "not valid"
                    }
                    , username: {
                        required: "enter username"
                        , maxlength: "not valid"
                    }
                    , usertype: {
                        required: "select user type"
                        , maxlength: "not valid"
                    }
                    , password: {
                        required: "enter your password"
                        , maxlength: "not valid"
                    }
                }
                , submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#submit').html('please wait..');
                    $('#submit').attr("disabled", true);

                    $.ajax({
                        url: "{{ url('store') }}"
                        , type: "POST"
                        , data: $('#dashboard').serialize()
                        , success: function(response) {
                            $('#submit').html('Submit');
                            $('#submit').attr('disabled', false);
                            alert('Ajax form has been submitted successfully');
                            fetchUserData();
                            document.getElementById('dashboard').rest();
                        }
                    });
                }
            });
    });

</script>




@endsection
