  fetch("Memoteam/get_result")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {

      //seulement 2 chiffer après la virgule data[3][0].avg_moves
      document.getElementById("avg_moves").innerHTML = Number.parseFloat(data[3][0].avg_moves).toFixed(2);
      document.getElementById("avg_time_seconds").innerHTML = Number.parseFloat(data[4][0].avg_time_seconds).toFixed(2) + " sec";
      document.getElementById("total_games").innerHTML =data[5][0].total_games;
      document.getElementById("avg_error_count").innerHTML =Number.parseFloat(data[2][0].avg_error_count).toFixed(2);
      document.getElementById("avg_order_found").innerHTML =Number.parseFloat(data[2][0].avg_order_found).toFixed(2);
      createCamember(
        data[9],
        document.getElementById("genreChartParticipating").getContext("2d"),
        "Répartition par genre des participants",
        "genre",
        "user_count"
      );
      createCamember(
        data[10],
        document.getElementById("ageChartParticipating").getContext("2d"),
        "Répartition par âge des participants",
        "age",
        "user_count"
      );
      createBarChart(
        combinedData(data[11], data[13], "genre", "avg_speed", "avg_move"),
        document.getElementById("speedMoveChartGenre").getContext("2d"),
        "Vitesse et mouvements moyen par genre",
        "Vitesse moyenne (sec)",
        "Nb Mouvements moyen",
        "genre"
      );
      createBarChart(
        combinedData(data[12], data[14], "age", "avg_speed", "avg_move"),
        document.getElementById("speedMoveChartAge").getContext("2d"),
        "Vitesse et mouvements moyen par âge",
        "Vitesse moyenne (sec)",
        "Nb Mouvements moyen"
      , "age");

      CreateStackedBarChart(
        combinedData(data[1], data[0], "id_sound", "avg_found_order", "avg_error_count"),
        document.getElementById("soundAvg").getContext("2d"),
        "Ordre de découverte et erreurs par son",
        "Ordre de découverte moyen",
        "Nb d'erreurs moyen"
      );


      data[15].forEach((sound) => {
        let button = document.createElement("button");
        button.classList.add("button");
        button.innerHTML = "Son: "+sound.id +"<br> Hz:"+ sound.frequency + "<br> Type:"+ sound.type ;
        button.addEventListener("click", function () {
          if (!sonActuel) {
            playSound(sound);
          }
        });
        
        soundList.appendChild(button);
      });
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });

