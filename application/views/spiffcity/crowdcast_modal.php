	<?php    
    //echo"<pre>";print_r($likes);exit();
    //print_r($crowdcast_data);exit();
  ?>
  <script>
    $(document).ready(function(){
      var likes = "<?php echo $likes; ?>";
      if (likes>0) {
        $("#like").hide();
        $("#unlike").show().css('background-color','RED');
      }else{
        $("#like").show();
        $("$unlike").hide();
      }
    });
  </script>
  <button type="button" class="closebtn" data-dismiss="modal" aria-hidden="true">x</button>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span9">
          <div class="modal-container">
            <div class="modal-header modal-actionbar">
              <div class="post-buttons">
                <button id="btn_comment" type="button" class="Button btn btn_comment" title="Comments"> <i class="icon-black icon-comment"></i></button>
                <button type="button" class="Button btn btn-spiffs"> 255 Spiffs </button>
                <button id="like" type="button" class="Button  btn-like" title="like" data-crowdcast_id="<?php echo $crowdcast_data[0]['id'];?>">like</button>                  
                <button id="unlike" type="button" class="hide Button  btn-unlike " title="unlike" data-crowdcast_id="<?php echo $crowdcast_data[0]['id'];?>">Unlike</button>                  
              </div>
            </div>
            <div class="modal-body">
              <div class="image_box"> <img src="<?php echo base_url().'Assets/spiffcity/crowdcast/'.$crowdcast_data[0]['img'];?>"></div>
              <h2><?php echo $crowdcast_data[0]['title']; ?></h2>
              <div class="offer-details">
                <p><?php echo $crowdcast_data[0]['description']; ?></p>
              </div>
            </div>
            <hr>
            
            <hr>
            <div class="comments-block">
              <div class="row-fluid">
                <ul class="comment-ul">
                  <?php
                    if(isset($comment_data) && !empty($comment_data)){
                      foreach($comment_data as $comment){
                        $i = 0;
                   ?>
                  <li>
                    <div class="span2">
                      <div class="avt-box"><img src="<?php echo base_url(); ?>Assets/img/avtaar_1.jpg" alt="avataar_name"> </div>
                    </div>
                    <div class="span10">
                      <div class="commenterWrapper"> <a class="commnet_author_name" href="http://rosycontact.com/RickyG/"><?php echo ucFirst($comment['userid']);?></a> <span class="commnet_time"><?php echo date("d M Y" , strtotime($comment['created_date']));?> </span> </div>
                      <p><?php echo $comment['comments']; ?></p>
                    </div>
                  </li>
                  <?php
                    $i++;
                    }
                  } 
                  ?>
                </ul>
              </div>
              <div class="row-fluid ">
                <div class="add-commnet clearfix">
                  <div class="span2">
                    <div class="avt-box"><img src="<?php echo base_url(); ?>Assets/img/avtaar_1.jpg" alt="avataar_name"> </div>
                  </div>
                  <div class="span10">
                    <div class="commenterWrapper"> <a class="commnet_author_name" href="http://rosycontact.com/RickyG/"><?php echo ucFirst($this->session->userdata('username')); ?></a> <span class="commnet_time">Me</span> </div>
                    <p>
                      <textarea id="txt_comment" class="content-txt comment" placeholder="Add a comment..."></textarea>
                    </p>
                    <p class="comment_btn  hide" >
                      <button class="btn " data-crowdcast_id="<?php echo $crowdcast_data[0]['id'];?>">Comment</button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
          </div>
        </div>          
      </div>
    </div>
<script>
  $(document).ready(function(){
    
      
  });
</script>

