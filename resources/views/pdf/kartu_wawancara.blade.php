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
        table, .notes {
            margin: 0 250px;
        }
        @page { margin: 0; }
    </style>
</head>
<body class="A4">
    <section class="page">
        <div class="kop">
            <img src="{{ public_path("img/kop_surat.jpg") }}" alt="kop_surat">
        </div>
        <div class="title">
            <h2 style="margin-bottom: 0;">KARTU WAWANCARA</h2>
            <p style="margin-top: .4em;">Seleksi Penerimaan Siswa Baru</p>
        </div>
        <table>
            <tr>
                <th rowspan="3"><img src="{{ public_path("img/berkas/".Auth::user()->berkas->photo) }}" alt="kop_surat" width="400px;"></th>
                <td style="padding-left: 150px;">Nama</th>
                <td style="padding-left: 100px;">: {{ Auth::user()->name }}</th>
            </tr>
            <tr>
                <td style="padding-left: 150px;">Email</td>
                <td style="padding-left: 100px;">: {{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <td style="padding-left: 150px;">Tanggal</td>
                <td style="padding-left: 100px;">: {{ Auth::user()->gelombang->wawancara->format('d F Y, H:i') }} WIB</td>
            </tr>
        </table>
        <div class="notes" style="margin-top: 200px;">
            <p>Nb.</p>
            <ol>
                <li>Kartu wawancara harus dibawa ketika akan mengikuti wawancara</li>
                <li>Diharapkan membawa Fotocopy Raport</li>
                <li>Diwajibkan menggunakan seragam sekolah sebelumnya</li>
                <li>Tidak diperbolehkan menggunakan Kaos dan Sandal</li>
            </ol>
        </div>
    </section>