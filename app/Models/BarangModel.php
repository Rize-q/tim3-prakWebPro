<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nama_barang',
        'kategori',
        'jumlah',
        'kondisi',
    ];

    // Otomatis isi created_at & updated_at
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validasi dasar
    protected $validationRules = [
        'nama_barang' => 'required|min_length[3]|max_length[100]',
        'kategori'    => 'required|max_length[50]',
        'jumlah'      => 'required|numeric',
        'kondisi'     => 'required|in_list[Baik,Rusak,Perlu Perbaikan]',
    ];

    protected $validationMessages = [
        'nama_barang' => [
            'required'   => 'Nama barang wajib diisi.',
            'min_length' => 'Nama barang minimal 3 karakter.',
        ],
        'jumlah' => [
            'numeric' => 'Jumlah harus berupa angka.',
        ],
    ];
}