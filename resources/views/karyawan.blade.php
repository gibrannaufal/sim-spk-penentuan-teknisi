<!-- karyawan.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card" style="width: 1000px">
    <div class="card-header">
        <h5 class="card-title">Daftar Karyawan</h5>
    </div>
    <div class="card-body row">
        <div class="col-md-12">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal"> + Tambah Karyawan</button>
        </div>
        <table id="karyawanTable" class="table table-striped table-bordered col-md-12 mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nilai Komputer</th>
                    <th>Nilai Jaringan</th>
                    <th>Nilai Pendidikan</th>
                    <th>Nilai Disiplin</th>
                    <th>Nilai Kepribadian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nilai_komputer }}</td>
                        <td>{{ $data->nilai_jaringan }}</td>
                        <td>{{ $data->nilai_pendidikan }}</td>
                        <td>{{ $data->nilai_disiplin }}</td>
                        <td>{{ $data->nilai_kepribadian }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal{{ $data->id }}"> Edit </button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $data->id }}"> Delete </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 620px">
            <!-- Isi form tambah karyawan di sini -->
            <form action="{{ route('karyawan') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="col-md-6" > 
                            <input type="text" style="width: 300px" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div class="col-md-12 row mt-2">
                        <div class="col-md-6">
                            <label for="nama">Pemahaman Komputer </label>
                        </div>
                
                        <div class="col-md-6"> 
                            <select name="nilai_komputer" required style="width: 300px">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="0">Tidak Lulus</option>
                                <option value="0.25">Tidak Lulus Dan Tes Ulang</option>
                                <option value="0.50">Tidak Lulus Dan Lakukan Wawancara</option>
                                <option value="0.75">Lulus Dan Lakukan Wawancara</option>
                                <option value="1">Lulus Dan Tidak Perlu Wawancara</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 row mt-2">
                        <div class="col-md-6">
                            <label for="nama">Pemahaman Jaringan </label>
                        </div>
                
                        <div class="col-md-6"> 
                            <select name="nilai_jaringan" required style="width: 300px">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="0">Tidak Memiliki Sertifikat </option>
                                <option value="0.25">Memiliki 1 Sertifikat SMK</option>
                                <option value="0.50">Memiliki Setidaknya 3 Sertifikat Lokal </option>
                                <option value="0.75">Memiliki Sertifikat Nasional Dan Internasional</option>
                                <option value="1">Memiliki Sertifikat ISO </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 row mt-2">
                        <div class="col-md-6">
                            <label for="nama">Pendidikan</label>
                        </div>
                
                        <div class="col-md-6"> 
                            <select name="nilai_pendidikan" required style="width: 300px">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="0">Tidak Memiliki Background Pendidikan Komputer</option>
                                <option value="0.25">Background Bootcamp</option>
                                <option value="0.50">Background SMK dan Sudah Magang</option>
                                <option value="0.75">Lulusan S1 Komputer</option>
                                <option value="1">Lulusan S2 Komputer </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 row mt-2">
                        <div class="col-md-6">
                            <label for="nama">Disiplin</label>
                        </div>
                
                        <div class="col-md-6"> 
                            <select name="nilai_disiplin" required style="width: 300px">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="0">Datang Terlambat Saat Mengikuti Ujian</option>
                                <option value="1">Datang Tepat Waktu Saat Ujian</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 row mt-2">
                        <div class="col-md-6">
                            <label for="nama">Kepribadian</label>
                        </div>
                
                        <div class="col-md-6"> 
                            <select name="nilai_kepribadian" required style="width: 300px">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="0">Tidak Lulus Psikotes</option>
                                <option value="1">Lulus Psikotes</option>
                            </select>
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modals (buat satu untuk setiap karyawan) -->
@foreach ($karyawan as $data)
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 620px">
                <!-- Isi form edit karyawan di sini -->
                <form action="{{ route('karyawan_update', ['id' => $data->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-6" > 
                                <input type="text" style="width: 300px" name="nama" id="nama" value="{{ $data->nama}}" required>
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <div class="col-md-6">
                                <label for="nama">Pemahaman Komputer </label>
                            </div>
                    
                            <div class="col-md-6"> 
                                <select name="nilai_komputer" required style="width: 300px">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="0" {{ $data->nilai_komputer == 0 ? 'selected' : '' }}>Tidak Lulus</option>
                                    <option value="0.25" {{ $data->nilai_komputer == 0.25 ? 'selected' : '' }}>Tidak Lulus Dan Tes Ulang</option>
                                    <option value="0.50" {{ $data->nilai_komputer == 0.5 ? 'selected' : '' }}>Tidak Lulus Dan Lakukan Wawancara</option>
                                    <option value="0.75" {{ $data->nilai_komputer == 0.75 ? 'selected' : '' }}>Lulus Dan Lakukan Wawancara</option>
                                    <option value="1" {{ $data->nilai_komputer == 1 ? 'selected' : '' }}>Lulus Dan Tidak Perlu Wawancara</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12 row mt-2">
                            <div class="col-md-6">
                                <label for="nama">Pemahaman Jaringan </label>
                            </div>
                    
                            <div class="col-md-6"> 
                                <select name="nilai_jaringan" required style="width: 300px">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="0"    {{ $data->nilai_jaringan  == 0 ? 'selected' : '' }}>Tidak Memiliki Sertifikat </option>
                                    <option value="0.25" {{ $data->nilai_jaringan  == 0.25 ? 'selected' : '' }}>Memiliki 1 Sertifikat SMK</option>
                                    <option value="0.50" {{ $data->nilai_jaringan  == 0.5 ? 'selected' : '' }} >Memiliki Setidaknya 3 Sertifikat Lokal </option>
                                    <option value="0.75" {{ $data->nilai_jaringan  == 0.75 ? 'selected' : '' }}>Memiliki Sertifikat Nasional Dan Internasional</option>
                                    <option value="1"    {{ $data->nilai_jaringan  == 1 ? 'selected' : '' }}>Memiliki Sertifikat ISO </option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12 row mt-2">
                            <div class="col-md-6">
                                <label for="nama">Pendidikan</label>
                            </div>
                    
                            <div class="col-md-6"> 
                                <select name="nilai_pendidikan" required style="width: 300px">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="0"       {{ $data->nilai_pendidikan  == 0 ? 'selected' : '' }}>Tidak Memiliki Background Pendidikan Komputer</option>
                                    <option value="0.25"    {{ $data->nilai_pendidikan  == 0.25 ? 'selected' : '' }}>Background Bootcamp</option>
                                    <option value="0.50"    {{ $data->nilai_pendidikan  == 0.5 ? 'selected' : '' }}>Background SMK dan Sudah Magang</option>
                                    <option value="0.75"    {{ $data->nilai_pendidikan  == 0.75 ? 'selected' : '' }}>Lulusan S1 Komputer</option>
                                    <option value="1"       {{ $data->nilai_pendidikan  == 1 ? 'selected' : '' }}>Lulusan S2 Komputer </option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12 row mt-2">
                            <div class="col-md-6">
                                <label for="nama">Disiplin</label>
                            </div>
                    
                            <div class="col-md-6"> 
                                <select name="nilai_disiplin" required style="width: 300px">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="0" {{ $data->nilai_disiplin  == 0 ? 'selected' : '' }}>Datang Terlambat Saat Mengikuti Ujian</option>
                                    <option value="1" {{ $data->nilai_disiplin  == 1 ? 'selected' : '' }}>Datang Tepat Waktu Saat Ujian</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12 row mt-2">
                            <div class="col-md-6">
                                <label for="nama">Kepribadian</label>
                            </div>
                    
                            <div class="col-md-6"> 
                                <select name="nilai_kepribadian" required style="width: 300px">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="0" {{ $data->nilai_kepribadian  == 0 ? 'selected' : '' }}>Tidak Lulus Psikotes</option>
                                    <option value="1" {{ $data->nilai_kepribadian  == 1 ? 'selected' : '' }}>Lulus Psikotes</option>
                                </select>
                            </div>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Delete Modals (buat satu untuk setiap karyawan) -->
@foreach ($karyawan as $data)
    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Isi form edit karyawan di sini -->
                <form action="{{ route('karyawan_delete', ['id' => $data->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Hapus Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi form edit karyawan di sini -->
                        <label for="nama">Apakah anda benar akan menghapus karyawan {{$data->nama}} ini ?</label>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<script>
//    $(document).ready(function() {
//         $('#karyawanTable').DataTable({
//             paging: true,  // Aktifkan paginasi
//             pageLength: 5  // Batasi jumlah data per halaman
//         });
//     });
</script>

@endsection
