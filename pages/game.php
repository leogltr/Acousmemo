<?php
$question1 = $_POST['question1'] ?? '';
$precision1 = $_POST['Precision1'] ?? '';
$question2 = $_POST['question2'] ?? '';
$question3 = $_POST['question3'] ?? '';
$question4 = $_POST['question4'] ?? '';
$question5 = $_POST['question5'] ?? '';
$question6 = $_POST['question6'] ?? '';
$precision6 = $_POST['Precision6'] ?? '';


if ($question1 == "Autre") {
    $question1 = $precision1;
}

if ($question6 == "Oui") {
    $question6 = $precision6;
}

//check if the user have respond to the form or if user exist in local storage
if (!isset($_POST['question1'])) {
?>
    <script>
        if (localStorage.getItem('user') === null) {
            console.log('user not found');
            window.location.href = '/Memoteam/form';
        }
    </script>
<?php
}
?>

<input type="hidden" id="question1" name="question1" value="<?php echo $question1; ?>">
<input type="hidden" id="question2" name="question2" value="<?php echo $question2; ?>">
<input type="hidden" id="question3" name="question3" value="<?php echo $question3; ?>">
<input type="hidden" id="question4" name="question4" value="<?php echo $question4; ?>">
<input type="hidden" id="question5" name="question5" value="<?php echo $question5; ?>">
<input type="hidden" id="question6" name="question6" value="<?php echo $question6; ?>">
<?php


/* Exemple de requête SQL sécurisée avec PDO
$query = "SELECT * FROM user WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => 1]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/


?>
<canvas id="canvas">Canvas is not supported in your browser.</canvas>
<div id="loading" class="loading">
    <div class="loading-animation">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<div id="finish" class="finish">
    <div class="finish-content">
        <h2 id="sen">Bravo!</h2>
        <p id="mess">Vous avez terminé le jeu avec un reste de <span id="finish-time">00:00</span></p>
        <div><button id="finish-button" class="button">
                <a href="">Rejouer</a>
            </button>
            <button id="finish-button-quit" class="button">
                <a href="/Memoteam">Quitter</a>
            </button>
        </div>

    </div>
</div>

<div id="game" style="background: linear-gradient(180deg, #16395db8, 16036bb8);">

    <div class="datas">
        <div class="datas-timer">
        <svg fill="#f0f0f0" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#f0f0f0"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>time</title> <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path> </g></svg>            <p id="chronometer">00:00</p>
        </div>
    </div>

    <div class="grille">
        <?php
        $counteur = 0;
        for ($i = 0; $i < 16; $i++) {
            echo "<div id='carte-" . $counteur . "' class='container-carte'></div>";
            $counteur++;
        }
        ?>
    </div>
</div>



<script src="js/game.js?v=<?php echo time(); ?>"></script>
