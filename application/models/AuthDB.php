<?php  

class AuthDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->marketing_db = $this->db->dbprefix."marketing";
    }

    public function profile()
    {
        if ($this->session->userdata['usertype'] == 'marketing') {
            $profile = $this->db->get_where($this->marketing_db, ['id'=>$this->session->userdata['profile_id']])->row_array();
            $this->session->set_userdata(['profile'=>$profile]);
        }
    }

}
?>