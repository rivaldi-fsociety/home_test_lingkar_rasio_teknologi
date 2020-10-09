<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

    public function countAll($tables){
        return $this->db->get($tables)->num_rows();
    }
    
    public function countQuery($query){
        return $this->db->get($query)->num_rows();
    }
    
    //enampilkan satu record brdasarkan parameter.
    public function kondisi($tables,$where)
    {
        $this->db->where($where);
        return $this->db->get($tables);
    }
    
    //menampilkan satu record brdasarkan parameter.
    public  function getByID($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables)->result_array();
    }

    public  function getByIDObj($tables,$pk,$id){
        $this->db->where($pk,$id);
        return $this->db->get($tables)->result();
    }

    public function insert($tables,$data){
        $this->db->insert($tables,$data);
    }

    public function update($tables,$data,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->update($tables,$data);
    }

    public function updatewhere($tables,$data,$where){
        $this->db->where($where);
        $this->db->update($tables,$data);
    }
    

    public function delete($tables,$pk,$id){
        $this->db->where($pk,$id);
        $this->db->delete($tables);
    }

    public function msg_berhasil($pesan)
    {
        $msg ='<div class="alert alert-success alert-dismissible show fade berhasil">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    '.$pesan.'
                </div>
                </div>';
        return $msg;
    }

    public function msg_gagal($pesan)
    {
        $msg ='<div class="alert alert-danger alert-dismissible show fade gagal">
                    <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    '.$pesan.'
                    </div>
                </div>';
        return $msg;
    }


    private function uploadImage($nama)
    {
        $config['upload_path']          = './upload/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
       

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }
    
    public function deleteImage($id)
    {
        $r = $this->getByID('tb_login','id_user',$id);
        if ($r[0]['img'] != "default.jpg") {
            $filename = explode(".", $r[0]['img'])[0];
            return array_map('unlink', glob(FCPATH."upload/img/$filename.*"));
        }
    }
}

