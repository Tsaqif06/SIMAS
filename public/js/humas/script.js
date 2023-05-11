$(function() {
    //--------------------------DAS------------------------------//
    
    $('.tombolTambahDatadas').on('click', function (){
        $('#formModalLabeldas').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data')
    });
    
    $('.tampilModalUbahdas').on('click', function(){
              $('#formModalLabeldas').html('Ubah Data Siswa');
              $('.modal-footer button[type=submit]').html('Ubah Data');
              $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahdas')
      
              const id = $(this).data('id');
            
              $.ajax({
                  url: 'http://localhost/SIMAS/public/bkk/getUbahDas',
                  data: {id : id},
                  method: 'post',
                  dataType: 'json',
                  success: function(data){ 
                      $("#fotoLama").val(data.uploadfototerbaru);
                      $("#cvLama").val(data.uploadcvterbaru);
                      $('#namalengkap').val(data.namalengkap);
                      $('#jurusan').val(data.jurusan);
                      $('#jk').val(data.jk);
                      $('#notelpwa').val(data.notelpwa);
                      $('#namaperusahaansaatini').val(data.namaperusahaansaatini);
                      $('#jabatansaatini').val(data.jabatansaatini);
                      $('#id').val(data.id);
                  }
              })
           });
           
           //--------------------------LOKER------------------------------//
      
      $('.tombolTambahDataLoker').on('click', function (){
          $('#formModalLabelLoker').html('Tambah Data Lowongan Kerja');
          $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
       $('.tampilModalEditLoker').on('click', function(){
          $('#formModalLabelLoker').html('Ubah Data Lowongan Kerja');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahloker')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahLoker',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#fotoLama').val(data.upfotoloker);
                  $('#namaperusahaan').val(data.namaperusahaan);
                  $('#untukjurusan').val(data.untukjurusan);
                  $('#profesiygdibutuhkan').val(data.profesiygdibutuhkan);
                  $('#kriteriaprofesi').val(data.kriteriaprofesi);
                  $('#kontakperusahaan').val(data.kontakperusahaan);
                  $('#id').val(data.id);
              }
          })
       });
      
            
      //--------------------------LOMBA------------------------------//
      
      $('.tombolTambahDataLomba').on('click', function (){
          $('#formModalLabelLomba').html('Tambah Data Lomba');
          $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
       $('.tampilModalEditLomba').on('click', function(){
          $('#formModalLabelLomba').html('Ubah Data Lomba');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahlomba')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahLomba',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                $("#pamfletLama").val(data.pamfletlomba);
                  $('#penyelenggara').val(data.penyelenggara);
                  $('#peserta').val(data.peserta);
                  $('#tanggaldaftar').val(data.tanggaldaftar);
                  $('#tanggallomba').val(data.tanggallomba);
                  $('#tempatlomba').val(data.tempatlomba);
                  $('#id').val(data.id);
              }
          })
       });
      
                
      //--------------------------MOU------------------------------//
      
      $('.tombolTambahDataMou').on('click', function (){
      $('#formModalLabelMou').html('Tambah Data MoU');
      $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
      $('.tampilModalEditdas').on('click', function(){
      $('#formModalLabelMou').html('Ubah Data MoU');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahmou')
      
      const id = $(this).data('id');
      
      $.ajax({
          url: 'http://localhost/SIMAS/public/bkk/getUbahMou',
          data: {id : id},
          method: 'post',
          dataType: 'json',
          success: function(data){
              $('#dudika').val(data.dudika);
              $('#bidangkerjadudika').val(data.bidangkerjadudika);
              $('#tglmou').val(data.tglmou);
              $('#no_mou').val(data.no_mou);
              $('#id').val(data.id);
          }
      })
      });
      
              
      //--------------------------WORKSHOP------------------------------//
      
      $('.tombolTambahDataWorkshop').on('click', function (){
          $('#formModalLabelWorkshop').html('Tambah Data Workshop');
          $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
      $('.tampilModalEditWorkshop').on('click', function(){
          $('#formModalLabelWorkshop').html('Ubah Data Workshop');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahworkshop')
      
          const id = $(this).data('id');

          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahWorkshop',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#penyelenggara').val(data.penyelenggara);
                  $('#kegiatan').val(data.kegiatan);
                  $('#tujuan').val(data.tujuan);
                  $('#peserta').val(data.peserta);
                  $('#tanggalpersiapan').val(data.tanggalpersiapan);
                  $('#tanggaldilakukan').val(data.tanggaldilakukan);
                  $('#tempat').val(data.tempat);
                  $('#id').val(data.id);
              }
          })
      });
      
                  
      //--------------------------SPW------------------------------//
      
      $('.tombolTambahDataSpw').on('click', function (){
          $('#formModalLabelSpw').html('Tambah Data SPW');
          $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
      $('.tampilModalEditSpw').on('click', function(){
          $('#formModalLabelSpw').html('Ubah Data SPW');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahspw')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahSpw',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $("#fdiriLama").val(data.fotodiri);
                  $("#fprodukLama").val(data.fotousaha);
                  $('#nisn').val(data.nisn);
                  $('#namalengkap').val(data.namalengkap);
                  $('#jk').val(data.jk);
                  $('#kelas').val(data.kelas);
                  $('#notelp').val(data.notelp);
                  $('#namausaha').val(data.namausaha);
                  $('#alamat').val(data.alamat);
                  $('#kepemilikanusaha').val(data.kepemilikanusaha);
                  $('#sejaktgl').val(data.sejaktgl);
                  $('#omzet').val(data.omzet);
                  $('#id').val(data.id);
              }
          })
      });
      
                  
      //--------------------------PEMINATAN------------------------------//
      
      $('.tombolTambahDataPeminatan').on('click', function (){
          $('#formModalLabelPeminatan').html('Tambah Data Peminatan');
          $('.modal-footer button[type=submit]').html('Tambah Data')
        });
        
        $('.tampilModalEditPeminatan').on('click', function(){
          $('#formModalLabelPeminatan').html('Ubah Data Peminatan');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahpeminatan')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahPeminatan',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#nama').val(data.nama);
                  $('#jeniskelamin').val(data.jeniskelamin);
                  $('#kelas').val(data.kelas);
                  $('#domisili').val(data.domisili);
                  $('#alamat').val(data.alamat);
                  $('#nohp').val(data.nohp);
                  $('#rencanasetelahlulus').val(data.rencanasetelahlulus);
                  $('#id').val(data.id);
              }
          })
      });
      
      //--------------------------LOKER-----------------------------------//
      
      $('.tombolTambahDataLoker').on('click', function (){
          $('#formModalLabelLoker').html('Tambah Data Lowongan Kerja');
          $('.modal-footer button[type=submit]').html('Tambah Data')
      });
      
       $('.tampilModalEditLoker').on('click', function(){
          $('#formModalLabelLoker').html('Ubah Data Lowongan Kerja');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/bkk/ubahloker')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/bkk/getUbahLoker',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#namaperusahaan').val(data.namaperusahaan);
                  $('#untukjurusan').val(data.untukjurusan);
                  $('#profesiygdibutuhkan').val(data.profesiygdibutuhkan);
                  $('#kriteriaprofesi').val(data.kriteriaprofesi);
                  $('#kontakperusahaan').val(data.kontakperusahaan);
                  $('#upfotoloker').val(data.upfotoloker);
                  $('#id').val(data.id);
              }
          })
       });
      
       //-------------------------STUDI TIRU------------------------------//
          $('.tombolTambahDataStiru').on('click', function (){
              $('#formModalLabelStiru').html('Tambah Data Studi Tiru');
              $('.modal-footer button[type=submit]').html('Tambah Data')
          });
      
       $('.tampilModalEditstiru').on('click', function(){
          $('#formModalLabelStiru').html('Ubah Data Studi Tiru');
          $('.modal-footer button[type=submit]').html('Ubah Data');
          $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/stiru/ubahstiru')
      
          const id = $(this).data('id');
          
          $.ajax({
              url: 'http://localhost/SIMAS/public/stiru/getUbahStiru',
              data: {id : id},
              method: 'post',
              dataType: 'json',
              success: function(data){
                  $('#instansi').val(data.instansi);
                  $('#peserta').val(data.peserta);
                  $('#tanggal').val(data.tanggal);
                  $('#tujuan').val(data.tujuan);
                  $('#tempat').val(data.tempat);
                  $('#id').val(data.id);
              }
          })
       });

       //-----------------PKL-------------------//
    // siswa pegawai
    $('.tomboltambahdata').on('click', function() {
      

        $('#judulModallabel').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    $('.tampildataubah').on('click', function() {
        
        $('#judulModallabel').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubah');


        const id = $(this).data('id');
        


        $.ajax({

            url: 'http://localhost/SIMAS/public/PKL/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
               $('#nisn').val(data.nisn);
               $('#namasiswa').val(data.namasiswa);
               $('#kelas').val(data.kelas);
               $('#jurusan').val(data.jurusan);
               $('#namaperusahaan').val(data.namaperusahaan);
               $('#id').val(data.id);

            }
        });

    }); 

    //-----------------pemberkasan-------------------//
    $('.tambahpemberkasan').on('click', function (){
        $('#formModalLabelPemberkasan').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data')
    });
    
    $('.tampilModalUbahps').on('click', function(){
              $('#formModalLabelPemberkasan').html('Ubah Data Pemberkasan');
              $('.modal-footer button[type=submit]').html('Ubah Data');
              $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/pkl/ubahpemberkasan')
      
              const id = $(this).data('id');
            
              $.ajax({
                  url: 'http://localhost/SIMAS/public/pkl/getUbahPemberkasan',
                  data: {id : id},
                  method: 'post',
                  dataType: 'json',
                  success: function(data){ 
                      $("#fotoLama").val(data.uploadfoto_pemberkasan);
                      $("#raportLama").val(data.uploadebookraport_pemberkasan);
                      $("#buktiLama").val(data.uploadbuktilunas_pemberkasan);
                      $('#nisn_pemberkasan').val(data.nisn_pemberkasan);
                      $('#namasiswa_pemberkasan').val(data.namasiswa_pemberkasan);
                      $('#tanggallahir_pemberkasan').val(data.tanggallahir_pemberkasan);
                      $('#jurusan_pemberkasan').val(data.jurusan_pemberkasan);
                      $('#jeniskelamin_pemberkasan').val(data.jeniskelamin_pemberkasan);
                      $('#domisili_pemberkasann').val(data.domisili_pemberkasann);
                      $('#id').val(data.id);
                  }
              })
           });

    // Dataindustri

    $('.tomboltambahdata1').on('click', function() {
      

        $('#judulModallabel1').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    $('.tampildataubah1').on('click', function() {
        
        $('#judulModallabel1').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahind');


        const id = $(this).data('id');
        


        $.ajax({

            url: 'http://localhost/SIMAS/public/PKL/getUbahind',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
               $('#kompetensikeahlian').val(data.kompetensikeahlian);
               $('#namaperusahaan').val(data.namaperusahaan);
               $('#alamat').val(data.alamat);
               $('#kota').val(data.kota);
               $('#id').val(data.id);

            }
        });

    });



    // datatempatpkl

    $('.tomboltambahdata2').on('click', function() {
      

        $('#judulModallabel2').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    $('.tampildataubah2').on('click', function() {
        
        $('#judulModallabel2').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahtempat');


        const id = $(this).data('id');
        


        $.ajax({

            url: 'http://localhost/SIMAS/public/PKL/getUbahtp',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               
               $('#nisn').val(data.nisn);
               $('#namasiswa').val(data.namasiswa);
               $('#kelassiswa').val(data.kelassiswa);
            //    document.querySelector("#kelassiswa").value = data.kelassiswa;
               $('#namaperusahaan').val(data.namaperusahaan);
               $('#id').val(data.id);

            }
        });

    });



//   Datamonitroiing


    $('.tomboltambahdata3').on('click', function() {
      

        $('#judulModallabel3').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    $('.tampildataubah3').on('click', function() {
        
        $('#judulModallabel3').html('Ubah Data Siswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAMonitoring');


        const id = $(this).data('id');
        


        $.ajax({

            url: 'http://localhost/SIMAS/public/PKL/getUbahmonitoring',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
               console.log(data);
               $('#namaperusahaan_monitoringpkl').val(data.namaperusahaan_monitoringpkl);
               $('#namaguru_monitoringpkl').val(data.namaguru_monitoringpkl);
               $('#tanggal_monitoringpkl').val(data.tanggal_monitoringpkl);
               document.querySelector("#namaguru_monitoringpkl").value = data.namaguru_monitoringpkl;
               $('#id').val(data.id);

            }
        });

    });






//  data pembekalan


$('.tomboltambahdata4').on('click', function() {
      

    $('#judulModallabel4').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.tampildataubah4').on('click', function() {
    
    $('#judulModallabel4').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAPB');


    const id = $(this).data('id');
   
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahPB',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data);
           $('#dilakukanoleh').val(data.dilakukanoleh);
           $('#tanggalpersiapan').val(data.tanggalpersiapan);
           $('#jadwal').val(data.jadwal);
           $('#peserta').val(data.peserta);
           $('#tempat').val(data.tempat);
           $('#id').val(data.id);

        }
    });





//  daya tampung

});
$('.tomboltambahdata6').on('click', function() {
      

    $('#judulModallabel6').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.tampildataubah6').on('click', function() {
    
    $('#judulModallabel6').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAPD');


    const id = $(this).data('id');
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahPD',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data.jeniskelamin);
           $('#namaperusahaan').val(data.namaperusahaan);
           $('#jurusan').val(data.jurusan);
           $('#jeniskelamin').val(data.jeniskelamin);
           document.querySelector("#jeniskelamin").value = data.jeniskelamin;
           $('#jumlah').val(data.jumlah);
           $('#id').val(data.id);

        }
    });

});



