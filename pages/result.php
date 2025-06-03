<?php
include('./templates/header.php');

?>
<div id="page-result">
    <div class="container-chart">
        <h2>Participants</h2>
        <div class="row">
            <div>
                <canvas id="genreChartParticipating" ></canvas>

            </div>
            <div>
                <canvas id="ageChartParticipating"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="number_show">
                <h3>Nombre moyen de mouvement</h3>
                <p id="avg_moves"></p>
            </div>
            <div class="number_show">
                <h3>Nombre moyen de temps</h3>
                <p id="avg_time_seconds"></p>
            </div>
            <div class="number_show">
                <h3>Nombre total de parties</h3>
                <p id="total_games"></p>
            </div>
        </div>
        <div class="bar">
            <div>
                <canvas id="speedMoveChartGenre"></canvas> 
            </div>
             <div >
                <canvas id="speedMoveChartAge"></canvas> 
            </div> 
        
        </div>
    </div>

    <div class="container-chart">
        <h2>Resultats</h2>
        <div id="grid-container" class="grid-container"></div>

        <div class="row">
            <div class="number_show">
                <h3>Nombre moyen d'erreurs</h3>
                <p id="avg_error_count"></p>
            </div>
            <div class="number_show">
                <h3>Ordre moyen de découverte</h3>
                <p id="avg_order_found"></p>
            </div>
        </div>

        <div class="row" >
            <h3></h3>
        </div>
        <div class="row">
        <canvas id="soundAvg"></canvas>
        </div>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/result.js?v=<?php echo time(); ?>"></script>
<?php
// Inclure le template du pied de page
include('./templates/footer.php');
?>