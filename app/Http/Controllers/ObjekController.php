<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjekRequest;
use App\Http\Services\ObjekService;
use App\Http\Services\AlternatifService;
use App\Http\Services\PenilaianService;
use Illuminate\Http\Request;

class ObjekController extends Controller
{
    protected $objekService, $alternatifService, $penilaianService;

    public function __construct(ObjekService $objekService, AlternatifService $alternatifService, PenilaianService $penilaianService)
    {
        $this->objekService = $objekService;
        $this->alternatifService = $alternatifService;
        $this->penilaianService = $penilaianService;
    }

    public function index()
    {
        $judul = "Objek";
        $data = $this->objekService->getAll();

        return view('dashboard.objek.index', compact('judul', 'data'));
    }

    public function simpan(ObjekRequest $request)
    {
        $objek = $this->objekService->simpanPostData($request);

        $alternatif = $this->alternatifService->simpanPostData([$objek->id]);
        if ($alternatif[0]) {
            $this->penilaianService->simpanFromAlternatif($alternatif);
        }
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil disimpan!");
    }

    public function ubah(Request $request)
    {
        return $this->objekService->ubahGetData($request);
    }

    public function perbarui(ObjekRequest $request)
    {
        $this->objekService->perbaruiPostData($request);
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil diperbarui!");
    }

    public function hapus(Request $request)
    {
        try {
            $this->objekService->hapusPostData($request->id);
            return redirect('dashboard/objek')->with('berhasil', "Data berhasil dihapus!");
        } catch (\Throwable $th) {
            return abort(400, "Gagal menghapus data.");
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_data' => 'required|mimes:csv,xls,xlsx,txt'
        ], [
            'import_data.required' => 'File import harus diupload!',
            'import_data.mimes' => 'Format file harus CSV, XLS, atau XLSX!'
        ]);

        try {
            $imported = $this->objekService->import($request);
            return redirect('dashboard/objek')->with('berhasil', "Data kandidat berhasil diimport!");
        } catch (\Exception $e) {
            return redirect('dashboard/objek')->with('gagal', "Gagal import data: " . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_kandidat.csv"',
        ];

        $columns = ['nama_kandidat', 'posisi_lamar', 'pendidikan_terakhir', 'pengalaman_kerja'];
        
        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');
            // Add BOM for Excel UTF-8 compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns);
            // Add sample data
            fputcsv($file, ['John Doe', 'Software Engineer', 'S1', '3 Tahun']);
            fputcsv($file, ['Jane Smith', 'Data Analyst', 'S2', '2 Tahun']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
