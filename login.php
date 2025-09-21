<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    height: 100vh;
    background-image: url('ven2.jpg'); 
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
}

.login-box {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
    width: 300px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #5cb85c;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-btn:hover {
    background-color: #4cae4c;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
                    if (isset($_POST['submit'])) {
                      include 'admin/includes/dbconnection.php';

                      $username = mysqli_real_escape_string($conn, $_POST['user']);
                      $password = mysqli_real_escape_string($conn, $_POST['pass']);

                      $sql = "SELECT  * FROM tbladmin WHERE UserName='$username' and Password='$password'";
                      $query = mysqli_query($conn, $sql);

                      $dd = mysqli_fetch_array($query);

                      if ($row = mysqli_num_rows($query) > 0) {
                        
                        session_start();

                        $_SESSION['Email'] = $dd['Email'];
                        $_SESSION['username'] = $username;
                        $_SESSION['user_type'] = $dd['Status'];

                        //header(location: dashboard.php);

                        echo "<script>alert('login successful'); window.location='index.php?page=home'; </script>";
                      } else{
                        echo "<script> alert('Username and Password not correct')</script>";
                      }
                     }
                    ?>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="user" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass"required>
                </div>
                <button type="submit" class="login-btn" name="submit">Login</button><br><br>
                <a href="index.php?page=home" class="login-btn">Home</a>
                <a href="register.php" class="login-btn">Register</a>
            </form>
        </div>
    </div>
</body>
</html>
