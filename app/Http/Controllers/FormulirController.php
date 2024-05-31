<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FormulirController extends Controller
{
    public function read()
    {
        $data = Formulir::select('tgl_pengiriman', 'id_program', 'id_pelangganPLN', 'NIK', 'id_user', 'ktp_img', 'tipe_charger', 'charger_img')->get();
        return view('admin.table', compact($data));
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'id_pelangganPLN' => 'required|numeric|max:11',
                'NIK' => 'required|numeric|max:16',
                'ktp_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tipe_charger' => 'required',
                'charger_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            ],
            [
                'id_pelangganPLN.required' => 'ID pelanggan PLN wajib diisi',
                'id_pelangganPLN.numeric' => 'ID pelanggan PLN hanya angka',
                'id_pelangganPLN.max' => 'ID pelanggan PLN max 11 digit ',
                'NIK.required' => 'NIK wajib diisi',
                'NIK.numeric' => 'NIK hanya angka',
                'NIK.max' => 'NIK max 16 digit ',
                'ktp_img.required' => 'Gambar KTP wajib diunggah',
                'ktp_img.image' => 'File KTP harus berupa gambar',
                'ktp_img.mimes' => 'Gambar KTP harus memiliki format: jpeg, png, jpg',
                'ktp_img.max' => 'Ukuran gambar KTP maksimal adalah 2MB',
                'tipe_charger.required' => 'Tipe charger wajib diisi',
                'charger_img.required' => 'Gambar charger wajib diunggah',
                'charger_img.image' => 'File charger harus berupa gambar',
                'charger_img.mimes' => 'Gambar charger harus memiliki format: jpeg, png, jpg',
                'charger_img.max' => 'Ukuran gambar charger maksimal adalah 2MB',

            ]
        );

        
        try {
            $data = [
                'id_user' => Auth::id(),
                'id_program' => $request->id_program,
                'id_pelangganPLN' => $request->id_pelangganPLN,
                'NIK' => $request->NIK,
                'tipe_charger' => $request->tipe_charger,
            ];
            // Menyimpan gambar ke storage
            if ($request->hasFile('ktp_img')) {
                $ktp_img = $request->file('ktp_img');
                $ktp_img_name = Str::uuid()->toString() . '.' . $ktp_img->getClientOriginalExtension();
                $data['ktp_img'] = $ktp_img->storeAs('images', $ktp_img_name, 'public');
            }

            if ($request->hasFile('charger_img')) {
                $charger_img = $request->file('charger_img');
                $charger_img_name = Str::uuid()->toString() . '.' . $charger_img->getClientOriginalExtension();
                $data['charger_img'] = $charger_img->storeAs('images', $charger_img_name, 'public');
            }

            // Simpan data ke database
            Formulir::create($data);

            return redirect()->route('formulir.index')->with('success', 'Formulir berhasil disimpan.');
        } catch (QueryException $e) {
            // Menangani kesalahan query database
            Log::error('Query Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan pada database. Silakan coba lagi.']);
        } catch (ModelNotFoundException $e) {
            // Menangani kesalahan model tidak ditemukan
            Log::error('Model Not Found Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Data yang dicari tidak ditemukan.']);
        } catch (Exception $e) {
            // Menangani kesalahan umum lainnya
            Log::error('General Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'id_pelangganPLN' => 'required|numeric|max:11',
                'NIK' => 'required|numeric|max:16',
                'ktp_img' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'tipe_charger' => 'required',
                'charger_img' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',

            ],
            [
                'id_pelangganPLN.required' => 'ID pelanggan PLN wajib diisi',
                'id_pelangganPLN.numeric' => 'ID pelanggan PLN hanya angka',
                'id_pelangganPLN.max' => 'ID pelanggan PLN max 11 digit ',
                'NIK.required' => 'NIK wajib diisi',
                'NIK.numeric' => 'NIK hanya angka',
                'NIK.max' => 'NIK max 16 digit ',
                'ktp_img.sometimes' => 'Gambar KTP tidak harus diunggah ulang',
                'ktp_img.image' => 'File KTP harus berupa gambar',
                'ktp_img.mimes' => 'Gambar KTP harus memiliki format: jpeg, png, jpg',
                'ktp_img.max' => 'Ukuran gambar KTP maksimal adalah 2MB',
                'tipe_charger.required' => 'Tipe charger wajib diisi',
                'charger_img.sometimes' => 'Gambar charger tidak harus diunggah ulang',
                'charger_img.image' => 'File charger harus berupa gambar',
                'charger_img.mimes' => 'Gambar charger harus memiliki format: jpeg, png, jpg',
                'charger_img.max' => 'Ukuran gambar charger maksimal adalah 2MB',
            ]
        );

        try {
            // Ambil data formulir yang ada
            $formulir = Formulir::findOrFail($id);

            // Update data formulir
            $formulir->id_program = $request->id_program;
            $formulir->id_pelangganPLN = $request->id_pelangganPLN;
            $formulir->NIK = $request->NIK;
            $formulir->id_user = Auth::id();
            $formulir->tipe_charger = $request->tipe_charger;

            // Mengupdate gambar jika diunggah
            if ($request->hasFile('ktp_img')) {
                $ktp_img = $request->file('ktp_img');
                $ktp_img_name = Str::uuid()->toString() . '.' . $ktp_img->getClientOriginalExtension();
                $formulir->ktp_img = $ktp_img->storeAs('images', $ktp_img_name, 'public');
            }

            if ($request->hasFile('charger_img')) {
                $charger_img = $request->file('charger_img');
                $charger_img_name = Str::uuid()->toString() . '.' . $charger_img->getClientOriginalExtension();
                $formulir->charger_img = $charger_img->storeAs('images', $charger_img_name, 'public');
            }

            // Simpan perubahan ke database
            $formulir->save();

            return redirect()->route('formulir.index')->with('success', 'Formulir berhasil diperbarui.');
        } catch (QueryException $e) {
            // Menangani kesalahan query database
            Log::error('Query Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan pada database. Silakan coba lagi.']);
        } catch (ModelNotFoundException $e) {
            // Menangani kesalahan model tidak ditemukan
            Log::error('Model Not Found Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Data yang dicari tidak ditemukan.']);
        } catch (Exception $e) {
            // Menangani kesalahan umum lainnya
            Log::error('General Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }
}
