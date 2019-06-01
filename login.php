<?php 
try {
    $db= new PDO('pgsql: user=postgres password=7b3097628 dbname=SQLTest host=127.0.0.1');
} catch (PDOException $e) {
    echo 'Connexion échouée : '.$e->getMessage();
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
</head>
<body>
                   
<?php if(isset($_POST['identifiant'])&& isset($_POST['motdepasse'])) {
    $email = $_POST['identifiant'];
    $password = $_POST['motdepasse'];
    if(strlen($email)>0 && (strlen($password)> 0)){
        $login = $db ->prepare('SELECT * FROM sql_portfolio.user where identifiant = ?');
        $login -> execute([$email]);
        $loginData = $login->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($loginData)>0){
            if(password_verify($password,$loginData[0]['mdp'])){
                header('location:admin.php');
                exit();
            }
        }
        else{
            echo('Problème de connexion');
        }
    }

}?>

<form method="post" action="">
                <div id="formulaire">
                   <label> Identifiant </label>
                    <input type="email" placeholder="identifiant" id="identifiant" name="identifiant"/>
                </div>
                <div>
                   <label> Mot de passe </label>
                    <input type="password" placeholder="mot de passe" id="motdepasse" name="motdepasse"/>
                </div>
                <button type="submit"> Login </button>
</form>
</body>
</html>