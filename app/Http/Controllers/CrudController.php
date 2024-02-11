<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use TheSeer\Tokenizer\Exception;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Menampilkan halaman untuk melihat data siswa.
     */
    public function view()
    {
        // Ambil data siswa dari database, menggunakan Eloquent
        $siswa = Siswa::all();

        // Tampilkan view 'admin.view' dan teruskan data siswa
        return view('admin.view', compact('siswa'));
    }

    /**
     * Menampilkan semua data siswa.
     */
    public function index()
    {
        // Mendapatkan semua data siswa dari model Siswa
        $siswa = Siswa::all();

        // Menampilkan view 'admin.view' dan mengirimkan data siswa
        return view('admin.view', compact('siswa'));
    }

    /**
     * Menampilkan form untuk membuat data siswa baru.
     */
    public function create()
    {
        // Ambil data agama dari database dan urutkan berdasarkan nama
        $agama = Agama::orderBy('nama', 'asc')->get()->pluck('nama', 'id');

        // Tampilkan view 'admin.create' dan teruskan data agama
        return view('admin.create', compact('agama'));
    }

    /**
     * Menyimpan data siswa baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Mendapatkan input data dari request
        $data = $request->input();

        // Aturan validasi untuk input data
        $rules = [
            'nama' => 'required|string|min:3|max:25',
            'nomor_induk' => 'required|string|min:3|max:15',
            'agama_id' => 'required|int',
        ];

        // Membuat instance Validator untuk melakukan validasi input
        $validator = Validator::make($request->all(), $rules);

        // Jika validasi gagal, kembali ke halaman pembuatan siswa dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('admin/create')->withInput()->withErrors($validator);
        } else {
            try {
                // Membuat objek Siswa dan mengisi nilai atributnya dengan input data
                $siswa = new Siswa;
                $siswa->nama = $data['nama'];
                $siswa->nomor_induk = $data['nomor_induk'];
                $siswa->agama_id = $data['agama_id'];
                $siswa->alamat = $data['alamat'];

                // Mengunggah gambar jika ada
                if ($request->hasFile('gambar')) {
                    // Proses pengunggahan gambar
                    // Menyimpan nama gambar ke dalam database
                }

                // Menyimpan data siswa ke dalam database
                $siswa->save();

                // Redirect ke halaman view dengan pesan sukses
                return redirect('admin/view')->with('status', "Insert successfully");
            } catch (Exception $e) {
                // Jika terjadi kesalahan, kembali ke halaman pembuatan siswa dengan pesan kesalahan
                return redirect('admin/create')->with('failed', "operation failed");
            }
        }
    }
    /**
     * Display the specified resource.
     * 
     * @param  int  $id  ID of the resource to display
     * @return \Illuminate\View\View  View containing the specified resource data
     */
    public function show($id)
    {
        // Retrieve the specified student data from the database
        $siswa = Siswa::findOrFail($id);

        // Return the 'show' view and pass the student data to it
        return view('show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id  ID of the resource to edit
     * @return \Illuminate\View\View  View containing the form for editing the resource
     */
    public function edit($id)
    {
        // Retrieve the specified student data from the database
        $siswa = Siswa::findOrFail($id);

        // Retrieve the list of religions to populate a dropdown menu
        $agama = Agama::orderBy('nama', 'asc')->get()->pluck('nama', 'id');

        // Return the 'admin/edit' view and pass the student and religion data to it
        return view('admin/edit', compact('siswa', 'agama'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request  HTTP request object containing the updated resource data
     * @param  string  $id  ID of the resource to update
     * @return \Illuminate\Http\RedirectResponse  Redirect back to the view with a success or error message
     */
    public function update(Request $request, String $id)
    {
        // Retrieve the input data from the request
        $data = $request->input();

        // Validation rules for the input data
        $rules = [
            // 'nama' => 'required|string|min:3|max:25',
            // 'nomor_induk' => 'required|string|min:3|max:15',
            // 'agama_id' => 'required|int'
        ];

        // Create a validator instance to perform input validation
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, redirect back to the create form with input and validation errors
        if ($validator->fails()) {
            return redirect('admin/create')->withInput()->withErrors($validator);
        } else {
            try {
                // Find the student record to update by ID
                $siswa = Siswa::find($id);

                // Update the student data with the input data
                $siswa->nama = $data['nama'];
                $siswa->nomor_induk = $data['nomor_induk'];
                $siswa->agama_id = $data['agama_id'];
                $siswa->alamat = $data['alamat'];

                // Upload a new image if provided
                if ($request->hasFile('gambar')) {
                    // Process image upload
                    // Save the image name to the database
                }

                // Save the updated student data
                $siswa->save();

                // Redirect back to the view with a success message
                return redirect('admin/view')->with('status', "Update successful");
            } catch (Exception $e) {
                // If an error occurs, redirect back to the view with an error message
                return redirect('admin/view')->with('failed', "Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id  ID of the resource to delete
     * @return \Illuminate\Http\RedirectResponse  Redirect back to the view with a success message
     */
    public function destroy($id)
    {
        // Find the student record to delete by ID
        $siswa = Siswa::findOrFail($id);

        // Delete the student record
        $siswa->delete();

        // Redirect back to the view with a success message
        return redirect('admin/view')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Upload a file to storage.
     * 
     * @param  \Illuminate\Http\Request  $request  HTTP request object containing the file to upload
     * @return string  Path to the uploaded file
     */
    public function uploadFile(Request $request)
    {
        // Check if a file is present in the request
        if ($request->hasFile('file')) {
            // Store the file in the 'image' folder within 'storage/app/'
            // You can specify deeper directories if needed, e.g., 'folder_name/subfolder'
            $path = $request->file('file')->store('image');

            // Return the path to the uploaded file
            return $path;
        }
    }
}
