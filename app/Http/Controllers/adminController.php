<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Peminjam;

class adminController extends Controller
{
    // fungsi untuk mengambil nilai nilai car untuk di tampilkan
    function content_cars(){
    	$car = Car::get();
    	return view('/admin/content_cars',[ 'car' => $car ]);
    }

    // fungsi untuk menambahkan data mobil ke database
    function addCar(Request $Request){

        // mengambil data foto yang di upload
    	$namaFoto = $Request->photo->getClientOriginalName();

        // inputan data data mobil yang akan di upload ke database car
	    	$data = [
	    		"brand" => $Request->brand,
	    		"stock" => $Request->stock,
	    		"price" => $Request->price,
	    		"status" => $Request->status,
	    		"photo" => $namaFoto
    		];

        //memindahkan foto yang di upload ke folder images/car yang berada pada folder public 
		$Request->file('photo')->move('images/car',$namaFoto);

        // menginputkan data ke database
    	Car::create($data);

        // kembali ke halaman admin/content_cars
    	return redirect(url('/admin/content_cars'));
    }

    // fungsi untuk mengedit data data car/mobil
    function editCar(Request $Request){

        // mengambil data id yang sudah di inputkan
    	$id = $Request->id;

        // untuk check apakah mengupload foto atau tidak

        // jika mengupload
    	if ($Request->hasFile('photo')) {

            // mengambil nama file foto yang di upload
    		$namaFoto = $Request->photo->getClientOriginalName();

            // data data mobil yang sudah di update
	    	$data = [
	    		"brand" => $Request->brand,
	    		"stock" => $Request->stock,
	    		"price" => $Request->price,
	    		"status" => $Request->status,
	    		"photo" => $namaFoto
    		];

            // memindahkan file foto ke folder images/car yang ada di folder public
    		$Request->file('photo')->move('images/car',$namaFoto);
    	}
        // jika tidak
        else{

            // data data mobil yang sudah di update
	    	$data = [
	    		"brand" => $Request->brand,
	    		"stock" => $Request->stock,
	    		"price" => $Request->price,
	    		"status" => $Request->status
	    	];
    	}

        // update data mobil ke database
    	Car::where('id',$Request->id)->update($data);

        // kembali ke halaman admin/content_cars
    	return redirect(url('/admin/content_cars'));
    }

    // fungsi untuk menghapus mobil
    function delCar(Request $Request){

        // mengambil id yang sudah di inputkan
    	$id = $Request->id;

        // menghapus data mobil di database
    	Car::where('id',$id)->delete();

        // kembali ke halaman admin/content_cars
    	return redirect(url('/admin/content_cars'));
    }


    // fungsi untuk menampilkan data data peminjam
    function peminjam(){

        // mengambil data data peminjam dari database
    	$peminjam = Peminjam::get();

        // mengirimkan ke file peminjam agar dapat di tampilkan
    	return view('/admin/peminjam',[ 'peminjam' => $peminjam ]);
    }

    // fungsi jika tombol confirm atau mobil sudah di kembalikan
    function pengembalian(Request $Request){

        // mengambil data peminjam dari dtabase
    	$peminjam = Peminjam::where('id',$Request->id)->first();

        // mengambil data mobil dari datbase
    	$car = Car::where('id',$peminjam->cars_id)->first();

        // menambah jumlah mobil karena sudah di kembalikan
        $jumlah_mobil = $car->stock;
        $jumlah_mobil = $jumlah_mobil+1;

        // update data peminjam dan mobil ke database
    	Peminjam::where('id',$Request->id)->update(['status' => 'sudah']);
    	Car::where('id',$car->id)->update(['stock' => $jumlah_mobil]);

        // kembali ke halaman admin/peminjam
    	return redirect(url('admin/peminjam'));
    }
}
