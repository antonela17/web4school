<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Mesues Page</title>
 <link href="{{ asset('css/newMesues.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <img class="logo" src="./cryptonio/images/Web_For_School2.logo">
             <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
             <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
             <a href="#"><i class="fa fa-fw fa-user"></i> About</a>
             <a href="#"><span> Mesues</span></a> 
         </div> 

 <div class="section">
  <div class="left">
   <form action="/action_page.php">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="Arben"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="Malko"><br><br>
  </form>
  </div>

  <div class="right">
   <h1>Lendet Mesimore</h1>
 <div class="lendet">
  <a href="#">Matematike    
    <form action="">
        <label for="options1"></label>
        <select name="options" id="option">
            <option value="view">View</option>
            <option value="viewMembers">View Members</option>
           <option value="vleresimet">Vleresimet</option>
          </select>
      </form>
  </a>
  <a href="#">Informatike
    <form action="">
        <label for="options1"></label>
        <select name="options" id="option">
            <option value="view">View</option>
            <option value="viewMembers">View Members</option>
           <option value="vleresimet">Vleresimet</option>
          </select>
      </form>
  </a>
  <a href="#">Biologji
    <form action="">
        <label for="options1"></label>
        <select name="options" id="option">
          <option value="view">View</option>
          <option value="viewMembers">View Members</option>
         <option value="vleresimet">Vleresimet</option>
        </select>
      </form>
  </a>
 </div>

 

  </div>
 </div>
 <footer>
    Copyright © 2022 web4school | All Rights Reserved
  </footer>
</body>
</html>