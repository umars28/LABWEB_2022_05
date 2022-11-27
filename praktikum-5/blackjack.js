
var dealerSum = 0;
var yourSum = 0;

var dealerAceCount = 0;
var yourAceCount = 0;

var hidden;
var deck;

var canHit = true;
var canStart = true;


function hideMenu() {
    const slcttombol = document.getElementById('startButton');
    const slctParent = document.getElementsByClassName('menuStyle')[0];
    slctParent.setAttribute('id','hideMenu');   
}

window.onload = function() {
    buildDeck();
    shuffleDeck();
    startGame();
}

function buildDeck() {
    let values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];
    let types = ["C", "D", "H", "S"];
    deck = [];

    for (let i = 0; i < types.length; i++) {
        for (let j = 0; j < values.length; j++) {
            deck.push(values[j] + "-" + types[i]);
        }
    }
    // console.log(deck);
}

function shuffleDeck() {
    for (let i = 0; i < deck.length; i++) {
        let j = Math.floor(Math.random() * deck.length);
        let temp = deck[i];
        deck[i] = deck[j];
        deck[j] = temp;
    }

}

function startGame() {
    // if (!canStart) {
    //     return
    // }
    hidden = deck.pop();
    dealerSum += getValue(hidden);
    dealerAceCount += checkAce(hidden);

    while (dealerSum < 15) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        dealerSum += getValue(card);
        dealerAceCount += checkAce(card);
        document.getElementById("dealer-cards").append(cardImg);
    }
    console.log(dealerSum);

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = deck.pop();
        cardImg.src = "./cards/" + card + ".png";
        yourSum += getValue(card);
        yourAceCount += checkAce(card);
        document.getElementById("your-cards").append(cardImg);
    }

    document.getElementById("your-sum").innerText = yourSum;
    document.getElementById("hit").addEventListener("click", hit);
    document.getElementById("stay").addEventListener("click", stay);

}

function hit() {
    if (!canHit) {
        return;
    }

    let cardImg = document.createElement("img");
    let card = deck.pop();
    cardImg.src = "./cards/" + card + ".png";
    yourSum += getValue(card);
    yourAceCount += checkAce(card);
    document.getElementById("your-cards").append(cardImg);
    document.getElementById("your-sum").innerText = yourSum;

    if (reduceAce(yourSum, yourAceCount) >= 21) {
        canHit = false;
    }

}

function stay() {
    dealerSum = reduceAce(dealerSum, dealerAceCount);
    yourSum = reduceAce(yourSum, yourAceCount);

    canHit = false;
    document.getElementById("hidden").src = "./cards/" + hidden + ".png";

    let message = "";
    if (yourSum > 21) {
        message = "You Lose!";
        PopUP();
        
    }
    else if (dealerSum > 21) {
        message = "You win!";
        PopUP();
    }
    else if (yourSum == dealerSum) {
        message = "Tie!";
        PopUP();
    }
    else if (yourSum > dealerSum) {
        message = "You Win!";
        PopUP();
    }
    else if (yourSum < dealerSum) {
        message = "You Lose!";
        PopUP();
    }
    else if (yourSum == 21){
        message = 'BlackJack';
        PopUP();
    }

    document.getElementById("dealer-sum").innerText = dealerSum;
    document.getElementById("your-sum").innerText = yourSum;
    document.getElementById("results").innerText = message;
}

function getValue(card) {
    let data = card.split("-");
    let value = data[0];

    if (isNaN(value)) {
        if (value == "A") {
            return 11;
        }
        return 10;
    }
    return parseInt(value);
}

function checkAce(card) {
    if (card[0] == "A") {
        return 1;
    }
    return 0;
}

function reduceAce(playerSum, playerAceCount) {
    while (playerSum > 21 && playerAceCount > 0) {
        playerSum -= 10;
        playerAceCount -= 1;
    }
    return playerSum;
}

function ambilBet() {
    const form = document.getElementById('iniForm');
    form.addEventListener('submit',(e) => {
        e.preventDefault();
        betSistem();
    });
}

function betSistem() {
    const valueBet = document.getElementById('bet');
    var teset = valueBet.value;
    // if (!isNaN(valueBet)){
    //     return;
    // }
    var value = parseInt(teset);
    var startingMoney = 5000;
    var sisaUang = startingMoney - value;
    console.log(sisaUang);


    const slctParent = document.getElementsByClassName('col')[1];
    const buatElementSisaUang = document.createElement('h6');
    const isiDariElementDiAtas = document.createTextNode(sisaUang);
    buatElementSisaUang.appendChild(isiDariElementDiAtas);
    slctParent.appendChild(buatElementSisaUang);

    // else {
    //     alert('Please Input a Valid Number');
    //     canStart = false;
    // }

}

function PopUP() {
    const slctParent = document.getElementsByClassName('confirmLayout')[0];
    slctParent.setAttribute('id','popUpConfirm'); 
}
// function buttonYes() {
//     reload();
// }

// // function buttonNo() {
// //     window.onload = function() {
// //         buildDeck();
// //         shuffleDeck();
// //         startGame();
// //     }
// // }