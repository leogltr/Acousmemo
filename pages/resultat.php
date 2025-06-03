<?php
include('./templates/header.php');
?>


<div class="apropos">
    <section>
        <h2 id="apropos-notreProjet">Acousmémo</h2>
        <div>
            <p>
                Acousmémo est un jeu en ligne basé sur le principe du memory, mais avec des sons à la place des images. Cet outil a été développé par le précédent groupe TransDisciplinaire. <br>
            </p>
            <p>
                L’objectif est d’analyser comment les joueurs perçoivent et mémorisent les sons, en identifiant les paramètres qui en rendent certains plus difficiles à différencier. En collectant des données de performance des joueurs, nous espérons mieux comprendre les mécanismes de discrimination auditive et contribuer à la recherche en psychoacoustique. <br>
            </p>
        </div>
    </section>
    <section>
        <h2 id="apropos-reglesDuJeu">Contexte</h2>
        <div>
            <p>
                Durant le semestre 5, notre priorité a été de prendre en main l’outil Acousmémo sans y apporter de modifications. Nous avons utilisé la version existante du jeu pour mener une première phase de tests et récolter des données sur la perception auditive des participants. L’objectif principal de ce semestre était donc d’exploiter l’outil tel qu’il était, en mettant en place un protocole de test rigoureux et en réalisant une première analyse des performances des joueurs.
            </p>
            <p>
                Le semestre 6, quant à lui, est consacré à l’amélioration du jeu et à l’exploration de nouvelles hypothèses. En fonction des résultats obtenus lors du premier semestre, nous avons identifier des points d’amélioration et tester des variations dans les paramètres psychoacoustiques du jeu. L’enjeu fut alors d’affiner nos observations et de mener des expérimentations plus ciblées pour approfondir notre compréhension des mécanismes de différenciation des sons.
            </p>
        </div>
    </section>
<section>
  <h2 id="apropos-reglesDuJeu">Résultats S5</h2>
  <div style="display: flex; flex-direction: column; align-items: center;">
    <p>
      Chaque son est défini par 3 paramètres : le timbre, la durée et la fréquence. Dans le cadre du projet Acousmémo, 12 sons ont été créés en fonction de 2 timbres (“sinusoïdal” et “dents de scie”), 2 durées (0.4s et 1s) et 3 fréquences (349 Hz, 440 Hz, 523 Hz) : ce sont les valeurs des paramètres. Le tableau ci-dessous montre la distribution de ces paramètres dans les sons.
    </p>
    <table border="1" style="width: 80%; max-width: 800px; border-collapse: collapse; text-align: center;">
      <thead>
        <tr>
          <th>Sons</th>
          <th>Timbre</th>
          <th>Durée (ms)</th>
          <th>Fréquence (Hz)</th>
        </tr>
      </thead>
      <tbody>
        <tr><td><button onclick="playSound('sine', 349, 400)">▶</button></td><td>sinusoïdal</td><td>400</td><td>349</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 349, 400)">▶</button></td><td>dents de scie</td><td>400</td><td>349</td></tr>
        <tr><td><button onclick="playSound('sine', 440, 1000)">▶</button></td><td>sinusoïdal</td><td>1000</td><td>440</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 440, 400)">▶</button></td><td>dents de scie</td><td>400</td><td>440</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 440, 1000)">▶</button></td><td>dents de scie</td><td>1000</td><td>440</td></tr>
        <tr><td><button onclick="playSound('sine', 440, 400)">▶</button></td><td>sinusoïdal</td><td>400</td><td>440</td></tr>
        <tr><td><button onclick="playSound('sine', 349, 1000)">▶</button></td><td>sinusoïdal</td><td>1000</td><td>349</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 349, 1000)">▶</button></td><td>dents de scie</td><td>1000</td><td>349</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 523, 400)">▶</button></td><td>dents de scie</td><td>400</td><td>523</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 523, 1000)">▶</button></td><td>dents de scie</td><td>1000</td><td>523</td></tr>
        <tr><td><button onclick="playSound('sine', 523, 400)">▶</button></td><td>sinusoïdal</td><td>400</td><td>523</td></tr>
        <tr><td><button onclick="playSound('sine', 523, 1000)">▶</button></td><td>sinusoïdal</td><td>1000</td><td>523</td></tr>
      </tbody>
    </table>
    <p>
        Afin de proposer des résultats, les différents sons doivent être regroupés dans des catégories dépendantes de leurs paramètres.
Ainsi, si l’on souhaite étudier l’influence d’un des 3 paramètres, les deux autres doivent être fixés, et l’on regroupe alors les sons selon les 2 paramètres fixés.
Il y a donc 6 regroupements pour les timbres, 6 pour les durées, et 4 pour les fréquences.
    </p>
    <img src="./assets/Nombre d'erreur timbre.png">
  <span style="display: flex; justify-content: center; gap: 8px; margin-top: 10px; flex-wrap: nowrap; overflow-x: auto;">
  <button onclick="playSound('sine', 349, 400)">F349-D400</button>
  <button onclick="playSound('sawtooth', 349, 400)">F349-D400</button>
  <button onclick="playSound('sine', 349, 1000)">F349-D1000</button>
  <button onclick="playSound('sawtooth', 349, 1000)">F349-D1000</button>
  <button onclick="playSound('sine', 440, 400)">F440-D400</button>
  <button onclick="playSound('sawtooth', 440, 400)">F440-D400</button>
  <button onclick="playSound('sine', 440, 1000)">F440-D1000</button>
  <button onclick="playSound('sawtooth', 440, 1000)">F440-D1000</button>
  <button onclick="playSound('sine', 523, 400)">F523-D400</button>
  <button onclick="playSound('sawtooth', 523, 400)">F523-D400</button>
  <button onclick="playSound('sine', 523, 1000)">F523-D1000</button>
  <button onclick="playSound('sawtooth', 523, 1000)">F523-D1000</button>
