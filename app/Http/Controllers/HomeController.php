<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Peminjam;

class HomeController extends Controller
{
    
    // fungsi untuk mengirim data ke home agar bisa di tampilkan di home
    public function home()
    {

        // mengambil data car yang status nya available atau tersedia
        $car = Car::where('status','available')->get();

        // pergi ke file home yang berada pada folder resources->views->content dengan mengirimkan data-data car di atas
        return view('content/home',['car' => $car]);
    }
    
    // fungsiuntuk mengirim data ke halaman cars agar bisa di tampilkan
    public function cars()
    {
        // mengambil data data car
        $car = Car::get();

        // pergi ke file cars yang berada pada folder resources->views->content dengan mengirimkan data-data car di atas
        return view('content/cars',['car' => $car]);
    }

    // fungsi untuk menginputkan data peminjam ke database
    public function inputPeminjam(Request $Request)
    {
        // mengambil data mobil yang di inputkan pada saat memesan
        $cars = Car::where('brand',$Request->car)->first();

        // untuk mengupdate nilai stock karena sudah di pinjam satu
        $jumlah_mobil = $cars->stock;
        $jumlah_mobil = $jumlah_mobil-1;

        // data data peminjaman yang akan di inputkan ke database
        $data = [
            'name' => $Request->name,
            'identitas' => $Request->identitas,
            'phone' => $Request->phone,
            'status' => "belum",
            'date' => $Request->date,
            'day' => $Request->day,
            'cars_id' => $cars->id
        ];

        // menginputkan/membuat data ke database
        Peminjam::create($data);

        // mengupdate nilai stock ke database
        Car::where('id',$cars->id)->update(['stock' => $jumlah_mobil]);

        // pergi ke halaman home lagi
        return redirect(url('/'));
    }

    // fungsi untuk menampilkan file contact_us yang berada pada folder resources->views->content
    public function contact_us(){
        return view('content/contact_us');
    }
}
