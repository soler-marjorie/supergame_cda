<?php
class PlayerController extends AbstractController {
    //ATTRIBUTES
    private ?ViewPlayer $player;

    //CONSTRUCT
    public function __construct(ViewHeader $header, ViewFooter $footer, InterfaceModel $model, ViewPlayer $player){
        $this->setHeader($header);
        $this->setFooter($footer);
        $this->setModel($model);
        $this->player = new ViewPlayer();
    }

    //GETTER
    public function getPlayer():?ViewPlayer{
        return $this->player;
    }

    //SETTER
    public function setPlayer(ViewPlayer $player):self{
        $this->player = $player;
        return $this;
    }

    //METHODS

    /*
    * Adds a player to the database
    * No paramaters needed
    * @return string containing the message of the result of the operation
    */
    public function addPlayer():string{

        if(isset($_POST['submitInscription'])){
            
            if(empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['score']))  {
                return "Veuillez remplir tout les champs !";
            }

            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                return "L'email n'est pas au bon format !";
            }

            if($_POST['score'] < 0 ){
                return "Score Invalide";
            }
    
            $pseudo = sanitize($_POST['pseudo']);
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);
            $score = sanitize($_POST['score']);
    
            $password = password_hash($password, PASSWORD_BCRYPT);

            $data = $this->getModel()["pseudo"]->setEmail($email)->getByEmail();
            if(!empty($data[0])){
                return "Cet email existe déjà !";
            }
            

            return $this->getModel()["pseudo"]->setPseudo($pseudo)->setScore($score)->setPassword($password)->add();
        }
        return '';
    }

    /**
     * Displays all the players in the database
     * No paramaters needed
     * @return string containing the list of players
     */
    public function getAllPlayers():string{

        $data = $this->getModel()->getAll();
        $playersList = '';

        foreach($data as $player){
            $playersList = $playersList."<article><h3>".$player['pseudo']."</h3><p>".$player['email']."</p><p>Score : ".$player['score']."</p><hr style='border:black 3px solid'></article>";
        }
        return $playersList;
    }

    /**
     * Displays all the necessary elements for the page
     * No paramaters needed
     * @return void
     */

    public function render():void{
        echo $this->getHeader()->displayView();
        echo $this->getPlayer()->setSignUpMessage($this->addPlayer())->setPlayersList($this->getAllPlayers())->displayView();
        echo $this->getFooter()->displayView();
    }
}