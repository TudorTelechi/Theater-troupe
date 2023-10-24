<form method="POST">
  <input type="hidden" name="comanda" value="login">
  <table class="login-table" align="center">
    <tr>
      <td colspan="2"><b>Autentificare:</b></td>
    </tr>
    <tr>
      <td>Nume:</td>
      <td><input type="text" name="nume" size="30"></td>
    </tr>
    <tr>
      <td>Parola:</td>
      <td><input type="password" name="parola" size="30" value=""></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" value="Login"></td>
    </tr>
  </table>
</form>
<a href="../index.php">Home</a>

<style>
  .login-table {
    border-collapse: collapse;
    margin: 0 auto;
    background-color: #eeeeee;
    padding: 10px;
    border: 1px solid #ccc;
  }

  .login-table td {
    padding: 5px;
  }

  .login-table b {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .login-table input[type="text"],
  .login-table input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .login-table input[type="submit"] {
    padding: 8px 20px;
    background-color: #4CAF50;
    border: none;
    color: #fff;
    cursor: pointer;
    font-weight: bold;
  }
  a {
  display: inline-block;
  padding: 8px 20px;
  background-color: #4CAF50;
  border: none;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
}

a:hover {
  background-color: red;
}

  .login-table input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
