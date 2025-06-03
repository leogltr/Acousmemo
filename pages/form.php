<?php
include('./templates/header.php');
?>
<script>
    let user = localStorage.getItem('user');
    if (user !== null) {
        window.location.href = '/Memoteam/game';
    }
</script>
<div class="parent-questionnaire">
    <form action="./game" method="post">
        <!-- Question 1 -->
        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 1</h3>
                <p class="questionnaire-question">A quel genre vous identifiez vous le plus?</p>
            </div>

            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question1')">
                    <input type="radio" name="question1" value="Femme" required>
                    <label>Femme </label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question1')">
                    <input type="radio" name="question1" value="Homme">
                    <label>Homme</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question1')">
                    <input type="radio" name="question1" value="Préfère ne pas répondre">
                    <label>Préfère ne pas répondre</label>
                </div>
                <!-- <div class="questionnaire-reponse" onclick="selectRadio('question1')" id="Autre1">
                    <input type="radio" name="question1" value="Autre">
                    <label>Autre</label>
                </div>
                <div class="questionnnaire-contenu-textarea1">
                    <textarea cols="30" rows="10" name="Precision1" placeholder="Précisez"></textarea>
                </div> -->
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Suivant</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 2</h3>
                <p class="questionnaire-question">Quel âge avez vous?</p>
            </div>
            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question2')">
                    <input type="radio" name="question2" value="Moins de 18 ans" required>
                    <label>Moins de 18 ans</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question2')">
                    <input type="radio" name="question2" value="18 à 33 ans">
                    <label>18 à 33 ans</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question2')">
                    <input type="radio" name="question2" value="34 à 49 ans">
                    <label>34 à 49 ans</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question2')">
                    <input type="radio" name="question2" value="Plus de 49 ans">
                    <label>Plus de 49 ans</label>
                </div>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Suivant</div>
                    <div class="questionnaire-bouton-precedent">Précédent</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 3</h3>
                <p class="questionnaire-question">Quel est votre rapport avec la pratique d'un instrument de musique?</p>
            </div>
            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question3')">
                    <input type="radio" name="question3" value="Je ne joue jamais" required>
                    <label>Je ne joue jamais</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question3')">
                    <input type="radio" name="question3" value="J'ai déjà joué mais mon expérience était très réduite">
                    <label>J'ai déjà joué mais mon expérience était très réduite</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question3')">
                    <input type="radio" name="question3" value="Je joue de temps en temps">
                    <label>Je joue de temps en temps</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question3')">
                    <input type="radio" name="question3" value="Je joue quotidiennement">
                    <label>Je joue de manière quotidiennement</label>
                </div>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Suivant</div>
                    <div class="questionnaire-bouton-precedent">Précédent</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 4</h3>
                <p class="questionnaire-question">Avez-vous des notions de solfège?</p>
            </div>
            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question4')">
                    <input type="radio" name="question4" value="Non aucune" required>
                    <label>Non aucune</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question4')">
                    <input type="radio" name="question4" value="J'ai appris mais je ne m'en rapelle plus">
                    <label>J'ai appris mais je ne m'en rapelle plus</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question4')">
                    <input type="radio" name="question4" value="Oui je me débrouille vraiment bien">
                    <label>Oui je me débrouille vraiment bien</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question4')">
                    <input type="radio" name="question4" value="Oui je maîtrise">
                    <label>Oui je maîtirse vraiment</label>
                </div>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Suivant</div>
                    <div class="questionnaire-bouton-precedent">Précédent</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 5</h3>
                <p class="questionnaire-question">Sélectionnez la réponse qui vous correspond le mieux.</p>
            </div>
            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question5')">
                    <input type="radio" name="question5" value="Je n'écoute jamais de musique" required>
                    <label>Je n'écoute jamais de musique</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question5')">
                    <input type="radio" name="question5" value="J'écoute de la musique quelques fois dans le mois">
                    <label>J'écoute de la musique quelques fois dans le mois</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question5')">
                    <input type="radio" name="question5" value="J'écoute de la musique plusieurs fois par semaine">
                    <label>J'écoute de la musique plusieurs fois par semaine</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question5')">
                    <input type="radio" name="question5" value="J'écoute tous les jours de la musique">
                    <label>J'écoute tous les jours de la musique</label>
                </div>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Suivant</div>
                    <div class="questionnaire-bouton-precedent">Précédent</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Question 6</h3>
                <p class="questionnaire-question">Présentez-vous des pathologies auditives?</p>
            </div>
            <div class="questionnaire-contenu">
                <div class="questionnaire-reponse" onclick="selectRadio('question6')">
                    <input type="radio" name="question6" value="Non" required>
                    <label>Non</label>
                </div>
                <div class="questionnaire-reponse" onclick="selectRadio('question6')" id="Oui6">
                    <input type="radio" name="question6" value="Oui">
                    <label>Oui</label>
                </div>
                <div class="questionnnaire-contenu-textarea6">
                    <textarea cols="30" rows="10" name="Precision6" placeholder="Précisez"></textarea>
                </div>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <div class="questionnaire-bouton-suivant">Fin</div>
                    <div class="questionnaire-bouton-precedent">Précédent</div>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>

        <div class="questionnaire">
            <div class="questionnaire-titre">
                <h3>Objectif :</h3>
                <p class="questionnaire-question">Retrouver toutes les paires de sons identiques.</p>
            </div>
            <div class="questionnaire-contenu">
                <h3>Déroulement :</h3>
                <ul>
                    <li>Écoute attentivement chaque son.</li>
                    <li>Mémorise leurs différences de <b>temps</b>, <b>fréquence</b> et <b>type d'onde</b>.</li>
                    <li>Trouve les paires correspondantes.</li>
                </ul>

                <h3>But :</h3>
                <ul>
                    <li>Termine le jeu en le moins de coups et de temps possibles.</li>
                    <li>Entraîne ta mémoire auditive et ton sens du détail !</li>
                </ul>
            </div>
            <div class="questionnaire-footer">
                <div class="questionnaire-bouton">
                    <button class="bouton-final">Jouer</button>
                </div>
                <p class="questionnaire-erreur">Veuillez saisir au moins une réponse avant de passer à la question suivante</p>
            </div>
        </div>
    </form>
</div>
<?php
include('./templates/footer.php');
?>
<script src="./js/scriptForm.js?v=<?php echo time(); ?>"></script>