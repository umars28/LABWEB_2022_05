var number = prompt ("Perkalian Berapa?");
var multi    = prompt("Ingin Dikalikan Sampai Berapa?");
var hasil;
var hasil_perkalian = 0;

for (i=1; i<= multi; i++){
    hasil = number * i;
    hasil_perkalian += hasil;
    console.log(number + "x" + i + "=" + hasil);
    

    }
console.log("Hasil seluruh perkalian = " + hasil_perkalian);

