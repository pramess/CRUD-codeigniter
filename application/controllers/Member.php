<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class Member extends CI_Controller
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

public function katalog_detail_anggota(){
$id=$this->uri->segment(3);
$anggota=$this->db->query('select*from anggota, where id_anggota='.$id)->result(); 
foreach ($anggota as $fields) {
$data['nama_anggota']=$fields->nama_anggota; 
$data['gender']=$fields->gender; 
$data['no_telp']=$fields->no_telp; 
$data['alamat']=$fields->alamat;
$data['email']=$fields->email;
$data['password']=$fields->password;
$data['gambar']=$fields->gambar;
$data['id']=$id;
}
$this->load->view('desain'); 
$this->load->view('toplayout'); $this->load->view('detail_anggota',$data); }
}
?>