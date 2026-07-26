<?php
/**
 * @var string $title
 * @var array $barang
 */
?>
<?= $this->include('templates/header') ?>

<div class="mb-4">
    <a href="/barang" class="text-muted small text-decoration-none">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
    <h1 class="h4 mt-2 mb-0"><?= esc($title) ?></h1>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card p-4" style="max-width: 520px;">
    <form action="/barang/update/<?= $barang['id'] ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= esc($barang['nama_barang']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?= esc($barang['kategori']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= esc($barang['jumlah']) ?>">
        </div>

        <div class="mb-4">
            <label class="form-label">Kondisi</label>
            <select name="kondisi" class="form-select">
                <?php foreach (['Baik', 'Rusak', 'Perlu Perbaikan'] as $opt): ?>
                    <option value="<?= $opt ?>" <?= $barang['kondisi'] == $opt ? 'selected' : '' ?>>
                        <?= $opt ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-check-lg me-1"></i> Update
        </button>
    </form>
</div>

<?= $this->include('templates/footer') ?>