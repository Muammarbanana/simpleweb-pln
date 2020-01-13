<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <style>
        .content {
            font-size:18px;
            font-family: 'Nunito';
            margin-top: 2%;
            margin-left: 2%;
        }
        .tabel {
            font-family: 'Nunito';
            margin:2%;
        }
        #tomboltambah {
            float: right;
            margin-right: 2%;
        }
    </style>
    <title>Beranda</title>
</head>
<body>
    <div class="content">
        <h1>Daftar Proyek</h1>
        <button id="tomboltambah" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah Proyek</button>
    </div>
    <div class="tabel">
        <table class="table table-striped" id="tabelProyek">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Pekerjaan</th>
                    <th>Wilayah Kerja</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>WBS</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyek as $key => $data)
                <tr>
                    <td>{{$data->Nomor_Surat}}</td>
                    <td>{{$data->Pekerjaan}}</td>
                    <td>{{$data->Wilayah_Kerja}}</td>
                    <td>{{$data->Tanggal_Awal}}</td>
                    <td>{{$data->Tanggal_Akhir}}</td>
                    <td>{{$data->WBS}}</td>
                    <td>{{$data->Keterangan}}</td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#editModal"
                            data-id="<?=$data->id_proyek;?>" 
                            data-no="<?=$data->Nomor_Surat;?>" 
                            data-pk="<?=$data->Pekerjaan;?>" 
                            data-wilker="<?=$data->Wilayah_Kerja;?>" 
                            data-tgl1="<?=$data->Tanggal_Awal;?>" 
                            data-tgl2="<?=$data->Tanggal_Akhir;?>" 
                            data-wbs="<?=$data->WBS;?>" 
                            data-ket="<?=$data->Keterangan;?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal" data-no="<?=$data->id_proyek;?>"><i class="fa fa-close"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Hapus -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan <i class="fa fa-exclamation-circle"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer">
                    <a href="" name="tombol_hapus" type="button" class="btn btn-success">Y</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">G</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Proyek <i class="fa fa-pencil"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="/proyek/update" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="editNomorSurat">Nomor Surat</label>
                                <input name="nomor_surat" class="form-control" id="editNomorSurat">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Pekerjaan</label>
                                <input name="pekerjaan" class="form-control" id="editPekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Wilayah Kerja</label>
                                <input name="wilker" class="form-control" id="editWilker">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Tanggal Awal</label>
                                <input name="tgl1" class="form-control" id="editTanggalAwal" type="date">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Tanggal Akhir</label>
                                <input name="tgl2" class="form-control" id="editTanggalAkhir" type="date">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">WBS</label>
                                <input name="wbs" class="form-control" id="editWBS">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Keterangan</label>
                                <input name="ket" class="form-control" id="editKeterangan">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahForm" action="/proyek/tambah" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="editNomorSurat">Nomor Surat</label>
                                <input name="nomor_surat" class="form-control" id="editNomorSurat">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Pekerjaan</label>
                                <input name="pekerjaan" class="form-control" id="editPekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Wilayah Kerja</label>
                                <input name="wilker" class="form-control" id="editWilker">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Tanggal Awal</label>
                                <input name="tgl1" class="form-control" id="editTanggalAwal" type="date">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Tanggal Akhir</label>
                                <input name="tgl2" class="form-control" id="editTanggalAkhir" type="date">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">WBS</label>
                                <input name="wbs" class="form-control" id="editWBS">
                            </div>
                            <div class="form-group">
                                <label for="editPekerjaan">Keterangan</label>
                                <input name="ket" class="form-control" id="editKeterangan">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#tabelProyek').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _PAGE_ dari _PAGES_",
                    "infoEmpty": "Data tidak ada",
                    "infoFiltered": "(disaring dari _MAX_ data total)",
                    "info": "Menampilkan data _START_ sampai _END_ dari _TOTAL_ data",
                    "paginate": {
                        "first":      "Pertama",
                        "last":       "Terakhir",
                        "next":       "Selanjutnya",
                        "previous":   "Sebelumnya"
                    },
                    "search": "Cari: "
        }
            });
        });
        $('#hapusModal').on('shown.bs.modal', function (e){
            var data_no = $(e.relatedTarget).data('no');
            var enc_data_no = encodeURIComponent(data_no);
            $(e.currentTarget).find('a[name="tombol_hapus"]').attr("href","/proyek/hapus/"+enc_data_no);
        });
        $('#editModal').on('show.bs.modal', function (e){
            var data_id = $(e.relatedTarget).data('id')
            var data_no = $(e.relatedTarget).data('no');
            var data_pk = $(e.relatedTarget).data('pk');
            var data_wilker = $(e.relatedTarget).data('wilker'); 
            var data_tgl1 = $(e.relatedTarget).data('tgl1');
            var data_tgl2 = $(e.relatedTarget).data('tgl2');
            var data_wbs = $(e.relatedTarget).data('wbs');
            var data_ket = $(e.relatedTarget).data('ket');
            $(e.currentTarget).find('input[name="id"]').val(data_id);
            $(e.currentTarget).find('input[name="nomor_surat"]').val(data_no);
            $(e.currentTarget).find('input[name="pekerjaan"]').val(data_pk);
            $(e.currentTarget).find('input[name="wilker"]').val(data_wilker);
            $(e.currentTarget).find('input[name="tgl1"]').val(data_tgl1);
            $(e.currentTarget).find('input[name="tgl2"]').val(data_tgl2);
            $(e.currentTarget).find('input[name="wbs"]').val(data_wbs);
            $(e.currentTarget).find('input[name="ket"]').val(data_ket);
        });
    </script>
</body>
</html>