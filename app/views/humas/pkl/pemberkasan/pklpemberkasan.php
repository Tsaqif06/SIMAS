 <!-- partial -->
 <div class="content-wrapper">
   <div class="row">
     <div class="col-md-12 grid-margin">
       <div class="row">
         <div class="col-12 col-xl-8 mb-4 mb-xl-0">
           <div class="row">
             <div class="col-lg-12">
               <h3 class="font-weight-bold">PRAKTIK KERJA LAPANGAN</h3>
               <h6 class="font-weight-normal mb-0"> Laman PKL Siswa | <span class="text-primary"> SIMAS </span></h6>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="row justify-content">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card animate-gradient">
         <div class="card-body">
           <div class="row justify-content">
             <div class="col-md-8 grid-margin">
               <h3 class="card-text text-white">
                 Anda belum melakukan pemberkasan.
               </h3>
               <h4 class="card-text text-white">
                 Segera lakukan pemberkasan.
               </h4>
             </div>
             <div class="col-md-4">
               <button type="button" class="btn btn-icon-text btn-light btn-block btn-lg text-primary" data-toggle="modal" data-target="#exampleModal">
                 <i class="mdi mdi-account-card-details btn-icon-prepend icon-lg"></i>
                 Isi Form Pemberkasan
               </button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="row justify-content">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card animate-gradient">
         <div class="card-body">
           <div class="row justify-content-center">
             <div class="col-md-8 grid-margin">
               <h3 class="card-text text-white">
                 Data pemberkasan Anda belum lengkap.
               </h3>
               <h4 class="card-text text-white">
                 Segera lengkapi data pemberkasan.
               </h4>
             </div>
             <div class="col-md-4">
               <button type="button" class="btn btn-icon-text btn-light btn-block btn-lg text-primary" data-toggle="modal" data-target="#exampleModal">
                 <i class="mdi mdi-account-card-details  btn-icon-prepend"></i>
                 Lengkapi Pemberkasan
               </button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="row justify-content">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card animate-gradient">
         <div class="card-body">
           <div class="row justify-content-center">
             <div class="col-md-8 grid-margin">
               <h3 class="card-text text-white">
                 Pemberkasan sudah dilakukan !
               </h3>
               <h4 class="card-text text-white">
                 Proses penempatan sedang dilakukan oleh Kabeng Anda.
               </h4>
             </div>
             <div class="col-md-4">
               <button type="button" class="btn btn-icon-text btn-light btn-block btn-lg text-primary" data-toggle="modal" data-target="#exampleModal">
                 <i class="mdi mdi-account-check  btn-icon-prepend"></i>
                 Lihat Data Pemberkasan
               </button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="row justify-content">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card animate-gradient">
         <div class="card-body">
           <div class="row justify-content-center">
             <div class="col-md-8 grid-margin">
               <h3 class="card-text text-white">
                 Anda sudah mendapatkan tempat PKL !
               </h3>
               <h4 class="card-text text-white">
                 Selamat ! Berjuanglah sebaik mungkin !
               </h4>
             </div>
             <div class="col-md-4">
               <button type="button" class="btn btn-icon-text btn-light btn-block btn-lg text-primary" data-toggle="modal" data-target="#modalpenempatan">
                 <i class="mdi mdi-map-marker  btn-icon-prepend"></i>
                 Lihat Data Penempatan
               </button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>



   <!-- Modal kalau mau isi form pemberkasan-->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title" id="exampleModalLabel">Pemberkasan</h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form>
           <div class="row justify-content-md-center">
             <div class="col-md-6">
               <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Data Diri</h4>
                 <div class="form-group">
                   <label for="kelas">Kelas</label>
                   <input class="form-control" id="nis_pemberkasan" name="kelas" placeholder="Kelas">
                 </div>

                 <div class="form-group">
                   <label for="jurusan_pemberkasan">Jurusan</label>
                   <select class="form-control" aria-label="Default select example" id="jurusan_pemberkasan" name="jurusan_pemberkasan">
                     <option selected>--Pilih Jurusan--</option>
                     <option value="Teknik Grafika">Teknik Grafika</option>
                     <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                     <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                     <option value="Animasi">Animasi</option>
                     <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                     <option value="Logistik">Logistik</option>
                     <option value="Mekatronika">Mekatronika</option>
                     <option value="Perhotelan">Perhotelan</option>
                   </select>
                 </div>

                 <div class="form-group">
                   <label for="namasiswa_pemberkasan">Nama Lengkap</label>
                   <input type="text" class="form-control" id="namasiswa_pemberkasan" name="namasiswa_pemberkasan" placeholder="Nama Lengkap">
                 </div>

                 <div class="form-group">
                   <label for="nis_pemberkasan">NIS</label>
                   <input type="number" class="form-control" id="nis_pemberkasan" name="nis_pemberkasan" placeholder="NIS">
                 </div>

                 <div class="form-group">
                   <label for="nisn_pemberkasan">NISN</label>
                   <input type="number" class="form-control" id="nisn_pemberkasan" name="nisn_pemberkasan" placeholder="NISN">
                 </div>

                 <div class="form-group">
                   <label for="tanggallahir_pemberkasan">Tanggal Lahir</label>
                   <input type="date" class="form-control" id="tanggallahir_pemberkasan" name="tanggallahir_pemberkasan">
                 </div>

                 <div class="form-group">
                   <label for="jeniskelamin_pemberkasan" class="col-form-label">Jenis Kelamin</label>
                   <div class="form-check">
                     <label for="jeniskelamin_pemberkasan" class="form-check-label">
                       <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="lakilaki" value="" checked>
                       Laki - laki
                     </label>
                   </div>
                   <div class="form-check">
                     <label for="jeniskelamin_pemberkasan" class="form-check-label">
                       <input type="radio" class="form-check-input" name="jeniskelamin_pemberkasan" id="perempuan" value="option2">
                       Perempuan
                     </label>
                   </div>
                 </div>

                 <div class="form-group">
                   <label for="agama">Agama</label>
                   <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                 </div>

                 <div class="form-group">
                   <label for="domisili_pemberkasann">Domisili</label>
                   <input type="text" class="form-control" id="domisili_pemberkasann" name="domisili_pemberkasann" placeholder="Domisili">
                 </div>

                 <div class="form-group">
                   <label for="alamat">Alamat Rumah</label>
                   <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah">
                 </div>

                 <div class="form-group">
                   <label for="nohp">No. Telp. / HP</label>
                   <input type="number" class="form-control" id="nohp" name="nohp" placeholder="No. Telp. / HP">
                 </div>
               </div>

             </div>
             <div class="col-md-6">
               <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Kontak Orang Tua / Wali Murid</h4>
                 <div class="form-group">
                   <label for="nohport">No. Telp. / HP (Orang Tua / Wali Murid)</label>
                   <input type="number" class="form-control" id="nohport" name="nohport" placeholder="No. Telp. / HP">
                 </div>
               </div>

               <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Lampiran</h4>
                 <div class="form-group">
                   <label>Foto 3 : 4</label>
                   <input type="file" class="file-upload-default" id="uploadfoto_pemberkasan" name="uploadfoto_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto 3 : 4">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Foto Kartu Pelajar</label>
                   <input type="file" class="file-upload-default" id="uploadkartupelajar_pemberkasan" name="uploadkartupelajar_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Rapor Digital Semester 1, 2, 3</label>
                   <input type="file" class="file-upload-default" name="uploadebookraport_pemberkasan" id="uploadebookraport_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Rapor Digital">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Foto Surat Pernyataan Bermaterai</label>
                   <input type="file" class="file-upload-default" id="uploadsurat_pemberkasan" name="uploadsurat_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Bukti Lunas Nilai</label>
                   <input type="file" class="file-upload-default" name="uploadbuktilunasnilai_pemberkasan" id="uploadbuktilunasnilai_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Nilai">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Bukti Lunas Administrasi</label>
                   <input type="file" class="file-upload-default" name="uploadbuktilunasadministrasi_pemberkasan" id="uploadbuktilunasadministrasi_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Administrasi">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>

                 <div class="form-group">
                   <label>Bukti Lunas Perpustakaan</label>
                   <input type="file" class="file-upload-default" name="uploadbuktilunasperpus_pemberkasan" id="uploadbuktilunasperpus_pemberkasan">
                   <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Bukti Lunas Perpustakaan">
                     <span class="input-group-append">
                       <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                     </span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="modal-footer">
             <div class="modal-body">
               <h4 class="modal-title" id="exampleModalLabel">Pemilihan Kota</h4>
               <div class="form-group">
                 <label for="pkldimana_pemberkasan">Ingin Prakerin di Kota</label>
                 <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 1">
               </div>
               <div class="form-group">
                 <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 2">
               </div>
               <div class="form-group">
                 <input type="text" class="form-control" id="pkldimana_pemberkasan" name="pkldimana_pemberkasan" placeholder="Kota 3">
               </div>
             </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Batalkan</button>
             <button type="submit" class="btn btn-primary mr-2">Kirim</button>
           </div>
         </form>
       </div>
     </div>
   </div>

   <!--Modal udah dapet tempat pkl ahay-->
   <div class="modal fade" id="modalpenempatan" tabindex="-1" role="dialog" aria-labelledby="modalpenempatanlabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h3 class="modal-title" id="modalpenempatanlabel">Data Penempatan</h3>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <h4>Anda ditempatkan di Industri : </h4>
           <h3 class="text-primary">"XXX"</h3>
         </div>
         <div class="modal-body">
           <h4>Di Kota : </h4>
           <h3 class="text-primary">"XXX"</h3>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
         </div>
       </div>
     </div>
   </div>

   <div class="row justify-content">
     <div class="col-md-6 grid-margin stretch-card">
       <div class="card">
         <div class="card-body">
           <div class="card-title">
             <h4>Surat Pemberitahuan Persyaratan PKL</h4>
           </div>
           <object data="../assets/Surat Pemberitahuan Persyaratan PKL.pdf" width="100%" height="500"></object>
         </div>
       </div>
     </div>

     <div class="col-md-6 grid-margin stretch-card">
       <div class="card">
         <div class="card-body">
           <div class="card-title">
             <h4>Surat Pilihan Kota</h4>
           </div>
           <object data="../assets/Surat Edaran Pilihan kota.pdf" width="100%" height="500"></object>
         </div>
       </div>
     </div>
   </div>



 </div>