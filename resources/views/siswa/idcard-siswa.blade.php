<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID Card Pdf</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>
<body>
        <div id="app">
                <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                        <div class="container-fluid">
                          <div class="row mt-5"> 
                                <!-- Id Card Siswa depan-->
                              <div class="card card-primary card-outline mr-5" style="border: 1pt solid black; width: 300.47256pt;
                              height: 439.36992pt; ">
                                <div class="card-body box-profile">
                                        <div class="float-left">
                                                <img class="img-circle"
                                                src="images/logo smk m.png"
                                                alt="User profile picture" width="120px" height="140px">
                                          </div>
                                          <h5 class="text-center mt-4 font-weight-bold mr-4">SMK 2 Muhammadiyah Pekanbaru</h5>
                                          <h6 class="text-center mr-4">jalan K.H.Ahmad Dahlan no.90 Sukajadi Pekanbaru Riau</h6>
                                          <hr style="border: 1px solid gray">
                                          
                                  <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{ ('/images/'.$user->siswa->foto) }}"
                                        alt="User profile picture" style="width: 110px; height:130px"  >
            
                                  </div>
                                  <table class="mt-3 mx-auto">
                                      <tr>
                                          <td><h5>Nama</h5></td>
                                          <td><h5>:</h5></td>
                                          <td><h5>{{ $user -> name }}</h5></td>
                                      </tr>
                                      <tr>
                                          <td><h5>NISN</h5></td>
                                          <td><h5>:</h5></td>
                                          <td><h5>{{ $user -> identity }}</h5></td>
                                      </tr>
                                      <tr>
                                          <td><h5>Kelas</h5></td>
                                          <td><h5>:</h5></td>
                                          <td><h5>{{ $user ->siswa-> kelas -> nama }}</h5></td>
                                        </tr>
                                        <tr>
                                                <td><h5>Jenis Kelamin</h5></td>
                                                <td><h5>:</h5></td>
                                                <td><h5>{{ $user ->siswa-> jenis_kelamin}}</h3></td>
                                              </tr>
                                              <tr><td colspan="3" class="text-center">{!! QrCode::size(150)->generate($user -> identity); !!}</td></tr>
                                  </table>
            
                                  {{-- <p class="text-muted text-center">Software Engineer</p>  --}}
                                  <div class="text-center mt-1">
                                  
                                  </div>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              {{-- /id card Siswa --}}
            
                                    <!-- Id Card Siswa Belakang-->
                                    <div class="card card-primary card-outline" style="border: 1pt solid black; width: 300.47256pt;
                                    height: 439.36992pt; ">
                                    <div class="card-body box-profile">
                                        <div class="float-left">
                                                <img class="img-circle"
                                                src="images/logo smk m.png"
                                                alt="User profile picture" width="120px" height="140px">
                                            </div>
                                            <h5 class="text-center mt-4 font-weight-bold mr-4">SMK 2 Muhammadiyah Pekanbaru</h5>
                                            <h6 class="text-center mr-4">jalan K.H.Ahmad Dahlan no.90 Sukajadi Pekanbaru Riau</h6>
                                            <hr style="border: 1px solid gray">
                                                
                                            <h5 class="text-center font-weight-bold">Visi Sekolah</h5>
                                            <h6 class="ml-2"><p>Menjadi sekolah menengah kejuruan yang islami, bermutu, 
                                                unggul dibidang iptek dan imtaq, berjiwa enterpreneur serta
                                                 berwawasan lingkungan 2020.</p></h6>
                                            <h5 class="text-center font-weight-bold">Misi Sekolah</h5>
                                            <ol>
                                                <li><h6>Mengahayati dan mengamalkan ajaran 
                                                    agama islam yang berdasarkan Al-quran dan 
                                                    As-sunah dalam kehidupan sehari-hari.</h6></li>
                                                <li><h6>Meningkatkan budaya mutu dalam seluruh aktifitas sekolah.</h6></li>
                                                <li><h6>Meningkatkan kompetensi guru dan siswa dalam penguasaan iptek dan imtaq.</h6></li>
                                                <li><h6>Memupuk jiwa enterpreneur dikalangan siswa dan guru.
                                                    </h6></li>
                                                <li><h6>Menciptakan lingkungan sekolah yang sejuk, nyaman, dan sehat.</h6></li>
                                            </ol>                     
                                            {{-- <p class="text-muted text-center">Software Engineer</p>  --}}
                                        <div class="text-center mt-1">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    </div>
                                    {{-- /id card Siswa belakang--}}
                               
                                        
                                    </div>
                                </div>
                            </section>
                          </div>
                    </div>
            </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        window.print();
    </script>
</body>
</html>
