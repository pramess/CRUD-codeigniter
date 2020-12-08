<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class Buku extends CI_Controller
{
function __construct()
{
parent::__construct();
//cek login
if($this->session->userdata('status')!="login"){
$alert=$this->session->set_flashdata('alert','Anda belum login');
redirect(base_url());
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
public function katalog_detail(){
$id=$this->uri->segment(3);
$buku=$this->db->query('select*from buku b, kategori k where b.id_kategori=k.id_kategori and b.id_buku='.$id)->result(); 
foreach ($buku as $fields) {
$data['judul']=$fields->judul_buku; 
$data['pengarang']=$fields->pengarang; 
$data['penerbit']=$fields->penerbit; 
$data['kategori']=$fields->nama_kategori; $data['tahun']=$fields->thn_terbit; 
$data['isbn']=$fields->isbn;
$data['gambar']=$fields->gambar;
$data['id']=$id;
}
$this->load->view('desain'); 
$this->load->view('toplayout'); $this->load->view('detail_buku',$data); }
}
?>