<html>
<head>
  <title>Supprimer un compte utilisateur</title>
</head>
<body>
  <h1>Supprimer un compte utilisateur</h1>
  <form action="suppression.php" method="post">
    <fieldset>
      <legend>Suppression d'un compte utilisateur</legend>
      <table>
        <tr>
          <td>Identifiant :</td>
          <td><input type="text" name="idsuppression"></td>
        </tr>
        <tr>
          <td>E-mail :</td>
          <td><input type="email" name="email"></td>
        </tr>
        <tr>
          <td><input type="submit" value="Supprimer"></td>
          <td><input type="reset" value="Réinitialiser"></td>
        </tr>
      </table>
    </fieldset>
  </form>
</body>
</html>