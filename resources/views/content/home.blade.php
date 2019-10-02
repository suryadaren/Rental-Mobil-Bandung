@extends('layouts.master')

@section('main')
		
	{{-- slide foto mobil yang berganti ganti di home --}}
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	

	{{-- bagian halaman untuk inputkan data data penyewaan mobil --}}
	<section>
		<div class="container">
			<div class="row">
				<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    

	    			{{-- Judul --}}
					<h2 class="title text-center">Mulai Sewa Mobil<strong>NOW</strong></h2>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">
	    		<div class="col-sm-4">
	    			<div class="contact-info">
		    			{{-- judul  --}}
	    				<h2 class="title text-center">Daftar Mobil Dan Harga</h2>
	    				<address>
	    					<ul class="list-group">

	    						{{-- perulangan menampilkan daftar mobil dan harga --}}
	    						@foreach($car as $mobil)
							    <li class="list-group-item">{{$mobil->brand}}<span class="badge">{{$mobil->price}} / Day</span></li>
							    @endforeach
							  </ul>
	    				</address>
	    			</div>
    			</div> 	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Masukkan Data</h2>
	    				<div class="status alert alert-success" style="display: none"></div>

	    				{{-- form untuk menginputkan data data peminjaman mobil --}}
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="{{ url('inputPeminjam')}}" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Nama">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="identitas" name="identitas" class="form-control" required="required" placeholder="No.Identitas">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="phone" class="form-control" required="required" placeholder="Nomor Hp">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="date" class="form-control" required="required" placeholder="Tanggal Penjemputan">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="day" class="form-control" required="required" placeholder="Lama Penyewaan(Hari)">
				            </div> 
				            <div class="form-group col-md-12 dropdown">
								     <select class="form-control" name="car" id="sel1">
								        @foreach($car as $car)
								        <option>{{ $car->brand}}</option>
								        @endforeach
								      </select>
				            </div> 
				            {{ csrf_field()}}
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit" onclick="return alert('Berhasil Melakukan Sewa Mobil')">
				            </div>
				        </form>
	    			</div>
	    		</div>     			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
			</div>
		</div>
	</section>

	@endsection