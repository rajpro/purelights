<?php  

class AjaxDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->product = $this->db->dbprefix."product";
    }

    public function cheques($id)
    {
        return $this->db->get_where($this->product, ['prd_id'=>$id])->row_array();
    }

}
?>