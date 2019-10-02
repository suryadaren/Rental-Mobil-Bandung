@extends('admin/layout')

@section('content')

<h3>CARS MENU</h3>

<br>
<div class="row">
      <div class="col-md-12">

        {{-- button menambah data yang akan menjalan fungsi add menu yang berada pada script di bawah halaman --}}
        <button class="btn btn-primary" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i> ADD DATA</button>
      </div>
</div>
<br>

<div class="row">
      <div class="col-md-12">
       
        <table class="table table-striped">
          <thead>

            {{-- judul  --}}
            <tr>
              <th>Photo</th>
              <th>Brand</th>
              <th>Stock</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            
            {{-- perulangan untuk menampilkan data data mobil --}}
            @foreach($car as $car)
            <tr>
              <td>
              <img src="{{ url('images/car/'.$car->photo)}}" alt="photo" style="width: 50px">
              </td>
              <td>
                {{$car->brand}}
              </td>
              <td>
                {{$car->stock}}
              </td>
              <td>
                {{$car->price}}
              </td>
              <td>
                {{$car->status}}
              </td>
              <td>
                
                {{-- tombol edit yang akan menjalan kan fungsi edit menu jika di tekan, fungsi edit menu ada pada script di bawah halaman --}}
                <button onclick="edit_menu('{{$car->id}}', '{{$car->brand}}', '{{$car->stock}}', '{{$car->price}}', '{{$car->status}}')" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                
                {{-- tombol hapus yang akan menjalan fungsi hapus yang ada pada script di bawah halaman --}}
                <button onclick="hapus('{{$car->id}}')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>

              </td>
            
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>




 <!-- pop up tambah data mobil yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="add_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Cars</h4>
              </div>
              <div class="modal-body">
                
                <form name="login1" action="{{ url('admin/addCar')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-2">Brand</div>
                  <div class="col-md-10"><input type="text" name="brand" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Stock</div>
                  <div class="col-md-10"><input type="text" name="stock" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Price</div>
                  <div class="col-md-10"><input type="text" name="price" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Foto</div>
                  <div class="col-md-10"><input type="file" name="photo" required=""></div>
                  <input type="hidden" name="status" value="available">
                </div>
                <br>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                <input type="submit" class="btn btn-primary" value="SIMPAN">
              </div>
                {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->






    <!-- pop up update data mobil yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="edit_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Cars</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_edit_menu" action="{{ url('admin/editCar')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                  <input type="hidden" name="id">
                  <div class="col-md-2">Brand</div>
                  <div class="col-md-10"><input type="text" name="brand" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Stock</div>
                  <div class="col-md-10"><input type="text" name="stock" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Price</div>
                  <div class="col-md-10"><input type="text" name="price" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Status</div>
                  <div class="col-md-10"><input type="text" name="status" style="width: 50%" required=""></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-2">Foto</div>
                  <div class="col-md-10"><input type="file" name="photo"></div>
                </div>
                <br>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                <input type="submit" class="btn btn-primary" value="SIMPAN">
              </div>
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->


    <!-- pop up delete data mobil yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="delete_menu">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
              </div>
              <div class="modal-body">
                
                <form name="form_delete_menu" action="{{ url('admin/delCar')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">

                    <input type="hidden" name="id"></div>
                  <p>Apakah anda yakin ingin menghapus data ini ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

        // fungsi untuk menampilkan popup menambahkan data
        function add_menu()
            {
              $('#add_menu').modal('show');
            }

        // fungsi untuk menampilkan popup halaman edit data
        function edit_menu(id,brand,stock,price,status)
            {
              document.forms['form_edit_menu']['id'].value=id;
              document.forms['form_edit_menu']['brand'].value=brand;
              document.forms['form_edit_menu']['stock'].value=stock;
              document.forms['form_edit_menu']['price'].value=price;
              document.forms['form_edit_menu']['status'].value=status;
                $('#edit_menu').modal('show');
            }
        // fungsi untuk menampilkan pop up confirmasi hapus data 
        function hapus(id)
          {
              document.forms['form_delete_menu']['id'].value=id;
              $('#delete_menu').modal('show');
          }
    </script>

@endsection