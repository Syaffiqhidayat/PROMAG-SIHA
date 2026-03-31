<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="font-weight-bold">TAMBAH BARANG</h4>
                        <hr>
                        <form action="{{ route('hardware.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">KODE BARANG</label>
                                        <input type="text" class="form-control @error('kd_barang') is-invalid @enderror" name="kd_barang" value="{{ old('kd_barang') }}" placeholder="Contoh: BRG-001">
                                        @error('kd_barang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NO IVENTARIS</label>
                                        <input type="text" class="form-control @error('no_iventaris') is-invalid @enderror" name="no_iventaris" value="{{ old('no_iventaris') }}" placeholder="Masukkan No Iventaris">
                                        @error('no_iventaris')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>                             
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NAMA BARANG</label>
                                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama Barang">
                                        @error('nama_barang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="font-weight-bold">JENIS BARANG</label>
                                    <select class="form-control @error('jenis_barang') is-invalid @enderror" name="jenis_barang">
                                        <option value="" disabled {{ old('jenis_barang') ? '' : 'selected' }}>-- Pilih Jenis Barang --</option>
                                        <option value="Monitor" {{ old('jenis_barang') == 'Monitor' ? 'selected' : '' }}>Monitor</option>
                                        <option value="Printer" {{ old('jenis_barang') == 'Printer' ? 'selected' : '' }}>Printer</option>
                                        <option value="CPU/Komputer" {{ old('jenis_barang') == 'CPU/Komputer' ? 'selected' : '' }}>CPU/Komputer</option>
                                        <option value="Laptop" {{ old('jenis_barang') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                        <option value="Stavol" {{ old('jenis_barang') == 'Stavol' ? 'selected' : '' }}>Stavol</option>
                                        <option value="Mouse" {{ old('jenis_barang') == 'Mouse' ? 'selected' : '' }}>Mouse</option>
                                        <option value="Keyboard" {{ old('jenis_barang') == 'Keyboard' ? 'selected' : '' }}>Keyboard</option>
                                        <option value="Scaner" {{ old('jenis_barang') == 'Scaner' ? 'selected' : '' }}>Scaner</option>
                                        <option value="Jaringan" {{ old('jenis_barang') == 'Jaringan' ? 'selected' : '' }}>Jaringan</option>
                                        <option value="WIFI" {{ old('jenis_barang') == 'WIFI' ? 'selected' : '' }}>WIFI</option>
                                        <option value="TV Display" {{ old('jenis_barang') == 'TV Display' ? 'selected' : '' }}>TV Display</option>
                                        <option value="Finger Print" {{ old('jenis_barang') == 'Finger Print' ? 'selected' : '' }}>Finger Print</option>
                                    </select>

                                    @error('jenis_barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">MEREK</label>
                                        <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" value="{{ old('merek') }}" placeholder="Masukkan Merek">
                                        @error('merek')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">TIPE</label>
                                        <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe') }}" placeholder="Masukkan Tipe">
                                        @error('tipe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SPESIFIKASI</label>
                                <textarea class="form-control @error('spek') is-invalid @enderror" name="spek" rows="3" placeholder="Masukkan Spesifikasi">{{ old('spek') }}</textarea>
                                @error('spek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KETERANGAN</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="2" placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">UNIT</label>
                                <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id">
                                    <option value="">-- Pilih Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                            

                            <div class="form-group">
                                <label class="font-weight-bold">TANGGAL MASUK</label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                                @error('tanggal_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('hardware.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>