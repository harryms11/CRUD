<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>data pegawai</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-15">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <a href="/tambahDataPegawai"  class="btn btn-dark">+Tambah</a>
                <a href="/exportPdf"  class="btn btn-danger me-2">Export PDF</a>
                <a href="/exportExcel"  class="btn btn-success me-2">Export Excel</a>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Import Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan File</h1>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                      </div>
                      <form action="/importExcel" method="POST" enctype="multipart/form-data">
                      
                        @csrf
                      <div class="modal-body">
                        <div class="form-group"> 
                          <input type="file" name="file" required> 
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>

                <!-- Cari -->
                <div class="bd-search position-relative me-auto" style="width: 200px;"> 
                  <div class="col-auto">
                  <form action="/dataPegawai" method="GET">
                    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Cari">
                  </form>
                  </div>    
                </div>
                {{-- @if ($message = Session::get ('success'))
                    <div class="alert alert-secondary" role="alert">
                      {{$message}}
                    </div>  
                @endif --}}
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Aksi</th>
    
                  </tr>
                </thead>
                    @php
                     $no = 1;   
                    @endphp
                <tbody>
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{$index + $data->firstItem() }}</th>
                        <td>{{$row->nama}}</td>
                        <td>
                          <img src="{{ asset('fotoPegawai/'.$row->foto) }}" alt="" width="40px">
                        </td>
                        <td>{{$row->jeniskelamin}}</td>
                        <td>0{{$row->nohp}}</td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/editDataPegawai/{{$row->id}}"  class="btn btn-info">Edit</a>
                            <a href="/deleteDataPegawai/{{{$row->id}}}" class="btn btn-danger" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Hapus</button>
                        </td>
                      </tr>
                    @endforeach
                
                </tbody>
              </table>
              {{ $data->links() }}
            </div>
          </div>
        </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
    crossorigin="anonymous"></script>

    {{-- Penambahan jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>         
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>                         

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    -->
  </body>
  {{-- <script >
    $('.delete').click( function(){                    //Penambahan 
      var pegawaiid = $(this).attr('data-id');         //Penambahan 
      var nama = $(this).attr('data-nama');            //Penambahan 

                Swal.fire
            ({
                  title: 'Apa anda yakin?',
                  text: "Menghapus data dengan nama : "+nama+"",
                  icon: 'warning',
                  showCancelButton: true,
                  cancelButtonText: 'Batal',
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Iya'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = "/deleteDataPegawai/"+id+""    //Penambahan 
              Swal.fire(
                  'Hapus!',
                  'Data berhasil dihapus',
                  'success'
                      )
              }
              });

    });
   
  </script> --}}

<script>
  @if   (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
  @endif

</script>
</html>