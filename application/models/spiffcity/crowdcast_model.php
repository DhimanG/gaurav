<?php
  class Crowdcast_model extends CI_Model{
    function get_fbuser_userid($user){
      $this->db->select('id');
      $this->db->where('fb_id',$user);
      $id = $this->db->get('sp_users');
      if($id->num_rows()>0){
        return $id->result_array();
      }else{
        return false;
      }
    }
    function getcrowdcast_data($id){
      $this->db->order_by('modified_date','desc');
      $query = $this->db->get('sp_crowdcast');
      //echo "<pre>";print_r($query->result());exit;
      if($query->num_rows()>0){
        return $query->result();
      }else{
        return false;
      }
    }
    function get_selected_crowdcast_data($crowdcast_id){
      
      $this->db->where('crowdcast_id',$crowdcast_id);
      $crowdcast_like = $this->db->get('crowdcast_likes');
      $crowdcast_data['like_data'] = $crowdcast_like->result_array();
      $crowdcast_data['likes'] = $crowdcast_like->num_rows();
      
      $this->db->select('*');      
      $this->db->from('crowdcast_comments');
      $this->db->join('sp_crowdcast', 'sp_crowdcast.id = crowdcast_comments.crowdcast_id', 'left');
      $this->db->join('sp_users', 'sp_users.id = crowdcast_comments.user_id', 'left');
      $this->db->order_by('comments_created_date');
      $this->db->where('crowdcast_id',$crowdcast_id);
      $comment_data = $this->db->get();
      $crowdcast_data['comment_data']= $comment_data->result_array();
      $crowdcast_data['comments']= $comment_data->num_rows();
      //print_r($crowdcast_data);exit();
      
      $this->db->where('id',$crowdcast_id);
      $crowdcast_img = $this->db->get('sp_crowdcast');
      $crowdcast_data['crowdcast_data']= $crowdcast_img->result_array();
      //echo "<pre>";print_r($crowdcast_data);exit();

      if($crowdcast_data)
      {
        return $crowdcast_data;
      }
      else
      {
        return false;
      }
    }
    function insert_post($insertData){
      $query = $this->db->insert('sp_crowdcast',$insertData );
      if($query){
        return true;
      }else{
        return false;
      }
    }
    function add_comments($comment_data){
      if($this->db->insert('crowdcast_comments',$comment_data)){
        return true;
      }else{
        return false;
      }
    }
    function get_crowdcast_comments($crowdcast_id){
      $this->db->select('');      
      $this->db->from('sp_crowdcast_comments');
      $this->db->join('sp_crowdcast', 'sp_crowdcast.id = sp_crowdcast_comments.crowdcast_id', 'left');
      $this->db->join('sp_users', 'sp_users.id = sp_crowdcast_comments.user_id', 'left');
      $this->db->order_by('comments_created_date');
      
      $objresult = $this->db->get();
      //print_r($objresult);      
      if($objresult)
      {
        return $objresult->result_array();
      }
      else
      {
        return false;
      }
    }
    function add_likes($likes){      
      if($this->db->insert('crowdcast_likes',$likes))
      {
        return true;
      }else{
        return false;
      }
    }
    function unlike_post($unlike_data){
      $this->db->where('crowdcast_id',$unlike_data);
      if($this->db->delete('crowdcast_likes')){
        return true;
      }else{
        return false;
      }
    }
    function get_users_all_activities_data($id){
    //echo "<pre>";print_r($id);exit;
      $this->db->select('crowdcast_id');
      $this->db->where('user_id',$id);
      $this->db->distinct();
      $data['comment_crowd_id'] = $this->db->get('crowdcast_comments')->result_array();
      for($i=0;count($data['comment_crowd_id'])>$i;$i++){
        $this->db->where('id',$data['comment_crowd_id'][$i]['crowdcast_id']);
        $this->db->distinct();
        $activity['comments'][$i] = $this->db->get('sp_crowdcast')->row();
      }
      
      $this->db->select('crowdcast_id');
      $this->db->where('user_id',$id);
      $this->db->distinct();
      $data['like_crowd_id'] = $this->db->get('crowdcast_likes')->result_array();
      for($j=0;count($data['like_crowd_id'])>$j;$j++){
        $this->db->where('id',$data['like_crowd_id'][$j]['crowdcast_id']);
        $this->db->distinct();
        $activity['likes'][$j] = $this->db->get('sp_crowdcast')->row();
      }
      
      //echo "<pre>";print_r($data);exit;
      if($activity){
        return $activity;
      }
      else{
        return false;
      }    
      
    }
    /*
    *@method array or boolean get_users_crowd_details used to get user's added or liked  or commented the crowd..
    */
    function get_user_crowdcast_data($id){
      $this->db->where('user_id',$id);
      $user_data['crowdcast'] = $this->db->get('sp_crowdcast')->result_array();
      $this->db->select('*,count(comments) As num_comments');
      $this->db->where('user_id',$id);
      $user_data['comments'] = $this->db->get('crowdcast_comments')->result_array();
      $this->db->select('count(*) As num_likes');
      $this->db->where('user_id',$id);
      $user_data['likes'] = $this->db->get('crowdcast_likes')->result_array();
      
      if($user_data){
        return $user_data;
      }else{
        return false;
      }
      //$i = 0;
      //foreach($user_data['crowdcast'] as $crowd){
      //$this->db->where('crowdcast_id',$user_data['crowdcast'][$i]['id']);
      //$crowdcast_data['comments'] = $this->db->get('crowdcast_comments')->result_array();
      //$this->db->select('count(*) As num_likes');
      //$this->db->where('crowdcast_id',$user_data['crowdcast'][$i]['id']);
      //$crowdcast_data['likes'] = $this->db->get('crowdcast_likes')->result_array();
      //$i++;
      //}
      //echo"<pre>";print_r($user_data);exit();
    }    
  }
?>