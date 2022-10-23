var nama = prompt('Masukkan nama Anda');
console.log(nama);
switch(nama) {
    case '':
    console.log('Masukkan Nama Anda Terlebih Dahulu');
    break;
}
var Pertanyaan1 = prompt('Sudah Mengumpulkan Tugas Praktikum ? Yes atau No')
switch(Pertanyaan1) {
    case 'Yes':
        var Pertanyaan2 = prompt('Ikut Asistensi ? Yes atau No');
        switch(Pertanyaan2) {
            case 'Yes':
                var angka = prompt('Sudah Berapa Kali Asistensi ? 1 atau 2');
                if (angka == 1){
                    console.log('Asistensi Sekali lagi ya ' + nama);
                }else if ('2' == 2){
                    console.log('Hebat Kamu ' + nama);
                }
                break;
            case 'No':
                console.log('Asistensi Dulu Ya ' + nama);
                break;
        }
        break;
    case 'No':
        console.log('Jangan lupa di kerja tugas praktikumnya');   
        break;
    default :
    console.log('Masukkan input yang benar yaitu Yes atau No');
    break;
}
