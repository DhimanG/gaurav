   <?php //print_r($profile_data[0]['first_name']);exit;?>
    <div class="clearfix"></div>
      <footer>
        <p>
          <span style="text-align:left;float:left">&copy; 2013-2014 <a target="_blank" href="http://getspiffed.com">Get Spiffed, Inc. </a> all rights reserved</span>
        </p>
      </footer>
    </div>
    
    
    <script src="<?php echo base_url();?>Assets/dashboard/js/masonry.pkgd.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/bootstrap.js"></script>    
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/fullcalendar.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/excanvas.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.chosen.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.uniform.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.cleditor.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.noty.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.elfinder.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.raty.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.uploadify-3.1.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.gritter.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.imagesloaded.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.knob.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/flexslider.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/custom.js"></script>    
    <script src="<?php echo base_url();?>Assets/dashboard/js/chosen.jquery.js"></script>    
    <script src="<?php echo base_url();?>Assets/js/jquery.fs.picker.js" type="text/javascript"> </script>   
    <script src="<?php echo base_url(); ?>Assets/js/jQuery-Validation-Engine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/jQuery-Validation-Engine/js/jquery.validationEngine.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.wookmark.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/bootstrap-modalmanager.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>Assets/dashboard/js/jquery.pageslide.min.js"></script>  
    <script>
      $(document).ready(function(){       
        $("#frmpassword").validationEngine('attach',{binded: false});
        $("#frmInvitation").validationEngine('attach',{binded: false});
        $(".second").pageslide({ direction: "right", modal: true });
        $(document).on("click",".coupon",function(){
          var coupon_id = $(this).data("coupon_id");
          console.log(coupon_id);
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>spiffcity/redeem/get_coupon_details",
            data:{'coupon_id':coupon_id},
            success:function(coupon){
              $("#Modal-card").html(coupon);
            }
          });
        });        
        $(document).on("click",".remove_cart",function(){
          var result = window.confirm('Are you sure?');
          var id = $(this).data("id");
          var $remove_btn = $(this);
          if (result == true) {
            $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>spiffcity/cart/delete_cart",
            data:{
              'id':id
            },
            success:function(msg){
              console.log(msg["success"]);
              if (msg["success"] == true) {
                $remove_btn.closest("tr").remove();
                console.log($(".sub-total").text());
                $(".sub-total").text(<?php $this->cart->contents(); echo $this->cart->format_number($this->cart->total()); ?>);
              }else{
                console.log("false");
              }
            }
            });
          }        
        });
        $(document).on("change","#qty",function(){
          console.log("sdafsdfasd");
          var sub_total = 0;
          var price = $(this).closest("tr").find("td.price").text();                      
          var qty = $(this).closest("tr").find(".qty").val();
          var total = price * qty;
          $(this).closest("tr").find(".qty_total").text(total);
          $("td.qty_total").each(function(i){
            sub_total = sub_total + parseInt($(this).closest("tr").find(".qty_total").text());
          });
          $(".sub-total").text(sub_total);
          $("#buynow").attr('disabled',true);
          $(".update-btn").attr('disabled',false);
          console.log(sub_total);
        });
        $(document).on("click",".update-btn",function(){          
          $('#cart_table input[type="text"]').each(function(){
            var rowid = $(this).parents("tr").data("rowid");
            var qty = $(this).parents("tr").find(".qty").val();
            $.ajax({
              type:"POST",
              url:"<?php echo base_url();?>spiffcity/cart/update_cart",
              data:{
                'rowid':rowid,
                'qty':qty
              },
              success:function(cart){
                if (cart["success"]) {
                  $("#buynow").attr('disabled',false);
                  $(".update-btn").attr('disabled',true);
                }else{
                  alert("Failed to update cart.. Please try it again..");
                }
              }
            });
          });         
        });
      });      
    </script>    
  </body>
</html>