<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Kamus_model');
        $this->load->model('Huruf_model');
        $this->load->library('form_validation');
        
        $this->load->library('datatables');
    }

    public function prediksi() 
    {
        $data = array(
            'action' => site_url('kamus/prediksi_action')
        );
        $this->load->view('kamus/prediksi_form', $data);
    }

    public function prediksi_action(){
        $kalimat = $_POST['kata'];
        $tempKata = explode(" ", $kalimat);
        $kata = [];

        $tempKata = \array_filter($tempKata, static function ($element){
            return $element != "";
        });

        $index = 0;
        foreach($tempKata as $item){
            $kata[$index] = $item;
            $index++;
        }

        print_r($kata);

        print_r(explode(" ", $kalimat));
        print_r($kalimat . " ");

        $out="";
        $cetak = [];

        for ($i=0; $i < count($kata); $i++) { 
            $kamus=$this->Kamus_model->get_by_kata($kata[$i]);  
            $huruf_pertama=$this->Huruf_model->get_by_huruf($kata[0]); //cek database kata pertama ada di db penghubung
            $huruf_tiga=$this->Huruf_model->get_by_huruf($kata[2]);    //cek database kata ketiga ada di db penghubung

            if (!empty($huruf_pertama)) { //cek kata penghubung jika dia ada 
                if ($i==0) { //jika dia urutan yang pertama
                    $out .= $huruf_pertama->tanda." "; //print harokat
                    $cetak[$i] = array(
                        "arab" => $huruf_pertama->tanda,
                        "penanda" => "tanda"
                    );
                }elseif ($i==1) { //cek kata ke 2
                    $out .= $kamus->majrur." "; //cetak di tabel kamus dengan field majrur
                    $cetak[$i] = array(
                        "arab" => $kamus->majrur,
                        "penanda" => "majrur"
                    );
                }else{
                    $out .= $kamus->marfu." ";
                    $cetak[$i] = array(
                        "arab" => $kamus->marfu,
                        "penanda" => "marfu"
                    );
                }
            }else{
                if ($i==2&&empty($huruf_tiga)) { // kata ke tiga dan tidak huruf penghubung
                    $out .= $kamus->masub." ";
                    $cetak[$i] = array(
                        "arab" => $kamus->masub,
                        "penanda" => "masub"
                    );
                }elseif (!empty($huruf_tiga)&&$i==2) { 
                    $out .= $huruf_tiga->tanda." ";
                    $cetak[$i] = array(
                        "arab" => $huruf_tiga->tanda,
                        "penanda" => "tanda"
                    );
                }elseif ($i==3&&!empty($huruf_tiga)) {
                    $out .= $kamus->majrur." ";
                    $cetak[$i] = array(
                        "arab" => $kamus->majrur,
                        "penanda" => "majrur"
                    );
                } else{
                    $out .= $kamus->marfu." " ;
                    $cetak[$i] = array(
                        "arab" => $kamus->marfu,
                        "penanda" => "marfu"
                    );
                }
            }
        }

        $this->session->set_flashdata('message', $cetak);
        redirect(site_url('kamus/prediksi'));
        //print_r($kamus->marfu);
    }

public function index()
{
    $this->load->view('kamus/kamus_list');
} 

public function json() {
    header('Content-Type: application/json');
    echo $this->Kamus_model->json();
}

public function read($id) 
{
    $row = $this->Kamus_model->get_by_id($id);
    if ($row) {
        $data = array(
          'id_kamus' => $row->id_kamus,
          'kata' => $row->kata,
          'marfu' => $row->marfu,
          'masub' => $row->masub,
          'majsum' => $row->majsum,
          'majrur' => $row->majrur,
          );
        $this->load->view('kamus/kamus_read', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('kamus'));
    }
}

public function create() 
{
    $data = array(
        'button' => 'Create',
        'action' => site_url('kamus/create_action'),
        'id_kamus' => set_value('id_kamus'),
        'kata' => set_value('kata'),
        'marfu' => set_value('marfu'),
        'masub' => set_value('masub'),
        'majsum' => set_value('majsum'),
        'majrur' => set_value('majrur'),
        );
    $this->load->view('kamus/kamus_form', $data);
}

public function create_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->create();
    } else {
        $data = array(
          'kata' => $this->input->post('kata',TRUE),
          'marfu' => $this->input->post('marfu',TRUE),
          'masub' => $this->input->post('masub',TRUE),
          'majsum' => $this->input->post('majsum',TRUE),
          'majrur' => $this->input->post('majrur',TRUE),
          );

        $this->Kamus_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('kamus'));
    }
}

public function update($id) 
{
    $row = $this->Kamus_model->get_by_id($id);

    if ($row) {
        $data = array(
            'button' => 'Update',
            'action' => site_url('kamus/update_action'),
            'id_kamus' => set_value('id_kamus', $row->id_kamus),
            'kata' => set_value('kata', $row->kata),
            'marfu' => set_value('marfu', $row->marfu),
            'masub' => set_value('masub', $row->masub),
            'majsum' => set_value('majsum', $row->majsum),
            'majrur' => set_value('majrur', $row->majrur),
            );
        $this->load->view('kamus/kamus_form', $data);
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('kamus'));
    }
}

public function update_action() 
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id_kamus', TRUE));
    } else {
        $data = array(
          'kata' => $this->input->post('kata',TRUE),
          'marfu' => $this->input->post('marfu',TRUE),
          'masub' => $this->input->post('masub',TRUE),
          'majsum' => $this->input->post('majsum',TRUE),
          'majrur' => $this->input->post('majrur',TRUE),
          );

        $this->Kamus_model->update($this->input->post('id_kamus', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('kamus'));
    }
}

public function delete($id) 
{
    $row = $this->Kamus_model->get_by_id($id);

    if ($row) {
        $this->Kamus_model->delete($id);
        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect(site_url('kamus'));
    } else {
        $this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('kamus'));
    }
}

public function _rules() 
{
	$this->form_validation->set_rules('kata', 'kata', 'trim|required');
	$this->form_validation->set_rules('marfu', 'marfu', 'trim|required');
	$this->form_validation->set_rules('masub', 'masub', 'trim|required');
	$this->form_validation->set_rules('majsum', 'majsum', 'trim|required');
	$this->form_validation->set_rules('majrur', 'majrur', 'trim|required');

	$this->form_validation->set_rules('id_kamus', 'id_kamus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

}

/* End of file Kamus.php */
/* Location: ./application/controllers/Kamus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 10:08:38 */
/* http://harviacode.com */