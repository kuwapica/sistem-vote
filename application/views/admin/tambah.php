<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($k) ? 'Edit' : 'Tambah' ?> Kandidat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2><?= isset($k) ? 'Edit' : 'Tambah' ?> Kandidat</h2>
        <form action="<?= isset($k) ? site_url('admin/update/' . $k->id) : site_url('admin/simpan') ?>" method="post">
            <div class="form-group">
                <label>Nama Kandidat</label>
                <input type="text" name="nama_kandidat" class="form-control" value="<?= isset($k) ? $k->nama_kandidat : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Visi</label>
                <textarea name="visi" class="form-control" rows="5" required><?= isset($k) ? $k->visi : '' ?></textarea>
            </div>
            <div class="form-group">
                <label>Misi</label>
                <textarea name="misi" class="form-control" rows="5" required><?= isset($k) ? $k->misi : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?= isset($k) ? 'Update' : 'Simpan' ?></button>
            <a href="<?= site_url('admin') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>