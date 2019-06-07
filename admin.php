<?php
try {
    $db= new PDO('pgsql: user=postgres password=7b3097628 dbname=sqltest host=127.0.0.1');
} catch (PDOException $e) {
    echo 'Connexion échouée : '.$e->getMessage();
} 

$header = $db ->prepare('SELECT * FROM sql_portfolio.accueil');
$header -> execute();
$headerData = $header->fetchAll(PDO::FETCH_ASSOC)[0];

$menu = $db ->prepare('SELECT * FROM sql_portfolio.burger_menu');
$menu -> execute();
$menuData = $menu->fetchAll(PDO::FETCH_ASSOC);

$presentation = $db ->prepare('SELECT * FROM sql_portfolio.presentation');
$presentation -> execute();
$presentationData = $presentation->fetchAll(PDO::FETCH_ASSOC)[0];

$experience = $db ->prepare('SELECT * FROM sql_portfolio.experiences');
$experience -> execute();
$experienceData = $experience->fetchAll(PDO::FETCH_ASSOC);

$formation = $db ->prepare('SELECT * FROM sql_portfolio.formations');
$formation -> execute();
$formationData = $formation->fetchAll(PDO::FETCH_ASSOC);

$centre = $db ->prepare('SELECT * FROM sql_portfolio.centres_interets');
$centre -> execute();
$centreData = $centre->fetchAll(PDO::FETCH_ASSOC);

$competence = $db ->prepare('SELECT * FROM sql_portfolio.competences');
$competence -> execute();
$competenceData = $competence->fetchAll(PDO::FETCH_ASSOC);

$gestion = $db ->prepare('SELECT * FROM sql_portfolio.gestion_projet');
$gestion -> execute();
$gestionData = $gestion->fetchAll(PDO::FETCH_ASSOC);

$contact = $db ->prepare('SELECT * FROM sql_portfolio.formulaire');
$contact -> execute();
$contactData = $contact->fetchAll(PDO::FETCH_ASSOC);


$prenom = $headerData['prenom_acc'];
$nom = $headerData['nom_acc'];
$dateD = $headerData['date_debut'];
$dateF = $headerData['date_fin'];
$cv = $headerData['cv_acc'];


$textPresentation = $presentationData['text_presentation'];
$photoPresentation = $presentationData['photo_présentation'];

if(isset($_POST['text_pres'])&& isset($_POST['photo_présentation'])){
    $textPresentation = $_POST['text_pres'] == $textPresentation ? $textPresentation : $_POST['text_pres'];
    $photoPresentation = $_POST['photo_présentation'] == $photoPresentation ? $photoPresentation : $_POST['photo_présentation'];
    $upPresentation = $db ->prepare('UPDATE sql_portfolio.presentation SET text_presentation = ?, photo_présentation = ? WHERE id_presentation = ?');
    $upPresentation -> execute([$textPresentation,$photoPresentation,$presentationData['id_presentation']]);
}

