<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    //cek login
    if($this->session->userdata('status')!="login"){
      redirect(base_url().'welcome?pesan=belumlogin');
    }
  }

function index(){
  $data['transaksi']=$this->db->query("select * from transaksi order by id_pinjam desc limit 10")->result();
  $data['anggota']=$this->db->query("select * from anggota order by id_anggota desc limit 10")->result();
  $data['buku']=$this->db->query("select * from buku order by id_buku desc limit 10")->result();

  $this->load->view('admin/header');
  $this->load->view('admin/index',$data);
  $this->load->view('admin/footer');

}

function logout(){
  $this->session->sess_destroy();
  redirect(base_url().'welcome?pesan=logout');
}

  function ganti_password(){
    $data['admin']=$this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
    $this->load->view('admin/header');
    $this->load->view('admin/ganti_password',$data);
    $this->load->view('admin/footer');
  
}

 function ganti_password_act(){
    $data['admin']=$this->db->get_where('admin',['username'=>$this->session->userdata('username')])->row_array();
    $current_password = $this->input->post('current_password');
    $new_password1 = $this->input->post('new_password1');
    $new_password2 = $this->input->post('new_password2');

    $this->form_validation->set_rules('current_password','Password Lama','required');
    $this->form_validation->set_rules('new_password1','Password Baru','required|matches[new_password2]');
    $this->form_validation->set_rules('new_password2','Ulangi Password Baru','required|matches[new_password1]');
    if($this->form_validation->run() == false){
     $this->load->view('admin/header');
      $this->load->view('admin/ganti_password',$data);
      $this->load->view('admin/footer');
    }else{
      $current_password=$this->input->post('current_password');
      $new_password=$this->input->post('new_password1');
      if(!password_verify($current_password,$data['admin']['password'])){
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect('admin/ganti_password');
      }else{
        if($current_password==$new_password1){
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama</div>');
            redirect('admin/ganti_password');
        }else{
          $password_hash= password_hash($new_password1, PASSWORD_DEFAULT);
          $this->db->set('password',$password_hash);
          $this->db->where('nama_admin',$this->session->userdata('nama_admin'));
          $this->db->update('admin');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');

        }
      }
      
    }
    }
function buku(){
      $data['buku'] = $this->M_perpus->get_data('buku')->result();
      $this->load->view('admin/header');
      $this->load->view('admin/buku',$data);
      $this->load->view('admin/footer');
    }

function tambah_buku(){
      $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
      $this->load->view('admin/header');
      $this->load->view('admin/tambahbuku',$data);
      $this->load->view('admin/footer');
    }

