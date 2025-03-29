<?php
//LA VIEW POUR LA CLASS ViewPlayer
/**
 * Classe ViewPlayer
 * 
 * Cette classe gère l'affichage du formulaire d'inscription des joueurs ainsi que la liste des joueurs enregistrés.
 */
class ViewPlayer{

    private ?string $signUpMessage = '';
    private ?string $playersList = '';

    /**
     * Get the value of signUpMessage
     */
    public function getSignUpMessage(): ?string
    {
        return $this->signUpMessage;
    }

    /**
     * Set the value of signUpMessage
     */
    public function setSignUpMessage(?string $signUpMessage): self
    {
        $this->signUpMessage = $signUpMessage;

        return $this;
    }

    /**
     * Get the value of playersList
     */
    public function getPlayersList(): ?string
    {
        return $this->playersList;
    }

    /**
     * Set the value of playersList
     */
    public function setPlayersList(?string $playersList): self
    {
        $this->playersList = $playersList;

        return $this;
    }

    /**
     * Génère et retourne le HTML du formulaire d'ajout d'un joueur et de la liste des joueurs.
     * 
     * @return string Le code HTML complet de la vue.
     */
    public function displayView(): string {
        ob_start();
?>
        <section>
            <h2>Enregistrer un joueur</h2>
            <form method='POST' action=''>
                <input type="text" name="pseudo" placeholder="Votre Pseudo">
                <input type="text" name="email" placeholder="Votre Email">
                <input type="number" name="score" placeholder="Le Score">
                <input type="text" name="password" placeholder="Votre Mot de Passe">
                <input type="submit" name="submit">
            </form>
            <p><?php echo $this->getSignUpMessage() ?></p>
        </section>

        <section>
            <h2>Liste des joueurs</h2>
            <?php echo $this->getPlayersList() ?>
        </section>
<?php
        return ob_get_clean();
    }
 
}