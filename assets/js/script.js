// Defina as perguntas e respostas
var questions = [
    {
        question: "1-) Qual é o nome da lei que foi promulgada em 2006 para combater a violência doméstica contra a mulher no Brasil?",
        options: ["a) Lei Joana D'arc",
            "b) Lei Anita Garibaldi",
            "c) Lei Carolina de Jesus",
            "d) Lei Maria da Penha"],
        answer: "d) Lei Maria da Penha"
    },
    {
        question: "2-) Qual foi o primeiro país latino-americano a ter uma mulher como presidente da república?'?",
        options: ["a) Argentina",
            "b) Chile",
            "c) Brasil",
            "d) Nicarágua"],
        answer: "c) Brasil"
    },
    {
        question: "3-) Qual é o nome do movimento social que luta pela igualdade de direitos entre homens e mulheres? ",
        options: ["a) Feminismo",
            "b) Humanismo ",
            "c) Socialismo ",
            "d) Pacifismo"],
        answer: "a) Feminismo"
    },
    {
        question: "4-) Qual é o nome da ativista paquistanesa que foi baleada pelo Talibã por defender o direito das meninas à educação?",
        options: ["a) Malala Yousafzai ",
            "b) Shirin Ebadi ",
            "c) Rigoberta Menchú ",
            "d) Wangari Maathai"],
        answer: "a) Malala Yousafzai"
    },
    {
        question: "5-) Qual é o nome da primeira mulher a ir ao espaço? ",
        options: ["a) Sally Ride",
            "b) Valentina Tereshkova ",
            "c) Mae Jemison ",
            "d) Kalpana Chawla"],
        answer: "b) Valentina Tereshkova"
    }
];

var currentQuestion = 0;
var score = 0;
var correctAnswers = 0; // Contador de respostas corretas

function displayQuestion() {
    console.log(questions[currentQuestion].question);
    for (var i = 0; i < questions[currentQuestion].options.length; i++) {
        console.log(questions[currentQuestion].options[i]);
    }
}

function checkAnswer(answer) {
    if (answer === questions[currentQuestion].answer) {
        score++;
        correctAnswers++;
        console.log("Resposta correta!");
    } else {
        console.log("Resposta incorreta.");
    }
    currentQuestion++;
    if (currentQuestion >= questions.length) {
        console.log("Quiz concluído!");
        console.log("Pontuação final: " + score);
        console.log("Respostas corretas: " + correctAnswers);
    } else {
        displayQuestion();
    }
}

// Exibir a primeira pergunta
displayQuestion();

// Simulação de interação do usuário (respostas às perguntas)
// Supondo que o usuário respondeu a primeira pergunta corretamente
checkAnswer("d) Lei Maria da Penha");
// Supondo que o usuário respondeu à segunda pergunta corretamente
checkAnswer("c) Brasil");
// Continuar com outras respostas...
