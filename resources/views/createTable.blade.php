<html>
<head>
    <link rel="stylesheet" href="/resources/js/table.js">
</head>
<body>
<div id="wrapper">
    <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
        </tr>

        @foreach($data as $item)
            <tr id="row2">
                <td id="name{{ $loop->index + 1 }}">{{$item['name']}}</td>
                <td id="surname{{ $loop->index + 1 }}">{{$item['surname']}}</td>
                <td id="username{{ $loop->index + 1 }}">{{$item['username']}}</td>
                <td>
                    <input type="button" id="edit_button{{ $loop->index + 1 }}" value="Edit" class="edit"
                           onclick="edit_row({{$loop->index + 1}})">
                    <input type="button" value="Delete" class="delete" onclick="delete_row('2')">
                </td>
            </tr>
        @endforeach

    </table>
</div>

</body>
</html>
<script>
    function edit_row(id) {
        var name = document.getElementById('name' + id).innerHTML;
        var surname = document.getElementById('surname' + id).innerHTML;
        var username = document.getElementById('username' + id).innerHTML;

        window.location = "edit?name=" + name + "&surname=" + surname + "&username=" + username

    }
</script>
