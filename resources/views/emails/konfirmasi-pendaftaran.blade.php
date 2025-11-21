<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran Lomba</title>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        body {
            font-family: 'Inter', Arial, sans-serif;
            background-color: #f8f9fa;
            /* Latar belakang lebih cerah */
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .card {
            max-width: 600px;
            /* Sedikit lebih ramping */
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            /* Bayangan yang lebih halus */
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.07), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .header {
            /* Gradien baru yang lebih kaya */
            background: linear-gradient(135deg, #4F46E5, #8B5CF6);
            color: #ffffff;
            text-align: center;
            padding: 50px 30px;
        }

        .header h1 {
            margin: 16px 0 8px;
            font-size: 30px;
            font-weight: 700;
        }

        .header p {
            font-size: 18px;
            margin: 0;
            opacity: 0.9;
        }

        .body {
            padding: 40px 35px;
            color: #334155;
            /* Warna teks slate-700 */
        }

        .body h3 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
        }

        .body p {
            font-size: 16px;
            line-height: 1.7;
            margin: 0 0 16px;
        }

        .details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
            margin-bottom: 30px;
        }

        .details tr {
            /* Garis bawah antar baris, lebih bersih dari zebra-striping */
            border-bottom: 1px solid #e5e7eb;
        }

        .details tr:last-child {
            border-bottom: none;
        }

        .details td {
            padding: 16px 8px;
            /* Padding vertikal lebih banyak */
            vertical-align: top;
            font-size: 15px;
        }

        .details .label {
            color: #64748B;
            /* Warna slate-500 */
            font-weight: 500;
            width: 160px;
            /* Lebar label konsisten */
        }

        .details .value {
            color: #1f2937;
            font-weight: 600;
        }

        .highlight {
            color: #4F46E5;
            /* Sesuaikan dengan warna primer baru */
            font-weight: 700;
        }

        /* Tombol Call-to-Action */
        .cta-wrapper {
            margin: 30px 0;
            text-align: center;
        }

        .cta-button {
            display: inline-block;
            background-color: #4F46E5;
            color: #ffffff;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #4338CA;
            /* Sedikit lebih gelap saat hover */
        }

        .footer {
            text-align: center;
            padding: 30px 20px;
            font-size: 13px;
            color: #94a3b8;
            /* Warna slate-400 */
            background-color: #f8f9fa;
            border-top: 1px solid #e5e7eb;
        }

        .footer p {
            margin: 0 0 15px;
        }

        .footer a {
            color: #64748B;
            text-decoration: none;
            margin: 0 8px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .separator {
            border-top: 1px solid #e5e7eb;
            margin: 30px 0;
        }
    </style>
</head>

<body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tr>
            <td>
                <div class="card">

                    {{-- Header --}}
                    <div class="header">
                        <div style="text-align: center; margin-bottom: 20px;">
                            <svg width="72" height="72" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                fill="#ffffff">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </div>

                        <h1>Pendaftaran Berhasil!</h1>
                        <p>Kami telah menerima pendaftaran Anda.</p>
                    </div>

                    {{-- Body --}}
                    <div class="body">
                        <p>Halo, <span class="highlight">{{ $pendaftaran->peserta->nama_peserta }}</span>,</p>
                        <p>
                            Ini adalah konfirmasi bahwa pendaftaran Anda untuk lomba
                            <span class="highlight">{{ $pendaftaran->lomba->nama_lomba ?? '-' }}</span>
                            telah kami terima dengan sukses.
                        </p>

                        <div class="separator"></div>

                        <h3>Detail Pendaftaran Anda</h3>

                        <table class="details" role="presentation">
                            <tr>
                                <td class="label">Nama Peserta:</td>
                                <td class="value">{{ $pendaftaran->peserta->nama_peserta }}</td>
                            </tr>
                            <tr>
                                <td class="label">Jenis Peserta:</td>
                                <td class="value">{{ $pendaftaran->peserta->jenis_peserta }}</td>
                            </tr>
                            <tr>
                                <td class="label">Kelas:</td>
                                <td class="value">{{ $pendaftaran->peserta->kelas->nama_kelas ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td class="label">Asal Sekolah:</td>
                                <td class="value">{{ $pendaftaran->peserta->asal_sekolah ?? '-' }}</td>
                            </tr>

                            {{-- Kolom baru: Asal PIK-R --}}
                            <tr>
                                <td class="label">Asal PIK-R:</td>
                                <td class="value">{{ $pendaftaran->peserta->asal_pikr ?? '-' }}</td>
                            </tr>

                            {{-- Logika untuk anggota kelompok --}}
                            @if($pendaftaran->peserta->jenis_peserta === 'Kelompok' && !empty($pendaftaran->peserta->anggota_kelompok))
                                <tr>
                                    <td class="label">Anggota Kelompok:</td>
                                    <td class="value" style="line-height:1.7;">
                                        @php
                                            // Coba decode sebagai JSON, jika gagal, anggap sebagai string biasa
                                            $anggota = json_decode($pendaftaran->peserta->anggota_kelompok, true);
                                        @endphp
                                        @if($anggota && is_array($anggota))
                                            {{-- Tampilkan sebagai daftar jika ini adalah array JSON --}}
                                            {!! nl2br(e(implode("\n", $anggota))) !!}
                                        @else
                                            {{-- Tampilkan sebagai teks biasa dengan penggantian koma jika bukan JSON --}}
                                            {!! nl2br(e(str_replace(',', "\n", $pendaftaran->peserta->anggota_kelompok))) !!}
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            {{-- Akhir logika anggota kelompok --}}

                            <tr>
                                <td class="label">Tanggal Daftar:</td>
                                <td class="value">{{ $pendaftaran->created_at->format('d F Y, H:i') }} WIB</td>
                            </tr>
                            <tr>
                                <td class="label">Email:</td>
                                <td class="value">{{ $pendaftaran->peserta->email ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="label">No. HP:</td>
                                <td class="value">{{ $pendaftaran->peserta->no_hp }}</td>
                            </tr>
                        </table>


                        <p style="margin-top:30px; line-height: 1.7;">
                            Jika Anda memiliki pertanyaan, jangan ragu untuk membalas email ini.<br><br>
                            Salam hangat,<br>
                            Panitia Lomba
                        </p>
                    </div>

                    {{-- Footer --}}
                    <div class="footer">
                        <p>© {{ date('Y') }} Panitia Lomba. Semua hak cipta dilindungi.</p>
                        <p style="margin: 0;">
                            <a href="#">Facebook</a> &bull;
                            <a href="#">Instagram</a> &bull;
                            <a href="pikrequestsman1tpp.my.id">Website</a>
                        </p>
                    </div>

                </div>
            </td>
        </tr>
    </table>

</body>

</html>