</span>
<p>
    <img src="./assets/Résultats cumulés.png">
</p>
<p>
    Sur les deux premiers graphiques, on ne distingue pas de tendance particulière car il n’y a aucun groupe qui semble dominer sur l’autre, même si l’on peut voir des écarts importants pour certains regroupements (en particulier G2).
Le graphique des résultats cumulés montre des performances égales pour les deux valeurs du paramètre timbre.
</p>
<p>
    On remarque une tendance générale au niveau du comportement des valeurs lorsque les paramètres sont regroupés, aucune domination globale , et des changements de valeur souvent importants entre les différents regroupements pour la même valeur d’un paramètre.
Le faible écart entre les différentes valeurs des paramètres est constaté pour les 3 paramètres.

</p>
  </div>
</section>

<section>
  <h2 id="apropos-reglesDuJeu">Résultats S6</h2>
  <div style="display: flex; flex-direction: column; align-items: center;">
    <p>
        Chaque son est défini par 3 paramètres : le timbre, la durée et la fréquence. Dans le cadre du projet Acousmémo, 12 sons ont été créés en fonction de 3 timbres (« sinusoïdal », « dents de scie » et « carré »), d’une durée unique de 1,2 seconde et de 4 fréquences (349 Hz, 440 Hz, 523 Hz et 587 Hz) : ce sont les valeurs des paramètres. Le tableau ci-dessous montre la distribution de ces paramètres dans les sons.
    </p>
    <table border="1" style="width: 80%; max-width: 800px; border-collapse: collapse; text-align: center;">
      <thead>
        <tr>
          <th>Sons</th>
          <th>Fréquence (Hz)</th>
          <th>Durée (ms)</th>
          <th>Timbre</th>
        </tr>
      </thead>
      <tbody>
        <tr><td><button onclick="playSound('sine', 349, 1200)">▶</button></td><td>349</td><td>1200</td><td>sinusoïdal</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 349, 1200)">▶</button></td><td>349</td><td>1200</td><td>dents de scie</td></tr>
        <tr><td><button onclick="playSound('square', 349, 1200)">▶</button></td><td>349</td><td>1200</td><td>carré</td></tr>
        <tr><td><button onclick="playSound('sine', 440, 1200)">▶</button></td><td>440</td><td>1200</td><td>sinusoïdal</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 440, 1200)">▶</button></td><td>440</td><td>1200</td><td>dents de scie</td></tr>
        <tr><td><button onclick="playSound('square', 440, 1200)">▶</button></td><td>440</td><td>1200</td><td>carré</td></tr>
        <tr><td><button onclick="playSound('sine', 523, 1200)">▶</button></td><td>523</td><td>1200</td><td>sinusoïdal</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 523, 1200)">▶</button></td><td>523</td><td>1200</td><td>dents de scie</td></tr>
        <tr><td><button onclick="playSound('square', 523, 1200)">▶</button></td><td>523</td><td>1200</td><td>carré</td></tr>
        <tr><td><button onclick="playSound('sine', 587, 1200)">▶</button></td><td>587</td><td>1200</td><td>sinusoïdal</td></tr>
        <tr><td><button onclick="playSound('sawtooth', 587, 1200)">▶</button></td><td>587</td><td>1200</td><td>dents de scie</td></tr>
        <tr><td><button onclick="playSound('square', 587, 1200)">▶</button></td><td>587</td><td>1200</td><td>carré</td></tr>
      </tbody>
    </table>
    <p>
        Nombre de participants: 17
    </p>
    <p>
        Nombre de parties jouées: 51
    </p>
    <p>
        Nombre total de paires réalisées: 1012
    </p>
    <a href="./assets/matrice2.png" target="_blank" rel="noopener noreferrer">
  <img 
    src="./assets/matrice2.png" 
    alt="Nombre d'erreur timbre" 
    style="max-width: 800px; width: 100%; height: auto; cursor: pointer; display: block; margin: 0 auto;"
  >
</a>
<p>
    404 paires de sons qui ont la même fréquence et le même timbre.
</p>
<p>
    296 paires de sons qui ont une fréquence différente et un timbre différent.
</p>
<p>
    232 paires de sons qui ont la même fréquence mais un timbre différent.
</p>
<p>
    81 paires de sons qui ont le même timbre mais une fréquence différente.
</p>
  </div>
</section>
    <button id="scrollToTopButton" onclick="scrollToTop()">↑</button>
</div>
<script src="js/apropos.js?v=<?php echo time(); ?>"></script>
<script>
    let sonActuel = false;

    function playSound(timbre, frequence, duree) {
      sonActuel = true;

      const audioContext = new AudioContext();
      const gain = new GainNode(audioContext);
      gain.connect(audioContext.destination);

      if (timbre === "sine") {
        gain.gain.value = 0.5;
      } else {
        gain.gain.value = 0.1;
      }

      const oscillator = new OscillatorNode(audioContext);
      oscillator.connect(gain);
      oscillator.type = timbre;
      oscillator.frequency.value = frequence;
      oscillator.start();

      setTimeout(() => {
        oscillator.stop();
        sonActuel = false;
      }, duree);
    }
</script>

<?php
// Inclure le template du pied de page
include('./templates/footer.php');
?>