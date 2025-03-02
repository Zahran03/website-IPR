<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?version=12345">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>User Management Dashboard</h1>
        </div>
        
        <div class="table-container">
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
                    <tr>
                        <td>PT Recycling Prima</td>
                        <td>John Smith</td>
                        <td>Perusahaan daur ulang plastik dengan fokus pada PET dan HDPE</td>
                        <td><button class="btn btn-primary" onclick="openModal('user001')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>CV Plastik Jaya</td>
                        <td>Sarah Johnson</td>
                        <td>Perusahaan pengolahan limbah plastik untuk produk rumah tangga</td>
                        <td><button class="btn btn-primary" onclick="openModal('user002')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>PT EcoBumi Indonesia</td>
                        <td>Mike Roberts</td>
                        <td>Perusahaan daur ulang dengan kapasitas 50 ton/bulan</td>
                        <td><button class="btn btn-primary" onclick="openModal('user003')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>GreenPlastic Solutions</td>
                        <td>Emma Wilson</td>
                        <td>Startup inovasi daur ulang limbah plastik menjadi bahan bakar</td>
                        <td><button class="btn btn-primary" onclick="openModal('user004')">View Details</button></td>
                    </tr>
                    <tr>
                        <td>PT Daur Ulang Nusantara</td>
                        <td>David Chen</td>
                        <td>Perusahaan pengolahan limbah plastik dengan 120 pekerja</td>
                        <td><button class="btn btn-primary" onclick="openModal('user005')">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- User details modals -->
    <div id="user001" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pendaftar</h2>
                <span class="close" onclick="closeModal('user001')">&times;</span>
            </div>
            <div class="modal-body">
                <h3>Detail Organisasi</h3>
                <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> PT Recycling Prima</div>
                <div class="user-detail"><strong>Nama Lain (Initial):</strong> RP</div>
                <div class="user-detail"><strong>Alamat:</strong> Jl. Industri No. 123, Kawasan Industri Pulogadung</div>
                <div class="user-detail"><strong>Kota:</strong> Jakarta Timur</div>
                <div class="user-detail"><strong>Kode Pos:</strong> 13920</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 812-1234-5678</div>
                <div class="user-detail"><strong>Email:</strong> info@recyclingprima.co.id</div>
                
                <h3>Detail Penanggung Jawab</h3>
                <div class="user-detail"><strong>Nama Lengkap:</strong> John Smith</div>
                <div class="user-detail"><strong>Jabatan:</strong> Direktur Utama</div>
                <div class="user-detail"><strong>Tempat Lahir:</strong> Jakarta</div>
                <div class="user-detail"><strong>Tanggal Lahir:</strong> 15 Januari 1980</div>
                <div class="user-detail"><strong>No. KTP:</strong> 3175********1234</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 812-8765-4321</div>
                <div class="user-detail"><strong>Email:</strong> john.smith@recyclingprima.co.id</div>
                
                <h3>Informasi Usaha</h3>
                <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> Perusahaan daur ulang plastik dengan fokus pada PET dan HDPE</div>
                <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PET, HDPE, PP</div>
                <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> 100 ton</div>
                <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> 75 orang</div>
                <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis ipsam natus soluta dolorem aliquam similique consectetur quia ratione! Veniam laboriosam repellendus, fugit velit aut atque, consectetur impedit adipisci excepturi quae tenetur debitis error voluptate? Autem ducimus vel, nostrum rerum at blanditiis debitis, temporibus facilis sequi expedita sapiente? Fuga, assumenda at.</div>
            </div>
        </div>
    </div>
    
    <div id="user002" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pendaftar</h2>
                <span class="close" onclick="closeModal('user002')">&times;</span>
            </div>
            <div class="modal-body">
                <h3>Detail Organisasi</h3>
                <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> CV Plastik Jaya</div>
                <div class="user-detail"><strong>Nama Lain (Initial):</strong> PJ</div>
                <div class="user-detail"><strong>Alamat:</strong> Jl. Raya Bogor Km 30</div>
                <div class="user-detail"><strong>Kota:</strong> Bogor</div>
                <div class="user-detail"><strong>Kode Pos:</strong> 16610</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 813-2345-6789</div>
                <div class="user-detail"><strong>Email:</strong> info@plastikjaya.com</div>
                
                <h3>Detail Penanggung Jawab</h3>
                <div class="user-detail"><strong>Nama Lengkap:</strong> Sarah Johnson</div>
                <div class="user-detail"><strong>Jabatan:</strong> Manager Produksi</div>
                <div class="user-detail"><strong>Tempat Lahir:</strong> Bogor</div>
                <div class="user-detail"><strong>Tanggal Lahir:</strong> 12 Maret 1985</div>
                <div class="user-detail"><strong>No. KTP:</strong> 3271********5678</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 813-9876-5432</div>
                <div class="user-detail"><strong>Email:</strong> sarah.j@plastikjaya.com</div>
                
                <h3>Informasi Usaha</h3>
                <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> Perusahaan pengolahan limbah plastik untuk produk rumah tangga</div>
                <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PP, LDPE, HDPE</div>
                <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> 75 ton</div>
                <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> 50 orang</div>
                <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> Ember, Baskom, Peralatan rumah tangga</div>
            </div>
        </div>
    </div>
    
    <div id="user003" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pendaftar</h2>
                <span class="close" onclick="closeModal('user003')">&times;</span>
            </div>
            <div class="modal-body">
                <h3>Detail Organisasi</h3>
                <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> PT EcoBumi Indonesia</div>
                <div class="user-detail"><strong>Nama Lain (Initial):</strong> EBI</div>
                <div class="user-detail"><strong>Alamat:</strong> Jl. Gatot Subroto No. 45</div>
                <div class="user-detail"><strong>Kota:</strong> Surabaya</div>
                <div class="user-detail"><strong>Kode Pos:</strong> 60271</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 812-3456-7890</div>
                <div class="user-detail"><strong>Email:</strong> contact@ecobumi.id</div>
                
                <h3>Detail Penanggung Jawab</h3>
                <div class="user-detail"><strong>Nama Lengkap:</strong> Mike Roberts</div>
                <div class="user-detail"><strong>Jabatan:</strong> Kepala Operasional</div>
                <div class="user-detail"><strong>Tempat Lahir:</strong> Surabaya</div>
                <div class="user-detail"><strong>Tanggal Lahir:</strong> 10 November 1982</div>
                <div class="user-detail"><strong>No. KTP:</strong> 3578********4321</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 812-1122-3344</div>
                <div class="user-detail"><strong>Email:</strong> mike.roberts@ecobumi.id</div>
                
                <h3>Informasi Usaha</h3>
                <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> Perusahaan daur ulang dengan kapasitas 50 ton/bulan</div>
                <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PET, PS, PVC</div>
                <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> 50 ton</div>
                <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> 30 orang</div>
                <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> Biji plastik, Packaging produk</div>
            </div>
        </div>
    </div>
    
    <div id="user004" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pendaftar</h2>
                <span class="close" onclick="closeModal('user004')">&times;</span>
            </div>
            <div class="modal-body">
                <h3>Detail Organisasi</h3>
                <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> GreenPlastic Solutions</div>
                <div class="user-detail"><strong>Nama Lain (Initial):</strong> GPS</div>
                <div class="user-detail"><strong>Alamat:</strong> Jl. Syahdan No. 9</div>
                <div class="user-detail"><strong>Kota:</strong> Jakarta Barat</div>
                <div class="user-detail"><strong>Kode Pos:</strong> 11480</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 813-9988-7766</div>
                <div class="user-detail"><strong>Email:</strong> hello@greenplastic.id</div>
                
                <h3>Detail Penanggung Jawab</h3>
                <div class="user-detail"><strong>Nama Lengkap:</strong> Emma Wilson</div>
                <div class="user-detail"><strong>Jabatan:</strong> Founder & CEO</div>
                <div class="user-detail"><strong>Tempat Lahir:</strong> Bandung</div>
                <div class="user-detail"><strong>Tanggal Lahir:</strong> 8 April 1990</div>
                <div class="user-detail"><strong>No. KTP:</strong> 3173********5566</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 811-8877-6655</div>
                <div class="user-detail"><strong>Email:</strong> emma.w@greenplastic.id</div>
                
                <h3>Informasi Usaha</h3>
                <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> Startup inovasi daur ulang limbah plastik menjadi bahan bakar</div>
                <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PP, LDPE, Other</div>
                <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> 25 ton</div>
                <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> 15 orang</div>
                <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> Bahan bakar alternatif, Aditif industri</div>
            </div>
        </div>
    </div>
    
    <div id="user005" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pendaftar</h2>
                <span class="close" onclick="closeModal('user005')">&times;</span>
            </div>
            <div class="modal-body">
                <h3>Detail Organisasi</h3>
                <div class="user-detail"><strong>Nama Organisasi/Perusahaan:</strong> PT Daur Ulang Nusantara</div>
                <div class="user-detail"><strong>Nama Lain (Initial):</strong> DUN</div>
                <div class="user-detail"><strong>Alamat:</strong> Kawasan Industri MM2100 Blok F-2</div>
                <div class="user-detail"><strong>Kota:</strong> Bekasi</div>
                <div class="user-detail"><strong>Kode Pos:</strong> 17520</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 21-8899-0011</div>
                <div class="user-detail"><strong>Email:</strong> info@daurulang-nusantara.co.id</div>
                
                <h3>Detail Penanggung Jawab</h3>
                <div class="user-detail"><strong>Nama Lengkap:</strong> David Chen</div>
                <div class="user-detail"><strong>Jabatan:</strong> Direktur Operasional</div>
                <div class="user-detail"><strong>Tempat Lahir:</strong> Jakarta</div>
                <div class="user-detail"><strong>Tanggal Lahir:</strong> 5 Mei 1975</div>
                <div class="user-detail"><strong>No. KTP:</strong> 3216********7890</div>
                <div class="user-detail"><strong>No. Ponsel:</strong> +62 812-1010-2020</div>
                <div class="user-detail"><strong>Email:</strong> david.chen@daurulang-nusantara.co.id</div>
                
                <h3>Informasi Usaha</h3>
                <div class="user-detail"><strong>Penjelasan Mengenai Badan Usaha:</strong> Perusahaan pengolahan limbah plastik dengan 120 pekerja</div>
                <div class="user-detail"><strong>Jenis Bahan Yang Di Olah:</strong> PET, HDPE, PP, LDPE, PVC</div>
                <div class="user-detail"><strong>Kapasitas Per Bulan:</strong> 200 ton</div>
                <div class="user-detail"><strong>Jumlah Tenaga Kerja:</strong> 120 orang</div>
                <div class="user-detail"><strong>Produk Yang Di Hasilkan:</strong> Biji plastik, Palet, Fiber, Material konstruksi</div>
            </div>
        </div>
    </div>
    
    <script>
        // Function to open the modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
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