if(isset($_POST['prenom_accueil'])&& isset($_POST['prenom_accueil'])&& isset($_POST['nom_accueil'])&& isset($_POST['dateD_accueil'])&& isset($_POST['dateF_accueil'])&& isset($_POST['cv_accueil']) ){
    
    $prenom = $_POST['prenom_accueil'] == $prenom ? $prenom : $_POST['prenom_accueil'];
    $nom = $_POST['nom_accueil'] == $nom ? $nom : $_POST['nom_accueil'];
    $dateD = $_POST['dateD_accueil'] == $dateD ? $dateD : $_POST['dateD_accueil'];
    $dateF = $_POST['dateF_accueil'] == $dateF ? $dateF : $_POST['dateF_accueil'];
    $cv = $_POST['cv_accueil'] == $cv ? $cv : $_POST['cv_accueil'];
    $upHeader = $db ->prepare('UPDATE sql_portfolio.accueil SET prenom_acc = ?, nom_acc = ?, date_debut = ?, date_fin = ?, cv_acc = ?  WHERE id = ?');
    $upHeader -> execute([$prenom,$nom,$dateD,$dateF,$cv,$headerData['id']]);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/admin.css">
    <title>Page d'administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 


</head>
<body>


<!--ACCUEIL-->
  <div class="modal openModal" tabindex="-1" role="dialog" id="modal-acc">
  <?php
  $header = $db ->prepare('SELECT * FROM sql_portfolio.accueil');
$header -> execute();
$headerData = $header->fetchAll(PDO::FETCH_ASSOC)[0];
      ?>    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Page d'accueil</h5>
        <button type="button" class="close" id="acc-close"data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form method="post" action="">
            <div id="page_accueil">

                <label for="prenom_accueil"> Prénom </label>
                <input id="prenom_accueil" name="prenom_accueil" value="<?= $prenom ?>" >

                <label for="nom_accueil"> Nom</label>
                <input id="prenom_accueil" name="nom_accueil" value="<?= $nom ?>">

                <label for="dateD_accueil"> Date Début</label>
                <input id="dateD_accueil" name="dateD_accueil" value="<?= $dateD ?>">
                
                <label for="dateF_accueil"> Date Fin</label>
                <input id="dateF_accueil" name="dateF_accueil" value="<?= $dateF ?>">

                <label for="cv_accueil"> CV </label>
                <input id="cv_accueil" name="cv_accueil" value="<?= $cv ?>">
                
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-acc">Close</button>
        
      </div>
    </div>
  </div>
</div>

  
    
<!--PRESENTATION  -->
    <div class="modal openModal" tabindex="-1" role="dialog" id="modal-pres">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Page de présentation</h5>
        <button type="button" class="close"  id="pres-close"data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
            <div id="page_presentation">
                <label for="text_pres"> Texte </label>
                <input id="text_pres" name="text_pres" value="<?= $textPresentation ?>">

                <label for="photo_présentation"> Photo </label>
                <input id="photo_présentation" name="photo_présentation"value="<?= $photoPresentation ?>" >
<button type="submit" class="btn btn-primary">Save changes</button>
            </div>        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-pres">Close</button>
        
      </div>
    </div>
  </div>
</div>
  
  
  
  
<!--  EXPERIENCES-->
  
    <div class="modal openModal" tabindex="-1" role="dialog" id="modal-exp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Expériences</h5>
        <button type="button" class="close" id="exp-close" data-dismiss="modal" aria-label="Close" label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <table class="table" method="post" action="">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">travail</th>
      <th scope="col">poste</th>
      <th scope="col">date debut</th>
      <th scope="col">date fin</th> 
      <th scope="col">Editer</th>    
    </tr>
  </thead>
  <tbody>
   <?php foreach($experienceData as $k => $exp):?>
    <tr>
      <th scope="row"><?= $exp['id_experience'] ?></th>
      <td><?= $exp['travail_experience']?></td>
      <td><?= $exp['poste_experience']?></td>
      <td><?= $exp['datedebut_exp']?></td>
      <td><?= $exp['datefin_exp']?></td>
        <td><a href="<?='/edit.php?id='.$exp['id_experience'].'&case=experience'?>"><button> Editer </button></a></td>
    </tr>
<?php endforeach ?>
  </tbody>
</table> 
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-exp">Close</button>
      </div>
    </div>
  </div>
</div>





<!-- FORMATIONS-->
     <div class="modal openModal" tabindex="-1" role="dialog" id="modal-form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Formations</h5>
        <button type="button" class="close" id="form-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <table class="table" method="post" action="">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ecole</th>
      <th scope="col">type</th>
      <th scope="col">date debut</th>
      <th scope="col">date fin</th>
      <th scope="col">texte</th> 
      <th scope="col">Editer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><button> Editer </button></td>
    </tr>

  </tbody>
</table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-form">Close</button>
      </div>
    </div>
  </div>
</div>
 
<!-- CENTRE D INTERETS-->
 
     <div class="modal openModal" tabindex="-1" role="dialog" id="modal-int">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Centres d'intêrets</h5>
        <button type="button" class="close" id="int-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <table class="table" method="post" action="">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">centre 1</th>
      <th scope="col">Editer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td><button> Editer </button></td>
    </tr>

  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close-int" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
<!-- COMPETENCES-->

     <div class="modal openModal" tabindex="-1" role="dialog" id="modal-comp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Compétences</h5>
        <button type="button" class="close" id="comp-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <table class="table" method="post" action="">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">valeurs</th>
      <th scope="col">compétences</th>
      <th scope="col">Editer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Mark</td>
      <td><button> Editer </button></td>
    </tr>

  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-comp">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- PROJETS-->
      <div class="modal openModal" tabindex="-1" role="dialog" id="modal-projet">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Gestion de projets</h5>
        <button type="button" class="close" id="projet-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   <table class="table" method="post" action="">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">projet</th>
      <th scope="col">Editer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td><button> Editer </button></td>
    </tr>

  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close-projet" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- FORMULAIRE-->
      <div class="modal openModal" tabindex="-1" role="dialog" id="modal-contact">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Formulaire</h5>
        <button type="button" class="close" id="contact-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<table class="table" method="post" action="">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>
      <th scope="col">Editer</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><button> Editer </button></td>
    </tr>

  </tbody>
</table>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close-contact" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
<!-- BURGER MENU-->
 
          <div class="modal openModal" tabindex="-1" role="dialog" id="modal-menu">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">burger menu</h5>
            <button type="button" class="close" id="menu-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
       <table class="table" method="post" action="">
       <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">link</th>
          <th scope="col">catégorie</th>
          <th scope="col">Editer</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Mark</td>
          <td><button> Editer </button></td>
        </tr>

      </tbody>
    </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="close-menu" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  
   <div id="container" class="containers">
    <div id="accueil" class="sections">
        <button id="btn_acc"><h1> Accueil </h1></button>        
    </div>
    
    <div id="presentation"class="sections">
        <button id="btn_pres"><h1> Présentation </h1></button>        
    </div>
    </div>
    
    
    <div id="container1" class="containers">
    <div id="experience"class="sections">
        <button id="btn_exp"><h1> Expériences </h1></button>        
    </div>
    
    <div id="formation"class="sections">
        <button id="btn_form"><h1> Formations </h1></button>        
    </div>
    
    </div>
    
    <div id="container2" class="containers">
    
    
    <div id="centreinteret"class="sections">
        <button id="btn_int"><h1> Centres d'intêrets </h1></button>        
    </div>
    
    <div id="gestion"class="sections">
        <button id="btn-projet"><h1> Gestion de projets </h1></button>        
    </div>
    </div>
    
    <div id="container3" class="containers">
    
    
    <div id="contact"class="sections">
        <button id="btn-contact"><h1> Contact </h1></button>        
    </div>
    
    <div id="burger"class="sections">
        <button id="btn-menu"><h1> Burger menu </h1></button>        
    </div>
    </div>
    
    <div id="competence">
        <button id="btn-comp"><h1> Compétences </h1></button>        
    </div>


<script type="text/javascript">
    
//    BOUTON ACCEUIL
    
    document.getElementById('btn_acc').addEventListener('click', () => {
    document.getElementById('modal-acc').style.display = 'block';
  });
  document.getElementById('close-acc').addEventListener('click', () => {
    document.getElementById('modal-acc').style.display = 'none';
  });
  document.getElementById('acc-close').addEventListener('click', () => {
    document.getElementById('modal-acc').style.display = 'none';
  });
    
// BOUTON EXPERIENCES   
    
  document.getElementById('btn_exp').addEventListener('click', () => {
    document.getElementById('modal-exp').style.display = 'block';
  });
  document.getElementById('close-exp').addEventListener('click', () => {
    document.getElementById('modal-exp').style.display = 'none';
  });
  document.getElementById('exp-close').addEventListener('click', () => {
    document.getElementById('modal-exp').style.display = 'none';
  });
    

//    BOUTON FORMATION
    
    document.getElementById('btn_form').addEventListener('click', () => {
    document.getElementById('modal-form').style.display = 'block';
  });
  document.getElementById('close-form').addEventListener('click', () => {
    document.getElementById('modal-form').style.display = 'none';
  });
  document.getElementById('form-close').addEventListener('click', () => {
    document.getElementById('modal-form').style.display = 'none';
  });
    
    
//   BOUTON PRESENTATION 
    
    document.getElementById('btn_pres').addEventListener('click', () => {
    document.getElementById('modal-pres').style.display = 'block';
  });
  document.getElementById('close-pres').addEventListener('click', () => {
    document.getElementById('modal-pres').style.display = 'none';
  });
  document.getElementById('pres-close').addEventListener('click', () => {
    document.getElementById('modal-pres').style.display = 'none';
  });
    
    
//    BOUTON CENTRES D INTERETS
    
    document.getElementById('btn_int').addEventListener('click', () => {
    document.getElementById('modal-int').style.display = 'block';
  });
  document.getElementById('close-int').addEventListener('click', () => {
    document.getElementById('modal-int').style.display = 'none';
  });
  document.getElementById('int-close').addEventListener('click', () => {
    document.getElementById('modal-int').style.display = 'none';
  });
    
//    BOUTON COMPETENCES
    
    document.getElementById('btn-comp').addEventListener('click', () => {
    document.getElementById('modal-comp').style.display = 'block';
  });
  document.getElementById('close-comp').addEventListener('click', () => {
    document.getElementById('modal-comp').style.display = 'none';
  });
  document.getElementById('comp-close').addEventListener('click', () => {
    document.getElementById('modal-comp').style.display = 'none';
  });
    
    
//    BOUTON PROJETS
    
    document.getElementById('btn-projet').addEventListener('click', () => {
    document.getElementById('modal-projet').style.display = 'block';
  });
  document.getElementById('close-projet').addEventListener('click', () => {
    document.getElementById('modal-projet').style.display = 'none';
  });
  document.getElementById('projet-close').addEventListener('click', () => {
    document.getElementById('modal-projet').style.display = 'none';
  });
    
//    BOUTON FORMULAIRE
    
    document.getElementById('btn-contact').addEventListener('click', () => {
    document.getElementById('modal-contact').style.display = 'block';
  });
  document.getElementById('close-contact').addEventListener('click', () => {
    document.getElementById('modal-contact').style.display = 'none';
  });
  document.getElementById('contact-close').addEventListener('click', () => {
    document.getElementById('modal-contact').style.display = 'none';
  });
    
    
//    BOUTON BURGER MENU
    document.getElementById('btn-menu').addEventListener('click', () => {
    document.getElementById('modal-menu').style.display = 'block';
  });
  document.getElementById('close-menu').addEventListener('click', () => {
    document.getElementById('modal-menu').style.display = 'none';
  });
  document.getElementById('menu-close').addEventListener('click', () => {
    document.getElementById('modal-menu').style.display = 'none';
  });
</script>
</body>



 
</html>