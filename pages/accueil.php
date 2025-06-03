<?php

/* Exemple de requête SQL sécurisée avec PDO
$query = "SELECT * FROM user WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => 1]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
// Inclure les templates header et footer
include('./templates/header.php');

?>

<!-- Contenu de la page -->
<div class="acceuil">
    <p class="message">
        Tester votre mémoire !
    </p>
    <a class="boutton-demarer" href="./form">
    <button class="button-73"  onmouseover="showCat()"
        onmouseout="hideCat()">Démarrer</button>
    <div id="cat-container" class="hidden">
        <img src="assets/kawaii-5395394_1280.webp" alt="Chat mignon">
    </div>
    </a>
    <div class="acceuil-explication">
    <div class="acceuil-explication-1">
    <h2>BONJOUR ET BIENVENUE DANS CE JEU !</h2>
        <p>
            Vous connaissez le Memory ? Alors vous allez adorer le Memo Psychoacoustique !
        </p>
        <h2> BUT DU JEU : trouver des paires de son</h2>
        <p>
            Appuyez sur une carte pour la retourner. Mais attention, dépêchez-vous : vous serez chronométrés !
        </p>
        <button id="EnSavoirPlus" class="button">
            <a href="/Memoteam/apropos">En savoir +</a>
        </button>
    </div>       
    </div>
    <section id="sectionAudio">
        <div id="titleAudio">
            <h2>
                <span>Test</span>
                <span>Ton</span>
                <span>Son</span>
            </h2>
        </div>
        <div id="testAudio">

            <div class="container">
                <canvas id="audioPlay"></canvas>
            </div>
        </div>
    </section>
</div>
<script src="https://www.unpkg.com/howler@2.2.4/dist/howler.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="js/script.js?v=<?php echo time(); ?>"></script>
<?php
// Inclure le template du pied de page
include('templates/footer.php');
?>