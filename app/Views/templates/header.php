<?php
/**
 * @var string $title
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - Inventaris Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f7f8fa;
            --surface: #ffffff;
            --text: #1f2430;
            --muted: #7c8494;
            --accent: #4f5fe0;
            --accent-soft: #eef0fd;
            --border: #e7e9ee;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: var(--bg);
            color: var(--text);
        }

        .container {
            padding-left: 2rem !important;
            padding-right: 2rem !important;
            max-width: 1140px;
        }

        @media (max-width: 576px) {
            .container {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }

        .navbar {
            background-color: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .navbar-brand i {
            color: var(--accent);
        }

        .card {
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 1px 2px rgba(16, 24, 40, 0.04);
        }

        .table thead th {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--muted);
            font-weight: 600;
            border-bottom: 1px solid var(--border);
        }

        .table td {
            vertical-align: middle;
            border-color: var(--border);
        }

        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
        }

        .btn-primary:hover {
            background-color: #3f4ecb;
            border-color: #3f4ecb;
        }

        .btn-outline-secondary {
            border-color: var(--border);
            color: var(--muted);
        }

        .badge-kondisi {
            font-weight: 500;
            padding: 0.4em 0.75em;
            border-radius: 999px;
        }

        .badge-baik { background-color: #e7f7ee; color: #1a8a4f; }
        .badge-rusak { background-color: #fdecec; color: #c0392b; }
        .badge-perbaikan { background-color: #fef6e7; color: #b7791f; }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            border-color: var(--border);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem var(--accent-soft);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/barang">
            <i class="bi bi-box-seam"></i> Inventaris Barang
        </a>
    </div>
</nav>

<div class="container py-5 px-4 px-lg-5"></div>