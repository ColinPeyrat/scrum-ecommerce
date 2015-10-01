<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Sprint Fnac - jeu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/sprint">Fnac</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Accueil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jeux <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?r=jeu">Voir tous les jeux</a></li>
                            <li><a href="#">Ce bouton sert à rien</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Lui non plus</li>
                            <li><a href="#">Toujours pas</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?r=cli/login"><?php if(isset($_SESSION['user'])) echo "Connecté(e) : ".$_SESSION['user']->cli_pseudo; else echo "Se connecter" ?></a></li>
                </ul>
            </div><!--/.nav-collapse -->
    </nav>
    <?php
    $messages = new message();
    $messages->flash();
    ?>
