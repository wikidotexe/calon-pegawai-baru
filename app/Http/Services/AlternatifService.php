<?php

namespace App\Http\Services;

use App\Http\Repositories\AlternatifRepository;

class AlternatifService
{
    protected $alternatifRepository;

    public function __construct(AlternatifRepository $alternatifRepository)
    {
        $this->alternatifRepository = $alternatifRepository;
    }

    public function getAll()
    {
        $data = $this->alternatifRepository->getAll();
        return $data;
    }

    public function simpanPostData($request)
    {
        $alternatif = $this->alternatifRepository->getAll();
        foreach ($alternatif as $item) {
            // dd($request[$value], $item->objek_id);
            foreach ($request as $value) {
                if ($value == $item->objek_id) {
                    $data = [false, "Data sudah ada di Alternatif"];
                    return $data;
                }
            }
        }

        $data = [true, $this->alternatifRepository->simpan($request)];
        return $data;
    }

    public function syncFromObjek($objeks)
    {
        $existing = $this->alternatifRepository->getAll()->pluck('objek_id')->toArray();

        $missing = [];
        foreach ($objeks as $objek) {
            if (!in_array($objek->id, $existing)) {
                $missing[] = $objek->id;
            }
        }

        if (count($missing) === 0) {
            return [false, []];
        }

        return [true, $this->alternatifRepository->simpan($missing)];
    }

    public function hapusPostData($request)
    {
        $data = $this->alternatifRepository->hapus($request);
        return $data;
    }
}
