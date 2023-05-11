<html>
<head><title>Modification de passe</title></head>
<body>

<h1> Modifie ton mot de passe</h1>
<form action="modif_mdp.php" method="post">
         <input type="identifiant" name="identifiant" id="idmodification1" placeholder="Entrer votre identifiant" required><br/>
         <input type="email" name="email" id="email" placeholder="Entrer votre email" required><br/>
         <input type="password" name="new_password" id="new_password" placeholder="Votre Mot de passe" required><br/>
         <input type="password" name="confirm_password" id="confirm_password" placeholder="confirmer votre Mot de passe" required><br/>
         <input type="submit" name="formsend" id="formsend" value="OK">
</form>
<body>
<html>