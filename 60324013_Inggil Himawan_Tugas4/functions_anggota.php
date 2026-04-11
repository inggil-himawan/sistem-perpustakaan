
<?php
    // $anggota_list = [
    //     [
    //         "id" => "AGT-001",
    //         "nama" => "Budi Santoso",
    //         "email" => "budi@email.com",
    //         "telepon" => "081234567890",
    //         "alamat" => "Jakarta",
    //         "tanggal_daftar" => "2024-01-15",
    //         "status" => "Aktif",
    //         "total_pinjaman" => 5
    //     ],
    //     [
    //         "id" => "AGT-002",
    //         "nama" => "Siti Aminah",
    //         "email" => "siti.aminah@email.com",
    //         "telepon" => "081987654321",
    //         "alamat" => "Bandung",
    //         "tanggal_daftar" => "2024-02-10",
    //         "status" => "Aktif",
    //         "total_pinjaman" => 2
    //     ],
    //     [
    //         "id" => "AGT-003",
    //         "nama" => "Agus Pratama",
    //         "email" => "agus.pratama@email.com",
    //         "telepon" => "085612349876",
    //         "alamat" => "Surabaya",
    //         "tanggal_daftar" => "2024-03-05",
    //         "status" => "Nonaktif",
    //         "total_pinjaman" => 0
    //     ],
    //     [
    //         "id" => "AGT-004",
    //         "nama" => "Dewi Lestari",
    //         "email" => "dewi.l@email.com",
    //         "telepon" => "082134567890",
    //         "alamat" => "Yogyakarta",
    //         "tanggal_daftar" => "2024-04-20",
    //         "status" => "Aktif",
    //         "total_pinjaman" => 12
    //     ],
    //     [
    //         "id" => "AGT-005",
    //         "nama" => "Reza Saputra",
    //         "email" => "reza.s@email.com",
    //         "telepon" => "081357924680",
    //         "alamat" => "Semarang",
    //         "tanggal_daftar" => "2024-05-12",
    //         "status" => "Aktif",
    //         "total_pinjaman" => 3
    //     ]
    // ];

    // 1. Function untuk hitung total anggota
    function hitung_total_anggota($anggota_list) {
        // TODO: return count
        $total = count($anggota_list);
        return $total;
    }
    
    // 2. Function untuk hitung anggota aktif
    function hitung_anggota_aktif($anggota_list) {
        // TODO: hitung yang status = "Aktif"
        $anggota_aktif = 0;
        // $persen = 0;
        foreach ($anggota_list as $anggota) {
            if ($anggota["status"] == "Aktif") {
                $anggota_aktif++;
            }
        }
        $persentase = $anggota_aktif / hitung_total_anggota($anggota_list) * 100;
        return $persentase;
    }
    
    // 3. Function untuk hitung rata-rata pinjaman
    function hitung_rata_rata_pinjaman($anggota_list) {
        // TODO: hitung average total_pinjaman
        $total_pinjam = 0;
        foreach ($anggota_list as $anggota) {
            $total_pinjam += $anggota["total_pinjaman"];
        }
        $rata_rata = $total_pinjam / hitung_total_anggota($anggota_list);
        return $rata_rata;
    }
    
    // 4. Function untuk cari anggota by ID
    function cari_anggota_by_id($anggota_list, $id) {
        // TODO: return anggota atau null
        foreach ($anggota_list as $anggota) {
            if ($anggota["id"] == $id) {
                return $anggota;
            }
        }
        return null;
    }
    
    // 5. Function untuk cari anggota teraktif
    function cari_anggota_teraktif($anggota_list) {
        // TODO: return anggota dengan total_pinjaman tertinggi
        $anggota_teraktif = $anggota_list[0];
        foreach ($anggota_list as $anggota) {
            if ($anggota["total_pinjaman"] > $anggota_teraktif["total_pinjaman"]) {
                $anggota_teraktif = $anggota;
            }
        }
        return $anggota_teraktif;
    }
    // $nama_anggota_teraktif = cari_anggota_teraktif($anggota_list);

    
    // 6. Function untuk filter by status
    function filter_by_status($anggota_list, $status) {
        // TODO: return array anggota dengan status tertentu
        $filter_status = [];
        foreach ($anggota_list as $anggota) {
            if ($anggota["status"] == $status) {
            $filter_status[] = $anggota;
            }
        }
        return $filter_status;
    }
    
    // 7. Function untuk validasi email
    function validasi_email($email) {
        // TODO: return true/false
        // Cek: tidak kosong, ada @, ada .
        $cek_isi = !empty($email);
        $cek_at = strpos($email, '@') !== false;
        $cek_titik = strpos($email, '.') !== false;

        if ($cek_isi && $cek_at && $cek_titik) {
            // echo "Format benar";
            return true;
        } else {
            // echo "Format salah";
            return false;
        }
    }
    
    // 8. Function untuk format tanggal Indonesia
    function format_tanggal_indo($tanggal) {
        // TODO: ubah 2024-01-15 jadi 15 Januari 2024
        $bulan = [
            1 => "Januari",
            2 => "Februari", 
            3 => "Maret",
            4 => "April", 
            5 => "Mei", 
            6 => "Juni",
            7 => "Juli", 
            8 => "Agustus", 
            9 => "September",
            10 => "Oktober", 
            11 => "November", 
            12 => "Desember"
        ];

        $waktu = strtotime($tanggal);

        return date('d',$waktu).' '.$bulan[date('n',$waktu)].' '.date('Y',$waktu);
    }

    // Function sort by nama
    function sort_by_nama($anggota_list){
        usort($anggota_list, function ($a, $b) {
            return $a["nama"] > $b["nama"];
        });
        return $anggota_list;
    }

    function cari_anggota_by_nama($anggota_list, $keyword) {
        $hasil_pencarian = [];
        foreach ($anggota_list as $anggota) {
            if (stripos($anggota["nama"], $keyword) !== false) {
                $hasil_pencarian[] = $anggota;
            }
        }
        return $hasil_pencarian;
    }
?>
