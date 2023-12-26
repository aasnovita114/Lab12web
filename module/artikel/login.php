<?php
session_start();

$title = 'Data Mahasiswa';
include_once '../class/configuration.php';

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = md5('{$password}') ";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_affected_rows($conn) != 0) {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = mysqli_fetch_array($result);

        header('location:../module/artikel/index.php');
    } else {
        $errorMsg = "<p style=\"color:red;\">Gagal Login, silakan ulangi lagi.</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .content {
      text-align: center;
      margin-top: 50px;
    }

    .main {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
      padding: 20px;
    }

    .input {
      margin-bottom: 20px;
    }

    .input label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    .input input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .submit input {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    .submit input:hover {
      background-color: #45a049;
    }

    p.error-msg {
      color: red;
    }
  </style>
</head>
<body>

<nav>
    <a href="#"></a>
</nav>
<div class="content">
    <h1>Login</h1>
    <div class="main">
        <?php if (isset($errorMsg)) echo '<p class="error-msg">' . $errorMsg . '</p>'; ?>
        <form method="post">
            <div class="input">
                <label>Username</label>
                <input type="text" name="user" />
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="password" />
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Login" />
            </div>
        </form>
    </div>
</div>

</body>
</html>