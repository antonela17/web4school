<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/newStudent.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navbar">
   <img class="logo" src="./images/Web_For_School2.logo">
        <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
        <a href="#"><i class="fa fa-fw fa-user"></i> About</a>
        <a href="#"><span> Student</span></a> 
    </div> 

  <div class="first">
      <div class="left">
        <form action="/action_page.php">
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname"><br><br>
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname"><br><br>
          </form>
          <h3><a href="">Vertetim Studenti</a></h3>
          <h3><a href="">Vertetim notash</a></h3>  

          <button class="button"><span>Klasat e reja </span></button>
      </div>

      <div class="right">
       <h1>Lendet</h1>
      <div class="lendet">
        <a class="" href="#"> Leksion 1</a> 
        <a href="#">Leksion 2</a> 
        <a href="#"> Leksion 3</a>
        <a href="#"> Leksion 4</a> 
      </div>


      </div>
     
  </div>
  <footer>
    Copyright © 2022 web4school | All Rights Reserved
  </footer>
</body>
</html>