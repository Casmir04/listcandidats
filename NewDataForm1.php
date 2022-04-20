<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: lightblue;">
  <br>
    <div class="container">
      <button  type="" class="btn btn-primary btn-lg" style= " margin-left: 400px;" >Entregistrement de nouveau candidats</button><br><br>
          <form action="listecandidat.php" class="form" style="padding: 30px;" method = "post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">NOM:</label>
              <input type="name" class="form-control" id="nom" placeholder=" Nom" name ="nom"  >
            </div>
            <div class="form-group">
              <label for="name">PRENOM:</label>
              <input type="name" class="form-control" id="prenom" placeholder=" Prenom" name = "prenom">
            </div>
            <div class="form-group">
              <label for="name">PHOTO:</label>
              <input type="file" class="form-control" id="photo" placeholder=" votre photo" name = "photoC">
            </div>
            <div class="form-group">
              <label for="name">Age:</label>
              <input type="name" class="form-control" id="prenom" placeholder=" Age" name = "age">
            </div>
            <label for="sexe">SEXE:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexe" id="ma" value="1">
              <label class="form-check-label" for="flexRadioDefault1">
               MASCULIN
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexe" id="me" value="0">
              <label class="form-check-label" for="flexRadioDefault1">
                  FEMININ
              </label>
            </div>
            <br>
            <label for="sexe">SITUATION:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="situation" id="mel" value="CELIBATAIRTE" checked>
              <label class="form-check-label" for="exampleRadios1">
               Célibataire
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="situation" id="mar" value="MARIE" checked>
              <label class="form-check-label" for="exampleRadios2">
               Marié
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="situation" id="div" value="DIVORCEE" checked>
              <label class="form-check-label" for="exampleRadios3">
               Divorcée
              </label>
            </div>
            <br>
            <label for="sexe">Nationalite:</label>
            <select class="form-control"  style="width: 100%;" name = "nationalite">
              <option selected>Nationalité</option>
              <option value="togolaise">togolaise</option>
              <option value="beninoise">beninoise</option>
              <option value="BURKINABč">BURKINABč</option>
              <option value="3">GHANEEN</option>
              <option value="3">FRANCAISE</option>
              <option value="3">BRESILIENNE</option>
            </select><br>
            <div class="form-group">
              <label for="Texte">DIPLÔME:</label>
              <input type="text" class="form-control" id="di" placeholder="Diplôme" name = "diplome">
            </div>
            <div class="form-group">
              <label for="Texte">ADRESSE:</label>
              <input type="name" class="form-control" id="ad" placeholder="adresse" name = "adresse">
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Enregistre</button>
          </form>
    </div>
</body>
</html>