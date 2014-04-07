<script type="text/javascript">
$(function() {
  $('.nyroModal').nyroModal();
});
</script>

<script type="text/javascript">
function emailDocument(id){
//	var dataString = 'id='+id; 
	var urlstring = "http://safedoc.phpdevelopment.co.in/"+'documents/ajaxMailALLDocument/'; 
	$.ajax({ type:'POST', 
		url:urlstring, 
		//data:dataString,
		success:function(data) { 
			alert(data); 
		} 
	});

}
 
 function deleteConfirm(url)
 {
 	if(confirm('Do you wish to Delete?'))
 	{
 		window.location.href=url;
 	}
 }
</script>

<?php
	if ($this->session->flashdata('success')){ 
	?>
	<div class="success">
		<p><?php echo $this->session->flashdata('success') ?></p>
	</div>
	<?php
	}
?>
<div class="doc_list">
	<ul>
		<?php
		if($documentDetails){
			$others= 0;	
			
			foreach($documentDetails as $document){
				if ($document['documentCategoryId']!='10')
				{
			?>
				<li>
					<div class="img">
						<?php if($document['documentImage']!='') { ?>
							<img width="75" alt="" src="<?php echo site_url()."public/upload/user".$this->session->userdata('userid')."/documents/thumb/".$document['documentImage'];?>">
						<?php } ?>
					</div>
					<div class="cont">
						<h1><?php echo $document['documentName']; ?> (<?php echo $catDetails[$document['documentCategoryId']];?>)</h1>
						<div id="view_cont">
							<ul>
								<?php
				
								if($document['documentYearPassing'] != 0){
								?>
								<li><span>Year of passing</span> : <?php echo $document['documentYearPassing'] ?></li>
								<?php
								}
								?>
								<?php
								if($document['documentNumber']){
								?>
								<li><span><?php echo $catDetails[$document['documentCategoryId']];?></span> : <?php echo $document['documentNumber'] ?></li>
								<?php
								}
								if($document['documentRemarks']){
								?>
								<li><span>Remarks</span> : <?php echo $document['documentRemarks'] ?></li>
								<?php
								}
								
								if($document['documentExpiryDate'] != '0000-00-00'){
								?>
								<li><span>Expiry Date</span> : <?php echo $document['documentExpiryDate'] ?></li>
								<?php
								}
								?>
							</ul>
						</div>
						<p><?php //echo $document['documentRemarks'];?></p>
						<div class="buttons">
							<ul>
								<li><button href="<?php echo site_url()."documents/view/".$document['documentId'];?>" class="butt nyroModal"><span>View</span></button></li>
								<li><button onclick="window.location.href='<?php echo site_url()."documents/edit/".$document['documentId'];?>'" class="butt"><span>Edit</span></button></li>
								<li><button onclick="javascript : deleteConfirm('<?php echo site_url()."documents/delete/".$document['documentId'];?>');" class="butt"><span>Delete</span></button></li>
							</ul>
						</div>
					</div>
				</li>
		<?php
				}else {$others=1;} 
			} 
			
			if($others ==1){ ?> 
				<li>
                	<div class="img"><img height="63" width="75" alt="" src="<?php echo site_url();?>public/images/other.jpg"></div>
                    <div class="cont">
                    	<h1><?php echo $catDetails[10];?></h1>
                        <p></p>
                        <div class="buttons">
                        	<ul>
                            	<li><button onclick="window.location.href='<?php echo site_url()."documents/viewother";?>'" class="butt"><span>View</span></button></li>
                            </ul>
                        </div>
                    </div>
                </li>
			<?php 
			}
		}
		else
		{ ?>
			<li>
			<div class="img"></div>
			<div class="cont">
				<?php if($this->uri->segment('2') =='search'){ ?>
					<h1>No Search Result Found.</h1>
				<?php } else { ?>
					<h1>No Documents Uploaded Yet.</h1>
				<?php } ?>
			</div>
		</li>
		<?php }
		?>
	</ul>
</div>
<div class="bot_but">
		<?php if($documentDetails){ ?>
			<button href="<?php echo site_url()."documents/email/"?>" class="left_but nyroModal">
				<span>Email your Documents</span>
			</button>
		<?php } ?>
		<button onclick="window.location.href='http://safedoc.phpdevelopment.co.in/documents/viewcategory'" class="left_but">
		<span>View Category</span>
	</button>
	<button class="right_but" onclick="window.location.href='http://safedoc.phpdevelopment.co.in/documents/add'">
		<span>Add New Documents</span>
	</button>
</div>