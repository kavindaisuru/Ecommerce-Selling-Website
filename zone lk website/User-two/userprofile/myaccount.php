<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">

    <title>my new user profile</title>
</head>
<body>
    
    <form method="POST" action="insert.php">

        <h2> My Profile </h2>

    <center>
        <form action="uplord.php" method="POST" enctype="multipart/form-data">
        <input type="submit" value="uplord image" name="submit" style="height:120px;width:120px;">
    </center>

        <table>
            <tr>
                <td>First Name:<input type="text" name="Fname" placeholder="First Name"size='' style="width:70%"></td>
                <td> Last Name:<input type="text" name="Lname" placeholder="Last Name"size='' style="width:70%"></td>
            </tr>

            <br><br>

            <tr>
                <td>Birth Date:<input type="text" name="Bd"placeholder="Birth Date"size='' style="width:70%"></td>
                <td>Phone Number:<input type="text" name="Phonenum"placeholder="Phone Number"size='' style="width:70%"></td>
            </tr>

            <br><br>

            <tr>
                <td>Address:<input type="text" name="Address" placeholder="Address"size='' style="width:70%"></td>
                <td>Email:<input type="text" name="Email"placeholder="Email"size='' style="width:90%"></td>
            </tr>
        </table>
        <br><br>

        <center><input type="submit" value="SAVE" size='' style="width: 50%"></center> <br>
        <center><a href="edit.php"><b>EDIT</b></a></center> <br>
        <center><a href="change password.php"><b>CHANGE PASSWORD</b></a></center> <br>
    </form>

 </body>
</html>