<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Penerimaan Siswa</title>
    <style>
        @page {
            margin: {{ $setting->letter_margin_top }}mm {{ $setting->letter_margin_right }}mm {{ $setting->letter_margin_bottom }}mm {{ $setting->letter_margin_left }}mm;
            size: {{ $setting->paper_size }} {{ $setting->paper_orientation }};
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.3;
            margin: 0;
            padding: 0;
            font-size: 11pt;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
        }
        .logo {
            width: 80px;
            height: auto;
            position: absolute;
            left: 30px;
            top: 10px;
        }
        .header-text {
            margin-left: 100px;
            margin-right: 30px;
        }
        .yayasan {
            font-size: 12pt;
            margin-bottom: 5px;
        }
        .school-name {
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 3px;
            color: #006400;
        }
        .sub-name {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .school-address {
            font-size: 9pt;
            margin-bottom: 3px;
            line-height: 1.2;
        }
        .sk-text {
            font-size: 8pt;
            margin-top: 5px;
            border-top: 1px solid #000;
            padding-top: 3px;
            width: 100%;
            text-align: center;
        }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 30px;
        }
        .signature {
            float: right;
            width: 250px;
            text-align: center;
        }
        .signature-content {
            text-align: left;
        }
        .clear {
            clear: both;
        }
        table.info {
            margin: 10px 0 10px 30px;
            border-spacing: 3px;
        }
        table.info td {
            vertical-align: top;
            padding: 1px 0;
            font-size: 11pt;
        }
        table.info td:first-child {
            width: 100px;
        }
        p {
            margin: 5px 0;
        }
        .principal-info {
            margin-top: 10px;
            text-align: left;
        }
        .principal-info p {
            margin: 0;
            line-height: 1.3;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo Sekolah" class="logo">
        <div class="header-text">
            <div class="yayasan">YAYASAN BANGUN BANGSA MANDIRI (YBBM) INDRAMAYU</div>
            <div class="school-name">SMK BANGUN BANGSA MANDIRI KANDANGHAUR</div>
            <div class="sub-name">SEKOLAH PUSAT KEUNGGULAN</div>
            <div class="school-address">
                Jl. P.U. Kemped No 212 Desa Wirakanan Kecamatan Kandanghaur Kabupaten Indramayu - 45254<br>
                website: smkbbmindramayu.sch.id | E-Mail: info@smkbbmindramayu.sch.id | Telp. (0234) 505194
            </div>
        </div>
        <div class="sk-text">SK. Kepala Dinas Pendidikan Kab. Indramayu No. 421.5 / Kep. 05 – Disdik/ 2007</div>
    </div>

    <div class="content">
        <p>Nomor: {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}/SMK/{{ date('Y') }}</p>
        
        <p>Kepada Yth,<br>
        {{ $registration->student_name }}<br>
        di Tempat</p>

        <p>Dengan hormat,</p>

        <p>Berdasarkan hasil seleksi penerimaan siswa baru tahun ajaran {{ date('Y') }}/{{ date('Y')+1 }}, 
        dengan ini kami sampaikan bahwa:</p>

        <table class="info">
            <tr>
                <td>Nama</td>
                <td>: {{ $registration->student_name }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>: {{ $registration->nisn }}</td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>: {{ $registration->major->name }}</td>
            </tr>
        </table>

        <p>Dinyatakan <strong>DITERIMA</strong> sebagai calon siswa {{ $setting->school_name }}.</p>

        <p>Selanjutnya dimohon untuk melakukan daftar ulang pada:</p>
        <table class="info">
            <tr>
                <td>Tanggal</td>
                <td>: {{ date('d F Y', strtotime('+7 days')) }} - {{ date('d F Y', strtotime('+14 days')) }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>: 08.00 - 15.00 WIB</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>: Ruang Tata Usaha {{ $setting->school_name }}</td>
            </tr>
        </table>

        <p>Selamat bergabung di keluarga besar {{ $setting->school_name }}.</p>
    </div>

    <div class="footer">
        <div class="signature">
            <p>{{ date('d F Y') }}</p>
            <p>Kepala Sekolah,</p>
            <br><br><br>
            <div class="principal-info">
                <p><u>{{ $setting->principal_name }}</u></p>
                <p>NIP. {{ $setting->principal_nip }}</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html> 