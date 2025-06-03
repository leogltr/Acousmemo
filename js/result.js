document.addEventListener("DOMContentLoaded", function () {
  // Créer les graphiques


  var soundList = document.getElementById("grid-container");
  var sonActuel = false;

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

  function createCamember(data, ctx, title, labelProp, countProp) {
    let labels = data.map(function (item) {
      return item[labelProp];
    });
    let counts = data.map(function (item) {
      return item[countProp];
    });

    let camembertChart = new Chart(ctx, {
      type: "pie",
      data: {
        labels: labels,
        datasets: [
          {
            data: counts,
            backgroundColor: [
              "rgba(45, 180, 171, 0.7)",
              "rgba(255, 194, 41, 0.7)",
              "rgba(180, 191, 252, 0.7)",
              "rgba(105, 27, 252, 0.7)",
            ],
            borderColor: [
              "rgba(45, 180, 171, 1)",
              "rgba(255, 194, 41, 1)",
              "rgba(180, 191, 252, 1)",
              "rgba(105, 27, 252, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        
        plugins: {
          title: {
            display: true,
            text: title,
            font: {
              family: "Arial",
              size: 18,
              weight: "bold",
              color:"rgb(45, 180, 171)"
            },
          },
          legend: {
            position: "right",
            align: "center",
            labels: {
              font: {
                family: "Arial",
                size: 14,
                weight: "bold",
              },
              color: "white",
            },
          },
        },
      },
    });
  }

  function createBarChart(combined, ctx, title, label1, label2,label) {
    let data = {
      labels: combined.map((item) => 
        item[label]
    ),
      
      datasets: [
        {
          label: label1,
          backgroundColor: "rgba(45, 180, 171, 0.7)",
          borderColor: "rgba(45, 180, 171, 1)",
          data: combined.map((item) => item.avg_speed),
        },
        {
          label: label2,
          backgroundColor: "rgba(255, 194, 41, 0.7)",
          borderColor: "rgba(255, 194, 41, 1)",
          data: combined.map((item) => item.avg_move),
        },
      ],
    };

    let myChart = new Chart(ctx, {
      type: "bar",
      data: data,
      options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
          title: {
            display: true,
            text: title,
            font: {
              family: "Arial",
              size: 20,
              weight: "bold",
            },
          },
          scales: {
            yAxes: [
              {
                ticks: {
                  color: "white",
                },
              },
            ],
            xAxes: [
              {
                ticks: {
                  color: "white",
                },
              },
            ],
          },
          legend: {
            position: "right",
            align: "center",
            labels: {
              font: {
                family: "Arial",
                size: 14,
                weight: "bold",
              },
              color: "white",
            },
          },
        },
      },
    });
  }


  function CreateStackedBarChart(data, ctx, title, label1, label2) {
    let myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: data.map((item) => item.id_sound),
        datasets: [
          {
            label: label1,
            backgroundColor: "rgba(45, 180, 171, 0.7)",
            borderColor: "rgba(45, 180, 171, 1)",
            data: data.map((item) => item.avg_found_order),
          },
          {
            label: label2,
            backgroundColor: "rgba(255, 194, 41, 0.7)",
            borderColor: "rgba(255, 194, 41, 1)",
            data: data.map((item) => item.avg_error_count),
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          x: {
            stacked: true,
          },
          y: {
            stacked: true
          },
        },
        plugins: {
          title: {
            display: true,
            text: title,
            font: {
              family: "Arial",
              size: 20,
              weight: "bold",
            },
          },
          scales: {
            x: {
              stacked: true,
            },
            y: {
              stacked: true
            },
            yAxes: [
              {
                ticks: {
                  color: "white",
                },
              },
            ],
            xAxes: [
              {
                ticks: {
                  color: "white",
                },
              },
            ],
          },
          legend: {
            position: "top",
            align: "center",
            labels: {
              font: {
                family: "Arial",
                size: 14,
                weight: "bold",
              },
              color: "white",
            },
          },
        },
      },
    });
  }

  function combinedData(data1, data2, label, item1, item2) {
    let combinedData = data1.map((item, index) => {
      return {
        [label]: item[label],
        [item1]: parseFloat(item[item1]),
        [item2]: parseFloat(data2[index][item2]),
      };
    });

    return combinedData;
  }



    function playSound(sound) {
      sonActuel = true;
    
      const audioContext = new AudioContext();
      const gain = new GainNode(audioContext);
      gain.connect(audioContext.destination);
      if (sound.type == "sine") {
        gain.gain.value = 0.5;
      } else {
        gain.gain.value = 0.1;
      }
    
      const oscillator = new OscillatorNode(audioContext);
      oscillator.connect(gain);
      oscillator.type = sound.type;
      oscillator.frequency.value = sound.frequency;
      oscillator.start();
    
      setTimeout(() => {
        oscillator.stop();
        sonActuel = false;
      }, sound.time);
    }
  
});


