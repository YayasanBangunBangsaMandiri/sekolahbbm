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
            position: relative;
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
            color: {{ $setting->header_text_color }};
        }
        .yayasan {
            font-size: 12pt;
            margin-bottom: 5px;
        }
        .school-name {
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 3px;
            color: {{ $setting->letter_header_color }};
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
            margin-right: 30px;
        }
        .signature-date,
        .signature-title {
            text-align: center;
            margin-bottom: 5px;
        }
        .signature-title {
            margin-bottom: 60px;
        }
        .signature-table {
            width: 100%;
            margin: 0 auto;
        }
        .signature-table td {
            text-align: center;
        }
        .principal-name {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }
        .principal-nip {
            text-align: left;
            display: block;
            padding: 5px 0;
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
            width: 150px;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        @if($setting->logo_path)
            <img src="{{ public_path('storage/' . $setting->logo_path) }}" alt="Logo Sekolah" class="logo">
        @endif
        <div class="header-text">
            <div class="yayasan">{{ $setting->foundation_name }}</div>
            <div class="school-name">{{ $setting->school_name_kop }}</div>
            <div class="sub-name">{{ $setting->school_tagline }}</div>
            <div class="school-address">
                {{ $setting->school_address }}<br>
                website: {{ $setting->school_website }} | E-Mail: {{ $setting->school_email }} | Telp. {{ $setting->school_phone }}
            </div>
        </div>
        <div class="sk-text">{{ $setting->school_decree }}</div>
    </div>

    <div class="content">
        <p>Nomor: {{ $registrationNumber }}/SMK/{{ date('Y') }}</p>
        
        <p>Kepada Yth,<br>
        {{ $registration->student_name }}<br>
        di Tempat</p>

        <p>Dengan hormat,</p>

        <p>Berdasarkan hasil seleksi penerimaan siswa baru tahun ajaran {{ date('Y') }}/{{ date('Y')+1 }}, 
        dengan ini kami sampaikan bahwa:</p>

        <table class="info">
            <tr>
                <td>Nama</td>
                <td>: {{ ucwords(strtolower($registration->student_name)) }}</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>: {{ $registration->nisn }}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl Lahir</td>
                <td>: {{ ucwords(strtolower($registration->place_of_birth)) }}, {{ \Carbon\Carbon::parse($registration->birthdate)->isoFormat('D MMMM Y') }}</td>
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
            <p class="signature-date">{{ $date }}</p>
            <p class="signature-title">Kepala Sekolah,</p>
            <table class="signature-table">
                <tr>
                    <td>
                        <p class="principal-name"><u>{{ $setting->principal_name }}</u></p>
                        <p class="principal-nip">NIP. {{ $setting->principal_nip }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html> 