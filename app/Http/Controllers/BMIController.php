<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan Halaman BMI
        return view('bmi.tampil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mengambil Parameter di Kelas
        $hasil = new Konsul($request->tahun, $request->tinggi, $request->berat);
        // Menyimpan Data dari Form
        $yeah = [
            'nama' => $request->nama,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'hobi' => $request->hobi,
            'tahun' => $hasil->hitungUmur(),
            'konsultasi' => $hasil->konsultasi(),
            'hasilbmi' => $hasil->hitungBMI(),
            'statusbmi' => $hasil->status(),
        ];

        // Kembali ke Halaman dan Menampilkan data dari Variabel yeah
        return view('BMI.tampil', compact('yeah'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Hitung {

    // Menginisialisasi Variabel 
    public function __construct($tahun, $tinggi, $berat)
    {
        $this->tahun = $tahun;
        $this->tinggi = $tinggi / 100;
        $this->berat = $berat;
    }

    public function hitungUmur()
    {
        // Menghitung Umur dengan rumus Jika 2022 dikurang Tahun yang akan diisi
        return 2022 - $this->tahun;
    }

    public function hitungBMI()
    {
        // Menghitung BMI dengan rumus Isi data Berat dibagi Isi Data Tinggi
        return $this->berat / ($this->tinggi * $this->tinggi);
    }

}

class Konsul extends Hitung {

    // Status menggunakan Rumus Hasil Hitung BMI
    public function status(){
        if($this->hitungBMI() >= 17 && $this->hitungBMI() <= 18.4){
            return 'Kurus';
        } else if ($this->hitungBMI() >= 18.5  && $this->hitungBMI() <= 22.9){
            return 'Normal';
        } else if ($this->hitungBMI() >= 22.9  && $this->hitungBMI() <= 29.9){
            return 'Gemuk';
        } else if ($this->hitungBMI() >= 30) {
            return 'Obesitas';
        } else {
            return 'Silahkan Diisi';
        }
    }

    // Konsultasi menggunakan Rumus Hasil Hitung Umur dan Hasil Hitung BMI
    public function konsultasi()
    {
        if($this->hitungUmur() >= 17 && $this->hitungBMI() >= 30){
            return 'Anda Mendapatkan Konsultasi Gratis';
        } else if ($this->hitungUmur() <= 17 && $this->hitungBMI() >= 30){
            return 'Anda masih belum memenuhi Target';
        } else if ($this->hitungUmur() >= 17 && $this->hitungBMI() <= 30){
            return 'Anda masih belum memenuhi persyaratan';
        } else if ($this->hitungUmur() <= 17 && $this->hitungBMI() <= 30) {
            return 'Anda tidak mendapatkan Konsultasi Gratis';
        } else {
            return 'Silahkan Diisi';
        }
    }

   
}