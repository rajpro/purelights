<?php  

class MarketingDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->table = $this->db->dbprefix."marketing";
    }

    // No of Rows Count
    public function total_rows()
    {
        if ($this->session->userdata('usertype') == 'marketing') {
            $mrk = $this->db->get_where($this->table, ['id'=>$this->session->userdata('profile_id')])->row_array();
            $this->db->where('mrk_referred_by', $mrk['referral']);
        }
        $this->db->where('mrk_status !=', 'delete');
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
        $this->db->where('mrk_id', $data['mrk_id']);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, ['mrk_status'=>'delete']);
    }

    // Pagination
    public function pagination($limit='',$offset='')
    {
        if ($this->session->userdata('usertype') == 'marketing') {
            $mrk = $this->db->get_where($this->table, ['mrk_id'=>$this->session->userdata('profile_id')])->row_array();
            $this->db->where('mrk_referred_by', $mrk['referral']);
        }
        $this->db->order_by('mrk_id','DESC');
        $this->db->where('mrk_status !=', 'delete');
        $query = $this->db->get($this->table, $limit,$offset)->result_array();
        return $query;
    }

    public function referral()
    {
        $this->db->order_by('mrk_id', 'DESC');
        $query = $this->db->get($this->table)->row_array();
        if (!empty($query)) {
            return $query['mrk_referral']+1;
        }
        return '100000';
    }

    public function referred_by()
    {
        if ($this->session->userdata('usertype') == 'admin') {
            return '0';
        } else {
            $query = $this->db->get_where($this->table,['id'=>$this->session->userdata['profile_id']])->row_array();
            return $query['referral'];
        }
    }

    public function level()
    {
        if ($this->session->userdata('usertype') == 'admin') {
            return '1';
        } else {
            $query = $this->db->get_where($this->table,['id'=>$this->session->userdata['profile_id']])->row_array();
            return $query['mrk_level']+1;
        }
    }

    public function save_credential($data)
    {
        return $this->db->insert($this->db->dbprefix.'users', $data);
    }

    public function update_credential($data)
    {
        $this->db->where('profile_id', $data['profile_id']);
        return $this->db->update($this->db->dbprefix.'users', $data);
    }

    public function delete_credential($id)
    {
        $this->db->where('profile_id', $id);
        return $this->db->update($this->db->dbprefix.'users', ['status'=>'deactive']);
    }

}
?>