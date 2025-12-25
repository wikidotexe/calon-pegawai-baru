@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Tabel Data Kandidat</h6>
                    <div class="flex gap-2">
                        <label for="add_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                            <i class="ri-add-fill"></i>
                            Tambah Calon Kandidat
                        </label>
                        <label for="import_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-blue-500 to-blue-600 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                            <i class="ri-file-upload-line"></i>
                            Import CSV
                        </label>
                    </div>
                </div>
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="tabel_data" class="stripe hover w-full text-sm border border-gray-300 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Nama Kandidat</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Posisi Yang Dilamar</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Pendidikan Terakhir</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Pengalaman Kerja</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($data as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->nama_kandidat }}</td>
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->posisi_lamar }}</td>
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->pendidikan_terakhir }}</td>
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->pengalaman_kerja }}</td>
                                    <td class="px-8 py-4 border border-gray-300">
                                        <div class="flex justify-center items-center gap-4">
                                            <label for="edit_button" class="cursor-pointer text-blue-600 hover:text-blue-800"
                                                onclick="return edit_button('{{ $item->id }}')">
                                                <i class="ri-pencil-line text-xl"></i>
                                            </label>
                                            <button class="text-red-600 hover:text-red-800"
                                                onclick="return delete_button('{{ $item->id }}', '{{ $item->nama_kandidat }}');">
                                                <i class="ri-delete-bin-line text-xl"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form Tambah Data --}}
            <input type="checkbox" id="add_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <form action="{{ route('objek.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-semibold mb-4">
                            Tambah Calon Kandidat
                        </h3>

                        <!-- Nama Kandidat -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama Kandidat</label>
                            <input type="text"
                                name="nama_kandidat"
                                placeholder="Nama Kandidat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                value="{{ old('nama_kandidat') }}"
                                required>
                            @error('nama_kandidat')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Posisi Yang Dilamar -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Posisi Yang Dilamar</label>
                            <input type="text"
                                name="posisi_lamar"
                                placeholder="Posisi Yang Dilamar"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                value="{{ old('pengalaman_kerja') }}"
                                required>
                            @error('posisi_lamar')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pendidkan Terakhir-->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Pendidikan Terakhir</label>
                            <input type="text"
                                name="pendidikan_terakhir"
                                placeholder="Pendidikan Terakhir"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                value="{{ old('pendidikan_terakhir') }}"
                                required>
                            @error('pendidikan_terakhir')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pengalaman Kerja -->
                        <div class="mb-6">
                            <label class="block mb-1 font-medium">Pengalaman Kerja</label>
                            <input type="text"
                                name="pengalaman_kerja"
                                placeholder="Pengalaman Kerja"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                value="{{ old('pengalaman_kerja') }}"
                                required>
                            @error('pengalaman_kerja')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="modal-action flex gap-3 mt-6">
                            <button type="submit"
                                class="px-6 py-2 bg-greenPrimary text-greenPrimary rounded-3 shadow-sm 
                                    active:scale-[0.98] transition-all">
                                Simpan
                            </button>

                            <label for="add_button"
                                class="px-6 py-2 bg-gray-100 text-gray-700 rounded-3 border border-gray-300 
                                    hover:bg-gray-200 cursor-pointer transition-all">
                                Batal
                            </label>
                        </div>

                    </form>
                </div>
                <label class="modal-backdrop" for="add_button">Close</label>
            </div>

            {{-- Form Ubah Data --}}
            <input type="checkbox" id="edit_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box" id="edit_form">
                    <form action="{{ route('objek.perbarui') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-semibold mb-4">
                            Ubah {{ $judul }}: 
                            <span class="text-greenPrimary" id="title_form">
                                <span class="loading loading-dots loading-md"></span>
                            </span>
                        </h3>

                        <input type="hidden" name="id" />

                        <!-- Nama Kandidat -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama Kandidat</label>
                            <input type="text"
                                name="nama_kandidat"
                                placeholder="Nama Kandidat"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('nama_kandidat')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jenis Yang Dilamar -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Posisi Yang Dilamar</label>
                            <input type="text"
                                name="posisi_lamar"
                                placeholder="Posisi Yang Dilamar"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('posisi_lamar')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pendidikan Terakhir-->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Pendidikan Terakhir</label>
                            <input type="text"
                                name="pendidikan_terakhir"
                                placeholder="Pendidikan Terakhir"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('pendidikan_terakhir')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pengalaman Kerja -->
                        <div class="mb-6">
                            <label class="block mb-1 font-medium">Pengalaman Kerja</label>
                            <input type="text"
                                name="pengalaman_kerja"
                                placeholder="Pengalaman Kerja"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('pengalaman_kerja')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="modal-action flex gap-3 mt-6">
                            <button type="submit"
                                class="px-6 py-2 bg-greenPrimary text-greenPrimary rounded-3 shadow-sm 
                                    active:scale-[0.98] transition-all">
                                Perbarui
                            </button>

                            <label for="edit_button"
                                class="px-6 py-2 bg-gray-100 text-gray-700 rounded-3 border border-gray-300 
                                    hover:bg-gray-200 cursor-pointer transition-all">
                                Batal
                            </label>
                        </div>
                    </form>
                </div>
                <label class="modal-backdrop" for="edit_button">Close</label>
            </div>

            {{-- Import Data CSV --}}
            <input type="checkbox" id="import_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <form action="{{ route('objek.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-xl font-semibold mb-4">
                            <i class="ri-file-upload-line text-blue-500"></i>
                            Import Data Kandidat
                        </h3>

                        <!-- Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                            <p class="text-sm text-blue-700 mb-2">
                                <i class="ri-information-line"></i>
                                <strong>Format File:</strong> CSV, XLS, atau XLSX
                            </p>
                            <p class="text-sm text-blue-700 mb-3">
                                <i class="ri-file-list-line"></i>
                                <strong>Kolom yang diperlukan:</strong>
                            </p>
                            <ul class="text-xs text-blue-600 ml-4 list-disc">
                                <li>nama_kandidat</li>
                                <li>posisi_lamar</li>
                                <li>pendidikan_terakhir</li>
                                <li>pengalaman_kerja</li>
                            </ul>
                        </div>

                        <!-- Download Template -->
                        <div class="mb-4">
                            <a href="{{ route('objek.template') }}" 
                               class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                <i class="ri-download-line"></i>
                                Download Template CSV
                            </a>
                        </div>

                        <!-- File Input -->
                        <div class="mb-6">
                            <label class="block mb-2 font-medium">Pilih File</label>
                            <input type="file" 
                                   name="import_data" 
                                   accept=".csv,.xls,.xlsx"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg text-dark 
                                          file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                          file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100 cursor-pointer
                                          focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500" 
                                   required />
                            @error('import_data')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="modal-action flex gap-3 mt-6">
                            <button type="submit"
                                class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-sm 
                                    hover:bg-blue-600 active:scale-[0.98] transition-all flex items-center gap-2">
                                <i class="ri-upload-2-line"></i>
                                Import
                            </button>

                            <label for="import_button"
                                class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 
                                    hover:bg-gray-200 cursor-pointer transition-all">
                                Batal
                            </label>
                        </div>
                    </form>
                </div>
                <label class="modal-backdrop" for="import_button">Close</label>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#tabel_data').DataTable({
            responsive: true,
            order: [],
        }).columns.adjust().responsive.recalc();
    });

    function edit_button(id) {
        let loading = `<span class="loading loading-dots loading-md text-greenPrimary"></span>`;
        $("#title_form").html(loading);

        $.ajax({
            type: "get",
            url: "{{ route('objek.ubah') }}",
            data: { _token: "{{ csrf_token() }}", id: id },
            success: function (data) {
                let items = Object.values(data);
                $("#title_form").html(items[1]);
                $("input[name='id']").val(items[0]);
                $("input[name='nama_kandidat']").val(items[1]);
                $("input[name='posisi_lamar']").val(items[2]);
                $("input[name='pendidikan_terakhir']").val(items[3]);
                $("input[name='pengalaman_kerja']").val(items[4]);
            }
        });
    }

    function delete_button(id, nama_kandidat) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            html: "<p>Data tidak dapat dipulihkan kembali!</p><div class='divider'></div><b>Data: " + nama_kandidat + "</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6419E6',
            cancelButtonColor: '#F87272',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "{{ route('objek.hapus') }}",
                    data: { _token: "{{ csrf_token() }}", id: id },
                    success: function () {
                        Swal.fire({
                            title: 'Data berhasil dihapus!',
                            icon: 'success',
                            confirmButtonColor: '#6419E6',
                            confirmButtonText: 'OK'
                        }).then(() => location.reload());
                    },
                    error: function () {
                        Swal.fire({ icon: 'error', title: 'Data gagal dihapus!' });
                    }
                });
            }
        });
    }
</script>

@if (session('berhasil'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('berhasil') }}',
        icon: 'success',
        confirmButtonColor: '#6419E6',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if (session('gagal'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: '{{ session('gagal') }}',
        icon: 'error',
        confirmButtonColor: '#F87272',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: 'Gagal!',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        icon: 'error',
        confirmButtonColor: '#F87272',
        confirmButtonText: 'OK'
    });
</script>
@endif
@endsection
