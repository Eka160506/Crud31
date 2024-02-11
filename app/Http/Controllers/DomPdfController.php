<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Siswa;
use Dompdf\Options;

class DomPdfController extends Controller
{
    public function generatePDF($id)
    {
        // Ambil data siswa dari database berdasarkan ID
        $siswa = Siswa::find($id);

        // Jika siswa tidak ditemukan, kembalikan respons atau lakukan penanganan kesalahan yang sesuai
        if (!$siswa) {
            return response()->json(['error' => 'Siswa tidak ditemukan'], 404);
        }

        // Inisialisasi Dompdf
        $pdf = new Dompdf();

        // Buat HTML dari tampilan print.blade.php dengan data siswa
        $html = view('admin.print', compact('siswa'))->render();

        // Load HTML ke Dompdf
        $pdf->loadHtml($html);

        // Atur ukuran dan orientasi halaman (opsional)
        $pdf->setPaper('A4', 'landscape');

        // Render PDF (membuat file PDF)
        $pdf->render();

        // Outputkan atau simpan file PDF sesuai kebutuhan Anda
        // Misalnya, output langsung ke browser:
        return $pdf->stream('siswa.pdf');
    }
}
