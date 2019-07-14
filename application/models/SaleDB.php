<?php  

class SaleDB extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->sale = $this->db->dbprefix."sale";
        $this->product = $this->db->dbprefix."product";
        $this->client = $this->db->dbprefix."client";
        $this->marketing = $this->db->dbprefix."marketing";
    }

    public function products()
    {
        $query = $this->db->get_where($this->product, ['prd_status'=>'active'])->result_array();
        $const = ['0'=>"Choose Product"]; // Construct
        if (!empty($query)) {
            foreach ($query as $key => $value) {
                $const[$value['prd_id']] = $value['prd_name'];
            }
        } else {
            $const['0'] = 'Products Not Found';
        }
        return $const;
    }

    public function total_rows()
    {
        $query = $this->db->get($this->sale)->num_rows();
        return $query;
    }

    public function save($data)
    {
        return $this->db->insert($this->sale, $data);
    }

    public function pagination($limit='',$offset='')
    {
        $sale_to_client = $this->sale.".client_id = ".$this->client.".clt_id"; // Joining Condition
        $sale_to_product = $this->sale.".product_id = ".$this->product.".prd_id"; // Joining Condition

        $this->db->order_by($this->sale.'.id','DESC');
        $this->db->select("*");
        $this->db->from($this->sale);
        $this->db->join($this->client, $sale_to_client);
        $this->db->join($this->product, $sale_to_product);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function sale_detail($id)
    {
        $sale_to_client = $this->sale.".client_id = ".$this->client.".clt_id"; // Joining Condition
        $sale_to_product = $this->sale.".product_id = ".$this->product.".prd_id"; // Joining Condition
        $client_to_marketing = $this->client.".clt_referral = ".$this->marketing.".mrk_referral"; // Joining Condition

        $this->db->order_by($this->sale.'.id','DESC');
        $this->db->select('*');
        $this->db->where($this->sale.'.id', $id);
        $this->db->from($this->sale);
        $this->db->join($this->client, $sale_to_client);
        $this->db->join($this->product, $sale_to_product);
        $this->db->join($this->marketing, $client_to_marketing);
        $query = $this->db->get()->row_array();
        return $query;
    }

}
?>