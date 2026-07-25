<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected BarangModel $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    // READ - tampilkan semua data
    public function index()
    {
        $data = [
            'title'  => 'Data Barang Inventaris',
            'barang' => $this->barangModel->findAll(),
        ];

        return view('barang/index', $data);
    }

    // CREATE - tampilkan form tambah
    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
        ];

        return view('barang/create', $data);
    }

    // CREATE - proses simpan data
    public function store()
    {
        $validation = \Config\Services::validation();

        if (! $this->validate($this->barangModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori'    => $this->request->getPost('kategori'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
        ]);

        return redirect()->to('/barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    // UPDATE - tampilkan form edit
    public function edit(int $id)
    {
        $barang = $this->barangModel->find($id);

        if (! $barang) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Barang',
            'barang' => $barang,
        ];

        return view('barang/edit', $data);
    }

    // UPDATE - proses update data
    public function update(int $id)
    {
        $barang = $this->barangModel->find($id);

        if (! $barang) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan.');
        }

        if (! $this->validate($this->barangModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori'    => $this->request->getPost('kategori'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'kondisi'     => $this->request->getPost('kondisi'),
        ]);

        return redirect()->to('/barang')->with('success', 'Barang berhasil diperbarui.');
    }

    // DELETE
    public function delete(int $id)
    {
        $barang = $this->barangModel->find($id);

        if (! $barang) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan.');
        }

        $this->barangModel->delete($id);

        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus.');
    }
}