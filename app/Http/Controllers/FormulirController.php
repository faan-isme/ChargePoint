<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Hasil;
use App\Models\Order;
use App\Models\Pesan;
use App\Models\ProgramMitra;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormulirController extends Controller
{
    // digunakan untuk menampilkan data pendaftaran 
    public function read()
    {
        $data = Formulir::select('tgl_pengiriman', 'id_program', 'id_pelangganPLN', 'NIK', 'id_user', 'ktp_img', 'tipe_charger', 'charger_img')->where('status', 'new')->get();
        return view('admin.table', compact($data));
    }
    // digunakan untuk  mengambil dan menyimpan data dari formulir pendaftaran
    public function insert(Request $request)
    {
        $jenisMitra = $request->jenis_mitra;
        if ($jenisMitra === 'Basic') {
            $request->validate(
                [
                    'nama' => 'required',
                    'alamat' => 'required',
                    'no_tlp' => 'required|numeric|max_digits:14',
                    'jenis_mitra' => 'required',
                    'id_pelangganPLN' => 'required|numeric|max_digits:11',
                    'NIK' => 'required|numeric|max_digits:16',
                    'ktp_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'tipe_charger' => 'required',
                    'charger_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',

                ],
                [
                    'nama.required' => 'Nama wajib diisi',
                    'alamat.required' => 'Alamat wajib diisi',
                    'no_tlp.required' => 'Nomor telepon wajib diisi',
                    'no_tlp.numeric' => 'Nomor telepon hanya angka',
                    'no_tlp.max_digits' => 'Nomor telepon max 14 digit ',
                    'id_pelangganPLN.required' => 'ID pelanggan PLN wajib diisi',
                    'id_pelangganPLN.numeric' => 'ID pelanggan PLN hanya angka',
                    'id_pelangganPLN.max_digits' => 'ID pelanggan PLN max 11 digit ',
                    'NIK.required' => 'NIK wajib diisi',
                    'NIK.numeric' => 'NIK hanya angka',
                    'NIK.max_digits' => 'NIK max 16 digit ',
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
        } else {
            $request->validate(
                [
                    'nama' => 'required',
                    'alamat' => 'required',
                    'no_tlp' => 'required|numeric|max_digits:14',
                    'jenis_mitra' => 'required',
                    'NIK' => 'required|numeric|max_digits:16',
                    'ktp_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',


                ],
                [
                    'nama.required' => 'Nama wajib diisi',
                    'alamat.required' => 'Alamat wajib diisi',
                    'no_tlp.required' => 'Nomor telepon wajib diisi',
                    'no_tlp.numeric' => 'Nomor telepon hanya angka',
                    'no_tlp.max_digits' => 'Nomor telepon max 14 digit ',
                    'NIK.required' => 'NIK wajib diisi',
                    'NIK.numeric' => 'NIK hanya angka',
                    'NIK.max_digits' => 'NIK max 16 digit ',
                    'ktp_img.required' => 'Gambar KTP wajib diunggah',
                    'ktp_img.image' => 'File KTP harus berupa gambar',
                    'ktp_img.mimes' => 'Gambar KTP harus memiliki format: jpeg, png, jpg',
                    'ktp_img.max' => 'Ukuran gambar KTP maksimal adalah 2MB',

                ]
            );
        }



        try {
            $program = ProgramMitra::where('nama_program', $jenisMitra)->first();

            $data = [
                'nama' => $request->nama,
                'id_user' => Auth::id(),
                'id_program' => $program->id,
                'NIK' => $request->NIK,
                'no_telp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'tgl_pengiriman' => now()
            ];
            if ($jenisMitra === 'Basic') {
                $data['id_pelangganPLN'] = $request->id_pelangganPLN;
                $data['tipe_charger'] = $request->tipe_charger;
            }

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
            return redirect()->route('home')->with('success', 'Formulir berhasil disimpan.');
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

    public function update(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            abort(404); // Jika dekripsi gagal, kembalikan 404
        }
        $intID = intval($id);
        

            // Ambil data formulir yang ada
            $formulir = Formulir::findOrFail($intID);
            if ($formulir->id_program === 1) {
                $request->validate(
                    [
                        'nama' => 'required',
                        'alamat' => 'required',
                        'no_tlp' => 'required|numeric|max_digits:14',
                        'id_pelangganPLN' => 'required|numeric|max_digits:11',
                        'NIK' => 'required|numeric|max_digits:16',
                        'ktp_img' => 'image|mimes:jpeg,png,jpg|max:2048',
                        'tipe_charger' => 'required',
                        'charger_img' => 'image|mimes:jpeg,png,jpg|max:2048',
    
                    ],
                    [
                        'nama.required' => 'Nama wajib diisi',
                        'alamat.required' => 'Alamat wajib diisi',
                        'no_tlp.required' => 'Nomor telepon wajib diisi',
                        'no_tlp.numeric' => 'Nomor telepon hanya angka',
                        'no_tlp.max_digits' => 'Nomor telepon max 14 digit ',
                        'id_pelangganPLN.required' => 'ID pelanggan PLN wajib diisi',
                        'id_pelangganPLN.numeric' => 'ID pelanggan PLN hanya angka',
                        'id_pelangganPLN.max_digits' => 'ID pelanggan PLN max 11 digit ',
                        'NIK.required' => 'NIK wajib diisi',
                        'NIK.numeric' => 'NIK hanya angka',
                        'NIK.max_digits' => 'NIK max 16 digit ',
                        'ktp_img.image' => 'File KTP harus berupa gambar',
                        'ktp_img.mimes' => 'Gambar KTP harus memiliki format: jpeg, png, jpg',
                        'ktp_img.max' => 'Ukuran gambar KTP maksimal adalah 2MB',
                        'tipe_charger.required' => 'Tipe charger wajib diisi',
                        'charger_img.image' => 'File charger harus berupa gambar',
                        'charger_img.mimes' => 'Gambar charger harus memiliki format: jpeg, png, jpg',
                        'charger_img.max' => 'Ukuran gambar charger maksimal adalah 2MB',
    
                    ]
                );

                $formulir->id_pelangganPLN = $request->id_pelangganPLN;
                $formulir->tipe_charger = $request->tipe_charger;
                
            } else {
                $request->validate(
                    [
                        'nama' => 'required',
                        'alamat' => 'required',
                        'no_tlp' => 'required|numeric|max_digits:14',
                        'NIK' => 'required|numeric|max_digits:16',
                        'ktp_img' => 'image|mimes:jpeg,png,jpg|max:2048',
    
    
                    ],
                    [
                        'nama.required' => 'Nama wajib diisi',
                        'alamat.required' => 'Alamat wajib diisi',
                        'no_tlp.required' => 'Nomor telepon wajib diisi',
                        'no_tlp.numeric' => 'Nomor telepon hanya angka',
                        'no_tlp.max_digits' => 'Nomor telepon max 14 digit ',
                        'NIK.required' => 'NIK wajib diisi',
                        'NIK.numeric' => 'NIK hanya angka',
                        'NIK.max_digits' => 'NIK max 16 digit ',
                        'ktp_img.image' => 'File KTP harus berupa gambar',
                        'ktp_img.mimes' => 'Gambar KTP harus memiliki format: jpeg, png, jpg',
                        'ktp_img.max' => 'Ukuran gambar KTP maksimal adalah 2MB',
    
                    ]
                );
            }
            



            // Update data formulir
            $formulir->nama = $request->nama;
            $formulir->NIK = $request->NIK;
            $formulir->no_telp = $request->no_tlp;
            $formulir->alamat = $request->alamat;
            $formulir->status = 'new';

        try {
            // Mengupdate gambar jika diunggah
            if ($request->hasFile('ktp_img')) {
                if ($formulir->ktp_img) {
                    Storage::disk('public')->delete($formulir->ktp_img);
                }
                $ktp_img = $request->file('ktp_img');
                $ktp_img_name = Str::uuid()->toString() . '.' . $ktp_img->getClientOriginalExtension();
                $formulir->ktp_img = $ktp_img->storeAs('images', $ktp_img_name, 'public');
            }

            if ($request->hasFile('charger_img')) {
                if ($formulir->charger_img) {
                    Storage::disk('public')->delete($formulir->charger_img);
                }
                $charger_img = $request->file('charger_img');
                $charger_img_name = Str::uuid()->toString() . '.' . $charger_img->getClientOriginalExtension();
                $formulir->charger_img = $charger_img->storeAs('images', $charger_img_name, 'public');
            }

            // Simpan perubahan ke database
            $formulir->save();

            return redirect()->route('home')->with('success', 'Formulir berhasil diperbarui.');
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
    public function acc($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            abort(404); // Jika dekripsi gagal, kembalikan 404
        }
        $intID = intval($id);
        Formulir::where('id', $intID)->update(['status' => 'acc']);
        $data =[ 
            'id_formulir' => $intID,
            'id_admin'=>Auth::id()
        ];
        Hasil::create($data);
        $order=[
            'id_formulir' => $intID,
            'qty' => 1,
            'status' => 'Unpaid'
        ];
        Order::create($order);
        return redirect()->route('AccPendaftaran');
    }
    
    public function revisi(Request $request, $encryptedId)
    {
        $request->validate(
            [
                'message'=>'required|max:100',
            ],[
                'message.required'=>'Silahkan Isi Pesan',
                'message.max'=>'Isi Pesan max 100 karakter',
            ]
        );
        try {
            $id = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            abort(404); // Jika dekripsi gagal, kembalikan 404
        }
        $intID = intval($id);
        Formulir::where('id', $intID)->update(['status' => 'revisi']);
        $data =[
            'pesan'=>$request->message
        ];
        $cekPesan = Pesan::where('id_formulir',$intID)->first();
        if ($cekPesan) {
            $cekPesan->update($data);
        }else {
            $data['id_formulir']=$intID;
            $data['id_admin']=Auth::id();
            
            Pesan::create($data);
        }
        

        return redirect()->route('RevisiPendaftaran');
    }
}
