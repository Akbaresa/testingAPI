<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class UploadController extends Controller
{
    
    public function upload(Request $req){
        // Periksa apakah file 'krs' ada dalam request
        if ($req->hasFile('krs')) {
            $krs_file = $req->file('krs');
            $krs_nama = time() . "." . $krs_file->extension();
            $krs_ext = $krs_file->extension();
            
        } else {
            // Lakukan sesuatu jika file 'krs' tidak ada dalam request
        }

        // Periksa apakah file 'kwitansi' ada dalam request
        if ($req->hasFile('kwitansi')) {
            $kwitansi_file = $req->file('kwitansi');
            $kwitansi_nama = time() . "." . $kwitansi_file->extension();
            $kwitansi_ext = $kwitansi_file->extension();
        } else {
            // Lakukan sesuatu jika file 'kwitansi' tidak ada dalam request
        }

            $data_krs = [
                'filename' => $krs_nama , 
                'extension' => $krs_ext
            ];
            $data_kwitansi = [
                'filename' => $kwitansi_nama , 
                'extension' => $kwitansi_ext
            ];
            $krs_file->move(public_path('uploads/krs/'),$krs_nama);
            $kwitansi_file->move(public_path('uploads/kwitansi/') , $kwitansi_nama);
            Upload::create($data_krs);
            Upload::create($data_kwitansi);
            $path_krs = public_path() . '/uploads/krs/'.$krs_nama;
            $path_kwitansi = public_path() . '/uploads/kwitansi/'.$kwitansi_nama;
            $path_drive_krs = '/upload/krs/' . $krs_nama;
            $path_drive_kwitansi = '/upload/kwitansi/' . $kwitansi_nama;
            Storage::disk('google')->put( $path_drive_krs, File::get($path_krs));
            Storage::disk('google')->put( $path_drive_kwitansi, File::get($path_kwitansi));
            unlink($path_krs);
            unlink($path_kwitansi);
            $nama_krs = Storage::disk('google')->get($path_drive_krs);
            return view('/download' , [
                'krs_nama' => $krs_nama,
                'kwitansi_nama' => $kwitansi_nama
            ]);
        }   
        public function download_krs($filename)
        {
            $path_drive = '/upload/krs/' . $filename; // Sesuaikan dengan lokasi file di Google Drive
            $file = Storage::disk('google')->get($path_drive);
            
            $headers = [
                'Content-Type' => 'application/pdf', // Sesuaikan dengan tipe konten file yang ingin diunduh
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            return response()->make($file, 200, $headers);
        }
        
        public function download_kwitansi($filename)
        {
            $path_drive = '/upload/kwitansi/' . $filename; // Sesuaikan dengan lokasi file di Google Drive
            $file = Storage::disk('google')->get($path_drive);
            
            $headers = [
                'Content-Type' => 'application/pdf', // Sesuaikan dengan tipe konten file yang ingin diunduh
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            return response()->make($file, 200, $headers);
        }
        
    }
    