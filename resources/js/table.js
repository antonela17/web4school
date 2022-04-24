function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var name=document.getElementById("name_row"+no);
 var sname=document.getElementById("sname_row"+no);
 var uname=document.getElementById("uname_row"+no);
	
 var name_data=name.innerHTML;
 var sname_data=sname.innerHTML;
 var uname_data=uname.innerHTML;
	
 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
 sname.innerHTML="<input type='text' id='sname_text"+no+"' value='"+sname_data+"'>";
 uname.innerHTML="<input type='text' id='uname_text"+no+"' value='"+uname_data+"'>";
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var sname_val=document.getElementById("sname_text"+no).value;
 var uname_val=document.getElementById("uname_text"+no).value;

 document.getElementById("name_row"+no).innerHTML=name_val;
 document.getElementById("sname_row"+no).innerHTML=sname_val;
 document.getElementById("uname_row"+no).innerHTML=uname_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_name=document.getElementById("new_name").value;
 var new_sname=document.getElementById("new_sname").value;
 var new_uname=document.getElementById("new_uname").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='sname_row"+table_len+"'>"+new_sname+"</td><td id='uname_row"+table_len+"'>"+new_uname+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_sname").value="";
 document.getElementById("new_uname").value="";
}