@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Verifikasi </h1>

        <div class="card">
            <div class="card-body">
                <h2>Sertifikat Status: <span class="badge text-bg-success">Verified</span></h2>
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Peserta</td>
                        <td>{{ $hardware->merek }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kursus</td>
                        <td>{{ $hardware->tipe }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection