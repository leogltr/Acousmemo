document.addEventListener('DOMContentLoaded', function () {


    let currentFormIndex = 0;
    const forms = document.querySelectorAll('.questionnaire');
    const errorMessages = document.querySelectorAll('.questionnaire-erreur');
    var Oui6 = document.getElementById('Oui6');
    var textarea6 = document.querySelector('.questionnnaire-contenu-textarea6');
    var Autre1 = document.getElementById('Autre1');
    var textarea1 = document.querySelector('.questionnnaire-contenu-textarea1');
    var reponse = document.querySelectorAll('.questionnaire-reponse');


    function showForm(index) {
        forms.forEach((form, i) => {
            form.style.display = i === index ? 'block' : 'none';
        });
    }

    function showError() {
        errorMessages.forEach(errorMessage => {
            errorMessage.style.visibility = "visible";
        });
    }

    function hideError() {
        errorMessages.forEach(errorMessage => {
            errorMessage.style.visibility = "hidden";
        });
    }

    function isFormValid() {
        const currentForm = forms[currentFormIndex];
        const selectedRadioButtons = currentForm.querySelectorAll('input[type="radio"]:checked');
        return selectedRadioButtons.length > 0;
    }

    document.querySelectorAll('.questionnaire-bouton-suivant').forEach((button, index) => {
        button.addEventListener('click', function (event) {

            if (currentFormIndex === forms.length -1) {
                if (isFormValid()) {
                    //window.location.href = "./game";
                    hideError();
                } else {
                    showError();
                }
            } else if (isFormValid()) {
                currentFormIndex = (currentFormIndex + 1) % forms.length;
                showForm(currentFormIndex);
                hideError();
            } else {
                showError();
            }
        });
    });

    document.querySelectorAll('.questionnaire-bouton-precedent').forEach(button => {
        button.addEventListener('click', function (event) {
            hideError();
            currentFormIndex = (currentFormIndex - 1 + forms.length) % forms.length;
            showForm(currentFormIndex);
        });
    });

    showForm(currentFormIndex);

    Oui6.addEventListener("click", function() {
        textarea6.style.visibility = "visible";
    });
    reponse.forEach(function(choice) {
        if (choice !== Oui6) {
            choice.addEventListener("click", function() {
                textarea6.style.visibility = "hidden";
            });
        }
    });

    // Autre1.addEventListener("click", function() {
    //     textarea1.style.visibility = "visible";
    // });
    // reponse.forEach(function(choice) {
    //     if (choice !== Autre1) {
    //         choice.addEventListener("click", function() {
    //             textarea1.style.visibility = "hidden";
    //         });
    //     }
    // });

    document.querySelectorAll('.questionnaire-reponse').forEach(choice => {
        choice.addEventListener("click", function() {
            hideError(); 
        });
    });
    
});

function selectRadio(questionId) {
    const selectedDiv = document.querySelector(`.questionnaire-reponse[onclick="selectRadio('${questionId}')"]:hover`);
    const selectedInput = selectedDiv.querySelector('input[type="radio"]');
    
   
    const allReponses = document.querySelectorAll('.questionnaire-reponse');
    allReponses.forEach(reponse => {
        reponse.classList.remove('selected');
    });

    
    selectedDiv.classList.add('selected');

    selectedInput.checked = true;
}
