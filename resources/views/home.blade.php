<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('title', 'Welcome to My Website')

@section('content')
<div class="col-md-12 row">
    <div class="col-md-6">
        <div class="card" >
            <div class="card-header">
                <h5 class="card-title">Perankingan</h5>
            </div>
            <div class="card-body row">
               
                <table id="rankingTable" class="table table-striped table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama Karyawan</th>
                            <th>Nilai Vektor V</th>
                            
                        </tr>
                    </thead>
                  
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" >
            <div class="card-header">
                <h5 class="card-title">Catatan</h5>
            </div>
            <div class="card-body row">
                <p> Dari Setiap Karyawan Didapatkan Bahwa Alternatif Terbaik Ada Pada 
                    <b> {{$ranking[0]['nama']}} </b> Dengan Nilai <b> {{$ranking[0]['total_nilai']}}. </b>
                </p>
            </div>
        </div>
    </div>
</div>

<script> 
       $(function() {
        $('#rankingTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/ranking-data",
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
