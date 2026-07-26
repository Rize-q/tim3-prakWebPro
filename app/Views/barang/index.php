<?php
/**
 * @var string $title
 * @var array $barang
 */
?>
<?= $this->include('templates/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h4 mb-0"><?= esc($title) ?></h1>
        <p class="text-muted small mb-0">Kelola data barang inventaris</p>
    </div>
    <a href="/barang/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Barang
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($barang)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Belum ada data barang.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($barang as $b): ?>
                    <tr>
                        <td class="ps-4"><?= esc($b['nama_barang']) ?></td>
                        <td class="text-muted"><?= esc($b['kategori']) ?></td>
                        <td><?= esc($b['jumlah']) ?></td>
                        <td>
                            <?php
                                $badgeClass = match($b['kondisi']) {
                                    'Baik' => 'badge-baik',
                                    'Rusak' => 'badge-rusak',
                                    default => 'badge-perbaikan',
                                };
                            ?>
                            <span class="badge badge-kondisi <?= $badgeClass ?>"><?= esc($b['kondisi']) ?></span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="/barang/delete/<?= $b['id'] ?>"
                               class="btn btn-sm btn-outline-secondary"
                               onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('templates/footer') ?>