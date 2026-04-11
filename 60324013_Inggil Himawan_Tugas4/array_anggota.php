<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <?php
            $anggota_list = [
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
            
            // 3. Function untuk hitung anggota nonktif
            function hitung_anggota_nonaktif($anggota_list) {
                // TODO: hitung yang status = "Aktif"
                $anggota_nonaktif = 0;
                // $persen = 0;
                foreach ($anggota_list as $anggota) {
                    if ($anggota["status"] == "Nonaktif") {
                        $anggota_nonaktif++;
                    }
                }
                $persentase = $anggota_nonaktif / hitung_total_anggota($anggota_list) * 100;
                return $persentase;
            }
            
            // 4. Function untuk hitung rata-rata pinjaman
            function hitung_rata_rata_pinjaman($anggota_list) {
                // TODO: hitung average total_pinjaman
                $total_pinjam = 0;
                foreach ($anggota_list as $anggota) {
                    $total_pinjam += $anggota["total_pinjaman"];
                }
                $rata_rata = $total_pinjam / hitung_total_anggota($anggota_list);
                return $rata_rata;
            }
            
            // 5. Function untuk cari anggota teraktif
            function cari_anggota_teraktif($anggota_list) {
                // TODO: return anggota dengan total_pinjaman tertinggi
                $pinjaman_tertinggi = $anggota_list[0];
                foreach ($anggota_list as $anggota) {
                    if ($anggota["total_pinjaman"] > $pinjaman_tertinggi["total_pinjaman"]) {
                        $pinjaman_tertinggi = $anggota;
                    }
                }
                return $pinjaman_tertinggi;
            }
            $nama_anggota_teraktif = cari_anggota_teraktif($anggota_list);

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
        ?>
        <div class="row mb-4">
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
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <h5>Anggota Nonaktif</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo hitung_anggota_nonaktif($anggota_list); ?> %</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h5>Rata-rata Pinjaman Peranggota</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo hitung_rata_rata_pinjaman($anggota_list); ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5>Anggota Teraktif</h5>
                    </div>
                    <div class="card-body">
                        <h3><?php echo $nama_anggota_teraktif["nama"]; ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Semua Anggota -->
        <h3 class="text-center">Data Semua Anggota</h3>
        <div class="table-responsive shadow-sm mb-4">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Status</th>
                        <th>Total Pinjaman</th>
                    </tr>
                </thead>
                <?php 
                    $nomor = 1; 
                    foreach ($anggota_list as $anggota):
                ?>
                
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $anggota["id"]; ?></td>
                    <td><?php echo $anggota["nama"]; ?></td>
                    <td><?php echo $anggota["email"]; ?></td>
                    <td><?php echo $anggota["telepon"]; ?></td>
                    <td><?php echo $anggota["alamat"]; ?></td>
                    <td><?php echo $anggota["tanggal_daftar"]; ?></td>
                    <td><?php echo $anggota["status"]; ?></td>
                    <td><?php echo $anggota["total_pinjaman"]; ?></td>
                </tr>
                <?php 
                    $nomor++;
                    endforeach;
                ?>
            </table>
        </div>

        <!-- Pencarian by Status = Aktif -->
        <h5>Filter Anggota by Status Aktif</h5>
        <div class="table-responsive shadow-sm mb-4">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Status</th>
                        <th>Total Pinjaman</th>
                    </tr>
                </thead>
                <?php
                    // 1. Tampung data yang sudah difilter
                    $anggota_aktif = filter_by_status($anggota_list, "Aktif");
                    $nomor = 1; 
                    
                    // 2. Lakukan perulangan pada variabel $anggota_aktif
                    foreach ($anggota_aktif as $anggota):
                ?>
                
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $anggota["id"]; ?></td>
                    <td><?php echo $anggota["nama"]; ?></td>
                    <td><?php echo $anggota["email"]; ?></td>
                    <td><?php echo $anggota["telepon"]; ?></td>
                    <td><?php echo $anggota["alamat"]; ?></td>
                    <td><?php echo $anggota["tanggal_daftar"]; ?></td>
                    <td><?php echo $anggota["status"]; ?></td>
                    <td><?php echo $anggota["total_pinjaman"]; ?></td>
                </tr>
                <?php 
                    $nomor++;
                    endforeach;
                ?>
            </table>
        </div>

        <h5>Filter Anggota by Status Nonaktif</h5>
        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th class="text-center">Status</th>
                        <th>Total Pinjaman</th>
                    </tr>
                </thead>
                <?php
                    // 1. Tampung data yang sudah difilter
                    $anggota_nonaktif = filter_by_status($anggota_list, "Nonaktif");
                    $nomor = 1; 
                    
                    // 2. Lakukan perulangan pada variabel $anggota_aktif
                    foreach ($anggota_nonaktif as $anggota):
                ?>
                
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $anggota["id"]; ?></td>
                    <td><?php echo $anggota["nama"]; ?></td>
                    <td><?php echo $anggota["email"]; ?></td>
                    <td><?php echo $anggota["telepon"]; ?></td>
                    <td><?php echo $anggota["alamat"]; ?></td>
                    <td><?php echo $anggota["tanggal_daftar"]; ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>