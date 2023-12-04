<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImtRequest;
use App\Http\Requests\UpdateImtRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Imt;
use Illuminate\Support\Facades\DB;

class ImtController extends Controller
{
    //
    public function index(Request $request)
    {
        $imts = DB::table('imts')
            ->when($request->input('nama'), function ($query, $name) {
                return $query->where('nama', 'like', '%' . $name . '%');
            })
            ->select('id', 'nama', 'phone', 'berat_badan', 'tinggi_badan','status', DB::raw('DATE_FORMAT(created_at,"%d %M %Y") as created_at'))
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('pages.imt.index', compact('imts'));
    }

    /**
     * Views a newly created resource.
     */
    public function create(Request $request)
    {
        //
        return view('pages.imt.create');
    }
    public function edit(Imt $imt)

    /**
     * Views a newly edit resource.
     */
    {
        //
        return view('pages.imt.edit')->with('imt', $imt);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImtRequest $request)
    {
        // Validasi nomor telepon unik sebelum menyimpan
        $existingPhone = Imt::where('phone', $request->phone)->exists();
        if ($existingPhone) {
            return response()->json(['exists' => true]);
        }

        // Mendapatkan data dari request
        $tinggi_badan = $request['tinggi_badan'];
        $berat_badan = $request['berat_badan'];

        // Melakukan perhitungan IMT
        $imt = $berat_badan / (($tinggi_badan / 100) * ($tinggi_badan / 100));

        // Menentukan status berdasarkan IMT
        $klasifikasi = '';
        if ($imt < -17) {
            $klasifikasi = 'Sangat Kurus';
        } elseif ($imt >= -17 && $imt < 18.5) {
            $klasifikasi = 'Kurus';
        } elseif ($imt >= 18.5 && $imt < 25) {
            $klasifikasi = 'Normal';
        } elseif ($imt >= 25 && $imt < 27) {
            $klasifikasi = 'Gemuk';
        } else {
            $klasifikasi = 'Obesitas';
        }

        // Menyimpan data ke dalam database
        Imt::create([
            'nama' => $request['nama'],
            'phone' => $request['phone'],
            'tinggi_badan' => $request['tinggi_badan'],
            'berat_badan' => $request['berat_badan'],
            'status' => $klasifikasi,
        ]);

        return redirect(route('imt.index'))->with('success', 'New User Successfully');
    }

    public function checkPhoneNumber(Request $request)
    {
        $phoneNumber = $request->phone;

        // Lakukan pengecekan nomor telepon dalam database
        $phoneExists = Imt::where('phone', $phoneNumber)->exists();
        if ($phoneExists) {
            $existingData = Imt::where('phone', $phoneNumber)->first();
            return response()->json([
                'exists' => true,
                'phone' => $existingData->phone,
                'name' => $existingData->nama,
                'id' => $existingData->id // ID data IMT
            ]);
            return redirect(route('imt.show', ['id' => $existingData->id]))->with('success', 'User Found');
        }

        return response()->json(['exists' => false]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data IMT berdasarkan ID
        $imt = Imt::find($id);

        // Cek apakah data IMT ditemukan
        if ($imt) {
            // Jika ditemukan, tampilkan halaman detail dengan data IMT
            return view('pages.imt.detail')->with('imt', $imt);
        } else {
            // Jika tidak ditemukan, tampilkan halaman 404 atau pesan lainnya
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImtRequest $request, Imt $imt)
    {
        $validated = $request->validated();

        // Mendapatkan data tinggi_badan dan berat_badan dari request
        $tinggi_badan = $validated['tinggi_badan'];
        $berat_badan = $validated['berat_badan'];

        // Melakukan perhitungan IMT
        $imtValue = $berat_badan / (($tinggi_badan / 100) * ($tinggi_badan / 100));

        // Menentukan status berdasarkan IMT
        $klasifikasi = '';
        if ($imtValue < -17) {
            $klasifikasi = 'Sangat Kurus';
        } elseif ($imtValue >= -17 && $imtValue < 18.5) {
            $klasifikasi = 'Kurus';
        } elseif ($imtValue >= 18.5 && $imtValue < 25) {
            $klasifikasi = 'Normal';
        } elseif ($imtValue >= 25 && $imtValue < 27) {
            $klasifikasi = 'Gemuk';
        } else {
            $klasifikasi = 'Obesitas';
        }

        // Update data IMT beserta hasil perhitungan IMT ke dalam database
        $imt->update([
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan,
            'status' => $klasifikasi,
            // Tambahkan field lain yang ingin diupdate sesuai kebutuhan
        ]);

        return redirect()->route('imt.index')->with('success', 'Update Data User ' . $imt->nama . ' Berhasil');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imt $imt)
    {
        //Menghapus data user
        $imt->delete();
        return redirect()->route('imt.index')->with('success', 'Deleted Data User ' . $imt->nama . ' Berhasil');
    }
}
