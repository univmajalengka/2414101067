function validasi(){
    let nama = document.getElementById('nama');
    let hp = document.getElementById('hp');
    let tanggal = document.getElementById('tanggal');
    let hari = document.getElementById('hari');
    let peserta = document.getElementById('peserta');
    let layanan = document.querySelectorAll('.layanan:checked');

    if(
        nama.value === "" ||
        hp.value === "" ||
        tanggal.value === "" ||
        hari.value === "" ||
        peserta.value === ""
    ){
        alert("Semua data form pemesanan wajib diisi!");
        return false;
    }

    if(layanan.length === 0){
        alert("Silakan pilih minimal satu pelayanan paket wisata!");
        return false;
    }

    return true;
}

function hitung(){
    let layanan = document.querySelectorAll('.layanan:checked');
    let harga = 0;

    layanan.forEach(l => harga += parseInt(l.value));

    let hari = document.getElementById('hari').value;
    let peserta = document.getElementById('peserta').value;

    document.getElementById('harga').value = harga;
    document.getElementById('total').value = harga * hari * peserta;
}
