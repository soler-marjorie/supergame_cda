<?php
class ModelPlayer implements InterfaceModel {
    //ATTRIBUTES
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private ?string $password;
    private ?PDO $bdd;

    //CONSTRUCT
    public function __construct(){
        $this->bdd = connect();
    }

    //GETTER AND SETTER
     /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of score
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * Set the value of score
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of bdd
     */
    public function getBdd(): ?PDO
    {
        return $this->bdd;
    }

    /**
     * Set the value of bdd
     */
    public function setBdd(PDO $bdd): self
    {
        $this->bdd = $bdd;

        return $this;
    }
   

    //METHODS

    /**
     * Adds a player to the database
     * No paramaters needed
     * @return string containing the message of the result of the operation
     */
    public function add():string{
        try{
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $score = $this->getScore();
            $password = $this->getPassword();

            $requete = "INSERT INTO players(pseudo, email, score, psswrd)VALUE(?,?,?,?)";
            $req = $this->getBdd()->prepare($requete);

            $req->bindParam(1,$pseudo, PDO::PARAM_STR);
            $req->bindParam(2,$email, PDO::PARAM_STR);
            $req->bindParam(3,$score, PDO::PARAM_INT);
            $req->bindParam(4,$password, PDO::PARAM_STR);
            $req->execute();

            return ''.$pseudo.' a été enregistré en BDD !';
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Retrieves all players from the database
     * No parameters needed
     * @return ?array either contains null or an array containing all the players inside the database in an object format => [{id=data,pseudo=data,email=data,score=data}]
     */
    public function getAll():?array{
        try {
            $requete = "SELECT id, pseudo, email, score FROM players";
            $req = $this->getBdd()->prepare($requete);
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Retrieves a player from the database using his email
     * No parameters needed
     * @return ?array either contains null or an array containing the player inside the database in an object format => [{id=data,pseudo=data,email=data,score=data}]
     */
    public function getByEmail(): ?array{
        try {
            $email = $this->getEmail();
            $requete = "SELECT id, pseudo, email, score FROM players WHERE email = ?";
            $req = $this->getBdd()->prepare($requete);

            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

   
}