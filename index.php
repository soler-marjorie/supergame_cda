<?php

// Activer la session
session_start();

// Import des ressources communes

include './interface/interfaceModel.php';
include './abstract/abstractController.php';

include './view/header.php';
include './view/footer.php';
include './view/ViewPlayer.php';

include './Model/playerModel.php';
include './utils/utils.php';
include './controller/playerController.php';

$header = new ViewHeader();
$footer = new ViewFooter();
$playerView = new ViewPlayer();
$playerModel = new ModelPlayer($bdd);

// Instanciation du contrôleur et rendu
$playerController = new PlayerController($header, $footer, $playerModel, $playerView);

$playerController->render();
