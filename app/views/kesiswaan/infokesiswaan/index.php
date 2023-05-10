<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      /* font-family: "Poppins", sans-serif; */
    }
    
    .slider{
      position: relative;
      background: #d1dff0;
      width: 800px;
      min-height: 500px;
      /* margin: 20px; */
      overflow: hidden;
      border-radius: 10px;
    }
    
    .slider .slide{
      position: absolute;
      width: 100%;
      height: 100%;
      clip-path: circle(0% at 0 50%);
    }
    
    .slider .slide.active{
      clip-path: circle(150% at 0 50%);
      transition: 2s;
    }
    
    .slider .slide img{
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
    .slider .slide .info{
      position: absolute;
      color: #000000;
      background: rgba(255, 249, 249, 0.529);
      width: 90%;
      margin-top: 50px;
      margin-left: 50px;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 5px 25px rgba(1, 1, 1, 0.25);
    }
    
    .slider .slide .info h2{
      font-size: 2em;
      font-weight: 800;
    }
    
    .slider .slide .info p{
      font-size: 1em;
      font-weight: 400;
    }
    
    .navigation{
      height: 500px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      opacity: 0;
      transition: opacity 0.5s ease;
    }
    
    .slider:hover .navigation{
      opacity: 1;
    }
    
    .prev-btn, .next-btn{
      z-index: 1;
      font-size: 2em;
      color: #222;
      background: rgba(255, 255, 255, 0.8);
      padding: 10px;
      cursor: pointer;
    }
    
    .prev-btn{
      border-top-right-radius: 3px;
      border-bottom-right-radius: 3px;
    }
    
    .next-btn{
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    
    .navigation-visibility{
      z-index: 1;
      display: flex;
      justify-content: center;
    }
    
    .navigation-visibility .slide-icon{
      z-index: 1;
      background: rgba(255, 255, 255, 0.5);
      width: 20px;
      height: 10px;
      transform: translateY(-50px);
      margin: 0 6px;
      border-radius: 2px;
      box-shadow: 0 5px 25px rgb(1 1 1 / 20%);
    }
    
    .navigation-visibility .slide-icon.active{
      background: #f7faff;
    }
    
    @media (max-width: 900px){
      .slider{
        width: 100%;
      }
    
      .slider .slide .info{
        position: relative;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
      }
    }
    
    @media (max-width: 500px){
      .slider .slide .info h2{
        font-size: 1.8em;
        line-height: 40px;
      }
    
      .slider .slide .info p{
        font-size: 0.9em;
      }
    }

    .button-arounder {
    background: white;
    font-size: 4px;
    border: solid 2px #4B49AC;
    padding: .375em 1.125em;
    font-weight: bold;
    border-radius: 10px;
    color: #4B49AC;
    z-index: 2;
    // width: 50%;
  }
  
  .button-arounder:hover,
  .button-arounder:focus {
    box-shadow: 0 4px 8px hsla(190deg, 15%, 5%, .2);
    transform: translateY(-4px);
    background:#4B49AC;
    border-top-left-radius: var(--radius);
    border-top-right-radius: var(--radius);
    border-bottom-left-radius: var(--radius);
    border-bottom-right-radius: var(--radius);
    color:white;
    border-radius: 10px;
    // width: 50%;
  }
          
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">SELAMAT DATANG DI INFORMASI KESISWAAN</h3>
                <h6 class="font-weight-normal mb-0"> <span class="text-primary">Berbagai informasi di SMKN 4 Malang</span></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-6">
        <?php Flasher ::flash(); ?>
    </div>
    </div>

    <div class="row mb-4">
    <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">Tambah Data Kegiatan</button>
    </div>
    </div>

    <div id="exampleModalLong" class="modal fade" role="dialog" data-backdrop="static" >
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h3 id="modalLabel"> Tambah Data</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form enctype="multipart/form-data" action="<?= BASEURL; ?>/infokesiswaan/tambahData" method="post">
                      <input type="hidden" name="id" id="id">
                      <input type="hidden" name="fotoLama" id="fotoLama">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan_infoKesiswaan" name="kegiatan_infoKesiswaan" placeholder="" required/>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_infoKesiswaan" name="tanggal_infoKesiswaan" placeholder="" required/>
                      </div>
                    
                      <label for="exampleInputEmail1">Foto Kegiatan</label>
                      <input class="form-control" type="file" id="foto" name="foto">
                    

                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi Kegiatan</label>
                      <input type="text" class="form-control" id="deskripsi_infoKesiswaan" name="deskripsi_infoKesiswaan" placeholder="" required/>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                  </div>
              </form>
              </div>
            </div>
            </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="slider" style="width: 100%; height: auto;">
            <?php foreach( $data['infokesiswaan'] as $infokesiswaan ) : ?>
            <div class="slide active">
              <img src="datafoto/<?=$infokesiswaan['foto']?>">
              <div class="info">
                <h4><b><?=$infokesiswaan['kegiatan_infoKesiswaan']?></b></h4>
                <h5><?=$infokesiswaan['tanggal_infoKesiswaan']?></h5>
                <h5><?=$infokesiswaan['deskripsi_infoKesiswaan']?></h5>
                <a href="<?= BASEURL;?>/infokesiswaan/ubahData/<?=$infokesiswaan['id']?>" data-bs-toggle="modal" data-bs-target="#exampleModalLong" class="tampilModalUbah" data-id="<?= $infokesiswaan['id'];?>" style="text-align:right; text-decoration: none; color: black;">
                  <!-- <button class="button-arounder">  -->
                    <span class="material-symbols-outlined"> edit </span>
                  <!-- </button> -->
                </a>
                <a href="<?= BASEURL;?>/infokesiswaan/hapusData/<?=$infokesiswaan['id']?>" onclick="return confirm ('Hapus data?')" style="text-align:right; text-decoration: none; color: black;">
                  <!-- <button class="button-arounder"> -->
                    <span class="material-symbols-outlined"> delete </span>
                  <!-- </button> -->
                </a>
              </div>
            </div>
            <?php endforeach; ?>
                        
            <div class="navigation">
                <i class="fas fa-chevron-left prev-btn"></i>
                <i class="fas fa-chevron-right next-btn"></i>
            </div>
          <!-- <div class="navigation-visibility">
              <div class="slide-icon active"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
              </div>
          </div> -->
        </div>
    </div>
  </div>
            </div>


<script>
  $(function() {
    const BASEURL = window.location.href;
    console.log(BASEURL)
    $('.tombolTambahData').on('click', function(){
        $('formModalLabel').html('Tambah Data')
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $(".tampilModalUbah").click(function () {
      $("#modal").addClass("edit");
      $("#modalLabel").html("Ubah Data Barang Masuk");
      $(".modal-footer button[type=submit]").html("Ubah Data");
      $(".modal-body form").attr("action", `${BASEURL}/ubahData`);

		  const id = $(this).data("id");
        console.log(id);

      $.ajax({
        url: `${BASEURL}/getUbahData`,
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          $('#id').val(data.id);
          $('#kegiatan_infoKesiswaan').val(data.kegiatan_infoKesiswaan);
          $('#tanggal_infoKesiswaan').val(data.tanggal_infoKesiswaan);
          $('#deskripsi_infoKesiswaan').val(data.deskripsi_infoKesiswaan);
          // $("#fotoSekarang").attr("src", `datafoto/${data.fotokegiatan}`);
          $("#fotoLama").val(data.foto);
          // for (let key of Object.keys(data)) {
          //   if (key == "foto") {
          //     continue;
          //   }
          //   $(`#${key}`).val(data[key]);
          //   console.log(data);
        },
      })
    })
  });
</script>
<script type="text/javascript">
    const slider = document.querySelector(".slider");
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");
    const slides = document.querySelectorAll(".slide");
    const slideIcons = document.querySelectorAll(".slide-icon");
    const numberOfSlides = slides.length;
    var slideNumber = 0;

    //image slider next button
    nextBtn.addEventListener("click", () => {
      slides.forEach((slide) => {
        slide.classList.remove("active");
      });
      slideIcons.forEach((slideIcon) => {
        slideIcon.classList.remove("active");
      });

      slideNumber++;

      if(slideNumber > (numberOfSlides - 1)){
        slideNumber = 0;
      }

      slides[slideNumber].classList.add("active");
      slideIcons[slideNumber].classList.add("active");
    });

    //image slider previous button
    prevBtn.addEventListener("click", () => {
      slides.forEach((slide) => {
        slide.classList.remove("active");
      });
      slideIcons.forEach((slideIcon) => {
        slideIcon.classList.remove("active");
      });

      slideNumber--;

      if(slideNumber < 0){
        slideNumber = numberOfSlides - 1;
      }

      slides[slideNumber].classList.add("active");
      slideIcons[slideNumber].classList.add("active");
    });

    //image slider autoplay
    var playSlider;

    var repeater = () => {
      playSlider = setInterval(function(){
        slides.forEach((slide) => {
          slide.classList.remove("active");
        });
        slideIcons.forEach((slideIcon) => {
          slideIcon.classList.remove("active");
        });

        slideNumber++;

        if(slideNumber > (numberOfSlides - 1)){
          slideNumber = 0;
        }

        slides[slideNumber].classList.add("active");
        slideIcons[slideNumber].classList.add("active");
      }, 4000);
    }
    repeater();

    //stop the image slider autoplay on mouseover
    slider.addEventListener("mouseover", () => {
      clearInterval(playSlider);
    });

    //start the image slider autoplay again on mouseout
    slider.addEventListener("mouseout", () => {
      repeater();
    });
    </script>