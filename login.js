
// Mengambil form login dari HTML
const form = document.getElementById("loginForm");

// Mengambil tulisan "Masuk"
const buttonText = document.getElementById("buttonText");

// Mengambil tulisan "Tunggu sebentar"
const loadingText = document.getElementById("loadingText");

// Saat form dikirim
form.addEventListener("submit", function () {

  // Menyembunyikan tulisan Masuk
  buttonText.hidden = true;

  // Menampilkan tulisan Tunggu sebentar
  loadingText.hidden = false;

});

