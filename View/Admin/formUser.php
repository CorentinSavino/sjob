<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($errors)) :?>
    
        <?=$errors["empty"]?>
        <?=$errors["emailI"]?>
        <?=$errors["empty"]?>

    <?php endif;?>
        
        
    <form action="../../Controller/Router.php?action=create" method="post">


    <div>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
    </div>

    <div>
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>


    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="cv">C.V</label>
        <input type="file" name="cv" id="cv">
    </div>

    <div>
        <label for="role">Role</label>
        <select name="role" id="role" name="role">
            <option value="user">Utilisateur</option>
            <option value="business">Entreprise</option>
            <option value="advisor">Conseiller</option>
        </select>
    </div>

    <input type="hidden" name="admin" id="admin" value="false" >

    <label for="CGV"> J'accepte les condition générales de ventes</label>
    <input type="checkbox" name="CGV" required>

    <input type="submit" value="Envoyer le formulaire">

    </form>

</body>
</html>