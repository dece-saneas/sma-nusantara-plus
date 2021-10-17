<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kartu Wawancara</title>
    <style type="text/css">
        html, body { margin: 0; padding: 0; font: 12pt; font-family: arial, sans-serif; }
        
        body.A3               { width: 297mm; height: 420mm }
        body.A3.landscape     { width: 420mm; height: 297mm }
        body.A4               { width: 210mm; height: 297mm }
        body.A4.landscape     { width: 297mm; height: 210mm }
        body.A5               { width: 148mm; height: 210mm }
        body.A5.landscape     { width: 210mm; height: 148mm }
        body.letter           { width: 216mm; height: 280mm }
        body.letter.landscape { width: 280mm; height: 216mm }
        body.legal            { width: 216mm; height: 357mm }
        body.legal.landscape  { width: 357mm; height: 216mm }
        
        .page {
            height: 297mm;
            /* Style */
        }
        .kop {
            width: 100%;
        }
        .title {
          text-align: center;
        }
        table.main {
            margin: 0 250px;
            border-collapse: collapse;
        }
        tr, th,td {
            margin: 0;
            padding: 0;
        }
        @page { margin: 0; }
    </style>
</head>
<body class="A4">
    <section class="page">
        <div class="kop">
            <img src="{{ url('img/kop_surat.jpg') }}" alt="kop_surat">
        </div>
        <div class="title">
            <h2 style="margin-bottom: 80px;">IDENTITAS DIRI</h2>
        </div>
        <table class="main">
            <tr width="100%;">
                <td width="1600px">
                    <table>
                        <tr>
                            <td colspan="2"><h4>KETERANGAN CALON SISWA</h4></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>: {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: {{ $user->identitas->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>: {{ $user->identitas->tempat_lahir }}, {{ $user->identitas->tanggal_lahir->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: {{ $user->identitas->agama }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>: {{ $user->identitas->kewarganegaraan }}</td>
                        </tr>
                        <tr>
                            <td>Anak Ke</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="width: 400px;">: {{ $user->identitas->anak_ke }}</td>
                                        <td style="width: 650px;">Jumlah Saudara Kandung</td>
                                        <td>: {{ $user->identitas->jumlah_saudara_kandung }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Anak</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="width: 400px;">: {{ $user->identitas->status }}</td>
                                        <td style="width: 650px;">Jumlah Saudara Tiri</td>
                                        <td>: {{ $user->identitas->jumlah_saudara_tiri }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="text-align: center"><img src="{{ url('img/berkas/'.$user->berkas->photo) }}" alt="photo" width="400px;"> <br> <p style="margin: 20px 0 0 0;">No Pendaftaran</p><p style="margin: 0;">{{ $user->no_registration }}</p></th>
            </tr>
            <tr width="100%;">
                <td width="1600px">
                    <table>
                        <tr>
                            <td colspan="2"><h4>KETERANGAN TEMPAT TINGGAL</h4></td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>: {{ $user->identitas->alamat }}, {{ $user->identitas->kelurahan }}, {{ $user->identitas->kecamatan }}, {{ $user->identitas->kota }}, {{ $user->identitas->provinsi }}, {{ $user->identitas_kode_pos }}</td>
                        </tr>
                        <tr>
                            <td>Tinggal Dengan</td>
                            <td>: {{ $user->identitas->tinggal_dengan }}</td>
                        </tr>
                        <tr>
                            <td>Jarak ke Sekolah</td>
                            <td>: {{ $user->identitas->jarak_ke_sekolah }}</td>
                        </tr>
                        <tr>
                            <td>Ke Sekolah Dengan</td>
                            <td>: {{ $user->identitas->kesekolah_dengan }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Handphone</td>
                            <td>: {{ $user->identitas->no_handphone }}</td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>
        </table>
    </section>