<?php  

class ClientDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix."client";
        $this->marketing = $this->db->dbprefix."marketing";
    }

    // No of Rows Count
    public function total_rows($search='')
    {
        if (!empty($search['find_customer'])) {
            $this->db->like('clt_id', $search['find_customer'], 'both');
            $this->db->or_like('clt_full_name', $search['find_customer'], 'both');
            $this->db->or_like('clt_mobile', $search['find_customer'], 'both');
        }
        $this->db->where('clt_status !=', 'delete');
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
        $this->db->where('clt_id', $data['clt_id']);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('clt_id', $id);
        return $this->db->update($this->table, ['clt_status'=>'delete']);
    }

    // Pagination
    public function pagination($limit='',$offset='', $search='')
    {
        if (!empty($search['find_customer'])) {
            $this->db->like('clt_id', $search['find_customer'], 'both');
            $this->db->or_like('clt_full_name', $search['find_customer'], 'both');
            $this->db->or_like('clt_mobile', $search['find_customer'], 'both');
        }
        $this->db->order_by('clt_id','DESC');
        $this->db->where('clt_status !=', 'delete');
        $query = $this->db->get($this->table, $limit,$offset)->result_array();
        return $query;
    }

    public function referral($referral='')
    {
        if (!empty($referral)) {
            $this->db->where('mrk_referral', $referral);
            $this->db->where('mrk_level', 3);
        } else {
            $this->db->where('mrk_id', $this->session->userdata['profile_id']);
        }
        return $this->db->get($this->marketing)->row_array();
    }

}
?>