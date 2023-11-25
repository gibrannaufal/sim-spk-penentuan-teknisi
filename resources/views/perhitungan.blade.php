<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'Welcome to My Website')

@section('content')
<div class="col-md-12">
    <div class="card" style="width: 100%">
        <div class="card-header">
            <h5 class="card-title">Perhitungan Normalisasi</h5>
        </div>
        <div class="card-body row">
           
            <table id="normalisasiTable" class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nilai Komputer (0.30)</th>
                        <th>Nilai Jaringan (0.25)</th>
                        <th>Nilai Pendidikan (0.20)</th>
                        <th>Nilai Disiplin (0.15)</th>
                        <th>Nilai Kepribadian (0.10)</th>
                        
                    </tr>
                </thead>
              
            </table>
        </div>
    </div>
</div>
<br>

<div class="col-md-12 row">
    <div class="col-md-6">
        <div class="card" style="width: 100%">
            <div class="card-header">
                <h5 class="card-title">Perhitungan Vektor S</h5>
            </div>
            <div class="card-body row">
               
                <table id="vektorSTable" class="table table-striped table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Nilai Vektor S</th>
                            
                        </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="width: 100%">
            <div class="card-header">
                <h5 class="card-title">Perhitungan Vektor V</h5>
            </div>
            <div class="card-body row">
               
                <table id="nilaiVTable" class="table table-striped table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Nilai V</th>
                            
                        </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
    </div>
</div>

<script>
   $(function() {
        $('#normalisasiTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/normalisasi-data",
                type: "GET"
            },
            lengthMenu: [5, 10, 25, 50], // Pilihan panjang halaman
            pageLength: 5, // Jumlah data per halaman awal
            paging: true, // Mengaktifkan paginasi
            columns: [
                { 
                data: null,
                name: 'no',
                render: function (data, type, row, meta) {
                    // Menghasilkan nomor urut berdasarkan indeks + 1
                    return meta.row + 1;
                }
                },
                { data: 'nama', name: 'nama' },
                { data: 'nilai_komputer', name: 'nilai_komputer' },
                { data: 'nilai_jaringan', name: 'nilai_jaringan' },
                { data: 'nilai_pendidikan', name: 'nilai_pendidikan' },
                { data: 'nilai_disiplin', name: 'nilai_disiplin' },
                { data: 'nilai_kepribadian', name: 'nilai_kepribadian' },
            ]
        });
    });

    $(function() {
        $('#vektorSTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/vektor-data",
                type: "GET",
                error: function(xhr, textStatus, errorThrown) {
                    // Tambahkan log atau tindakan lain untuk menangani kesalahan
                    console.error('DataTables error:', textStatus, errorThrown);
                }
            },
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            paging: true,
            columns: [
                {
                    data: null,
                    name: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'nama', name: 'nama' },
                { data: 'total_nilai', name: 'nilai_kriteria' },
            ]
        });
    });
    $(function() {
        $('#nilaiVTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/nilaiv-data",
                type: "GET",
                error: function(xhr, textStatus, errorThrown) {
                    // Tambahkan log atau tindakan lain untuk menangani kesalahan
                    console.error('DataTables error:', textStatus, errorThrown);
                }
            },
            lengthMenu: [5, 10, 25, 50],
            pageLength: 5,
            paging: true,
            columns: [
                {
                    data: null,
                    name: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'nama', name: 'nama' },
                { data: 'total_nilai', name: 'nilai_V' },
            ]
        });
    });

</script>

@endsection

