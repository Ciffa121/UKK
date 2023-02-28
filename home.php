<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	}


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

		

				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());
						var_dump($error);
						die();
                        $this->load->view('isilaporan', $error);
                }
                else
                {
					$foto = $this->upload->data();
                    $data = array(
						'id_pengaduan' => rand(1, 10000),
						'nik' => '22',
						'status' => '0',
						'isi_laporan' => $this->input->post('isi_pengaduan'),
						'foto'=> $foto["file_name"]
					);
				$this->db->insert('pengaduan', $data);
				redirect("home/datalaporan");
                }
			}


				 function edit($id)
				 {
				 	$data['query'] = $this->db->get_where('pengaduan', array('id_pengaduan' => $id))->result_array();
				 	$this->load->view('edit_pengaduan',$data);
				 }
				 public function proseseditlaporan($id){
			 	$data = array(
						'isi_laporan' => $this->input->post('isi_pengaduan'),
				 		'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
			 	);
				 	$this->db->where('id_pengaduan', $id);
				 	$this->db->update('pengaduan', $data);
				 	redirect("home/datalaporan");
			 }
				 public function delete($id){
				 	$this->db->delete('pengaduan', array('id_pengaduan' => $id));
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

	public function detail($id)
	{	
		$this->db->where('id_pengaduan', $id);
		$data['data'] = $this->db->get('pengaduan')->row_array();


		$this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas ');
		$this->db->where('id_pengaduan', $id);
		$data['tanggapan'] = $this->db->get('tanggapan')->result_array();
		
		// var_dump($data);
		// die();


		$this->load->view('detail', $data);
	}

	public function update($id)
	{
		$this->db->where('id_pengaduan', $id);
		$data['data'] = $this->db->get('pengaduan')->row_array();
	
		$this->load->view('update.php', $data);
	}

	public function print()
	{
		$data['detail']=$this-detail->datalaporan("pengaduan")->result();
		$this-load-view('print_detail',$data);
	}
	public function laporanmasukadmin()
	{
		$data['query'] =$this->db->get('pengaduan')->result_array();
		$this->load->view('laporanmasukadmin', $data);
		// $this->load->view('datalaporan', $data);
    }
public function datalaporandipetugas()
	{
		$this->load->view('datalaporandipetugas');
		
		$data['query'] =$this->db->get('pengaduan')->result_array();
		$this->load->view('datalaporandipetugas', $data);
		




}

function verifikasi($id){
	// var_dump($id);
	// die();
	$verifikasi = $this->input->post('verifikasi');
	$this->db->set('status', $verifikasi);
	$this->db->where('id_pengaduan', $id);
	$this->db->from('pengaduan');
	$this->db->update();

	redirect('home/laporanmasukadmin');
}

function detaillaporanadmin($id){ 
	$this->db->where('id_pengaduan', $id);  
	$data['data'] = $this->db->get('pengaduan')->row_array(); 


	$this->db->where('id_pengaduan', $id);  
	$data['tanggapan'] = $this->db->get('tanggapan')->result_array();
	$this->load->view('detaillaporanadmin', $data);
}


function detaillaporandipetugas($id)
{ 
	$this->db->where('id_pengaduan', $id);  
	$data['data'] = $this->db->get('pengaduan')->row_array(); 


	$this->db->where('id_pengaduan', $id);  
	$data['tanggapan'] = $this->db->get('tanggapan')->result_array();
	$this->load->view('datalaporandipetugas', $data);
}
}