function tambah_buku_act(){
      $id_kategori = $this->input->post('id_kategori',true);
      $judul = $this->input->post('judul_buku',true);
      $pengarang = $this->input->post('pengarang',true);
      $thn_terbit = $this->input->post('thn_terbit',true);
      $penerbit = $this->input->post('penerbit',true);
      $isbn = $this->input->post('isbn',true);
      $jumlah_buku = $this->input->post('jumlah_buku',true);
      $lokasi = $this->input->post('lokasi',true);
      $tgl_input = date('Y-m-d');
      $status_buku = $this->input->post('status_buku',true);
      $this->form_validation->set_rules('id_kategori','Kategori','required');
      $this->form_validation->set_rules('judul_buku','Judul Buku','required');
      $this->form_validation->set_rules('status','Status Buku','required');
      if($this->form_validation->run() == false){
        //configurasi upload Gambar
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'gambar'.time();

        $this->load->library('upload',$config);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Penambahan Gagal</div>');

        if($this->upload->do_upload('foto')){
          $image = $this->upload->data();

          $data = array(
            'id_kategori' => $id_kategori,
            'judul_buku' => $judul,
            'pengarang' => $pengarang,
            'thn_terbit' => $thn_terbit,
            'penerbit' => $penerbit,
            'isbn' => $isbn,
            'jumlah_buku' => $jumlah_buku,
            'lokasi' => $lokasi,
            'gambar' => $image['file_name'],
            'tgl_input' => $tgl_input,
            'status_buku' => $status_buku
          );
          $this->M_perpus->insert_data($data,'buku');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
          redirect(base_url().'admin/buku');
        }else{
          $this->load->view('admin/header');
          $this->load->view('admin/tambahbuku');
          $this->load->view('admin/footer');
        }
      }
    } 

  function hapus_buku($id){
        $where = array('id_buku' => $id);
        $this->M_perpus->delete_data($where,'buku');
        redirect(base_url().'admin/buku');
      }
      function edit_buku($id){
      	$where = array('id_buku'=>$id);
      	$data['buku']=$this->db->query("select * from buku b, kategori k where b.id_kategori=k.id_kategori and b.id_buku='$id'")-> result();
      	$data['kategori']=$this->M_perpus->get_data('kategori')->result();
      	$this->load->view('admin/header');
      	$this->load->view('admin/editbuku',$data);
      	$this->load->view('admin/footer');
      }
      function update_buku(){
      	$id=$this->input->post('id');
      	$id_kategori=$this->input->post('id_kategori');
      	$judul=$this->input->post('judul_buku');
      	$pengarang=$this->input->post('pengarang');
      	$penerbit=$this->input->post('penerbit');
      	$thn_terbit=$this->input->post('thn_terbit');
      	$isbn=$this->input->post('isbn');
      	$jumlah_buku=$this->input->post('jumlah_buku');
      	$lokasi=$this->input->post('lokasi');
      	$status=$this->input->post('status');

      	$this->form_validation->set_rules('id_kategori','ID Kategori','required');
      	$this->form_validation->set_rules('judul_buku','Judul Buku','required|min_length[4]');
      $this->form_validation->set_rules('pengarang','Pengarang','required|min_length[4]');
      $this->form_validation->set_rules('penerbit','Penerbit','required|min_length[4]');
      $this->form_validation->set_rules('thn_terbit','Tahun Terbit','required|min_length[4]');
      $this->form_validation->set_rules('isbn','Nomor ISBN','required|numeric');
      $this->form_validation->set_rules('jumlah_buku','Jumlah Buku','required|numeric');
      $this->form_validation->set_rules('lokasi','Lokasi','required|min_length[4]');
      $this->form_validation->set_rules('status','Status Buku','required');

      if($this->form_validation->run()!=false){
      	$config['upload_path']='./assets/upload/';
      	$config['allowed_types']='jpg|png|jpeg';
      	$config['max_size']='2048';
      	$config['file_name']='gambar'.time();

      	$this->load->library('upload',$config);

      	$where=array('id_buku'=>$id);
      	$data=array(
      		'id_kategori'=>$id_kategori,
      		'judul_buku'=>$judul,
      		'pengarang'=>$pengarang,
      		'penerbit'=>$penerbit,
      		'thn_terbit'=>$thn_terbit,
      		'isbn'=>$isbn,
      		'jumlah_buku'=>$jumlah_buku,
      		'lokasi'=>$lokasi,
      		'gambar'=>$image['file_name'],
      		'status_buku'=>$status

      	);

      	if($this->upload->do_upload('foto')){
      		$image = $this->upload->data();
      		unlink('assets/upload/'.$this->input->post('old_pict',TRUE));
      		$data['gambar']=$image['file_name'];

      		$this->M_perpus->update_data('buku',$data,$where);
      	}else{
      		$this->M_perpus->update_data('buku',$data,$where);
      	}

      	$this->M_perpus->update_data('buku',$data,$where);
      	redirect(base_url().'admin/buku');
      }else{
      	$where=array('id_buku'=>$id);
      	$data['buku']=$this->db->query("select * from buku b, kategori k where b.id_kategori=k.id_kategori and b.id_buku='$id'")->result();
      	$data['kategori']=$this->M_perpus->get_data('kategori')->result();
      	$this->load->view('admin/header');
      	$this->load->view('admin/editbuku',$data);
      	$this->load->view('admin/footer');
      }
      }

      function anggota(){
        $data['title']='Data Anggota';
        $data['anggota'] =$this->M_perpus->get_data('anggota')->result();
      $this->load->view('admin/header',$data);
      $this->load->view('admin/anggota',$data);
      $this->load->view('admin/footer');
      }

      function tambah_anggota(){
        $data['title']='Tambah Anggota';
      $data['anggota'] = $this->M_perpus->get_data('anggota')->result();
      $this->load->view('admin/header',$data);
      $this->load->view('admin/tambahanggota',$data);
      $this->load->view('admin/footer');
    }

    function tambah_anggota_act(){
      $id_anggota = $this->input->post('id_anggota');
      $nama_anggota = $this->input->post('nama_anggota');
      $gender = $this->input->post('gender');
      $no_telp = $this->input->post('no_telp');
      $alamat = $this->input->post('alamat');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      
      
      $this->form_validation->set_rules('nama_anggota','Nama Anggota','required');
      $this->form_validation->set_rules('password','Password','required');
      if($this->form_validation->run() != false){
        //configurasi upload Gambar
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = 'gambar'.time();

        $this->load->library('upload',$config);

        if($this->upload->do_upload('foto')){
          $image = $this->upload->data();

          $data = array(
            'id_anggota' => $id_anggota,
            'nama_anggota' => $nama_anggota,
            'gender' => $gender,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'email' => $email,
            'password' => $password,
            'gambar' => $image['file_name']
          );


          $this->M_perpus->insert_data($data,'anggota');
          redirect(base_url().'admin/anggota');
        }else{
          $this->load->view('admin/header');
          $this->load->view('admin/tambahanggota');
          $this->load->view('admin/footer');

        }
      }
    } 

       function hapus_anggota($id){
        $where = array('id_anggota' => $id);
        $this->M_perpus->delete_data($where,'anggota');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anggota Baru Berhasil diHapus!</div>');
        redirect(base_url().'admin/anggota');
      }
  function edit_anggota($id){
        $where = array('id_anggota'=>$id);
        $data['anggota']=$this->db->query("select * from anggota where id_anggota='$id'")-> result();
      
        $this->load->view('admin/header');
        $this->load->view('admin/editanggota',$data);
        $this->load->view('admin/footer');
      }

      function update_anggota(){
        $id=$this->input->post('id');
        $nama_anggota=$this->input->post('nama_anggota');
        $gender=$this->input->post('gender');
        $no_telp=$this->input->post('no_telp');
        $alamat=$this->input->post('alamat');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
      

        $this->form_validation->set_rules('id_anggota','ID Anggota','required');
        $this->form_validation->set_rules('nama_anggota','Nama_anggota','required|min_length[4]');
      $this->form_validation->set_rules('gender','Gender','required|min_length[4]');
      $this->form_validation->set_rules('no_telp','Nomor Telephone','required|min_length[4]');
      $this->form_validation->set_rules('alamat','Alamat','required|min_length[4]');
      $this->form_validation->set_rules('email','Email','required|min_length[4]');
      $this->form_validation->set_rules('password','Password','required|min_length[4]');
     

      if($this->form_validation->run()==false){
        $config['upload_path']='./assets/upload/';
        $config['allowed_types']='jpg|png|jpeg';
        $config['max_size']='2048';
        $config['file_name']='gambar'.time();

        $this->load->library('upload',$config);

        $where=array('id_anggota'=>$id);
        $data=array(
          'nama_anggota'=>$nama_anggota,
          'gender'=>$gender,
          'no_telp'=>$no_telp,
          'alamat'=>$alamat,
          'email'=>$email,
          'password'=>$password,
          'gambar'=>$image['file_name']

        );

        if($this->upload->do_upload('foto')){
          $image = $this->upload->data();
          unlink('assets/upload/'.$this->input->post('old_pict',TRUE));
          $data['gambar']=$image['file_name'];

          $this->M_perpus->update_data('anggota',$data,$where);
        }else{
          $this->M_perpus->update_data('anggota',$data,$where);
        }

        $this->M_perpus->update_data('anggota',$data,$where);
        redirect(base_url().'admin/anggota');
      }else{
        $where=array('id_anggota'=>$id);
        $data['anggota']=$this->db->query("select * from anggota where id_anggota='$id'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/editanggota',$data);
        $this->load->view('admin/footer');
      }
      }

function detail_anggota($id){
        $this->load->model('M_perpus');
        $detail= $this->M_perpus->detail_data($id);
        $data['detail']=$detail;
        $this->load->view('admin/header');
        $this->load->view('detailanggota',$data);
        $this->load->view('admin/footer');
      }

function peminjaman(){
$data['peminjaman'] =
$this->db->query("select * from transaksi T, buku B,
anggota A where T.id_buku=B.id_buku and
T.id_anggota=A.id_anggota")->result();
$this->load->view('admin/header');
$this->load->view('admin/peminjaman',$data);
$this->load->view('admin/footer');
}
     function tambah_peminjaman(){
$w = array('status_buku'=>'1');
$data['buku'] =
$this->M_perpus->edit_data($w,'buku')->result();
$data['anggota'] =
$this->M_perpus->get_data('anggota')->result();
$data['peminjaman'] =
$this->M_perpus->get_data('transaksi')->result();
$this->load->view('admin/header');
$this->load->view('admin/tambah_peminjaman',$data);
$this->load->view('admin/footer');
}

function tambah_peminjaman_act(){
$tgl_pencatatan = date('Y-m-d H:i:s',true);
$anggota = $this->input->post('anggota',true);
$buku = $this->input->post('buku',true);
$tgl_pinjam = $this->input->post('tgl_pinjam',true);
$tgl_kembali = $this->input->post('tgl_kembali',true);
$denda = $this->input->post('denda',true);
$this->form_validation->set_rules('anggota','Anggota','requ
ired');
$this->form_validation->set_rules('buku','Buku','required')
;
$this->form_validation->set_rules('tgl_pinjam','Tanggal
Pinjam','required');
$this->form_validation->set_rules('tgl_kembali','Tanggal
Kembali','required');
$this->form_validation->set_rules('denda','Denda','required
');
if($this->form_validation->run() == false){
$data = array(
'tgl_pencatatan' => $tgl_pencatatan,
'id_anggota' => $anggota,
'id_buku' => $buku,
'tgl_pinjam' => $tgl_pinjam,
'tgl_kembali' => $tgl_kembali,
'denda' => $denda,
'tgl_pengembalian' => '0000-00-00',
'total_denda' => '0',
'status_pengembalian' =>'0',
'status_peminjaman' =>'0'
);
$this->M_perpus->insert_data($data,'transaksi');
$d = array('status_buku' =>'0','tgl_input' =>
substr($tgl_pencatatan,0,10));
$w = array('id_buku' => $buku);
$this->M_perpus->update_data('buku',$d,$w);
redirect(base_url().'admin/peminjaman');
}else{
$w = array('status_buku' => '1');
$data['buku'] =
$this->M_perpus->edit_data($w,'buku')->result();
$data['anggota'] =
$this->M_perpus->get_data('anggota')->result();
$this->load->view('admin/header');
$this->load->view('admin/tambah_peminjaman',$data);
$this->load->view('admin/footer');
}
}

function transaksi_hapus($id){
$w = array('id_pinjam' => $id);
$data =
$this->M_perpus->edit_data($w,'transaksi')->row();
$ww = array('id_buku' => $data->id_buku);
$data2 = array('status_buku' => '1');
$this->M_perpus->update_data('buku',$data2,$ww);
$this->M_perpus->delete_data($w,'transaksi');
redirect(base_url().'admin/peminjaman');
}

  function transaksi_selesai($id)
  {
    $w = array('id_pinjam' => $id);
    $data['buku'] =
      $this->M_perpus->get_data('buku')->result();
    $data['anggota'] =
      $this->M_perpus->get_data('anggota')->result();
    $data['peminjaman'] = $this->db->query("select
* from transaksi
where id_pinjam='$id'")->result();

    $this->load->view('admin/header');
    $this->load->view('admin/transaksi_selesai', $data);
    $this->load->view('admin/footer');
  }


  function transaksi_selesai_act()
  {
    $id = $this->input->post('id');
    $id_anggota = $this->input->post('id_anggota');
    $id_buku = $this->input->post('id_buku');
    $tgl_dikembalikan =
      $this->input->post('tgl_dikembalikan');
    $tgl_kembali =
      $this->input->post('tgl_kembali');
    $buku = $this->input->post('buku');
    $denda = $this->input->post('denda');
    $this->form_validation->set_rules('id', 'ID Anggota', 'required');
    $this->form_validation->set_rules('buku', 'ID buku', 'required');
    $this->form_validation->set_rules('tgl_dikembalikan', 'Tanggal dikembalkan', 'required');
    if ($this->form_validation->run() != false) {
      //hitung selisih hari
      $batas_kembali = strtotime($tgl_kembali);
      $dikembalikan =
        strtotime($tgl_dikembalikan);
      $selisih = abs(($batas_kembali -
        $dikembalikan) / (60 * 60 * 24));
      $total_denda = $denda * $selisih;
      //update status Peminjaman
      $data = array('status_peminjaman' =>
      '1', 'total_denda' => $total_denda, 'tgl_pengembalian' =>
      $tgl_dikembalikan, 'status_pengembalian' => '1');
      $w = array('id_pinjam' => $id);
      $this->M_perpus->update_data("transaksi", $data, $w);
      //update status Buku
      $data2 = array('status_buku' => '1');
      $w2 = array('id_buku' => $buku);
      $this->M_perpus->update_data('buku', $data2, $w2);
      redirect(base_url() . 'admin/peminjaman');
    } else {
      $data['buku'] =
        $this->M_perpus->get_data('buku')->result();
      $data['anggota'] =
        $this->M_perpus->get_data('anggota')->result();
        $data['peminjaman'] = $this->db->query("select
        * from transaksi
        where id_pinjam='$id'")->result();

      $this->load->view('admin/header');
      $this->load->view('admin/transaksi_selesai', $data);
      $this->load->view('admin/footer');
    }
  }
}

