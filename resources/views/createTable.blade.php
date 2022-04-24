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
            <td id="{{ $loop->index + 1 }}">{{$item['name']}}</td>
            <td id="{{ $loop->index + 1 }}">{{$item['surname']}}</td>
            <td id="{{ $loop->index + 1 }}">{{$item['username']}}</td>
            <td>
                <input type="button" id="edit_button{{ $loop->index + 1 }}" value="Edit" class="edit" onclick="edit_row('2')">
                <input type="button" value="Delete" class="delete" onclick="delete_row('2')">
            </td>
        </tr>
    @endforeach

</table>
</div>

</body>
</html>
<script>
    function edit_row(){

    }
</script>
