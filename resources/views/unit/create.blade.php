<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Unit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Unit Baru</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('units.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kd_unit" class="form-label">Kode Unit</label>
                                <input type="text" class="form-control" id="kd_unit" name="kd_unit" value="{{ old('kd_unit') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_unit" class="form-label">Nama Unit</label>
                                <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="{{ old('nama_unit') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('units.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>