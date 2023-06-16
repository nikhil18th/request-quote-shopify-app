<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Homem extends CI_Model {

    function __construct() {
        parent::__construct();
    }
   
   	public function getQuoteRequestData()
	{
		$query = $this->db->query('SELECT * FROM quote_requests ORDER BY id DESC');
		$data = $query->result_array();
		return $data;
	}

	public function getProductInqData()
	{
		$query = $this->db->query('SELECT * FROM product_inquiry ORDER BY id DESC');
		$data = $query->result_array();
		return $data;
	}
	
	public function saveRquestImage()
	{
		// $query=$this->db->query('SELECT * FROM send_wishlist_product_to_store ORDER BY id DESC');
		// $data = $query->result_array();
		// return $data;
	}
	
	// public function getImgData($table)
	// {
	// 	$query=$this->db->select("*")->from($table);
	// 	return $query->result();
	// }
	 //get shop data bu url
    function getShopByUrl($shop)
    {
        $this->db->where('shop_url',$shop);
        $query=$this->db->get('shop');
        return $query->row();
    }

    /*function getStore($shop) { //backup

        $this->db->select('*');
        $this->db->where('shop_url', $shop);
        $query = $this->db->get('shop');

        return $query->row();
    }*/

    function getStore($shop) { 

        $this->db->select('*');
        $this->db->where('shop_url', $shop);
        $query = $this->db->get('shop');

        return $query->row();
    }

    public function deleteData($tablename,$where) //ruchi
    {
        $query = $this->db->delete($tablename,$where);
        return $query;
    }

    
   
    function getStoreById() {

        $this->db->select('*');
        $this->db->where('id', getStore('id'));
        $query = $this->db->get('shop');

        return $query->row();
    }

    
	// 	public function getAllShop()
	// {
	// 	$query=$this->db->query('SELECT * FROM add_wishlist_shop ORDER BY id DESC');
	// 	$data = $query->result_array();
	// 	$this->db->order_by("desc");
	// 	return $data;
	// }
	
    // public function insert($table,$data)
	// {
	// 	$this->db->insert($table,$data);
	// 	return $this->db->insert_id();
	// }
	
	// public function update($table,$data,$where)
    // {
    // 	$update = $this->db->update($table,$data,$where);
	// 	if($update){
    //         return true;
    //     }else{
    //         return false;
    //     }	
    // }
    
    // public function deleteDataByCustomer($table,$where)
    // {
    // 	$delete = $this->db->delete($table,$where);
	// 	if($delete){
    //         return true;
    //     }else{
    //         return false;
    //     }	
    // }
    
	// public function getWishlistProductCount($table,$where)
	// {
	//     $query=$this->db->select("SUM(`product_quantity`) AS  `wishlist_count`")->from($table)->where($where)->get();
	// 	return $query->result();
		
	// }
	
	// public function getRowByWhere($table,$where)
	// {
	// 	$query=$this->db->select("*")->from($table)->where($where)->get();
	// 	return $query->row();
	// }
	
	// public function getResultByWhere($table,$where)
	// {
	// 	$query=$this->db->select("*")->from($table)->where($where)->get();
	// 	return $query->result();
	// }
	
	//  function removeWishlistProduct($table,$where){
       
    //     $this->db->delete($table,$where);
    // }
	
}