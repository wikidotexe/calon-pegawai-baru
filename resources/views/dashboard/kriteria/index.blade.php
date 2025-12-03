@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Tabel {{ $judul }}</h6>
                    @if ($sumBobot < 1)
                        <label for="add_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                            <i class="ri-add-fill"></i>
                            Tambah {{ $judul }}
                        </label>
                    @else
                        <button for="add_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all" @readonly(true)>
                            <i class="ri-add-fill"></i>
                            Tambah {{ $judul }}
                        </button>
                    @endif
                </div>
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="tabel_data" class="stripe hover w-full text-sm border border-gray-300 rounded-xl overflow-hidden">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Kode</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Nama</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Bobot</th>
                                <th class="px-8 py-4 border border-gray-300 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($data as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->kode }}</td>
                                    <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->nama }}</td>
                                    <td class="px-8 py-4 border border-gray-300 text-center">{{ $item->bobot }}</td>
                                    <td class="px-8 py-4 border border-gray-300">
                                        <div class="flex justify-center items-center gap-4">
                                            <label for="edit_button" class="cursor-pointer text-blue-600 hover:text-blue-800"
                                                onclick="return edit_button('{{ $item->id }}')">
                                                <i class="ri-pencil-line text-xl"></i>
                                            </label>
                                            {{-- <button class="text-red-600 hover:text-red-800"
                                                onclick="return delete_button('{{ $item->id }}', '{{ $item->nama }}');">
                                                <i class="ri-delete-bin-line text-xl"></i>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50 font-bold">
                                <td class="px-8 py-4 border border-gray-300 text-center" colspan="2">Total Bobot:</td>
                                <td class="px-8 py-4 border border-gray-300 text-center" colspan="2">
                                    @if ($sumBobot < 1)
                                        {{ $sumBobot }}
                                    @else
                                        {{ $sumBobot }} <span class="text-error"> (max)</span>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            {{-- Form Tambah Data --}}
            <input type="checkbox" id="add_button" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <form action="{{ route('kriteria.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-semibold mb-4">
                            Tambah {{ $judul }}
                        </h3>

                        <!-- Kode -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Kode</label>
                            <input type="text"
                                name="kode"
                                value="{{ $kode }}"
                                readonly
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 bg-slate-100 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary">
                            @error('kode')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama</label>
                            <input type="text"
                                name="nama"
                                value="{{ old('nama') }}"
                                placeholder="Nama kriteria"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('nama')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bobot -->
                        <div class="mb-6">
                            <label class="block mb-1 font-medium">Bobot</label>
                            <input type="number"
                                step="0.01"
                                name="bobot"
                                value="{{ old('bobot') }}"
                                placeholder="Bobot"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('bobot')
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
                    <form action="{{ route('kriteria.perbarui') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-semibold mb-4">
                            Ubah {{ $judul }}:
                            <span class="text-greenPrimary" id="title_form">
                                <span class="loading loading-dots loading-md"></span>
                            </span>
                        </h3>

                        <input type="hidden" name="id" />

                        <!-- Kode -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Kode <span id="loading_edit1" class="text-sm"></span></label>
                            <input type="text"
                                name="kode"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('kode')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama <span id="loading_edit2" class="text-sm"></span></label>
                            <input type="text"
                                name="nama"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('nama')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bobot -->
                        <div class="mb-6">
                            <label class="block mb-1 font-medium">Bobot <span id="loading_edit3" class="text-sm"></span></label>
                            <input type="number"
                                step="0.01"
                                name="bobot"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary"
                                required>
                            @error('bobot')
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
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Tabel
        $(document).ready(function() {
            $('#tabel_data').DataTable({
                responsive: true,
                order: [],
                select: false,
                
            })
            .columns.adjust()
            .responsive.recalc();
        });

        @if (session()->has('berhasil'))
            Swal.fire({
                title: 'Berhasil',
                text: '{{ session('berhasil') }}',
                icon: 'success',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if (session()->has('gagal'))
            Swal.fire({
                title: 'Gagal',
                text: '{{ session('gagal') }}',
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                title: 'Gagal',
                text: @foreach ($errors->all() as $error) '{{ $error }}' @endforeach,
                icon: 'error',
                confirmButtonColor: '#6419E6',
                confirmButtonText: 'OK',
            })
        @endif

        function edit_button(id) {
            // Loading effect start
            let loading = `<span class="loading loading-dots loading-md text-greenPrimary"></span>`;
            $("#title_form").html(loading);
            $("#loading_edit1").html(loading);
            $("#loading_edit2").html(loading);
            $("#loading_edit3").html(loading);

            $.ajax({
                type: "get",
                url: "{{ route('kriteria.ubah') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (data) {
                    // console.log(data);
                    let items = [];
                    $.each(data, function(key, val) {
                        items.push(val);
                    });

                    $("#title_form").html(`${items[2]}`);
                    $("input[name='id']").val(items[0]);
                    $("input[name='kode']").val(items[1]);
                    $("input[name='nama']").val(items[2]);
                    $("input[name='bobot']").val(items[3]);

                    // Loading effect end
                    loading = "";
                    $("#loading_edit1").html(loading);
                    $("#loading_edit2").html(loading);
                    $("#loading_edit3").html(loading);
                }
            });
        }

        function delete_button(id, nama) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html:
                    "<p>Data tidak dapat dipulihkan kembali!</p>" +
                    "<div class='divider'></div>" +
                    "<b>Data: " + nama + "</b>",
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
                        url: "{{ route('kriteria.hapus') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Data berhasil dihapus!',
                                icon: 'success',
                                confirmButtonColor: '#6419E6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data gagal dihapus!',
                            })
                        }
                    });
                }
            })
        }
    </script>
@endsection
