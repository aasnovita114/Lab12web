# Lab12web
<table>
  <tr>
    <th colspan="2">DATA MAHASISWA</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>Aas Novitasari</td>
  </tr>
  <tr>
    <td>NIM</td>
    <td>312210167</td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>TI.22.A1</td>
  </tr>
</table>

## Langkah-langkah Praktikum

**1. Buat tabel `user` pada database *latihan1***

Tabel tersebut akan berisi *id, username dan password*. Kolom *id* akan menjadi primary key untuk tabel lalu untuk kolom *username* akan memiliki unique index.

```
CREATE TABLE `user`(
`id` INT NOT NULL AUTO_INCREMENT,
`username` VARCHAR(50),
`password` VARCHAR(50),
PRIMARY KEY (`id`),
UNIQUE INDEX `UNIQUE` (`username`)
) ENGINE=MYISAM;
INSERT INTO `user` (`username`, `password`) VALUES ('admin', md5('admin'));
```

**2. Buat file `login_session.php`**

```
<?php
session_start();
if (!isset($_SESSION['isLogin']))
header('location: login.php');
?>
```

**3. Buat file `login.php`**

```
<?php
session_start();
$title = 'Data Barang';
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
 $user = $_POST['user'];
 $password = $_POST['password'];

 $sql = "SELECT * FROM user WHERE username = '{$user}'

AND password = md5('{$password}') ";
$result = mysqli_query($conn, $sql);
    if ($result && mysqli_affected_rows($conn) != 0)
    {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = mysqli_fetch_array($result);
        header('location: index.php');
    } else
        $errorMsg = "<p style=\"color:red;\">Gagal Login,
        silakan ulangi lagi.</p>";
    }
include_once "header.php";
if (isset($errorMsg)) echo $errorMsg;
?>
<h2>Login</h2>
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
<?php
include_once 'footer.php';
?>
```

> Hasil Output halaman `login.php` :

![formlogin](https://github.com/syifaaurellia/Lab12web/assets/115867244/9a5cdf7a-733a-4842-b39f-4b7161b20d5d)
