<?php
//LE CONTROLLER pour la class PlayerController

class PlayerController extends AbstractController{
    /**
     * @var ViewPlayer|null $player
     * Vue associée à ce contrôleur pour l'affichage des informations du joueur.
     *
     * @access private
     */
    private ?ViewPlayer $player;

    

    /**
     * Get the value of player
     */
    public function getPlayer(): ?ViewPlayer
    {
        return $this->player;
    }

    /**
     * Set the value of player
     */
    public function setPlayer(?ViewPlayer $player): self
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Ajoute un nouveau joueur.
     *
     * @return void
     *
     * @access public
     */
    public function addPlayer(){

    }
    
    /**
     * Récupère la liste de tous les joueurs.
     *
     * @return void
     *
     * @access public
     */
    public function getAllPlayers(){
        
    }

    /**
     * Affiche la vue.
     *
     * @return void
     *
     * @access public
     */
    public function render(){
        echo $this->getHeader()->displayView();
        echo $this->getPlayer()->displayView();
        echo $this->getFooter()->displayView();
    }
}