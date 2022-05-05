<html>
<head>
    <link rel="stylesheet" href="resources/js/table.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .container{
            text-align: center;
            padding-top: 13px;
        }

    </style>
</head>
<body>
<div id="wrapper">
    <div class="card-body">
            <a href="/create-user">
                <button>Create New User</button>
            </a>
    <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        @foreach($data as $item)
            <tr id="row2">
                <td id="name{{ $loop->index + 1 }}">{{$item['name']}}</td>
                <td id="surname{{ $loop->index + 1 }}">{{$item['surname']}}</td>
                <td id="username{{ $loop->index + 1 }}">{{$item['username']}}</td>
                <td id="email{{ $loop->index + 1 }}">{{$item['email']}}</td>
                @if($item['role_id']==1)
                <td id="role{{ $loop->index + 1 }}">Admin</td>
                @elseif($item['role_id']==2)
                    <td id="role{{ $loop->index + 1 }}">Mesues</td>
                @else
                    <td id="role{{ $loop->index + 1 }}">Student</td>
                @endif
                <td>
                    <input type="button" id="edit_button{{ $loop->index + 1 }}" value="Edit" class="edit"
                           onclick="edit_row({{$loop->index + 1}})">
                </td>
                <td>
                    <form class="container" action="{{route('delete')}}" method="post">
                        @csrf
                        <button  onclick="delete_row('{{$loop->index + 1}}')" style="text-align: center">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
        @if(session()->has('success'))
            <div style="color: green;" class="text-center">
                {{ session('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div style="color: red;" class="text-center">
                {{ session('error') }}

            </div>
        @endif
        @foreach($errors->all() as $error)
            <div style="color: red;" class="text-center">
                {{ $error }}
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
<script>
    function edit_row(id) {
        var name = document.getElementById('name' + id).innerHTML;
        var surname = document.getElementById('surname' + id).innerHTML;
        var username = document.getElementById('username' + id).innerHTML;
        var email = document.getElementById('email' + id).innerHTML;
        var role = document.getElementById('role' + id).innerHTML;
       var params={"name":name,"surname":surname,"username":username,"email":email};


        window.location = "edit?name=" + name + "&surname=" + surname + "&username=" + username+ "&email=" + email+ "&role=" + role

    }
</script>
<script>
    function delete_row(id){
        alert("Are you sure you want to delete:");
        var name = document.getElementById('name' + id).innerHTML;
        var surname = document.getElementById('surname' + id).innerHTML;
        var username = document.getElementById('username' + id).innerHTML;
        var email = document.getElementById('email' + id).innerHTML;
        var role = document.getElementById('role' + id).innerHTML;
        objectData={"name":name,"surname":surname,"username":username,"email":email};
        console.log(objectData)

        $.ajax(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: "/delete",
            type: "post",
            data: objectData,
             error:function(){
                alert("Error!!!");
            }
        })
    }
</script>
