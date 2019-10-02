@extends('admin/layout')

@section('content')

<h3>DAFTAR PEMINJAM</h3>

<br>

<div class="row">
      <div class="col-md-12">
       
        <table class="table table-striped">
          <thead>
            {{-- judul --}}
            <tr>
              <th>Nama</th>
              <th>No. Identitas</th>
              <th>Phone</th>
              <th>Brand</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            
            {{-- perulangan untuk menampilkan data data peminjaman --}}
            @foreach($peminjam as $peminjam)
            <tr>
              <td>
                {{$peminjam->name}}
              </td>
              <td>
                {{$peminjam->identitas}}
              </td>
              <td>
                {{$peminjam->phone}}
              </td>
              <td>
                {{$peminjam->car->brand}}
              </td>
              <td>

                {{-- jika status peminjam belum mengembalikan, maka ada tombol confirmasi untuk memproses pengembalian --}}
                @if($peminjam->status == "belum")

                  {{-- tombol confirmasi pengembalian yang akan menjalankan fungsi confirm pada script di bawah halaman --}}
                  <button class="btn btn-primary" onclick='return confirm({{ $peminjam->id}})'>Confirm</button>
                
                {{-- jika status mobil sudah di kembalikan --}}
                @else
                {{-- menampilkan status mobil sudah di kembalikan --}}
                {{$peminjam->status}}
                @endif

              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>


    <!-- pop up confirmasi yang akan di tampilkan -->
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="confirmasi">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
              </div>
              <div class="modal-body">
                <form name="form_confirm" action="{{ url('admin/pengembalian')}}" method="post" enctype="multipart/form-data">
                  <div class="col-md-12"><input type="hidden" name="id"></div>
                  <p>Mobil sudah di kembalikan ?</p>
                    <br>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                    <input type="submit" class="btn btn-primary" value="Ya">
                  </div>
                  {{csrf_field()}}
                </form>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->



    <!-- Fungsi Untuk menampilkan PopUp -->
    <script>

            // fungsi untuk menampilkan popUp konfirmasi apakah mobil sudah di kembalikan
            function confirm(id)
              {
                  document.forms['form_confirm']['id'].value=id;
                  $('#confirmasi').modal('show');
              }
    </script>

@endsection