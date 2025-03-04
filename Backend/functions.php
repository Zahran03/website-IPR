<?php 

    $conn = mysqli_connect("localhost", "root", "", "db_ipr");

    // query function
    function query($query) {
        global $conn;
    
        $result = mysqli_query($conn, $query);
    
        $data = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    
        return $data;
    }

    // Search function for registrations
    function searchRegistrations($keyword) {
        global $conn;
        
        // Sanitize the search keyword to prevent SQL injection
        $keyword = mysqli_real_escape_string($conn, $keyword);
        
        // Build query to search across multiple columns
        $query = "SELECT * FROM registrations 
                WHERE nama_organisasi LIKE '%$keyword%' 
                OR nama_lain LIKE '%$keyword%'
                OR nama_lengkap LIKE '%$keyword%'
                OR email LIKE '%$keyword%'
                OR email_penanggung LIKE '%$keyword%' 
                OR kota LIKE '%$keyword%'
                OR alamat LIKE '%$keyword%'
                OR penjelasan_bahan_limbah LIKE '%$keyword%'
                OR produk_yang_dihasilkan LIKE '%$keyword%'";
        
        // Use the query function to execute the search
        return query($query);
    }

    function tambah($data) {
        global $conn;
        
        // Organization Details
        $nama_organisasi = htmlspecialchars($data["nama-organisasi"]);
        $nama_lain = htmlspecialchars($data["nama-lain"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $kode_pos = htmlspecialchars($data["kode-pos"]);
        $no_ponsel = htmlspecialchars($data["no-ponsel"]);
        $email = htmlspecialchars($data["email"]);
        
        // Responsible Person Details
        $nama_lengkap = htmlspecialchars($data["nama-lengkap"]);
        $jabatan = htmlspecialchars($data["jabatan"]);
        $tempat_lahir = htmlspecialchars($data["tempat-lahir"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal-lahir"]);
        $no_ktp = htmlspecialchars($data["no-ktp"]);
        $no_ponsel_penanggung = htmlspecialchars($data["no-ponsel-penanggung"]);
        $email_penanggung = htmlspecialchars($data["email-penanggung"]);
        
        // Business Information
        $penjelasan_bahan_limbah = htmlspecialchars($data["penjelasan-bahan-limbah"]);
        
        // Material Types (checkboxes)
        $bahan_pvc = isset($data["bahan"]) && in_array("PVC", $data["bahan"]) ? 1 : 0;
        $bahan_hips = isset($data["bahan"]) && in_array("HIPS", $data["bahan"]) ? 1 : 0;
        $bahan_ps = isset($data["bahan"]) && in_array("PS", $data["bahan"]) ? 1 : 0;
        $bahan_pp = isset($data["bahan"]) && in_array("PP", $data["bahan"]) ? 1 : 0;
        $bahan_ldpe = isset($data["bahan"]) && in_array("LDPE", $data["bahan"]) ? 1 : 0;
        $bahan_hdpe = isset($data["bahan"]) && in_array("HDPE", $data["bahan"]) ? 1 : 0;
        $bahan_pet = isset($data["bahan"]) && in_array("PET", $data["bahan"]) ? 1 : 0;
        $bahan_other = isset($data["bahan"]) && in_array("Other", $data["bahan"]) ? 1 : 0;
        $bahan_other_text = $bahan_other ? htmlspecialchars($data["bahan-other-text"]) : null;
        
        $kapasitas = htmlspecialchars($data["kapasitas"]);
        $jumlah_tenaga = htmlspecialchars($data["jumlah-tenaga-kerja"]);
        $produk_yang_dihasilkan = htmlspecialchars($data["produk-yang-dihasilkan"]);
        
        // File uploads
        $file_ktp = uploadFile('file-ktp', 'ktp');
        $file_surat = uploadFile('file-surat', 'surat');
        $file_npwp = uploadFile('file-npwp', 'npwp');
        
        if (!$file_ktp || !$file_surat || !$file_npwp) {
            return false;
        }
        
        // Agreement checkbox
        $persetujuan = isset($data["persetujuan"]) ? 1 : 0;
        
        // Insert query
        $query = "INSERT INTO registrations (
            nama_organisasi, nama_lain, alamat, kota, kode_pos, no_ponsel, email,
            nama_lengkap, jabatan, tempat_lahir, tanggal_lahir, no_ktp, no_ponsel_penanggung, email_penanggung,
            penjelasan_bahan_limbah, 
            bahan_pvc, bahan_hips, bahan_ps, bahan_pp, bahan_ldpe, bahan_hdpe, bahan_pet, bahan_other, bahan_other_text,
            kapasitas, jumlah_tenaga_kerja, produk_yang_dihasilkan,
            file_ktp, file_surat_keterangan, file_npwp,
            persetujuan
        ) VALUES (
            '$nama_organisasi', '$nama_lain', '$alamat', '$kota', '$kode_pos', '$no_ponsel', '$email',
            '$nama_lengkap', '$jabatan', '$tempat_lahir', '$tanggal_lahir', '$no_ktp', '$no_ponsel_penanggung', '$email_penanggung',
            '$penjelasan_bahan_limbah',
            $bahan_pvc, $bahan_hips, $bahan_ps, $bahan_pp, $bahan_ldpe, $bahan_hdpe, $bahan_pet, $bahan_other, " . 
            ($bahan_other_text ? "'$bahan_other_text'" : "NULL") . ",
            '$kapasitas', '$jumlah_tenaga', '$produk_yang_dihasilkan',
            '$file_ktp', '$file_surat', '$file_npwp',
            $persetujuan
        )";
        
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }
    
    // Helper function to handle file uploads
    function uploadFile($fieldName, $targetDir) {
        // Check if file was uploaded
        if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] != 0) {
            return false;
        }
        
        $fileName = $_FILES[$fieldName]['name'];
        $fileSize = $_FILES[$fieldName]['size'];
        $tmpName = $_FILES[$fieldName]['tmp_name'];
        
        // Validate file extension
        $validExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (!in_array($fileExtension, $validExtensions)) {
            echo "<script>
                    alert('Format file tidak didukung! Gunakan jpg, jpeg, png, atau pdf.');
                 </script>";
            return false;
        }
        
        // Validate file size (max 2MB)
        if ($fileSize > 2000000) {
            echo "<script>
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                 </script>";
            return false;
        }
        
        // Generate unique filename
        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadPath = 'uploads/' . $targetDir . '/' . $newFileName;
        
        // // Create directory if it doesn't exist
        // if (!file_exists('uploads/' . $targetDir)) {
        //     mkdir('uploads/' . $targetDir, 0777, true);
        // }
        
        // Move uploaded file
        if (move_uploaded_file($tmpName, $uploadPath)) {
            return $uploadPath;
        } else {
            echo "<script>
                    alert('Gagal mengupload file!');
                 </script>";
            return false;
        }
    }

    // register function
    function register($data) {
        global $conn;
    
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $confirm_password = mysqli_real_escape_string($conn, $data["confirm-password"]);
    
        // cek apakah password dan password confirm sama
        if( $password !== $confirm_password){
            echo "
                <script>
                    alert('Password dan Password Konfirmasi');
                    document.location.href = 'index.php';
                </script>
            ";
            return false;
        }
        // hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        //masukan kedalam data base
        mysqli_query($conn, "INSERT INTO admins VALUES ('', '$username', '$password')");
        return mysqli_affected_rows($conn);
    }

    // delete function
    function hapus($id){
        global $conn;
    
        mysqli_query($conn, "DELETE FROM registrations WHERE id = $id");
    
        return mysqli_affected_rows($conn);
    }
?>