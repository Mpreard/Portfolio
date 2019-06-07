<?php
try {
    $db= new PDO('pgsql: user=postgres password=7b3097628 dbname=sqltest host=127.0.0.1');
} catch (PDOException $e) {
    echo 'Connexion échouée : '.$e->getMessage();
}  
    $header = $db ->prepare('SELECT * FROM sql_portfolio.accueil');
    $header -> execute();
    $headerData = $header->fetchAll(PDO::FETCH_ASSOC);
    
    $menu = $db ->prepare('SELECT * FROM sql_portfolio.burger_menu');
    $menu -> execute();
    $menuData = $menu->fetchAll(PDO::FETCH_ASSOC);

    $presentation = $db ->prepare('SELECT * FROM sql_portfolio.presentation');
    $presentation -> execute();
    $presentationData = $presentation->fetchAll(PDO::FETCH_ASSOC);

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
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Portfolio de Maxime PREARD.">
    <meta name="keywords" content="Portfolio CV Stage Etudiant Informatique HTML CSS Ecole Entreprise Projet ">
    <title>Portfolio - Maxime PREARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    <section class="textoverpic">
     <div id="button_admin">
            <a href="login.php"><button class="button button5">Connexion admin</button>
</a></div>
       <?php    
        foreach ($headerData as $k => $accueil): ?>
        <h1 id="nom"><?= $accueil['prenom_acc'].$accueil['nom_acc'] ?> </h1>
        <h2 id="annee"><?= $accueil['date_debut']?> &bull; <?= $accueil['date_fin']?></h2>
        
        <a href=<?= $accueil['cv_acc']?> download="CV_PREARD.pdf" id="cv"><div> <p> Télécharger mon CV </p></div></a>
        <?php endforeach ?>
        
        <div class="btn-navigation" onclick="cache(menu)">
            <div class="barre"></div>
            <div class="barre"></div>
            <div class="barre"></div>
          </div>
          
          <div id="menu">
            <ul>
              <?php foreach ($menuData as $k => $accueil): ?>
              <li onclick="cache(menu)">
                <a href="<?= $accueil['link_menu']?>"><?= $accueil['name_menu']?></a>
              </li>
            <?php endforeach ?>
            </ul>
          </div>
      </section>
      
      <section id="iconet">
      
      <?php foreach ($presentationData as $k => $pres):?>
        <h1><?= $pres['text_presentation']?></h1>
      <?php endforeach ?>
        <div id="photo"></div>
        

      </section>
      
      <section class="pop" id="pop">
    
          <div id="boulot">
              <?php foreach ($experienceData as $k => $exp):?>
              <h2><?= $exp['travail_experience']?></h2>
              <p><em><?= $exp['poste_experience']?></em> &bull; <?= $exp['datedebut_exp']?> - <?= $exp['datefin_exp']?></p>
               <?php endforeach ?>
              </div>
      </section>
      
      <section id="fif">
          <div id="mesformations">
            <h2> Nantes Ynov Campus </h2>
            <p><em> Ingésup </em> &bull; 2018 - Aujourd'hui</p>
            <p> Cette école me permet d'approfondir mes connaissances en informatique. De nombreux travaux <br>de groupe sont organisés, celà oblige donc à s'organiser et à communiquer avec les membres de son groupe <br> afin de réussir les différents projets,ce qui rappelle le modèle d'entreprise.</p>
    
            <h2> Lycée Eugène Livet </h2>
            <p><em> STI2D option SIN </em> &bull; 2015 - 2018</p>
            <p> Ce lycée m'a permis de découvrir les bases de l'informatique grâce à ma spécialité <br> Système d'Information Numérique. Un projet de plusieurs mois est obligatoire, celà permet <br>d'effectuer des tâches concrètes et plus seulement théorique. </p>
          </div>
      </section>

     
     <section id="cent"> 
        <div id="mescentres">
            <div id="back0" class="back"><div id="basket" class="center"><h1>BASKETBALL</h1></div></div>
            
            <div id="back1" class="back"><div id="skate"  class="center"><h1>SKATEBOARD</h1></div></div>
            <div id="back2" class="back"><div id="lecture"class="center"><h1>LECTURE</h1></div></div>
          </div>
            
      </section>

      <section id="compet">
         <div id="generalCompetence">
          <div class="competence">
            <canvas id="myCanvas1" width="auto" height="250"></canvas>
          <script>
            var canvas = document.getElementById('myCanvas1');
            var context = canvas.getContext('2d');
            var x = canvas.width / 2;
            var y = canvas.height / 2;
            var radius = 75;
            var startAngle = 1.1 * Math.PI;
            var endAngle = 1.9 * Math.PI;
            var counterClockwise = false;
      
            context.beginPath()
            context.arc(100, 100, 90, 0.8*Math.PI, -0.5*Math.PI, 2*Math.PI);
            context.lineWidth = 10;
      
            // line color
            context.strokeStyle = 'orange';
            context.stroke();
          </script> 
          <p id="html"> HTML/CSS</p>
          </div>
          
            <div class="competence">
            <canvas id="myCanvas2" width="auto" height="250"></canvas>
          <script>
            var canvas = document.getElementById('myCanvas2');
            var context = canvas.getContext('2d');
            var x = canvas.width / 2;
            var y = canvas.height / 2;
            var radius = 75;
            var startAngle = 1.1 * Math.PI;
            var endAngle = 1.9 * Math.PI;
            var counterClockwise = false;
      
            context.beginPath()
            context.arc(100, 100, 90, 0.8*Math.PI, -0.5*Math.PI, 2*Math.PI);
            context.lineWidth = 10;
      
            // line color
            context.strokeStyle = 'orange';
            context.stroke();
          </script> 
          <p id="JS"> JavaScript</p>
          </div>
          
          
                              <div class="competence">
            <canvas id="myCanvas3" width="auto" height="250"></canvas>
          <script>
            var canvas = document.getElementById('myCanvas3');
            var context = canvas.getContext('2d');
            var x = canvas.width / 2;
            var y = canvas.height / 2;
            var radius = 75;
            var startAngle = 1.1 * Math.PI;
            var endAngle = 1.9 * Math.PI;
            var counterClockwise = false;
      
            context.beginPath()
            context.arc(100, 100, 90, 0.8*Math.PI, -0.5*Math.PI, 2*Math.PI);
            context.lineWidth = 10;
      
            // line color
            context.strokeStyle = 'orange';
            context.stroke();
          </script> 
          <p id="PHP">PHP </p>
          </div>
    </div>
        </section>
        
        <section id="projets">
            <div class="container">
                <a href="#" class="projet" id="projet1"><div><p> Projet Y-days </p></div></a>
                <a href="#" class="projet" id="projet2"><div><p> Projet Portfolio </p></div></a>
            </div>
            
            <div class="container">
                <a href="#" class="projet" id="projet3"><div><p> Projet Plante connectée </p></div></a>
                <a href="#" class="projet" id="projet4"><div><p> Projet Infrastrucre réseau </p></div></a>
            </div>
        </section>

        <section id="formumu">
            <form method="get" action="">
                <div id="formulaire">
                    <input placeholder="Nom" id="monnom" name="monnom"/>
                </div>
                <div>
                    <input placeholder="Prénom" id="monprenom" name="monprenom"/>
                </div>
                <div>
                    <input placeholder="Adresse Email" id="email" name="email"/>
                </div>
                <div>
                    <textarea placeholder="Ecrivez votre message ici..." cols="60px" rows="10px" name="message"></textarea>
                </div>
                <div>
                    <input value="Envoyer" type="submit" id="envoyer" name="envoyer" />
                </div>
            </form>
            
            
        </section>
<script src="js/java.js"></script>
<script src="js/app.js"></script>
    </body>
</html>
