var canHit = true;
const startingCard = 2;
var startingMoney = 5000;

// untuk kasi hilang menu klo sdh ditekan start game


function gantiLayout() {
    const close = document.getElementById('menulah');
    const tombolna = document.getElementById('tombolji');
    close.addEventListener('click',function () {
    close.style.display = 'none'; 
    });
}

function startGame1() {
    gantiLayout();
}
function startGame() {
    gantiLayout();
    buildDeck();
    kasiMasukSumCards();

}

// function ketika window diload
window.onload= function(){
    findCard();
}

// cari nilai dari kartu
function findCard() {
    const listNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
    for (let i = 0; i < listNum.length; i++) {
    var card = Math.floor(Math.random() * listNum.length);
    }
    return card;
}
    var card = findCard();
    data = [];
    for (let i =0; i < startingCard; i++){
        var isi = findCard();
        data.push(isi);
    }
    console.log(data);

    var str1 = data.join(' ');

// untuk kasih masuk nilai dari kartuna dan kasi muncul di yourcards
function buildDeck() {
    const parentDariYourCards = document.getElementsByClassName('d-flex')[3];
    const newCard = document.createElement('div');
    newCard.setAttribute('class','p-2');
    const valueCard = document.createTextNode(str1); 
    // ^ ini nanti diisi dengan valuecardnya
    newCard.appendChild(valueCard);
    parentDariYourCards.appendChild(newCard);
}

document.getElementById('takeCard').addEventListener('click',tampilanTakeCard);

function tampilanTakeCard() {
    if (!canHit) {
        return;
    }
    const parentDariYourCards = document.getElementsByClassName('d-flex')[3];
    const newCard = document.createElement('div');
    newCard.setAttribute('class','p-2');
    var newValue = findCard();
    var valueCardygdiketik = document.createTextNode(newValue); 
    newCard.appendChild(valueCardygdiketik);
    parentDariYourCards.appendChild(newCard);
    // return newValue;
}

var newValue = tampilanTakeCard();

function nilaiJikaTakeCard() {
    data.push(newValue);
    return data;
}

var sumSetelahAmbilKartu = nilaiJikaTakeCard();
console.log(sumSetelahAmbilKartu);

function kasiMasukSumCards() {
    const parentDariYourCards = document.getElementsByClassName('d-flex')[4];
    const newCard = document.createElement('div');
    newCard.setAttribute('class','p-2');
    var valueCardygdiketik = document.createTextNode(jumlahNilai); 
    newCard.appendChild(valueCardygdiketik);
    parentDariYourCards.appendChild(newCard);
}

function sumCards(params) {
    var sum = 0;
    for (let i = 0; i < data.length; i++) {
        sum += data[i]; 
    }
    return sum;
}
// var jumlahNilai = sumCards();
document.getElementById('restart').addEventListener('click',restart);