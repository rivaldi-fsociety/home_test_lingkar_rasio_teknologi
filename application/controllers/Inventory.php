<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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

	public function add_new()
	{
		$data['page'] = "Inventory";
		$data['title'] = "Home-Test Form Add Stock Inventory";
		$this->template->load('layout_main','content_inventory_add',$data);
	}

	public function add_stock()
	{
		foreach ($_POST as $key => $value) { $$key = $value; }
         if(isset($_POST['submit']))
            {
				$data  = array(
					'id_item'		=> '',
					'item_name'    	=> $item_name,
					'price'			=> $price,
					'stock'			=> $stock,
				);

				$this->db->insert($this->table,$data);

				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata("msg", $this->crud->msg_berhasil('New item data successfully saved!'));
					redirect(base_url('inventory'));
				}
				else
				{
					$this->session->set_flashdata("msg", $this->crud->msg_gagal('New item data failed to save!'));
					redirect(base_url('inventory/add_new'));
				}
			}
	}

		public function edit($id_item){
		$data['page'] = "Inventory";
	
		$rows 	= $this->crud->getByID($this->table,'id_item',$id_item);
		
		$data['r'] =  array(
            'id_item'       	=> $rows[0]['id_item'],
            'item_name' 		=> $rows[0]['item_name'],
            'price'  			=> $rows[0]['price'],           
            'stock' 			=> $rows[0]['stock'],
			);

		$data['title'] = "Home-Test Edit Stock Inventory - ".$rows[0]['id_item'];	
			
		$this->template->load('layout_main','content_inventory_edit',$data);
	}


	public function do_edit(){
		foreach ($_POST as $key => $value) { $$key = $value; }
		if(isset($_POST['submit']))
        {
				
				$data  = array(
					'id_item'		=> '',
					'item_name'    	=> $item_name,
					'price'			=> $price,
					'stock'			=> $stock
				);


			$this->crud->update($this->table,$data, $this->pk,$id_item);
			
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("msg", $this->crud->msg_berhasil('Item data successfully changed!'));
				redirect(base_url('inventory'));
            }else{
				$this->session->set_flashdata("msg", $this->crud->msg_gagal('Item data failed to change!'));
				redirect(base_url('inventory/edit/'.$id_item));
			} 
		}
	}

	public function del_stock($id_item){
		$this->crud->delete($this->table,  'id_item', $id_item );
		$this->crud->delete($this->tables,  'id_item', $id_item );
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("msg", $this->crud->msg_berhasil('Stock item successfully deleted!'));
        }else{
			$this->session->set_flashdata("msg", $this->crud->msg_gagal('Stock item failed to delete!'));
        }
        redirect(base_url('inventory'));
     }
}