//   Perpanjang pkl


$('.tomboltambahdata7').on('click', function() {
      

    $('#judulModallabel7').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.tampildataubah7').on('click', function() {
    console.log('a');
    $('#judulModallabel7').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAPP');


    const id = $(this).data('id');
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahPP',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data.jeniskelamin);
           $('#ppnama').val(data.ppnama);
           $('#ppkelas').val(data.ppkelas);
           $('#nisn').val(data.nisn);
        //    document.querySelector("#jeniskelamin").value = data.jeniskelamin;
           $('#namaperusahaan').val(data.namaperusahaan);
           $('#tanggalperpanjangpkl').val(data.tanggalperpanjangpkl);
           $('#id').val(data.id);

        }
    });

});


// Perizinanpkl

$('.tomboltambahdata8').on('click', function() {
      

    $('#judulModallabel8').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.tampildataubah8').on('click', function() {
    
    $('#judulModallabel8').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahDTAIZ');


    const id = $(this).data('id');
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahIZ',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data.jeniskelamin);
           $('#nisn').val(data.nisn);
           $('#nama').val(data.nama);
           $('#kelas').val(data.kelas);
        //    document.querySelector("#jeniskelamin").value = data.jeniskelamin;
           $('#namaperusahaan').val(data.namaperusahaan);
           $('#halizin').val(data.halizin);
           $('#drtanggal').val(data.drtanggal);
           $('#hgtanggal').val(data.hgtanggal);
           $('#id').val(data.id);

        }
    });

});

// Perizinanpkl

$('.tomboltambahdata9').on('click', function() {
      

    $('#judulModallabel9').html('Tambah Data Siswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    
});
$('.tampildataubah9').on('click', function() {
    
    $('#judulModallabel9').html('Ubah Data Siswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/SIMAS/public/PKL/ubahbm');


    const id = $(this).data('id');
    


    $.ajax({

        url: 'http://localhost/SIMAS/public/PKL/getUbahbm',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
           console.log(data);
           $('#nisn').val(data.nisn);
           $('#nama').val(data.nama);
           $('#kelas').val(data.kelas);
        //    document.querySelector("#jeniskelamin").value = data.jeniskelamin;
           $('#namaperusahaan').val(data.namaperusahaan);
           $('#jenismasalah').val(data.jenismasalah);
           $('#solusi').val(data.solusi);
           $('#id').val(data.id);

        }
    });
    });
});