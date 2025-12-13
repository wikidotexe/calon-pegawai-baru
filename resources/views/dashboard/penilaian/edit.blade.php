@extends('dashboard.layouts.app')

@section('container')
    <div class="flex justify-center flex-wrap min-h-screen">
        <div class="flex-none w-full max-w-4xl px-12">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl p-6">
                <form action="{{ route('penilaian.perbarui', $data->alternatif_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="alternatif_id" value="{{ $data->alternatif_id }}" />

                    <h3 class="text-xl font-semibold mb-4">
                        Ubah {{ $judul }}:
                        <span class="text-greenPrimary" id="title_form">{{ $data->alternatif->objek->nama_kandidat }}</span>
                    </h3>

                    @foreach ($subKriteria->unique('kriteria_id') as $item)
                        <div class="mb-4">
                            <label class="block mb-1 font-medium">
                                Sub Kriteria:
                                <span class="text-greenPrimary">{{ $item->kriteria->nama }}</span>
                            </label>

                            <select 
                                name="sub_kriteria_id[{{ $item->kriteria_id }}]" 
                                id="sub_kriteria_id_{{ $item->kriteria_id }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-10 text-dark bg-white
                                    focus:outline-none focus:ring-2 focus:ring-greenPrimary/40 focus:border-greenPrimary">

                                <option disabled selected>--Pilih--</option>

                                @foreach ($subKriteria->where('kriteria_id', $item->kriteria_id) as $value)
                                    <option value="{{ $value->id }}"
                                        {{ $value->id == optional($data2->where('kriteria_id', $item->kriteria_id)->first())->sub_kriteria_id ? 'selected' : '' }}>
                                        {{ $value->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('sub_kriteria_id')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach

                    <!-- Actions -->
                    <div class="flex gap-3 mt-6 justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-greenPrimary text-greenPrimary rounded-3 shadow-sm
                                active:scale-[0.98] transition-all">
                            Perbarui
                        </button>

                        <a href="{{ route('penilaian') }}"
                            class="px-6 py-2 bg-gray-100 text-gray-700 rounded-3 border border-gray-300
                                hover:bg-gray-200 cursor-pointer transition-all">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
