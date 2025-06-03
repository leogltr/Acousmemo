<?php
include('./templates/header.php');
?>


<div class="apropos">
    <section>
        <h2 id="apropos-notreProjet">Qui sommes-nous?</h2>
        <div>
            <p>
                Réalisé par la MémoTeam, ce site constitue le livrable à un projet entrant dans le cadre de la recherche sur les sons et la psychoacoustique, encadré par Maxime Poret, ingénieur d’études cognitiques. <br>
            </p>
            <p>
                La MémoTeam est constituée de 5 élèves-ingénieurs à l’Ecole Nationale Supérieure de Cognitique (ENSC) : Boutin Raphaël, Hebbar Esma, Lorans Maximilien, Saddat - - Bettiol Ylhan et Walther Thomas. <br>
            </p>
            <p>
                La deuxième partie de ce projet a été réalisé par: Gaultier Léo, Bourguignon Louis-Ferdinand et Hadi Ahmeda. Le nom du projet était alors "Acousmémo" et a fait suite au projet précédent afin d'approfondir le travail mené.
            </p>
            <p>
                Les données obtenues suite aux parties de jeu réalisées seront anonymes, et permettront des avancées dans le dobody/bodye de la psychoacoustique.
            </p>
        </div>
    </section>
    <section>
        <h2 id="apropos-reglesDuJeu">Règles du jeu</h2>
        <div>
            <p>
                Dans ce jeu de Mémory, votre objectif est simple : trouver toutes les paires de sons pour vider le plateau de jeu.
            </p>
            <p>
                Le jeu débute avec un plateau de jeu composé de 16 cartes disposées aléatoirement sur une grille de 4x4. Chaque carte est associée à un son spécifique. Au total, il y a 8 paires de sons à découvrir et reconnaître.
            </p>
            <p>
                À chaque tour, vous retournez deux cartes de votre choix. Les sons associés à ces cartes sont alors joués. Si les deux sons sont identiques, les cartes disparaissent du plateau. Si les sons ne correspondent pas, les cartes sont à nouveau retournées face cachée, et c'est à vous de mémoriser leur emplacement pour les prochains tours.
            </p>
            <p>
                Le jeu se poursuit ainsi jusqu'à ce que toutes les paires de cartes aient été trouvées et que le plateau soit vide.
            </p>
            <p>
                Votre temps de jeu est enregistré à la fin de chaque partie. N’hésitez pas à consulter le classement en ligne pour voir comment vous vous classez par rapport aux autres joueurs.
            </p>
            <p>
                Prêt à relever le défi Mémo Psychoacoustique ? Amusez-vous bien !
            </p>
        </div>
    </section>
    <section>
        <h2 id="apropos-planVert">Plan Vert</h2>
        <div>
            <p>
                Au niveau de l’accessibilité, notre site a été conçu pour s’adapter à de nombreux supports, que ce soit téléphone, tablette ou ordinateur. Les sons ont été sélectionnés pour ne pas être sensibles à la qualité des sorties audio. Le jeu a été développé pour être accessible au plus grand nombre.
            </p>
            <p>
                Dans l’objectif de minimiser l’impact environnemental de notre création, certaines réunions se sont déroulées à distance, afin d'éviter des déplacements inutiles lors du développement du site web. De plus, les sons sont générés directement sur le site web, pour ne pas les stocker sur un serveur. Enfin, nous avons fait le choix de minimiser le nombre de pages du site et de ne pas utiliser de framework, qui prennent eux aussi une place importante dans les serveurs. Nous n’utilisons alors que des technologies natives.
            </p>
        </div>
    </section>
    <section>
        <h2 id="apropos-protectionDesDonnees">Protection des données</h2>
        <div>
            <p>
                La participation à cette recherche est entièrement volontaire. Cela signifie que vous êtes libre d’arrêter de participer à l’expérience à tout moment, sans conséquences ni pénalités.
            </p>
            <p>
                Toutes les données collectées lors de cette expérience seront stockées de manière à ce qu'il ne soit pas possible d'identifier personnellement des individus uniques. Les informations recueillies au cours de cette étude ne seront utilisées qu'à des fins de recherche académique. Cela inclut, sans toutefois s'y limiter, la publication des résultats dans des revues universitaires et le partage des résultats lors de conférences. Il est possible que les données collectées au cours de cette étude, et au cours de vos parties de jeu, soient publiées pour d'autres chercheurs dans un format anonymisé.
            </p>
        </div>
    </section>
    <button id="scrollToTopButton" onclick="scrollToTop()">↑</button>
</div>
<script src="js/apropos.js?v=<?php echo time(); ?>"></script>

<?php
// Inclure le template du pied de page
include('./templates/footer.php');
?>