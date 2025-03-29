<?php

// Activer la session
session_start();

// Import des ressources communes

include './utils/utils.php';
include './abstract/abstractController.php';
include './interface/interfaceModel.php';
include './model/playerModel.php';
include './view/header.php';
include './view/footer.php';
include './view/viewPlayer.php';
include './controller/playerController.php';

$home = new PlayerController(new ViewHeader(), new ViewFooter(), new ModelPlayer(),new ViewPlayer());
$home->render();
