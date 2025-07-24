<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Order Minuman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
  <style>
    body { padding: 20px; }
    .logo { max-height: 80px; }
    .form-section { max-width: 600px; margin: auto; }
  </style>
</head>
<body>

<div class="text-center mb-4">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="logo" alt="Logo">
  <h2>Formulir Pemesanan</h2>
</div>

<div class="form-section">
  <form id="orderForm">
    <div class="mb-2">
      <label>Nama:</label>
      <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="mb-2">
      <label>Alamat Lengkap:</label>
      <textarea class="form-control" name="alamat" required></textarea>
    </div>
    <div class="mb-2">
      <label>No Handphone:</label>
      <input type="tel" class="form-control" name="nohp" required>
    </div>

    <div class="mb-3">
      <label><strong>Pilih Menu:</strong></label><br>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="10000" value="Jeruk Peras Murni" id="menu1">
        <label class="form-check-label" for="menu1">Jeruk Peras Murni (Rp10.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="10000" value="Jeruk Peras Yakult" id="menu2">
        <label class="form-check-label" for="menu2">Jeruk Peras Yakult (Rp10.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="15000" value="Jeruk Peras Madu" id="menu3">
        <label class="form-check-label" for="menu3">Jeruk Peras Madu (Rp15.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="5000" value="Kopi Hitam" id="menu4">
        <label class="form-check-label" for="menu4">Kopi Hitam (Rp5.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="8000" value="Kopi Susu" id="menu5">
        <label class="form-check-label" for="menu5">Kopi Susu (Rp8.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="5000" value="Teh Panas" id="menu6">
        <label class="form-check-label" for="menu6">Teh Panas (Rp5.000)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input menu" type="checkbox" data-harga="8000" value="Teh Susu" id="menu7">
        <label class="form-check-label" for="menu7">Teh Susu (Rp8.000)</label>
      </div>
    </div>

    <div class="mb-3">
      <label><strong>Total: </strong></label>
      <span id="total">Rp 0</span>
    </div>

    <button type="submit" class="btn btn-success">Order Sekarang</button>
  </form>

  <div class="mt-4 d-none" id="strukArea">
    <h5>QR Code Struk:</h5>
    <div id="qrcode"></div>
    <button onclick="window.print()" class="btn btn-secondary mt-2">Cetak Struk</button>
  </div>
</div>

<script>
const scriptURL = "https://script.google.com/macros/s/AKfycbxdEXX67lHXpRFK0hX0HFCJkaG-hme25czDtgOtMXitmTe0Sq9rNBtRqq9CNxDsSDPl/exec";

const form = document.getElementById('orderForm');
const totalSpan = document.getElementById('total');
let total = 0;

document.querySelectorAll(".menu").forEach(item => {
  item.addEventListener('change', () => {
    total = 0;
    document.querySelectorAll(".menu:checked").forEach(chk => {
      total += parseInt(chk.getAttribute("data-harga"));
    });
    totalSpan.textContent = "Rp " + total.toLocaleString("id-ID");
  });
});

form.addEventListener('submit', e => {
  e.preventDefault();

  const nama = form.nama.value;
  const alamat = form.alamat.value;
  const nohp = form.nohp.value;
  const checkedMenus = Array.from(document.querySelectorAll(".menu:checked"));
  if (checkedMenus.length === 0) {
    Swal.fire("Menu belum dipilih", "Silakan pilih minimal satu menu.", "warning");
    return;
  }

  const pesanan = checkedMenus.map(chk => chk.value);
  const dataToSend = {
    nama, alamat, nohp, pesanan, total
  };

  fetch(scriptURL, {
    method: "POST",
    body: JSON.stringify(dataToSend),
    headers: {
      "Content-Type": "application/json"
    }
  })
  .then(res => res.json())
  .then(result => {
    if (result.result === "success") {
      const pesan = `Halo, saya ingin order:\n\nNama: ${nama}\nAlamat: ${alamat}\nNo HP: ${nohp}\nPesanan:\n- ${pesanan.join("\n- ")}\nTotal: Rp ${total.toLocaleString("id-ID")}`;
      const urlWA = `https://wa.me/6282335566505?text=${encodeURIComponent(pesan)}`;
      Swal.fire({
        title: "Berhasil!",
        text: "Data berhasil dikirim ke Google Sheets & WhatsApp",
        icon: "success",
        showCancelButton: true,
        confirmButtonText: "Kirim WA",
        cancelButtonText: "Tutup"
      }).then((res) => {
        if (res.isConfirmed) {
          window.open(urlWA, "_blank");
        }
      });

      // tampilkan QR Code
      document.getElementById("strukArea").classList.remove("d-none");
      document.getElementById("qrcode").innerHTML = "";
      new QRCode(document.getElementById("qrcode"), {
        text: pesan,
        width: 200,
        height: 200
      });

      form.reset();
      total = 0;
      totalSpan.textContent = "Rp 0";
    } else {
      Swal.fire("Gagal menyimpan data", "Coba lagi.", "error");
    }
  })
  .catch(err => {
    console.error(err);
    Swal.fire("Gagal menyimpan data", "Coba lagi.", "error");
  });
});
</script>

</body>
</html>
