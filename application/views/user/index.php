<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Voting Ketua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Pemilihan Ketua Angkatan</h2>

        <?php if ($voted): ?>
            <div class="alert alert-success text-center">
                <h4>Terima kasih! Anda telah memilih.</h4>
                <p>Anda memilih: <strong><?= $candidate->nama_kandidat ?></strong></p>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($candidates as $c): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow">
                            <div class="card-body">
                                <h5 class="card-title"><?= $c->nama_kandidat ?></h5>
                                <p class="card-text"><strong>visi:</strong> <?= nl2br($c->visi) ?></p>
                                <p class="card-text"><strong>misi:</strong> <?= nl2br($c->misi) ?></p>
                                <a href="<?= site_url('user/pilih/' . $c->id) ?>" class="btn btn-primary btn-block" onclick="return confirm('Yakin memilih <?= $c->nama_kandidat ?>?')">Pilih</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="<?= site_url('user/hasil') ?>" class="btn btn-success">Hasil Voting</a>
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger ml-2">Logout</a>
        </div>
    </div>

</body>

</html>