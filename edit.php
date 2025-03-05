<?php 
require "Backend/functions.php";
session_start();
if( !isset($_SESSION["id"]) ){
    header("Location: login.php");
    exit;
} 

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];
$registration = query("SELECT * FROM registrations WHERE id = $id")[0];

// Process form submission
if(isset($_POST["daftar"])) {
    // Merge POST data with existing registration data and file paths
    $_POST['existing-ktp'] = $registration['file_ktp'];
    $_POST['existing-surat'] = $registration['file_surat_keterangan'];
    $_POST['existing-npwp'] = $registration['file_npwp'];
    
    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'edit.php?id=$id';
            </script>
        ";
    }
    exit;
}

// Prepare material types for checkboxes
$material_types = [
    'PVC' => $registration['bahan_pvc'],
    'HIPS' => $registration['bahan_hips'],
    'PS' => $registration['bahan_ps'],
    'PP' => $registration['bahan_pp'],
    'LDPE' => $registration['bahan_ldpe'],
    'HDPE' => $registration['bahan_hdpe'],
    'PET' => $registration['bahan_pet']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Registration - Indonesian Plastic Recyclers</title>
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
    <nav class="navbar1">
        <h2 class="navbar1-logo">IPR Dashboard Admin</h2>
        <?php if( isset($_SESSION["id"]) ) : ?>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php endif; ?>
    </nav>

    <section class="formSection">
        <form method="post" class="container" enctype="multipart/form-data">
            <h1 class="title">Edit Registration</h1>
            <p class="descText">Perbarui informasi keanggotaan</p>

            <h2 class="heading2">Detail Organisasi</h2>

            <div class="form-group">
                <label for="nama-organisasi">Nama Organisasi/Perusahaan</label>
                <input type="text" id="nama-organisasi" name="nama-organisasi" 
                       value="<?= htmlspecialchars($registration['nama_organisasi']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="nama-lain">Nama Lain (Initial)</label>
                <input type="text" id="nama-lain" name="nama-lain" 
                       value="<?= htmlspecialchars($registration['nama_lain']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" 
                       value="<?= htmlspecialchars($registration['alamat']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" id="kota" name="kota" 
                       value="<?= htmlspecialchars($registration['kota']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="kode-pos">Kode Pos</label>
                <input type="text" id="kode-pos" name="kode-pos" 
                       value="<?= htmlspecialchars($registration['kode_pos']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="no-ponsel">No. Ponsel</label>
                <input type="text" id="no-ponsel" name="no-ponsel" 
                       value="<?= htmlspecialchars($registration['no_ponsel']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?= htmlspecialchars($registration['email']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <h2 class="heading2">Detail Penanggung Jawab</h2>

            <div class="form-group">
                <label for="nama-lengkap">Nama Lengkap</label>
                <input type="text" id="nama-lengkap" name="nama-lengkap" 
                       value="<?= htmlspecialchars($registration['nama_lengkap']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" 
                       value="<?= htmlspecialchars($registration['jabatan']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" id="tempat-lahir" name="tempat-lahir" 
                       value="<?= htmlspecialchars($registration['tempat_lahir']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <input type="text" id="tanggal-lahir" name="tanggal-lahir" 
                       value="<?= htmlspecialchars($registration['tanggal_lahir']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="no-ktp">No. KTP</label>
                <input type="text" id="no-ktp" name="no-ktp" 
                       value="<?= htmlspecialchars($registration['no_ktp']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="no-ponsel-penanggung">No. Ponsel</label>
                <input type="text" id="no-ponsel-penanggung" name="no-ponsel-penanggung" 
                       value="<?= htmlspecialchars($registration['no_ponsel_penanggung']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="email-penanggung">Email</label>
                <input type="email" id="email-penanggung" name="email-penanggung" 
                       value="<?= htmlspecialchars($registration['email_penanggung']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <h2 class="heading2">Informasi Usaha</h2>

            <div class="form-group">
                <label for="penjelasan-bahan-limbah">Penjelasan Mengenai Bahan Limbah/Organisme Pendaftar</label>
                <input type="text" id="penjelasan-bahan-limbah" name="penjelasan-bahan-limbah" 
                       value="<?= htmlspecialchars($registration['penjelasan_bahan_limbah']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="jenis-bahan">Jenis Bahan Yang Di Olah (pilihan ganda)</label>
                <div class="helper-text">Wajib diisi</div>

                <?php foreach($material_types as $type => $checked): ?>
                <div>
                    <input type="checkbox" id="<?= strtolower($type) ?>" name="bahan[]" 
                           value="<?= $type ?>" <?= $checked ? 'checked' : '' ?> />
                    <label for="<?= strtolower($type) ?>" style="display: inline"><?= $type ?></label>
                </div>
                <?php endforeach; ?>

                <div>
                    <input type="text" name="bahan-other-text" placeholder="Placeholder"
                           value="<?= htmlspecialchars($registration['bahan_other_text'] ?? '') ?>" />
                    <label for="other" style="display: inline">Other:</label>
                </div>
            </div>

            <div class="form-group">
                <label for="kapasitas">Kapasitas Per Bulan</label>
                <input type="text" id="kapasitas" name="kapasitas" 
                       value="<?= htmlspecialchars($registration['kapasitas']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="jumlah-tenaga-kerja">Jumlah Tenaga Kerja</label>
                <input type="text" id="jumlah-tenaga-kerja" name="jumlah-tenaga-kerja" 
                       value="<?= htmlspecialchars($registration['jumlah_tenaga_kerja']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <div class="form-group">
                <label for="produk-yang">Produk Yang Di Hasilkan</label>
                <input type="text" id="produk-yang" name="produk-yang-dihasilkan" 
                       value="<?= htmlspecialchars($registration['produk_yang_dihasilkan']) ?>" placeholder="Placeholder" required />
                <div class="helper-text">Wajib diisi</div>
            </div>

            <!-- File upload sections with existing file preview -->
            <div class="form-group">
                <label for="filosofi-ktp">Fotocopy KTP/Perusahaan</label>
                <div class="helper-text">Wajib diisi</div>
                <?php if(!empty($registration['file_ktp'])): ?>
                    <div style="margin-bottom: 10px;">
                        <strong>Existing File:</strong> 
                        <a href="<?= htmlspecialchars($registration['file_ktp']) ?>" target="_blank">View Current KTP</a>
                    </div>
                <?php endif; ?>
                <label for="file-ktp" style="cursor: pointer; display: flex; align-items: center; margin-top: 10px; color: var(--secondaryColor);">
                    <span style="margin-right: 5px; font-size: 18px">+</span>
                    Ganti File
                </label>
                <input type="file" id="file-ktp" name="file-ktp" accept="image/*" style="display: block" />
            </div>

            <!-- Similar sections for Surat Keterangan and NPWP -->
            <div class="form-group">
                <label for="filosofi-surat">Fotocopy Surat Keterangan Domisili</label>
                <div class="helper-text">Wajib diisi</div>
                <?php if(!empty($registration['file_surat_keterangan'])): ?>
                    <div style="margin-bottom: 10px;">
                        <strong>Existing File:</strong> 
                        <a href="<?= htmlspecialchars($registration['file_surat_keterangan']) ?>" target="_blank">View Current Surat Keterangan</a>
                    </div>
                <?php endif; ?>
                <label for="file-surat" style="cursor: pointer; display: flex; align-items: center; margin-top: 10px; color: var(--secondaryColor);">
                    <span style="margin-right: 5px; font-size: 18px">+</span>
                    Ganti File
                </label>
                <input type="file" id="file-surat" name="file-surat" accept="image/*" style="display: block" />
            </div>

            <div class="form-group">
                <label for="filosofi-npwp">Fotocopy NPWP</label>
                <div class="helper-text">Wajib diisi</div>
                <?php if(!empty($registration['file_npwp'])): ?>
                    <div style="margin-bottom: 10px;">
                        <strong>Existing File:</strong> 
                        <a href="<?= htmlspecialchars($registration['file_npwp']) ?>" target="_blank">View Current NPWP</a>
                    </div>
                <?php endif; ?>
                <label for="file-npwp" style="cursor: pointer; display: flex; align-items: center; margin-top: 10px; color: var(--secondaryColor);">
                    <span style="margin-right: 5px; font-size: 18px">+</span>
                    Ganti File
                </label>
                <input type="file" id="file-npwp" name="file-npwp" accept="image/*" style="display: block" />
            </div>

            <div class="form-group">
                <input type="checkbox" id="persetujuan" name="persetujuan" 
                       style="width: auto; display: inline-block; vertical-align: top; margin-top:5px;" checked />
            <label for="persetujuan" style="display: inline-block; width: 90%; padding-left: 10px; vertical-align: top;">
                SAYA DENGAN INI MENYETUJUAN ANDA MENGIKUTI SEGALA TATA TERTIB DAN PERATURAN ORGANISASI SESUAI DENGAN YANG TERTUANG PADA ANGGARAN DASAR (AD) DAN ANGGARAN RUMAH TANGGA (ART) SERTA ARTIKEL LAINNYA YANG BERLAKU. SAYA MENYATAKAN BAHWA INFORMASI YANG SAYA BERIKAN DALAM FORMULIR PENDAFTARAN INI ADALAH AKURAT. JIKA TERNYATA TERDAPAT INFORMASI YANG TIDAK BENAR ATAU MENDAPATKAN KABAR DARI PERUSAHAAN SAYA DAN PERUSAHAAN PIHAK LAIN, SAYA BERSEDIA DIKENAKAN SANKSI.
            </label>
        </div>

        <!-- Hidden input to pass the registration ID for update -->
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <button type="submit" class="submitBtn" name="daftar">Perbarui</button>
    </form>
</section>

<!-- <footer>
    <div class="footerContainer">
        <div class="footerText">
            <p>Indonesian Plastic Recyclers @ 2025. All rights reserved.</p>
            <p>
                Created and Designed by Himpunan Mahasiswa Informatika Universitas Nasional.
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
</footer> -->
<script src="script.js"></script>
</body>
</html>