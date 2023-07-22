<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <!-- Link ke file Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Upload File</div>
                    <div class="card-body">

                                                    <!-- Bagian untuk menampilkan tautan unduh untuk File 1 -->
                            <div>
                                <h3></h3>
                                <a href="{{ route('download_krs', ['filename' => $krs_nama]) }}" class="btn btn-primary">Unduh File krs</a>
                            </div>

                            <div>
                                <h3></h3>
                                <a href="{{ route('download_kwitansi' , ['filename' => $kwitansi_nama]) }}" class="btn btn-primary">Unduh File kwitansi</a>
                            </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link ke file Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
