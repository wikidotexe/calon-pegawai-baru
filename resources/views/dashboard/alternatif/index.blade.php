@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Tabel Kelola Data Kandidat</h6>
                    @if (false)
                        <label for="add_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                            <i class="ri-add-fill"></i>
                            Tambah Data Kandidat
                        </label>
                    @endif
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
                                <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->objek->nama_kandidat }}</td>
                                <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->objek->posisi_lamar ?? '-' }}</td>
                                <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->objek->pendidikan_terakhir ?? '-' }}</td>
                                <td class="px-8 py-4 border border-gray-300 text-left">{{ $item->objek->pengalaman_kerja ?? '-' }}</td>
                                <td class="px-8 py-4 border border-gray-300">
                                    <div class="flex justify-center items-center gap-4">
                                        <button class="text-red-600 hover:text-red-800"
                                            onclick="return delete_button('{{ $item->id }}', '{{ $item->objek->nama_kandidat }}');">
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

            @if (false)
                {{-- Form Tambah Data --}}
                <input type="checkbox" id="add_button" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box">
                        <form action="{{ route('alternatif.simpan') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <h3 class="text-xl font-semibold mb-4">
                                Tambah {{ $judul }}
                            </h3>

                            <!-- Pilih Objek -->
                            <div class="mb-6">
                                <label class="block mb-1 font-medium">Pilih Data Kandidat</label>

                                <select name="objek_id[]" id="objek_id" multiple="multiple"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                        focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary">
                                    @foreach ($objek as $item)
                                        <option value="{{ $item->id }}"
                                            @selected(collect(old('objek_id'))->contains($item->id))>
                                            {{ $item->nama_kandidat }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('objek_id')
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
            @endif
        </div>
    </div>
@endsection

@section('js')
<script>
    // Tabel dan Select2
    $(document).ready(function () {
        $('#tabel_data').DataTable({
            responsive: true,
            order: [],
        }).columns.adjust().responsive.recalc();

        $("#objek_id").select2({
            placeholder: "Select",
            allowClear: true
        });
    });

    // SweetAlert session flash
    @if (session('berhasil'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('berhasil') }}',
            icon: 'success',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK'
        });
    @endif

    @if (session('gagal'))
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('gagal') }}',
            icon: 'error',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK'
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            title: 'Gagal!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            icon: 'error',
            confirmButtonColor: '#6419E6',
            confirmButtonText: 'OK'
        });
    @endif

    // Fungsi hapus
    function delete_button(id, nama_kandidat) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            html:
                "<p>Data tidak dapat dipulihkan kembali!</p>" +
                "<div class='divider'></div>" +
                "<b>Data: " + nama_kandidat + "</b>",
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
                    url: "{{ route('alternatif.hapus') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function () {
                        Swal.fire({
                            title: 'Data berhasil dihapus!',
                            icon: 'success',
                            confirmButtonColor: '#6419E6',
                            confirmButtonText: 'OK'
                        }).then(() => location.reload());
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data gagal dihapus!',
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
