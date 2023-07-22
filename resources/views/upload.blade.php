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
                        <form action="{{ route('store_upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kwitansi">Upload Kwitansi</label>
                                <input type="file" class="form-control @error('kwitansi') is-invalid @enderror" name="kwitansi" id="kwitansi" value="{{ old('kwitansi') }}" required>
                                @error('kwitansi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="krs">Upload KRS</label>
                                <input type="file" class="form-control @error('krs') is-invalid @enderror" name="krs" id="krs" value="{{ old('krs') }}" required>
                                @error('krs')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                                                    <!-- Bagian untuk menampilkan tautan unduh untuk File 1 -->
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
