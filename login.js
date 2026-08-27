// ================= TOMBOL MASUK =================

const tombol =
  document.getElementById("loginButton");

const tulisan =
  document.getElementById("buttonText");

const tunggu =
  document.getElementById("loadingText");


tombol.addEventListener(
  "click",
  function() {

    // Tombol tidak bisa ditekan lagi
    tombol.disabled = true;

    // Ganti tulisan tombol
    tulisan.hidden = true;

    tunggu.hidden = false;


    // Tunggu sebentar
    setTimeout(
      function() {

        window.location.href =
          "index.html";

      },
      1200
    );

  }
);


// ================= BUNGA =================

const tempatBunga =
  document.getElementById("flowers");


function buatBunga() {

  const bunga =
    document.createElement("span");

  bunga.classList.add("flower");


  const pilihan = [
    "✿",
    "❀",
    "✾",
    "🌸"
  ];


  bunga.textContent =
    pilihan[
      Math.floor(
        Math.random() * pilihan.length
      )
    ];


  bunga.style.left =
    Math.random() * 100 + "vw";


  bunga.style.fontSize =
    Math.random() * 15 + 13 + "px";


  const durasi =
    Math.random() * 5 + 6;


  bunga.style.animationDuration =
    durasi + "s, " +
    (Math.random() * 2 + 2) + "s";


  tempatBunga.appendChild(bunga);


  setTimeout(
    function() {

      bunga.remove();

    },
    durasi * 1000
  );

}


setInterval(
  buatBunga,
  700
);