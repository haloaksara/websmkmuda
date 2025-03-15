<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .news-card {
            margin-bottom: 20px;
        }
        .news-card img {
            max-height: 200px;
            object-fit: cover;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Berita Terkini</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kontak</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php
        // Contoh data berita
        $berita = [
            [
                'judul' => 'Berita 1',
                'gambar' => 'https://via.placeholder.com/400x200',
                'deskripsi' => 'Deskripsi singkat berita 1.'
            ],
            [
                'judul' => 'Berita 2',
                'gambar' => 'https://via.placeholder.com/400x200',
                'deskripsi' => 'Deskripsi singkat berita 2.'
            ],
            [
                'judul' => 'Berita 3',
                'gambar' => 'https://via.placeholder.com/400x200',
                'deskripsi' => 'Deskripsi singkat berita 3.'
            ]
        ];

        foreach ($berita as $item) {
            echo '
            <div class="col-md-4">
                <div class="card news-card">
                    <img src="'.$item['gambar'].'" class="card-img-top" alt="'.$item['judul'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$item['judul'].'</h5>
                        <p class="card-text">'.$item['deskripsi'].'</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
    </div>
</div>

<div class="footer">
    <p>&copy; 2023 Berita Terkini. All rights reserved.</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>