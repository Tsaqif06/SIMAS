 <?php  

class PKL extends Controller {
    public function index()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/home/pkl', $data);
        $this->view('templates/footer');
    }

    public function rekap()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/home/pklrekapitulasi');
        $this->view('templates/footer');
    }
    
    public function penempatan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/home/pkldatapenempatan');
        $this->view('templates/footer');
    }
    public function penempatanania() {
        $data['judul'] = 'Penempatan - Animasi A';
        $data['ppania'] = $this->model('pkl_model')->getExistANIA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/animasi/pkldpania', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanania()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        }
    }

    public function getUbahPenempatanania()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanania()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        }
    }

    public function hapusDataPenempatanania($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanania');
            exit;
        }
    }

    public function penempatananib() {
        $data['judul'] = 'Penempatan - ANIMASI B';
        $data['ppanib'] = $this->model('pkl_model')->getExistANIB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/animasi/pkldpanib', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatananib()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        }
    }

    public function getUbahPenempatananib()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatananib()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        }
    }

    public function hapusDataPenempatananib($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananib');
            exit;
        }
    }

    public function penempatananic() {
        $data['judul'] = 'Penempatan - Animasi C';
        $data['ppanic'] = $this->model('pkl_model')->getExistANIC();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/animasi/pkldpanic', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatananic()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        }
    }

    public function getUbahPenempatananic()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatananic()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        }
    }

    public function hapusDataPenempatananic($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatananic');
            exit;
        }
    }

    public function penempatandkva() {
        $data['judul'] = 'Penempatan - DKV A';
        $data['ppdkva'] = $this->model('pkl_model')->getExistDKVA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/dkv/pkldpdkva', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatandkva()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        }
    }

    public function getUbahPenempatandkva()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatandkva()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        }
    }

    public function hapusDataPenempatandkva($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkva');
            exit;
        }
    }

    public function penempatandkvb() {
        $data['judul'] = 'Penempatan - DKV B';
        $data['ppdkvb'] = $this->model('pkl_model')->getExistDKVB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/dkv/pkldpdkvb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatandkvb()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function getUbahPenempatandkvb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatandkvb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function hapusDataPenempatandkvb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvb');
            exit;
        }
    }

    public function penempatandkvc() {
        $data['judul'] = 'Penempatan - DKV C';
        $data['ppdkvc'] = $this->model('pkl_model')->getExistDKVC();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/dkv/pkldpdkvc', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatandkvc()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        }
    }

    public function getUbahPenempatandkvc()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatandkvc()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        }
    }

    public function hapusDataPenempatandkvc($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandkvc');
            exit;
        }
    }
    public function penempatantla() {
        $data['judul'] = 'Penempatan - TL A';
        $data['pptla'] = $this->model('pkl_model')->getExistTLA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/logistik/pkldptla', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatantla()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        }
    }

    public function getUbahPenempatantla()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatantla()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        }
    }

    public function hapusDataPenempatantla($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantla');
            exit;
        }
    }

    public function penempatantlb()
    {
        $data['judul'] = 'Penempatan - TL B';
        $data['pptlb'] = $this->model('pkl_model')->getExistTLB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/logistik/pkldptlb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatantlb()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        }
    }

    public function getUbahPenempatantlb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatantlb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        }
    }

    public function hapusDataPenempatantlb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantlb');
            exit;
        }
    }

    public function penempatanmekaa() {
        $data['judul'] = 'Penempatan - Mekatronika A';
        $data['ppmka'] = $this->model('pkl_model')->getExistTMA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/mekatronika/pkldptma', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanmekaa()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        }
    }

    public function getUbahPenempatanmekaa()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanmekaa()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        }
    }

    public function hapusDataPenempatanmekaa($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekaa');
            exit;
        }
    }

    public function penempatanmekab() {
        $data['judul'] = 'Penempatan - Mekatronika B';
        $data['ppmkb'] = $this->model('pkl_model')->getExistTMB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/mekatronika/pkldptmb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanmekab()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function getUbahPenempatanmekab()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanmekab()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function hapusDataPenempatanmekab($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanmekab');
            exit;
        }
    }

    public function penempatanpha() {
        $data['judul'] = 'Penempatan - PH A';
        $data['pppha'] = $this->model('pkl_model')->getExistPHA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/perhotelan/pkldppha', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanpha()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        }
    }

    public function getUbahPenempatanpha()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanpha()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        }
    }

    public function hapusDataPenempatanpha($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpha');
            exit;
        }
    }

    public function penempatanphb() {
        $data['judul'] = 'Penempatan - PH B';
        $data['ppphb'] = $this->model('pkl_model')->getExistPHB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/perhotelan/pkldpphb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanphb()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        }
    }

    public function getUbahPenempatanphb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanphb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        }
    }

    public function hapusDataPenempatanphb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanphb');
            exit;
        }
    }

    public function penempatanrpla() {
        $data['judul'] = 'Penempatan  - RPL A';
        $data['pprpla'] = $this->model('pkl_model')->getExistRPLA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/rpl/pkldprpla', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanrpla()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function getUbahPenempatanrpla()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanrpla()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function hapusDataPenempatanrpla($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrpla');
            exit;
        }
    }

    public function penempatanrplb() {
        $data['judul'] = 'Penempatan - RPL B';
        $data['pprplb'] = $this->model('pkl_model')->getExistRPLB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/rpl/pkldprplb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanrplb()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function getUbahPenempatanrplb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanrplb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function hapusDataPenempatanrplb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplb');
            exit;
        }
    }

    public function penempatanrplc() {
        $data['judul'] = 'Penempatan - RPL C';
        $data['pprplc'] = $this->model('pkl_model')->getExistRPLC();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/rpl/pkldprplc', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanrplc()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function getUbahPenempatanrplc()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanrplc()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function hapusDataPenempatanrplc($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanrplc');
            exit;
        }
    }

    public function penempatandga()
    {
        $data['judul'] = 'Penempatan - DG A';
        $data['ppdga'] = $this->model('pkl_model')->getExistDGA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldatapenempatantg', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanDGA()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        }
    }

    public function getUbahPenempatanDGA()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanDGA()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        }
    }

    public function hapusDataPenempatanDGA($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandga');
            exit;
        }
    }

    public function penempatandgb()
    {
        $data['judul'] = 'Penempatan - DG B';
        $data['ppdgb'] = $this->model('pkl_model')->getExistDGB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldpdgb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanDGB()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        }
    }

    public function getUbahPenempatanDGB()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatanDGB()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        }
    }

    public function hapusDataPenempatanDGB($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgb');
            exit;
        }
    }

    public function penempatandgc()
    {
        $data['judul'] = 'Penempatan DG - C';
        $data['ppdgc'] = $this->model('pkl_model')->getExistDGC();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldpdgc', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanDGC()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        }
    }

    public function getUbahPenempatanDGC()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatandgc()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        }
    }

    public function hapusDatapenempatandgc($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgc');
            exit;
        }
    }

    public function penempatandgd()
    {
        $data['judul'] = 'Penempatan DG - D';
        $data['ppdgd'] = $this->model('pkl_model')->getExistDGD();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldpdgd', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanDGD()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        }
    }

    public function getUbahPenempatanDGD()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatandgd()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        }
    }

    public function hapusDatapenempatandgd($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatandgd');
            exit;
        }
    }

    public function penempatanpda() {
        $data['judul'] = 'Penempatan - PD A';
        $data['pppda'] = $this->model('pkl_model')->getExistPDA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldppda', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanpda()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        }
    }

    public function getUbahPenempatanpda()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatanpda()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        }
    }

    public function hapusDatapenempatanpda($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpda');
            exit;
        }
    }

    public function penempatanpdb() {
        $data['judul'] = 'Penempatan - PD B';
        $data['pppdb'] = $this->model('pkl_model')->getExistPDB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldppdb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanpdb(){
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function getUbahPenempatanpdb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatanpdb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function hapusDatapenempatanpdb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdb');
            exit;
        }
    }

    public function penempatanpdc() {
        $data['judul'] = 'Admin - PKL';
        $data['pppdc'] = $this->model('pkl_model')->getExistPDC();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldppdc', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanpdc(){
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        }
    }

    public function getUbahPenempatanpdc()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatanpdc()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        }
    }

    public function hapusDatapenempatanpdc($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdc');
            exit;
        }
    }
    
    public function penempatanpdd() {
        $data['judul'] = 'Admin - PKL';
        $data['pppdd'] = $this->model('pkl_model')->getExistPDD();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tg/pkldppdd', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatanpdd(){
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function getUbahPenempatanpdd()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDatapenempatanpdd()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function hapusDatapenempatanpdd($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatanpdd');
            exit;
        }
    }

    public function penempatantkja() {
        $data['judul'] = 'Penempatan - TKJ A';
        $data['pptkja'] = $this->model('pkl_model')->getExistTKJA();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tkj/pkldptkja', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatantkja()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        }
    }

    public function getUbahPenempatantkja()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatantkja()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        }
    }

    public function hapusDataPenempatantkja($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkja');
            exit;
        }
    }

    public function penempatantkjb()
    {
        $data['judul'] = 'Penempatan - TKJ B';
        $data['pptkjb'] = $this->model('pkl_model')->getExistTKJB();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/penempatan/tkj/pkldptkjb', $data);
        $this->view('templates/footer');
    }

    public function tambahDataPenempatantkjb()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function getUbahPenempatantkjb()
    {
       echo json_encode($this->model('pkl_model')->getDetailtp($_POST['id']));

    }

    public function ubahDataPenempatantkjb()
    {
        if( $this->model('pkl_model')->ubahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function hapusDataPenempatantkjb($id)
    {
        if( $this->model('pkl_model')->HapusDatatp($id) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/penempatantkjb');
            exit;
        }
    }

    public function nilai() {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/home/pklnilai', $data);
        $this->view('templates/footer');
    }

    public function nilaidga()  {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDGA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnillaitga', $data);
        $this->view('templates/footer');
    }
    public function tambahDatanilaidga()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        }
    }

    public function getUbahnilaidga()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidga()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        }
    }

    public function hapusDatanilaidga($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidga');
            exit;
        }
    }

    public function nilaidgb() {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDGB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaidgb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidgb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        }
    }

    public function getUbahnilaidgb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidgb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        }
    }

    public function hapusDatanilaidgb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgb');
            exit;
        }
    }

    public function nilaidgc() {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDGC();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaidgc', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidgc()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        }
    }

    public function getUbahnilaidgc()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidgc()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        }
    }

    public function hapusDatanilaidgc($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgc');
            exit;
        }
    }

    public function nilaidgd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDGD();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaidgd', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidgd()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        }
    }

    public function getUbahnilaidgd()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidgd()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        }
    }

    public function hapusDatanilaidgd($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidgd');
            exit;
        }
    }

    public function nilaipda()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPDA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaipda', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaipda()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        }
    }

    public function getUbahnilaipda()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaipda()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        }
    }

    public function hapusDatanilaipda($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipda');
            exit;
        }
    }
    public function nilaipdb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPDB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaipdb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaipdb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        }
    }

    public function getUbahnilaipdb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaipdb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        }
    }

    public function hapusDatanilaipdb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdb');
            exit;
        }
    }
    public function nilaipdc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPDC();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaipdc', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaipdc()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        }
    }

    public function getUbahnilaipdc()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaipdc()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        }
    }

    public function hapusDatanilaipdc($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdc');
            exit;
        }
    }

    public function nilaipdd()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPDD();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tg/pklnilaipdd', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaipdd()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        }
    }

    public function getUbahnilaipdd()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaipdd()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        }
    }

    public function hapusDatanilaipdd($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipdd');
            exit;
        }
    }

    public function nilaiania()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistANIA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/animasi/pklnilaiania', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaiania()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        }
    }

    public function getUbahnilaiania()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaiania()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        }
    }

    public function hapusDatanilaiania($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiania');
            exit;
        }
    }

    public function nilaianib()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistANIB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/animasi/pklnilaianib', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaianib()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        }
    }

    public function getUbahnilaianib()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaianib()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        }
    }

    public function hapusDatanilaianib($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianib');
            exit;
        }
    }

    public function nilaianic()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistANIC();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/animasi/pklnilaianic', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaianic()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        }
    }

    public function getUbahnilaianic()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaianic()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        }
    }

    public function hapusDatanilaianic($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaianic');
            exit;
        }
    }

    public function nilaidkva()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDKVA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/dkv/pklnilaidkva', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidkva()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        }
    }

    public function getUbahnilaidkva()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidkva()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        }
    }

    public function hapusDatanilaidkva($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkva');
            exit;
        }
    }
    public function nilaidkvb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDKVB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/dkv/pklnilaidkvb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidkvb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function getUbahnilaidkvb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidkvb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function hapusDatanilaidkvb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvb');
            exit;
        }
    }

    public function nilaidkvc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistDKVC();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/dkv/pklnilaidkvc', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaidkvc()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function getUbahnilaidkvc()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaidkvc()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function hapusDatanilaidkvc($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaidkvc');
            exit;
        }
    }

    public function nilailoga()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTLA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/logistik/pklnilaitla', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitla()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        }
    }

    public function getUbahnilaitla()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitla()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        }
    }

    public function hapusDatanilaitla($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailoga');
            exit;
        }
    }

    public function nilailogb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTLB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/logistik/pklnilaitlb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitlb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        }
    }

    public function getUbahnilaitlb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitlb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        }
    }

    public function hapusDatanilaitlb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilailogb');
            exit;
        }
    }

    public function nilaimekaa()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTMA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/mekatronika/pklnilaitma', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitma()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function getUbahnilaitma()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitma()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function hapusDatanilaitma($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekaa');
            exit;
        }
    }

    public function nilaimekab()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTMB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/mekatronika/pklnilaitmb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitmb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        }
    }

    public function getUbahnilaitmb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitmb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        }
    }

    public function hapusDatanilaitmb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaimekab');
            exit;
        }
    }
    public function nilaipha()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPHA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/perhotelan/pklnilaipha', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaipha()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        }
    }

    public function getUbahnilaipha()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaipha()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        }
    }

    public function hapusDatanilaipha($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaipha');
            exit;
        }
    }

    public function nilaiphb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistPHB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/perhotelan/pklnilaiphb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaiphb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        }
    }

    public function getUbahnilaiphb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaiphb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        }
    }

    public function hapusDatanilaiphb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaiphb');
            exit;
        }
    }

    public function nilairpla()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistRPLA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/rpl/pklnilairpla', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilairpla()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        }
    }

    public function getUbahnilairpla()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilairpla()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        }
    }

    public function hapusDatanilairpla($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairpla');
            exit;
        }
    }

    public function nilairplb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistRPLB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/rpl/pklnilairplb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilairplb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        }
    }

    public function getUbahnilairplb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilairplb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        }
    }

    public function hapusDatanilairplb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplb');
            exit;
        }
    }

    public function nilairplc()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistRPLC();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/rpl/pklnilairplc', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilairplc()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        }
    }

    public function getUbahnilairplc()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilairplc()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        }
    }

    public function hapusDatanilairplc($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilairplc');
            exit;
        }
    }

    public function nilaitkja()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTKJA();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tkj/pklnilaitkja', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitkja()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        }
    }

    public function getUbahnilaitkja()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitkja()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        }
    }

    public function hapusDatanilaitkja($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkja');
            exit;
        }
    }

    public function nilaitkjb()
    {
        $data['judul'] = 'Admin - PKL';
        $data['ndga'] = $this->model('pkl_model')->getNilaiExistTKJB();
        $this->view('templates/header', $data);
        $this->view('pkl/nilai/tkj/pklnilaitkjb', $data);
        $this->view('templates/footer');
    }

    public function tambahDatanilaitkjb()
    {
        if( $this->model('pkl_model')->tambahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        }
    }

    public function getUbahnilaitkjb()
    {
       echo json_encode($this->model('pkl_model')->getNilaiById($_POST['id']));

    }

    public function ubahDatanilaitkjb()
    {
        if( $this->model('pkl_model')->ubahDataNilai($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        }
    }

    public function hapusDatanilaitkjb($id)
    {
        if( $this->model('pkl_model')->hapusDataNilai($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/nilaitkjb');
            exit;
        }
    }
    public function pembekalan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/pembekalan/pklpembekalan', $data);
        $this->view('templates/footer');
    }
    public function pemberkasan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/pemberkasan/pklpemberkasan', $data);
        $this->view('templates/footer');
    }
    public function pemberkasanform()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/pemberkasan/pklpemberkasanform', $data);
        $this->view('templates/footer');
    }
    public function pemberkasanlaporan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/pemberkasan/pklpemberkasanlaporan', $data);
        $this->view('templates/footer');
    }
    public function prakerin()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/prakerin/pklprakerin', $data);
        $this->view('templates/footer');
    }
    
    public function pemberangkatan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/prakerin/pemberangkatan/pklpemberangkatan', $data);
        $this->view('templates/footer');
    }
    public function penjemputan()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/prakerin/penjemputan/pklpenjemputan', $data);
        $this->view('templates/footer');
    }
    public function dayatampung()
    {
        $data['judul'] = 'Admin - PKL';
        $this->view('templates/header', $data);
        $this->view('pkl/dayatampung/pkldayatampung', $data);
        $this->view('templates/footer');
    }

    public function pengangkatan()
    {
       
        $data['judul'] = 'Siswa Pegawai';
        $data['pg'] = $this->model('pkl_model')->getSiswaPegawai();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/magang/pklpengangkatansiswa', $data);
        $this->view('templates/footer');
    }

    public function tambahdata()
    {
        if( $this->model('pkl_model')->TambahDataSiswa($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        }
    }


    public function hapus($id)
    {
        if( $this->model('pkl_model')->HapusDataSiswa($id) > 0 ) {
            Flasher::setFlash('berhasil', 'Dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        }
    }
        

    public function getUbah()
    {
       echo json_encode($this->model('pkl_model')->getDetailSiswa($_POST['id']));

    }

    public function ubah()
    {
        if( $this->model('pkl_model')->ubahDataSiswa($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'Diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        } else {

            Flasher::setFlash('gagal', 'Diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/pengangkatan');
            exit;
        }
    }
    
    public function cari()
    {
        $data['judul'] = 'Siswa Pegawai';
        $data['pg'] = $this->model('pkl_model')->caridataPegawai();
        $this->view('templates/header', $data);
        $this->view('pkl/pklpengangkatansiswa/index', $data);
        $this->view('templates/footer');
    }

    public function dataindustri()
    {
       
        $data['judul'] = 'Data industri Siswa';
        $data['dta'] = $this->model('pkl_model')->getSiswaind();
        $this->view('templates/header', $data);
        $this->view('pkl/rekap/dataindustri/pkldataindustri', $data);
        $this->view('templates/footer');
    }

    public function tambahdataiind()
    {
        if( $this->model('pkl_model')->TambahDataind($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        }
    }


    public function hapusind($id)
    {
        if( $this->model('pkl_model')->HapusDataind($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        }
    }
        

    public function getUbahind()
    {
       echo json_encode($this->model('pkl_model')->getDetailind($_POST['id']));

    }

    public function ubahind()
    {
        if( $this->model('pkl_model')->ubahDataind($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        } else {

            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/dataindustri');
            exit;
        }
    }
    
    public function cariind()
    {
        $data['judul'] = 'Siswa Pegawai';
        $data['dta'] = $this->model('pkl_model')->caridataind();
        $this->view('templates/header', $data);
        $this->view('pkl/dataindustri', $data);
        $this->view('templates/footer');
    }
        
        
    public function tambahdatatempat()
    {
        if( $this->model('pkl_model')->TambahDatatp($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASESDATAS . '/pkl/datatempat/index');
            exit;
        } else {
            lasher::setFlash('gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASESDATAS . '/pkl/datatempat/index');
                exit;
        }
    }
 
            public function monitoring()
            {
               
                $data['judul'] = 'Data Tempat';
                $data['mp'] = $this->model('pkl_model')->getSiswaMON();
                $this->view('templates/header', $data);
                $this->view('pkl/prakerin/monitoring/pklmonitoring', $data);
                $this->view('templates/footer');
            }
        
            public function tambahdataMonitoring()
            {
                if( $this->model('pkl_model')->TambahDataMON($_POST) > 0 ) {
                    Flasher::setFlash('berhasil', 'Ditambahkan', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                }
            }
        
        
            public function hapusdatamonitoring($id)
            {
                if( $this->model('pkl_model')->HapusDataMON($id) > 0 ) {
                    Flasher::setFlash('berhasil', 'Dihapus', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                }
            }
                
        
            public function getUbahmonitoring()
            {
               echo json_encode($this->model('pkl_model')->getDetailMON($_POST['id']));
        
            }
        
            public function ubahDTAMonitoring()
            {
                if( $this->model('pkl_model')->ubahDataMON($_POST) > 0 ) {
                    Flasher::setFlash('berhasil', 'Diubah', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Diubah', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/monitoring/pklmonitoring');
                    exit;
                }
            }
            
            public function caridtmonitoring()
            {
                $data['judul'] = 'Data Tempat';
                $data['mp'] = $this->model('pkl_model')->caridataMON();
                $this->view('templates/header', $data);
                $this->view('pkl/prakerin/monitoring/pklmonitoring', $data);
                $this->view('templates/footer');
            }

                        public function perpanjang()
                {
                
                    $data['judul'] = 'Data Perpanjang Masa PKL';
                    $data['pp'] = $this->model('pkl_model')->getSiswaPP();
                    $this->view('templates/header', $data);
                    $this->view('pkl/rekap/perpanjang/pklperpanjangmasa', $data);
                    $this->view('templates/footer');
                }

                public function TambahDTAPP()
                {
                    if( $this->model('pkl_model')->TambahDataPP($_POST) > 0 ) {
                        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    } else {

                        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    }
                }


                public function HapusDataPP($id)
                {
                    if( $this->model('pkl_model')->HapusDataPP($id) > 0 ) {
                        Flasher::setFlash('berhasil', 'dihapus', 'success');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    } else {

                        Flasher::setFlash('gagal', 'dihapus', 'danger');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    }
                }
                    

                public function getUbahPP()
                {
                echo json_encode($this->model('pkl_model')->getDetailPP($_POST['id']));

                }

                public function ubahDTAPP()
                {
                    if( $this->model('pkl_model')->ubahDataPP($_POST) > 0 ) {
                        Flasher::setFlash('berhasil', 'diubah', 'success');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    } else {

                        Flasher::setFlash('gagal', 'diubah', 'danger');
                        header('Location: ' . BASESDATAS . '/pkl/perpanjang');
                        exit;
                    }
                }
                
                public function caridtPP()
                {
                    $data['judul'] = 'Siswa Pegawai';
                    $data['pp'] = $this->model('pkl_model')->caridataPP();
                    $this->view('templates/header', $data);
                    $this->view('pkl/perpanjang', $data);
                    $this->view('templates/footer');
                }

            public function perizinan()
            {
               
                $data['judul'] = 'Izin PKL';
                $data['iz'] = $this->model('pkl_model')->getSiswaIZ();
                $this->view('templates/header', $data);
                $this->view('pkl/rekap/perizinanpkl/pklperizinan', $data);
                $this->view('templates/footer');
            }
        
            public function TambahDTAIZ()
            {
                if( $this->model('pkl_model')->TambahDataIZ($_POST) > 0 ) {
                    Flasher::setFlash('berhasil', 'Ditambahkan', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                }
            }
        
        
            public function HapusDTIZ($id)
            {
                if( $this->model('pkl_model')->HapusDataIZ($id) > 0 ) {
                    Flasher::setFlash('berhasil', 'Dihapus', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Ditambahkan', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                }
            }
                
            public function getUbahIZ()
            {
               echo json_encode($this->model('pkl_model')->getDetailIZ($_POST['id']));
        
            }
        
            public function ubahDTAIZ()
            {
                if( $this->model('pkl_model')->ubahDataIZ($_POST) > 0 ) {
                    Flasher::setFlash('berhasil', 'Diubah', 'success');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                } else {
        
                    Flasher::setFlash('gagal', 'Diubah', 'danger');
                    header('Location: ' . BASESDATAS . '/pkl/perizinan');
                    exit;
                }
            }
            
            public function caridtIZ()
            {
                $data['judul'] = 'Izin Pkl';
                $data['iz'] = $this->model('pkl_model')->caridataIZ();
                $this->view('templates/header', $data);
                $this->view('pkl/rekap/perizinan', $data);
                $this->view('templates/footer');
            }

public function siswabermasalah()
{
   
    $data['judul'] = 'Data industri Siswa';
    $data['bm'] = $this->model('pkl_model')->getSiswaBM();
    $this->view('templates/header', $data);
    $this->view('pkl/rekap/siswabermasalah/pklsiswabermasalah', $data);
    $this->view('templates/footer');
}

public function tambahdatabm()
{
    if( $this->model('pkl_model')->TambahDataBM($_POST) > 0 ) {
        Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    } else {

        Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    }
}


public function hapusbm($id)
{
    if( $this->model('pkl_model')->HapusDataBM($id) > 0 ) {
        Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    } else {

        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    }
}
    

public function getUbahbm()
{
   echo json_encode($this->model('pkl_model')->getDetailBM($_POST['id']));

}

public function ubahbm()
{
    if( $this->model('pkl_model')->ubahDataBM($_POST) > 0 ) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    } else {

        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASESDATAS . '/pkl/siswabermasalah');
        exit;
    }
}

}