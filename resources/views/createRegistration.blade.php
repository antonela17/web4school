<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>registration form with varification</title>
  <link rel="stylesheet" href="/resources/css/registration-form.css">
  <link rel="stylesheet" href="/resources/js/registration-form.js">
</head>

<body>
  <div class="container">
    <h1>Registration</h1>
    <form name="registration" class="registartion-form" onsubmit="return formValidation()">
      <table>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><input type="text" name="name" id="name" placeholder="Enter your name"></td>
        </tr>
        <tr>
          <td><label for="sname">Surname:</label></td>
          <td><input type="text" name="sname" id="sname" placeholder="Enter your surname"></td>
        </tr>
        <tr>
            <td><label for="uname">Username:</label></td>
            <td><input type="text" name="uname" id="uname" placeholder="Enter your username"></td>
          </tr>
        <tr>
            <tr>
                <td><label for="role">Role:</label></td>
                <td>
                  <select name="role" id="role">
                    <option value="">Select role</option>
                    <option value="English">Student</option>
                    <option value="Spanish">Pedagog</option>
                  </select>
                </td>
              </tr>
          <td><label for="email">Email:</label></td>
          <td><input type="text" name="email" id="email" placeholder="Enter your email"></td>
        </tr>
        <tr>
          <td><label for="password">Password:</label></td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" class="submit" value="Submit" /></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>