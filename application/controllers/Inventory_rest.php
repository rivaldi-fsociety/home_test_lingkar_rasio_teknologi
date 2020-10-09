<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Inventory_rest extends REST_Controller {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

	var $table   = "tb_inventory";
	var $pk 	 = "id_item";

	public function index()
	{
		$data['page'] = "Inventory";
		$data['title'] = "Home-Test Inventory";
		$sql  = "SELECT * from tb_inventory ORDER BY `id_item` DESC ";
		$data['record_inventory'] = $this->db->query($sql)->result();
		$this->template->load('layout_main','content_inventory',$data);
	}

	//Menampilkan data inventory
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $db_inventory = $this->db->get('tb_inventory')->result();
        } else {
            $this->db->where('id', $id);
            $db_inventory = $this->db->get('tb_inventory')->result();
        }
        $this->response($db_inventory, 200);
    }

    //menambahkan data inventory
    function index_post() {
        $data = array(
                    'id_item'		=> $this->post('id_item'),
                    'item_name'     => $this->post('item_name'),
                    'price'    		=> $this->post('price'),
        			'stock'    		=> $this->post('stock'));
        $insert = $this->db->insert('tb_inventory', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //edit data inventory
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id_item'		=> $this->post('id_item'),
                    'item_name'     => $this->post('item_name'),
                    'price'    		=> $this->post('price'),
        			'stock'    		=> $this->post('stock'));
        $this->db->where('id', $id);
        $update = $this->db->update('tb_inventory', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //hapus data inventory
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('tb_inventory');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
