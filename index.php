<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Order Minuman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f8f9fa;
      padding: 2rem;
    }
    .logo {
      width: 150px;
      margin-bottom: 1rem;
    }
    .form-section {
      background: #fff;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
    <img src="logo.png" class="logo" alt="Logo">
      <h3>Formulir Pemesanan Minuman</h3>
    </div>
    
    <form id="orderForm" class="form-section">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" id="nama" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Lengkap:</label>
        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="hp" class="form-label">No Handphone:</label>
        <input type="tel" id="hp" name="hp" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Menu Order:</label>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Jeruk Peras Murni|10000" id="item1">
          <label class="form-check-label" for="item1">Jeruk Peras Murni (Rp10.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Jeruk Peras Yakult|10000" id="item2">
          <label class="form-check-label" for="item2">Jeruk Peras Yakult (Rp10.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Jeruk Peras Madu|15000" id="item3">
          <label class="form-check-label" for="item3">Jeruk Peras Madu (Rp15.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Kopi Hitam|5000" id="item4">
          <label class="form-check-label" for="item4">Kopi Hitam (Rp5.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Kopi Susu|8000" id="item5">
          <label class="form-check-label" for="item5">Kopi Susu (Rp8.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Teh Panas|5000" id="item6">
          <label class="form-check-label" for="item6">Teh Panas (Rp5.000)</label>
        </div>
        <div class="form-check">
          <input class="form-check-input menu" type="checkbox" value="Teh Susu|8000" id="item7">
          <label class="form-check-label" for="item7">Teh Susu (Rp8.000)</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Total Harga: <span id="totalHarga">Rp0</span></label>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success">Kirim Pesanan via WhatsApp</button>
      </div>
    </form>
  </div>

  <script>
    const form = document.getElementById("orderForm");
    const menuCheckboxes = document.querySelectorAll(".menu");
    const totalDisplay = document.getElementById("totalHarga");

    function formatRupiah(angka) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0
      }).format(angka);
    }

    function updateTotal() {
      let total = 0;
      menuCheckboxes.forEach(item => {
        if (item.checked) {
          const price = parseInt(item.value.split("|")[1]);
          total += price;
        }
      });
      totalDisplay.textContent = formatRupiah(total);
    }

    menuCheckboxes.forEach(cb => cb.addEventListener("change", updateTotal));

    form.addEventListener("submit", function(e) {
      e.preventDefault();
      const nama = document.getElementById("nama").value.trim();
      const alamat = document.getElementById("alamat").value.trim();
      const hp = document.getElementById("hp").value.trim();

      let pesan = `*Pesanan Baru Minuman:*\n`;
      pesan += `Nama: ${nama}\nAlamat: ${alamat}\nHP: ${hp}\n\n`;
      pesan += `Menu:\n`;

      let total = 0;
      menuCheckboxes.forEach(item => {
        if (item.checked) {
          const [menu, harga] = item.value.split("|");
          pesan += `- ${menu} (Rp${parseInt(harga).toLocaleString()})\n`;
          total += parseInt(harga);
        }
      });

      if (total === 0) {
        Swal.fire("Oops", "Silakan pilih minimal 1 menu.", "warning");
        return;
      }

      pesan += `\nTotal: Rp${total.toLocaleString()}`;

      const encodedPesan = encodeURIComponent(pesan);
      const waUrl = `https://wa.me/6282335566505?text=${encodedPesan}`;
      window.open(waUrl, "_blank");
    });
  </script>
</body>
</html>
