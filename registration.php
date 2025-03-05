<?php 


require "Backend/functions.php";

if( isset( $_POST["daftar"])){
    if( tambah($_POST) > 0){
        header("Location: success.php");
    } else {
        echo "
            <script>
                alert('Data Gagagl Ditambahkan');
                document.location.href = 'registration.php';
            </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Indonesian Plastic Recyclers</title>
    <link rel="stylesheet" href="registration.css?version=12345" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="navbar" id="navbar">
      <div class="containerNav">
        <a href="/index.html">
          <img src="assets/logoNavbar.png" alt="iprLogo" />
        </a>
        <button id="hamburger-menu" class="hamburger-menu">
          <img src="assets/button.png" alt="" />
        </button>
        <nav class="nav-menu" id="nav-menu">
          <div class="navmenu-img">
            <img src="assets/logoNavbar.png" alt="iprLogo" />
          </div>
          <ul>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#member">Keanggotaan</a></li>
            <li><a href="#contact-us">Hubungi Kami</a></li>
            <li><a href="/gallery.html">Galeri</a></li>
          </ul>
          <a href="" class="translateBTN">Translate</a>
        </nav>
      </div>
    </header>

    <!-- Second Form: Detail Organisasi -->\

    <section class="formSection">
      <form method="post" class="container" enctype="multipart/form-data">
        <h1 class="title">Indonesian Plastic Recyclers</h1>
        <p class="descText">Form pendaftaran keanggotaan</p>

        <h2 class="heading2">Detail Organisasi</h2>

        <div class="form-group">
          <label for="nama-organisasi">Nama Organisasi/Perusahaan</label>
          <input type="text" id="nama-organisasi" name="nama-organisasi" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="nama-lain">Nama Lain (Initial)</label>
          <input type="text" id="nama-lain" name="nama-lain" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" name="alamat" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" id="kota" name="kota" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="kode-pos">Kode Pos</label>
          <input type="text" id="kode-pos" name="kode-pos" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="no-ponsel">No. Ponsel</label>
          <input type="text" id="no-ponsel" name="no-ponsel" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Placeholder" />
          <div class="helper-text">Wajib diisi</div>
        </div>

        <div>
          <h2 class="heading2">Detail Penanggung Jawab</h2>

          <div class="form-group">
            <label for="nama-lengkap">Nama Lengkap</label>
            <input type="text" id="nama-lengkap" name="nama-lengkap" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="tempat-lahir">Tempat Lahir</label>
            <input type="text" id="tempat-lahir" name="tempat-lahir" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="tanggal-lahir">Tanggal Lahir</label>
            <input type="text" id="tanggal-lahir" name="tanggal-lahir" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="no-ktp">No. KTP</label>
            <input type="text" id="no-ktp" name="no-ktp" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="no-ponsel-penanggung">No. Ponsel</label>
            <input
              type="text"
              id="no-ponsel-penanggung"
              name="no-ponsel-penanggung"
              placeholder="Placeholder"
            />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="email-penanggung">Email</label>
            <input
              type="email"
              id="email-penanggung"
              name="email-penanggung"
              placeholder="Placeholder"
            />
            <div class="helper-text">Wajib diisi</div>
          </div>
        </div>

        <!-- third form -->
        <div>
          <h2 class="heading2">Informasi Usaha</h2>

          <div class="form-group">
            <label for="penjelasan-bahan-limbah"
              >Penjelasan Mengenai Bahan Limbah/Organisme Pendaftar</label
            >
            <input
              type="text"
              id="penjelasan-bahan-limbah"
              name="penjelasan-bahan-limbah"
              placeholder="Placeholder"
            />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="jenis-bahan"
              >Jenis Bahan Yang Di Olah (pilihan ganda)</label
            >
            <div class="helper-text">Wajib diisi</div>

            <div style="margin-top: 10px">
              <input type="checkbox" id="pvc" name="bahan[]" value="PVC" />
              <label for="pvc" style="display: inline">PVC</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="HIPS" />
              <label for="hips" style="display: inline">HIPS</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="PS" />
              <label for="ps" style="display: inline">PS</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="PP" />
              <label for="pp" style="display: inline">PP/PP</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="LDPE" />
              <label for="ldpe" style="display: inline">LDPE</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="HDPE" />
              <label for="hdpe" style="display: inline">HDPE</label>
            </div>

            <div>
            <input type="checkbox" id="pvc" name="bahan[]" value="PET" />
              <label for="pet" style="display: inline">PET</label>
            </div>

            <div>
            <input type="text" name="bahan-other-text" placeholder="Placeholder"/>
              <label for="other" style="display: inline">Other:</label>
              <input
                type="text"
                placeholder="Placeholder"
                style="width: auto; margin-left: 5px"
              />
            </div>
          </div>

          <div class="form-group">
            <label for="kapasitas">Kapasitas Per Bulan</label>
            <input type="text" id="kapasitas" name="kapasitas" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="jumlah-tenaga-kerja">Jumlah Tenaga Kerja</label>
            <input type="text" id="jumlah-tenaga-kerja" name="jumlah-tenaga-kerja" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="produk-yang">Produk Yang Di Hasilkan</label>
            <input type="text" id="produk-yang" name="produk-yang-dihasilkan" placeholder="Placeholder" />
            <div class="helper-text">Wajib diisi</div>
          </div>

          <div class="form-group">
            <label for="filosofi-ktp">Fotocopy KTP/Perusahaan</label>
            <div class="helper-text">Wajib diisi</div>
            <label
              for="file-ktp"
              style="
                cursor: pointer;
                display: flex;
                align-items: center;
                margin-top: 10px;
                color: var(--secondaryColor);
              "
            >
              <span style="margin-right: 5px; font-size: 18px">+</span>
              Tambahkan File
            </label>
            <input
              type="file"
              id="file-ktp"
              name="file-ktp"
              accept="image/*"
              style="display: block"
            />
            <div
              id="file-ktp-name"
              style="
                margin-top: 5px;
                font-size: 14px;
                color: var(--coolGray100);
              "
            ></div>
          </div>

          <div class="form-group">
            <label for="filosofi-surat"
              >Fotocopy Surat Keterangan Domisili</label
            >
            <div class="helper-text">Wajib diisi</div>
            <label
              for="file-surat"
              style="
                cursor: pointer;
                display: flex;
                align-items: center;
                margin-top: 10px;
                color: var(--secondaryColor);
              "
            >
              <span style="margin-right: 5px; font-size: 18px">+</span>
              Tambahkan File
            </label>
            <input
              type="file"
              id="file-surat"
              name="file-surat"
              accept="image/*"
              style="display: block"
            />
            <div
              id="file-surat-name"
              style="
                margin-top: 5px;
                font-size: 14px;
                color: var(--coolGray100);
              "
            ></div>
          </div>

          <div class="form-group">
            <label for="filosofi-npwp">Fotocopy NPWP</label>
            <div class="helper-text">Wajib diisi</div>
            <label
              for="file-npwp"
              style="
                cursor: pointer;
                display: flex;
                align-items: center;
                margin-top: 10px;
                color: var(--secondaryColor);
              "
            >
              <span style="margin-right: 5px; font-size: 18px">+</span>
              Tambahkan File
            </label>
            <input
              type="file"
              id="file-npwp"
              name="file-npwp"
              accept="image/*"
              style="display: block"
            />
            <div
              id="file-npwp-name"
              style="
                margin-top: 5px;
                font-size: 14px;
                color: var(--coolGray100);
              "
            ></div>
          </div>

          <div class="form-group">
            <input
              type="checkbox"
              id="persetujuan"
              style="
                width: auto;
                display: inline-block;
                vertical-align: top;
                margin-top: 5px;
              "
            />
            <label
              for="persetujuan"
              style="
                display: inline-block;
                width: 90%;
                padding-left: 10px;
                vertical-align: top;
              "
            >
              SAYA DENGAN INI MENYETUJUAN ANDA MENGIKUTI SEGALA TATA TERTIB DAN
              PERATURAN ORGANISASI SESUAI DENGAN YANG TERTUANG PADA ANGGARAN
              DASAR (AD) DAN ANGGARAN RUMAH TANGGA (ART) SERTA ARTIKEL LAINNYA
              YANG BERLAKU. SAYA MENYATAKAN BAHWA INFORMASI YANG SAYA BERIKAN
              DALAM FORMULIR PENDAFTARAN INI ADALAH AKURAT. JIKA TERNYATA
              TERDAPAT INFORMASI YANG TIDAK BENAR ATAU MENDAPATKAN KABAR DARI
              PERUSAHAAN SAYA DAN PERUSAHAAN PIHAK LAIN, SAYA BERSEDIA DIKENAKAN
              SANKSI.
            </label>
          </div>
        </div>
        <button type="submit" class="submitBtn" name="daftar">Daftar</button>
      </form>
    </section>

  
    <footer>
      <div class="footerContainer">
        <div class="footerText">
          <p>Indonesian Plastic Recyclers @ 2025. All rights reserved.</p>
          <p>
            Created and Designed by Himpunan Mahasiswa Informatika Universitas
            Nasional.
          </p>
        </div>
        <div class="footerIcons">
          <a href="">
            <img src="assets/youtube.png" alt="" />
          </a>
          <a href="">
            <img src="assets/facebook.png" alt="" />
          </a>
          <a href="">
            <img src="assets/twitter.png" alt="" />
          </a>
          <a href="">
            <img src="assets/instagram.png" alt="" />
          </a>
          <a href="">
            <img src="assets/linkedin.png" alt="" />
          </a>
        </div>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
