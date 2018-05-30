<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan Per Semester</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        table > thead > tr > th {
            background-color: #95a5a6; 
        }
        table > tfoot > tr {
            border-style: solid;
            border-color: #95a5a6;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h4>POLITEKNIK INFORMATIKA NASIONAL</h4>
                    <h4>FORM ABSEN MAHASISWA</h4>
                    <h4>SEMESTER <i>{{ $semester->semester }}</i> TA  {{ \Carbon\Carbon::now()->format('Y') - 1 }}/{{ \Carbon\Carbon::now()->format('Y') }}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <th>JURUSAN</th>
                        <td>:</td>
                        <td>{{ $jurusan->jurusan }}</td>
                    </tr>
                    <tr>
                        <th>SEMESTER</th>
                        <td>:</td>
                        <td>{{ $semester->semester }}</td>
                    </tr>
                    <tr>
                        <th>MATA KULIAH</th>
                        <td>:</td>
                        <td>{{ $matkul->nama }}</td>
                    </tr>
                    <tr>
                        <th>KELAS</th>
                        <td>:</td>
                        <td>{{ $kelas->kelas }}</td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>:</td>
                        <td>{{ $matkul->sks }}</td>
                    </tr>
                    <tr>
                        <th>DOSEN</th>
                        <td></td>
                        <td>{{ $dosen->nama }}</td>
                    </tr>
                </table>
                <div class="table-responsive page-break">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>KEHADIRAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transaksi)
                            @foreach ($transaksi->absensi as $row)
                            <tr>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->mahasiswa->nama }}</td>
                                <td>
                                    @if ($row->kehadiran == 0)
                                    Absen
                                    @elseif ($row->kehadiran == 1)
                                    Hadir
                                    @elseif ($row->kehadiran == 2)
                                    Izin
                                    @else
                                    Sakit
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 1)
                                    Telah Disetujui
                                    @else
                                    Direview
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>