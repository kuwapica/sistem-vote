<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Kandidat Ketua</h2>
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
        </div>

        <a href="<?= site_url('admin/tambah') ?>" class="btn btn-success mb-3">+ Tambah Kandidat</a>

        <table id="tabelKandidat" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candidate as $k): ?>
                    <tr>
                        <td><?= $k->nama_kandidat ?></td>
                        <td><?= nl2br($k->visi) ?></td>
                        <td><?= nl2br($k->misi) ?></td>
                        <td>
                            <a href="<?= site_url('admin/edit/' . $k->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('admin/hapus/' . $k->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery + Bootstrap 5 JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Aktifkan DataTables -->
    <script>
        $(document).ready(function() {
            $('#tabelKandidat').DataTable({
                "pageLength": 10
            });
        });
    </script>
</body>

</html>