
<!--TODO Mettre à jour en fonction des ancrages-->
<footer>
      <div class="footer-background">
        <svg
          version="1.1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          width="100%"
          height="100%"
          viewBox="0 0 1600 900"
        >
          <defs>
            <path
              id="wave"
              fill="rgba(105, 27, 252, 0.6)"
              d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
      s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z"
            />
          </defs>
          <g>
            <use xlink:href="#wave" opacity=".4">
              <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="8s"
                calcMode="spline"
                values="270 230; -334 180; 270 230"
                keyTimes="0; .5; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite"
              />
            </use>
            <use xlink:href="#wave" opacity=".6">
              <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="6s"
                calcMode="spline"
                values="-270 230;243 220;-270 230"
                keyTimes="0; .6; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite"
              />
            </use>
            <use xlink:href="#wave" opacty=".9">
              <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="4s"
                calcMode="spline"
                values="0 230;-140 200;0 230"
                keyTimes="0; .4; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite"
              />
            </use>
          </g>
        </svg>
      </div>
      
      <div>
        <a href="https://ensc.bordeaux-inp.fr/fr"><img src="./assets/LogoENSC.png" alt="Logo ENSC" ></a>
    </div>
    <div class="buttons-container">
        <button onclick="window.location.href='./form'">Démarrer le jeu</button>
        <button onclick="window.location.href='./apropos#apropos-notreProjet'">Notre projet</button>
        <button onclick="window.location.href='./apropos#apropos-reglesDuJeu'">Règles du jeu</button>
        <button onclick="window.location.href='./apropos#apropos-planVert'">Plan Vert</button>
        <button onclick="window.location.href='./apropos#apropos-protectionDesDonnees'">Protection des données</button>
        <button onclick="window.location.href='./result'">Résultats en ligne</button>
        <button onclick="window.location.href='./resultat'">Résultats expérimentation</button>
    </div>
      
    </footer>


