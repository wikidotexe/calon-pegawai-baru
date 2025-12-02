@extends('dashboard.layouts.app')

@section('container')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex flex-row items-center justify-between p-6 pb-0 mb-4 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>Tabel Kelola Data Kendaraan</h6>
                    <label for="add_button" class="cursor-pointer inline-block px-3 py-2 font-bold text-center text-white rounded-lg text-sm ease-soft-in shadow-soft-md bg-gradient-to-br from-greenPrimary to-greenPrimary/80 shadow-soft-md hover:shadow-soft-xs active:opacity-85 hover:scale-102 transition-all">
                        <i class="ri-add-fill"></i>
                        Tambah Data Kendaraan
                    </label>
                </div>
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                    <table id="tabel_data" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>Nama Kendaraan</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nomor Polisi</th>
                                <th>Merk Kendaraan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->objek->nama }}</td>
                                <td>{{ $item->objek->kendaraan ?? '-' }}</td>
                                <td>{{ $item->objek->nomor_polisi ?? '-' }}</td>
                                <td>{{ $item->objek->nama_kendaraan ?? '-' }}</td>
                                <td class="flex gap-x-3">
                                    <button onclick="return delete_button('{{ $item->id }}', '{{ $item->objek->nama }}');">
                                        <i class="ri-delete-bin-line text-xl"></i>
                                    </button>
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
                    <form action="{{ route('alternatif.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-semibold mb-4">
                            Tambah {{ $judul }}
                        </h3>

                        <!-- Pilih Objek -->
                        <div class="mb-6">
                            <label class="block mb-1 font-medium">Pilih Objek</label>

                            <select name="objek_id[]" id="objek_id" multiple="multiple"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark 
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary">
                                @foreach ($objek as $item)
                                    <option value="{{ $item->id }}"
                                        @selected(collect(old('objek_id'))->contains($item->id))>
                                        {{ $item->nomor_polisi }}
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
