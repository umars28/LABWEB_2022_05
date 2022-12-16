<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request -> katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('nama', 'like', "%$katakunci%")
                    -> orwhere('nim', 'like', "%$katakunci%")
                    -> orwhere('jurusan', 'like', "%$katakunci%")
                    -> paginate($jumlahbaris);
        } else {
            $data = mahasiswa::orderBy('nim', 'ASC') -> paginate($jumlahbaris);
        }
        return view('mahasiswa.index') -> with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);

        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
        ],[
            'nim.required' => 'NIM Wajib Diisi',
            'nim.unique' => 'NIM yand anda masukkan sudah ada',
            'nama.required' => 'Nama Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]);
        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
        ];
        mahasiswa::create($data);
        return redirect()-> to('mahasiswa')-> with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim', $id) -> first();
        return view('mahasiswa.edit') -> with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
        ],[
            'nim.required' => 'NIM Wajib Diisi',
            'nim.unique' => 'NIM yand anda masukkan sudah ada',
            'nama.required' => 'Nama Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]);
        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
        ];
        mahasiswa::where('nim', $id) -> update($data);
        return redirect()-> to('mahasiswa')-> with('success', 'Berhasil Mengapdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where('nim', $id) -> delete();
        return redirect() -> to('mahasiswa') -> with('success', 'Berhasil Menghapus Data');
    }
}
