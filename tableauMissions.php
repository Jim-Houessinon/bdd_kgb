<!Doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Tableau des Missions</title>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      <h1 class="text-center">Tableau des missions</h1>
        <table class="table table-striped table-hover">
            <thead id="thead" class="table-dark">
                <?php
                    foreach($donnees as $designation => $val)
                    {?>
                        <script>
                            var conversion = <?php echo json_encode($designation); ?>;
                            rajoutEntete(conversion);</script>
                    <?php }?>
            </thead>
            <tbody id="tbody">
                    <?php
                    foreach($donnees as $designation => $valeur)
                    {?>
                       <script>
                           var conversion = <?php echo json_encode($valeur); ?>;
                       rajoutValeurs(conversion);</script>
                   <?php }?>
            </tbody>
        </table>
        <form method="post" action="index.php">
        <div class="col-1">
        <label class="mx-2">n°id mission</label>
        <input class="mx-2" type="text" name="condition" placeholder="id" required>
        </div>
        <button class="btn btn-success mx-2 my-3" type="submit">Valider</button>
        </form>
        <form method="post" action="index.php">
            <div class="form-row">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-12 col-md-6 col-lg-2">
                    <h4 class="mb-2 ">Se connecter ?</h4>
                    <label for="validationDefaultUsername">Adresse mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="your@Email address" required>
                        </div>
                        <div class="mt-2">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="$password" required>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>