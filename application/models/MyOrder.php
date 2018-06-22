<?php 
   class MyOrder extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 


      public function getorder($or_id){
         $order = array();
         $orderid = $or_id;
         $this->db->select("*");
         $this->db->from('myorder');
         $this->db->where('or_id',$orderid);
         $query = $this->db->get();
         array_push($order, $query->result());

         $orderid = $orderid;//$this->input->post('or_id');
         $sql = "SELECT orderitem.*,item.it_name,item.it_price 
         FROM orderitem INNER JOIN item ON orderitem.oi_itemid = item.it_id 
         WHERE orderitem.oi_orderid=$orderid";
         $query = $this->db->query($sql); 
         $items = $query->result();
         array_push($order, $items);
         array_push($order,$this->calculateprice($items));

         //returns array=>(array=>(myorder),array=>(orderitem+item),int=>price)
         return $order;

      }


      private function calculateprice($items){
         $price = 0;
         foreach ($items as $item) {
            $price = $price+intval($item->it_price);
         }
         return $price;
      }


      public function insert($data) { 
         if ($this->db->insert("myorder", $data)) { 
            return true; 
         } 
      } 


 	  public function insertItem($data) { 
         if ($this->db->insert("orderitem", $data)) { 
            return true; 
         } 
      }  

       
      public function delete($or_id) { 
         if ($this->db->delete("myorder", "or_id = ".$or_id)) { 
            return true; 
         } 
      } 
   
      public function update($data,$or_id) { 
         $this->db->set($data); 
         $this->db->where("or_id", $or_id); 
         $this->db->update("myorder", $data); 
      } 
  }
 ?>