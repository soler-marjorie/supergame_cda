<?php
/**
 * Classe ModelPlayer
 * 
 * Cette classe représente le modèle des joueurs et permet d'interagir avec la base de données.
 * Elle implémente l'interface InterfaceModel.
 */
class ModelPlayer implements InterfaceModel{
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private ?string $password;
    private ?PDO $bdd;

    public function __construct(?PDO $bdd) {
        $this->bdd = $bdd;
    }

    //GETTERS SETTERS

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
    public function setId(?int $id): self
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
    public function setPseudo(?string $pseudo): self
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
    public function setEmail(?string $email): self
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
    public function setScore(?int $score): self
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
    public function setPassword(?string $password): self
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
    public function setBdd(?PDO $bdd): self
    {
        $this->bdd = $bdd;

        return $this;
    }

    /**
     * Ajoute un joueur à la base de données.
     * 
     * @return string Message de confirmation ou d'erreur.
     */
    function add(): string{
        //Requête
        try{ 
            $player = $this->getEmail();

            $requete = "INSERT INTO players(pseudo, email, score, `password`)
            VALUE(?,?,?,?)";
            $req = $this->bdd->prepare($requete);
            $req->bindParam(1,$player[0], PDO::PARAM_STR);
            $req->bindParam(2,$player[1], PDO::PARAM_STR);
            $req->bindParam(3,$player[2], PDO::PARAM_STR);
            $req->bindParam(4,$player[3], PDO::PARAM_STR);
            $req->execute();

            return 'Vous avez bien été renregistré';
        }
        catch(Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return'';
    }

     /**
     * Récupère tous les joueurs de la base de données.
     * 
     * @return array|null Liste des joueurs sous forme d'un tableau associatif ou null en cas d'erreur.
     */
    public function getAll():?array{
        try {
            $requete = "SELECT id, pseudo, email, score FROM players";
            $req = $this->bdd->prepare($requete);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Récupère un joueur par son adresse email.
     * 
     * @param string $email L'adresse email du joueur à rechercher.
     * @return array|null Informations du joueur sous forme d'un tableau associatif ou null si non trouvé.
     */
    function getByEmail(): ?array {
        try {
            $requete = "SELECT id, pseudo, email, score, `password` FROM players WHERE email = ?";
            $req = $this->bdd->prepare($requete);
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

}
