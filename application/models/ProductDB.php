<?php  

class ProductDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->table = $this->db->dbprefix."product";
    }

    // No of Rows Count
    public function total_rows()
    {
        $this->db->where('prd_status !=', 'delete');
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }

    // Find By Id
    public function findRow($data='')
    {
        $query = $this->db->get_where($this->table,$data)->row_array();
        return $query;
    }

    // Save User
    public function save($data='')
    {
        return $this->db->insert($this->table, $data);
    }

    // Update Users
    public function update($data='')
    {
        $this->db->where('prd_id', $data['prd_id']);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('prd_id', $id);
        return $this->db->update($this->table, ['prd_status'=>'delete']);
    }

    // Pagination
    public function pagination($limit='',$offset='')
    {
        $this->db->order_by('prd_id','DESC');
        $this->db->where('prd_status !=', 'delete');
        $query = $this->db->get($this->table, $limit,$offset)->result_array();
        return $query;
    }

}
?>