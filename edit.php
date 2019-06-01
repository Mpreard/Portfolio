<?php
try {
    $db= new PDO('pgsql: user=postgres password=7b3097628 dbname=SQLTest host=127.0.0.1');
} catch (PDOException $e) {
    echo 'Connexion échouée : '.$e->getMessage();
} ?>
 
<?php 
    if(isset($_GET['id'])&&(isset($_GET['case']))): ?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit</title>
</head>
<body>
    <?php 
    if($_GET['case']=='experience'): ?>
    <?php     
    $exp = $db ->prepare('SELECT * FROM sql_portfolio.experiences WHERE id_experience = ?');
    $exp -> execute([$_GET['id']]);
    $expData = $exp->fetchAll(PDO::FETCH_ASSOC)[0];?>
    <?php if(isset($_POST['travail_exp'])&& isset($_POST['poste_exp'])&& isset($_POST['dateDebut_exp'])&& isset($_POST['dateFin_exp'])){
    
    
    $travail = $expData['travail_experience'] == $_POST['travail_exp'] ? $expData['travail_experience']: $_POST['travail_exp'];
    
    $poste = $expData['poste_experience']== $_POST['poste_exp'] ? $expData['poste_experience']: $_POST['poste_exp']; 
    
    $dateD = $expData['datedebut_exp'] == $_POST['dateDebut_exp'] ? $expData['datedebut_exp']: $_POST['dateDebut_exp']; 
    
    $dateF = $expData['datefin_exp'] == $_POST['dateFin_exp'] ? $expData['datefin_exp']: $_POST['dateFin_exp']; 
    
        
        
    $exp = $db ->prepare('UPDATE sql_portfolio.experiences SET travail_experience = ?, poste_experience = ?, datedebut_exp = ?, datefin_exp = ? WHERE id_experience = ?');
    $exp -> execute([$travail,$poste,$dateD,$dateF,$expData['id_experience']]);
    header('location:admin.php');
}
    ?>
      <form method="post" action="">
        <label> Travail </label>
        <input value="<?= $expData['travail_experience'] ?>"name="travail_exp" />
        <label> Poste </label>
        <input value="<?= $expData['poste_experience'] ?>"name="poste_exp" />
        <label> Date début </label>
        <input value="<?=  $expData['datedebut_exp'] ?>"name="dateDebut_exp" />
        <label> Date fin </label>
        <input value="<?= $expData['datefin_exp'] ?>"name="dateFin_exp" />
        
        <button type="submit"> SEND </button>
        
        </form> 
        
        
    <?php elseif($_GET['case']=='formation'): ?>
    
    <?php elseif($_GET['case']=='burger'): ?>
    
    <?php elseif($_GET['case']=='formulaire'): ?>
    
    <?php elseif($_GET['case']=='projet'): ?>
    
    <?php elseif($_GET['case']=='competence'): ?>
    
    <?php elseif($_GET['case']=='interet'): ?>
    
    <?php else:
        header('location:admin.php');
    ?>
    <?php endif ?>
 
</body>
</html>


<?php else:
    header('location:admin.php');
 ?>
 
<?php endif ?>