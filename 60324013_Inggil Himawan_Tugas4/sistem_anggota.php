<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <?php
        // Include functions
        require_once 'functions_anggota.php';
        
        // Data anggota
        $anggota_list = [
            // TODO: Isi data anggota minimal 5
            [
                "id" => "AGT-001",
                "nama" => "Budi Santoso",
                "email" => "budi@email.com",
                "telepon" => "081234567890",
                "alamat" => "Jakarta",
                "tanggal_daftar" => "2024-01-15",
                "status" => "Aktif",
                "total_pinjaman" => 5
            ],
            [
                "id" => "AGT-002",
                "nama" => "Siti Aminah",
                "email" => "siti.aminah@email.com",
                "telepon" => "081987654321",
                "alamat" => "Bandung",
                "tanggal_daftar" => "2024-02-10",
                "status" => "Aktif",
                "total_pinjaman" => 2
            ],
            [
                "id" => "AGT-003",
                "nama" => "Agus Pratama",
                "email" => "agus.pratama@email.com",
                "telepon" => "085612349876",
                "alamat" => "Surabaya",
                "tanggal_daftar" => "2024-03-05",
                "status" => "Nonaktif",
                "total_pinjaman" => 0
            ],
            [
                "id" => "AGT-004",
                "nama" => "Dewi Lestari",
                "email" => "dewi.l@email.com",
                "telepon" => "082134567890",
                "alamat" => "Yogyakarta",
                "tanggal_daftar" => "2024-04-20",
                "status" => "Aktif",
                "total_pinjaman" => 12
            ],
            [
                "id" => "AGT-005",
                "nama" => "Reza Saputra",
                "email" => "reza.s@email.com",
                "telepon" => "081357924680",
                "alamat" => "Semarang",
                "tanggal_daftar" => "2024-05-12",
                "status" => "Aktif",
                "total_pinjaman" => 3
            ]
        ];
    ?>
    
    <div class="container mt-5">
        <h1 class="mb-4"><i class="bi bi-people"></i> Sistem Anggota Perpustakaan</h1>
        
        <!-- Dashboard Statistik -->
        <div class="row mb-4">
            <!-- TODO: Cards statistik -->

            <!-- Total Anggota -->
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5>Total Anggota</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo hitung_total_anggota($anggota_list); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Total Anggota Aktif (%) -->
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5>Anggota Aktif</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo hitung_anggota_aktif($anggota_list); ?> %</h3>
                    </div>
                </div>
            </div>

            <!-- Rata-rata Pinjaman Peranggota -->
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h5>Rata-rata Pinjaman Peranggota</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo hitung_rata_rata_pinjaman($anggota_list); ?> %</h3>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Tabel Anggota -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Daftar Anggota</h5>
            </div>
            <div class="card-body">
                <!-- TODO: Tabel anggota -->
                <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $nomor = 1; 
                            foreach ($anggota_list as $anggota):
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["email"]; ?></td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Anggota Teraktif -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Anggota Teraktif</h5>
            </div>
            <div class="card-body">
                <!-- TODO: Info anggota teraktif -->
                 <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $anggota_teraktif = cari_anggota_teraktif($anggota_list);
                            $nomor = 1; 
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota_teraktif["id"]; ?></td>
                            <td><?php echo $anggota_teraktif["nama"]; ?></td>
                            <td><?php echo $anggota_teraktif["email"]; ?></td>
                            <td><?php echo $anggota_teraktif["telepon"]; ?></td>
                            <td><?php echo $anggota_teraktif["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota_teraktif["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota_teraktif["status"]; ?></td>
                            <td><?php echo $anggota_teraktif["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Anggota Aktif -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Anggota Aktif</h5>
            </div>
            <div class="card-body">
                 <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $anggota_aktif = filter_by_status($anggota_list,"Aktif");
                            $nomor = 1; 
                            foreach ($anggota_aktif as $anggota):
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["email"]; ?></td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Anggota Nonaktif -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Anggota Nonaktif</h5>
            </div>
            <div class="card-body">
                 <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $anggota_nonaktif = filter_by_status($anggota_list,"Nonaktif");
                            $nomor = 1; 
                            foreach ($anggota_nonaktif as $anggota):
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["email"]; ?></td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cari Anggota by ID -->
        <?php  
            $id = "AGT-003";
        ?>
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Cari Anggota by Id</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <strong>Cari ID: <?php echo $id ?></strong>
                </div>
                 <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $cari_by_id = cari_anggota_by_id($anggota_list,$id);
                            $nomor = 1; 
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $cari_by_id["id"]; ?></td>
                            <td><?php echo $cari_by_id["nama"]; ?></td>
                            <td><?php echo $cari_by_id["email"]; ?></td>
                            <td><?php echo $cari_by_id["telepon"]; ?></td>
                            <td><?php echo $cari_by_id["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($cari_by_id["tanggal_daftar"]); ?></td>
                            <td><?php echo $cari_by_id["status"]; ?></td>
                            <td><?php echo $cari_by_id["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Validasi Email -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Validasi Email</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php
                            
                            $nomor = 1; 
                            foreach ($anggota_list as $anggota):
                            $validasi_email = validasi_email($anggota["email"]);
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td>
                                <?php echo $anggota["email"]; ?> 
                                <br> <?php if (validasi_email($anggota["email"])): ?>
                                    <span class="badge bg-success">Format Benar</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Format Salah</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- So -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Sorting by Nama (A-Z)</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $sort = sort_by_nama($anggota_list);
                            $nomor = 1; 
                            foreach ($sort as $anggota):
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["email"]; ?></td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($anggota["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                            endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <?php  
            $keyword = "Reza";
        ?>
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Cari Anggota by Nama</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <strong>Cari Nama: <?php echo $keyword ?></strong>
                </div>
                 <div class="table-responsive shadow-sm mb-4">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Total Pinjaman</th>
                            </tr>
                        </thead>
                        <?php 
                            $hasil_cari_nama = cari_anggota_by_nama($anggota_list,$keyword);
                            $nomor = 1;

                            if (empty($hasil_cari_nama)) {
                                echo "<tr><td colspan='9' class='text-center'>Data tidak ditemukan</td></tr>";
                            } else {
                                foreach ($hasil_cari_nama as $anggota):
                        ?>
                        
                        <tr class="text-center">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $anggota["id"]; ?></td>
                            <td><?php echo $anggota["nama"]; ?></td>
                            <td><?php echo $anggota["email"]; ?></td>
                            <td><?php echo $anggota["telepon"]; ?></td>
                            <td><?php echo $anggota["alamat"]; ?></td>
                            <td><?php echo format_tanggal_indo($cari_by_id["tanggal_daftar"]); ?></td>
                            <td><?php echo $anggota["status"]; ?></td>
                            <td><?php echo $anggota["total_pinjaman"]; ?></td>
                        </tr>
                        <?php 
                            $nomor++;
                                endforeach;
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>