<?php 
require "Backend/functions.php";
session_start();
if( !isset($_SESSION["id"]) ){
    header("Location: login.php");
    exit;
} 

// Get search query if it exists
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Use the search function if search query exists, otherwise get all registrations
if(!empty($search)) {
    $registrations = searchRegistrations($search);
} else {
    $registrations = query("SELECT * FROM registrations");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?version=12345">
</head>
<body>
    <nav class="navbar">
        <h2 class="navbar-logo">IPR Dashboard Admin</h2>
        <?php if( isset($_SESSION["id"]) ) : ?>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php endif; ?>
    </nav>
    <div class="container">
        <div class="header">
            <h1>User Management Dashboard</h1>
        </div>
        
        <!-- Search Bar -->
        <div class="search-container">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Search by name, organization, or email..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="search-btn">Search</button>
                <?php if(!empty($search)): ?>
                    <a href="dashboard.php" class="reset-btn">Reset</a>
                <?php endif; ?>
            </form>
        </div>
        
        <!-- Search results info -->
        <?php if(!empty($search)): ?>
        <div class="search-results">
            <p>Showing results for: "<?= htmlspecialchars($search) ?>" (<?= count($registrations) ?> results found)</p>
        </div>
        <?php endif; ?>
        
        <div class="table-container">
            <?php if(count($registrations) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama Organisasi/Perusahaan</th>
                        <th>Nama Lengkap</th>
                        <th>Penjelasan Mengenai Badan Usaha</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $registrations as $registration ) : ?>
                        <tr>
                            <td><?= $registration["nama_organisasi"] ?></td>
                            <td><?= $registration["nama_lengkap"] ?></td>
                            <td><?= $registration["penjelasan_bahan_limbah"] ?></td>
                            <td><button class="btn btn-primary" onclick="openModal(<?= $registration["id"] ?>)">View Details</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="no-results">
                <p>No registrations found matching your search criteria.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- User details modals -->
    <?php foreach( $registrations as $registration ) : ?>
        <div id="modal-<?= $registration["id"] ?>" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail Pendaftar</h2>
                    <span class="close" onclick="closeModal('modal-<?= $registration["id"] ?>')">&times;</span>
                </div>
                <div class="modal-body">
                    <h3>Detail Organisasi</h3>
                    <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> <?= $registration["nama_organisasi"] ?></div>
                    <div class="user-detail"><strong>Nama Lain (Initial):</strong> <?= $registration["nama_lain"] ?></div>
                    <div class="user-detail"><strong>Alamat:</strong> <?= $registration["alamat"] ?></div>
                    <div class="user-detail"><strong>Kota:</strong> <?= $registration["kota"] ?></div>
                    <div class="user-detail"><strong>Kode Pos:</strong> <?= $registration["kode_pos"] ?></div>
                    <div class="user-detail"><strong>No. Ponsel:</strong> <?= $registration["no_ponsel"] ?></div>
                    <div class="user-detail"><strong>Email:</strong> <?= $registration["email"] ?></div>
                    
                    <h3>Detail Penanggung Jawab</h3>
                    <div class="user-detail"><strong>Nama Lengkap:</strong> <?= $registration["nama_lengkap"] ?></div>
                    <div class="user-detail"><strong>Jabatan:</strong> <?= $registration["jabatan"] ?></div>
                    <div class="user-detail"><strong>Tempat Lahir:</strong> <?= $registration["tempat_lahir"] ?></div>
                    <div class="user-detail"><strong>Tanggal Lahir:</strong> <?= $registration["tanggal_lahir"] ?></div>
                    <div class="user-detail"><strong>No. KTP:</strong> <?= $registration["no_ktp"] ?></div>
                    <div class="user-detail"><strong>No. Ponsel:</strong> <?= $registration["no_ponsel_penanggung"] ?></div>
                    <div class="user-detail"><strong>Email:</strong> <?= $registration["email_penanggung"] ?></div>
                    
                    <h3>Informasi Usaha</h3>
                    <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> <?= $registration["penjelasan_bahan_limbah"] ?></div>
                    <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PET, HDPE, PP</div>
                    <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> <?= $registration["kapasitas"] ?></div>
                    <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> <?= $registration["jumlah_tenaga_kerja"] ?></div>
                    <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> <?= $registration["produk_yang_dihasilkan"] ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <script>
        // Function to open the modal
        function openModal(modalId) {
            document.getElementById('modal-' + modalId).style.display = 'flex';
        }
        
        // Function to close the modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>