<?php  

class InstallmentDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->sale = $this->db->dbprefix."sale";
        $this->ledger = $this->db->dbprefix."ledger";
        $this->product = $this->db->dbprefix."product";
        $this->client = $this->db->dbprefix."client";
        $this->marketing = $this->db->dbprefix."marketing";
    }

    public function panding_installment()
    {
        return $this->db->get_where($this->ledger, ['lg_status'=>'admin_approval'])->result_array();
    }

    public function bills($id)
    {
        $this->db->select("*");
        $this->db->where($this->sale.'.client_id', $id);
        $this->db->from($this->sale);
        $this->db->join($this->product,  $this->sale.".product_id = ".$this->product.".prd_id");
        return $this->db->get()->result_array();
    }

    public function ledger($data)
    {
        if (!empty($data)) {
            foreach ($data as $value) {
                $query[$value['id']] = $this->db->get_where($this->ledger, ['lg_sale_id'=>$value['id']])->num_rows();
            }
            return $query;
        }
        return false;
    }

    public function save_installment($data)
    {
        return $this->db->insert($this->ledger, $data);
    }

}
?>