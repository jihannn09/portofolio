// ================= EFEK SAAT DIKLIK =================

const bentuk = [
  "✦",
  "✿",
  "♡",
  "❀"
];


document.addEventListener(
  "click",
  function(event) {

    const efek =
      document.createElement("span");

    efek.textContent =
      bentuk[
        Math.floor(
          Math.random() * bentuk.length
        )
      ];

    efek.style.position = "fixed";
    efek.style.left =
      event.clientX + "px";
    efek.style.top =
      event.clientY + "px";

    efek.style.pointerEvents = "none";
    efek.style.zIndex = "9999";

    efek.style.color = "#d99bad";
    efek.style.fontSize = "18px";

    efek.style.transform =
      "translate(-50%, -50%)";

    efek.style.transition =
      "all .7s ease";

    document.body.appendChild(efek);


    // Animasi
    requestAnimationFrame(() => {

      efek.style.opacity = "0";

      efek.style.transform =
        "translate(-50%, -100%) scale(1.4)";

    });


    // Hapus
    setTimeout(() => {

      efek.remove();

    }, 700);

  }
);

// ================= KURSOR BUNGA =================

const cursor = document.createElement("div");

cursor.className = "kursor-lucu";

document.body.appendChild(cursor);

document.addEventListener("mousemove", function(e) {

  cursor.style.left = e.clientX + "px";
  cursor.style.top = e.clientY + "px";

});

// Bunga & love
const tempat = document.getElementById("hiasan-jatuh");
const hapus = document.getElementById("hapusHiasan");

const pilihan = [
  ["🌸", "#f3a9bd"],
  ["✿", "#f6b6c8"],
  ["❀", "#f5b88f"],
  ["♡", "#e9a6b8"],
  ["♥", "#ed9eae"],
  ["🌼", "#f3d58a"]
];

let aktif = true;


// Membuat bunga
setInterval(() => {

  if (!aktif) return;

  const bunga = document.createElement("span");

  const pilih =
    pilihan[Math.floor(Math.random() * pilihan.length)];

  bunga.className = "hiasan";
  bunga.textContent = pilih[0];
  bunga.style.color = pilih[1];

  bunga.style.left =
    Math.random() * 100 + "vw";

  bunga.style.fontSize =
    Math.random() * 8 + 12 + "px";

  tempat.appendChild(bunga);

  setTimeout(() => {
    bunga.remove();
  }, 8000);

}, 2000);


// Tombol hapus
hapus.addEventListener("click", () => {

  aktif = !aktif;

  tempat.innerHTML = "";

  hapus.textContent =
    aktif ? "🧹" : "🌸";

});