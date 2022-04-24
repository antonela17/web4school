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

<tr id="row1">
<td id="name_row1">Anisa</td>
<td id="sname_row1">Lila</td>
<td id="uname_row1">Ani</td>
<td>
<input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
<input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
<input type="button" value="Delete" class="delete" onclick="delete_row('1')">
</td>
</tr>

<tr id="row2">
<td id="name_row2">Artemisa</td>
<td id="sname_row2">Kaja</td>
<td id="uname_row2">Arta</td>
<td>
<input type="button" id="edit_button2" value="Edit" class="edit" onclick="edit_row('2')">
<input type="button" id="save_button2" value="Save" class="save" onclick="save_row('2')">
<input type="button" value="Delete" class="delete" onclick="delete_row('2')">
</td>
</tr>

<tr id="row3">
<td id="name_row3">Arben</td>
<td id="sname_row3">Rakipi</td>
<td id="uname_row3">Beni</td>
<td>
<input type="button" id="edit_button3" value="Edit" class="edit" onclick="edit_row('3')">
<input type="button" id="save_button3" value="Save" class="save" onclick="save_row('3')">
<input type="button" value="Delete" class="delete" onclick="delete_row('3')">
</td>
</tr>

<tr>
<td><input type="text" id="new_name"></td>
<td><input type="text" id="new_sname"></td>
<td><input type="text" id="new_uname"></td>
<td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
</tr>

</table>
</div>

</body>
</html>