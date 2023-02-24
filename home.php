<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	
	public function halamanadmin()
	{
		$this->load->view('halamanadmin');
	}
	public function halamanmasyarakat()
	{
		$this->load->view('halamanmasyarakat');
	}
	public function halamanpetugas()
	{
		$this->load->view('halamanpetugas');
	}
	public function tampil()
	{
		$data['query'] = $this->db->get('pengaduanmasyarakat')->result_array();
		$this->load->view('tampil',$data);
	}
	public function login()
	{
		$this->load->view('login');

	}
	public function proseslogin()
	{
 //pilih data berdasarkan username sama password
 $this->db->where('username', $this->input->post("username"));
 $this->db->where('password', $this->input->post("password"));
 $this->db->from('petugas');
  $data = $this->db->get()->row_array();
//  var_dump($data);
// die();
 //kalau datanya ada
    if($data){
		$datasession =[
			"id_petugas" => $data['id_petugas'],
			"username" => $data["username"],
			"level" =>$data["level"]
		];
		$this->session->set_userdata($datasession);
			if($data['level'] === "petugas"){
				redirect("home/halamanpetugas");
			}else if($data["level"]=== "admin"){
			 	redirect("home/halamanadmin");
			}
	}else {
		
		$this->db->from('masyarakat');
		$data = $this->db->get()->row_array();
		if($data){
			$datasession =[
				"nik" => $data['nik'],
				"username" => $data["username"]
			];
			$this->session->set_userdata($datasession);
			redirect("home/halamanmasyarakat");

		}else{
			redirect("home/login");
		}
	}
 //kalau dia petugas masuk ke halaman petugas 
 //kalau dia admin masuk ke halaman admin 
 //kalau gagal balik ke halaman login 

}

public function register()
	{
		$this->load->view('register');
	}

	public function isilaporan()
	{
		$this->load->view('isilaporan');
	}
	public function prosesisilaporan(){
		$data = array(

			'nik' => '2',
			'foto' => '',
			'status' => '0',
			'isi_laporan' => $this->input->post('isi_pengaduan'),
			'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
			'foto'=>"a.png"
	);
	$this->db->insert('pengaduan', $data);
	redirect("home/datalaporan");



	}
	public function tanggapan()
	{
		$this->load->view('tanggapan');

	}

	public function logout()
	{
		$this->load->view('logout');
	}
	public function datalaporan()
	{
		$this->db->where('nik', 22);
		$data['query'] =$this->db->get('pengaduan')->result_array();
		$this->load->view('datalaporan', $data);
	}
	public function laporanmasuk()
	{
		$this->load->view('laporanmasuk');
	}
	public function prosesregister()
	{
		$data = array(
			'nik' => $this->input->post("nik"),
			'nama' => $this->input->post("nama"),
			'username' => $this->input->post("username"),
			'password' => $this->input->post("password"),
	);
	
	$this->db->insert('masyarakat', $data);
	redirect("home/login");

	}
	public function tanggapilaporan()
	{
		$this->load->view('tanggapilaporan');
	}

	public function detail()
	{
		$this->load->view('detail');
	}

	public function delete()
	{
		

$data = [
    'title' => 'My title',
    'name'  => 'My Name',
    'date'  => 'My date',
];

$builder->replace($data);
	$this->db->insert('masyarakat', $data);
	redirect("home/");

	}
}
