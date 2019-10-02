@extends('layouts.master')

@section('main')
	
	<section>
		<div class="container">
			<div class="row">
			<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<div class="blog-post-area">
						<h2 class="title text-center">Our Awesome Car</h2>

						{{-- perulangan untuk menampilkan data data mobil --}}
						@foreach($car as $car)
						<div class="single-blog-post">
							<h3>{{ $car->brand}}</h3>
							<div class="post-meta">
								<ul><ul>

									{{-- status tersedia apa tidak --}}
									<li><i class="fa">status</i>{{ $car->status }}</li>

									{{-- harga penyewaan perhari --}}
									<li><i class="fa">price</i>{{$car->price}} / day</li>
								</ul>
								</ul>

								{{-- bintang yang ada di pojok sebelah kanan foto mobil --}}
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>

							{{-- foto mobil --}}
							<a href="">
								<img src="" alt="">
								<img src="{{ url('images/car/'.$car->photo)}}" alt="">
							</a>
						</div>
						<hr>
						@endforeach
					</div>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>
		<br>
		<br>
	</section>

	@endsection