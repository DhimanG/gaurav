<?php
  /*
  *Spiffcity
  *@Cart controller
  *@author Gaurav
  *@access public
  */
  class Cart extends CI_Controller{
    /*
    *__Construct function used to call parent cconstructor.
    *returns void
    */
    function __construct(){
      parent::__construct();
      if($this->session->userdata('logged_in') == false){
        $this->facebook->destroySession();
        $this->session->sess_destroy();
        redirect('spiffcity/home');
      }
      $this->load->model('spiffcity/cart_model');
      $this->load->model('spiffcity/coupons_model');
      $this->load->model('spiffcity/crowdcast_model');
    }
    /*
    *index default function show cart contents.
    *return void
    */
    function index(){

      $user = $this->session->userdata('spiff_id');
      $user_data = $this->crowdcast_model->get_users_all_activities_data($user);
      // echo"<pre>";print_r($user_data);exit;
      //$balance  = 0;
      //$likes = $user_data['likes'][0]['num_likes']/2;
      //$comments = $user_data['comments'][0]['num_comments'];
      //$data['balance'] = number_format($likes + $comments); 
      //
      //
      //echo"<pre>";print_r($balance);exit;
      $this->load->view('spiffcity/dashboard/dashboard_navbar');
      $this->load->view('spiffcity/dashboard/cart',$user_data);
      $this->load->view('spiffcity/dashboard/dashboard_footer');
    }
    
    /*
    *Add_cart  function used to add product details to cart library
    *return void 
    */
    function add_cart(){
      $coupon_id = $this->input->get('id');
      $details = $this->coupons_model->get_selected_coupon_details($coupon_id);
      $add['id'] = $coupon_id;
      $add['name'] = $details->title;
      $add['qty'] = '1';
      $add['price'] = $details->Price;
      $add['option'] = $details->img;
      $a = $this->cart->insert($add);
      //print_r($a);exit;
      redirect('spiffcity/redeem');
      
    }
     /*
    *Delete_cart function used to delete product from cart 
    *return void 
    */
     function delete_cart(){
      $rowid = $this->input->post('id');
      if($rowid == "all"){
        $this->cart->destroy();
      }
      else{        
        $data = array(
          'rowid' => $rowid,
          'qty'   => 0
        );
        if($this->cart->update($data)){
          header('Content-type: application/json');
          echo json_encode(array("success" => true));exit;          
        }else{
          header('Content-type: application/json');
          echo json_encode(array("success" => false));exit;
        }
      }
    }
    /*
    *update_cart   function used to update cart details
    *return void 
    */
    function update_cart(){
      if(isset($_POST)){
        echo '<script>alert("post..")</script>';

        
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $data = array(
          'rowid' => $rowid,
          'qty' => $qty
        );
        $this->cart->update($data);
        header('Content-type:application/json');
        echo json_encode(array("success" => false));exit;
      }else{
        echo '<script>alert("Failed to update cart Please try it again..")</script>';
      }
    }
    /*
    *Add_cart coupon function used to add product to cart and also to database.
    *return array containing cart details 
    */
    function add_cart_coupon(){
      $user = $this->session->userdata('spiff_id');
      $user_data = $this->crowdcast_model->get_user_crowd_data($user);
      $balance  = 0;
      $likes = $user_data['likes'][0]['num_likes']/2;
      $comments = $user_data['comments'][0]['num_comments'];
      $add['balance'] = number_format($likes + $comments);
      $coupon_id = $this->input->get('id');
      $details = $this->coupons_model->get_selected_coupon_details($coupon_id);
      $add['option'] = $coupon_id;
      $add['name'] = $details->title;
      $add['qty'] = '1';
      $add['price'] = $details->Price;
      
      $result = $this->cart_model->add_cart($add);
      //print_r($result);exit;  
      if($result == true){
        $data['cart_coupons'] = $this->cart_model->get_cart_details();
        $this->load->view('spiffcity/dashboard/dashboard_navbar',$data);
        $this->load->view('spiffcity/dashboard/cart',$data);
        $this->load->view('spiffcity/dashboard/dashboard_footer',$data);
      }else{
        echo '<script>alert("Something goes wrong please do it again...");</script>';
      }      
    }
  }
?>