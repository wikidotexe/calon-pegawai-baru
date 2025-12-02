@extends("dashboard.pdf.layouts.app")

@section("container")
    <div style="display: flex; align-items: center; gap: 1em; margin-bottom: 1.5em;">
        <div style="flex: 0 0 80px;">
            <img src="data:image/png;base64,{{ $logo }}" style="width: 80px;" alt="Logo">
        </div>
        <div style="flex: 1; text-align: center;">
            <h2 style="margin: 0; font-size: 18px;">PT. Lizzie Parra Kreasi</h2>
            <p style="margin: 2px 0; font-size: 12px;">Jalan Limau 2 No. 3, RT.6/RW.4, Kebayoran Baru, Kramat Pela, Jakarta Selatan</p>
            <p style="margin: 2px 0; font-size: 12px;">Telepon: (021) 89190800 | Email: info@blpbeauty.com</p>
        </div>
    </div>
    <hr style="border: 1px solid black; margin-bottom: 2em;">
    <div class="-mx-3 flex flex-wrap">
        <div class="w-full max-w-full flex-none px-3 table-pdf">
            <div class="mb-5 judul-laporan">
                <h1>{{ $judul }}</h1>
            </div>

            <div class="shadow-soft-xl relative mb-5 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border">
                <div class="border-b-solid flex flex-row items-center justify-between rounded-t-2xl border-b-0 border-b-transparent bg-white p-6 pb-0">
                    <h2>Hasil Perhitungan TOPSIS</h2>
                </div>
                <div id='recipients' class="rounded bg-white p-8 shadow">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%; padding-top: 1em; padding-bottom: 1em; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #CD5656; color: white;">
                                <th style="border-bottom:1px solid #ddd; text-align:center; padding:8px;">Nama Kandidat</th>
                                <th style="border-bottom:1px solid #ddd; text-align:center; padding:8px;">Posisi Yang Dilamar</th>
                                <th style="border-bottom:1px solid #ddd; text-align:center; padding:8px;">Nilai</th>
                                <th style="border-bottom:1px solid #ddd; text-align:center; padding:8px;">Target</th>
                                <th style="border-bottom:1px solid #ddd; text-align:center; padding:8px;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $target = 0.5;
                                $layak = 0;
                                $tidakLayak = 0;
                            @endphp
                            @foreach ($hasilTopsis as $item)
                                @php
                                    $keterangan = $item->nilai >= $target ? 'Layak' : 'Tidak Layak';
                                    if ($keterangan === 'Layak') $layak++;
                                    else $tidakLayak++;
                                @endphp
                                <tr style="background-color: {{ $loop->even ? '#f2f2f2' : 'white' }};">
                                    <td style="border-bottom:1px solid #ddd; padding:8px; text-align:center;">{{ $item->nama_objek }}</td>
                                    <td style="border-bottom:1px solid #ddd; padding:8px; text-align:center;">{{ $item->posisi_lamar }}</td>
                                    <td style="border-bottom:1px solid #ddd; padding:8px; text-align:center;">{{ round($item->nilai, 3) }}</td>
                                    <td style="border-bottom:1px solid #ddd; padding:8px; text-align:center;">{{ $target }}</td>
                                    <td style="border-bottom:1px solid #ddd; padding:8px; text-align:center;">{{ $keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Bagian tanda tangan --}}
                    <div style="width: 100%; margin-top: 3em; text-align: right;">
                        <p>Bekasi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                        <p style="margin-top: 4em; font-weight: bold; text-decoration: underline;">
                            Fitria Latifanisa
                        </p>
                        <p><em>Sr. People Operation</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
