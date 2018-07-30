<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="login" id="login"
     style="border-style: solid;border-width: 3px;width: 400px">
    <h1>Login</h1>
    <form action="/new_assignment/LoginProcess.php" method="post">

        <strong><label>Email Address:</label></strong><br><input type="email"
                                                                 name="login_email"
                                                                 placeholder="email address"><br>
        <strong><label>first name</label></strong><br><input type="text"
                                                           name="first_name"
                                                           placeholder="first name"><br>
        <strong><label>last name</label></strong><br><input type="text"
                                                             name="last_name"
                                                             placeholder="last name"><br>
        <input type="submit" value="login">

    </form>
</div>
</body>
</html>

