<script type="text/javascript">
$(function() {
  $('.nyroModal').nyroModal();
});
</script>

<script type="text/javascript">
function emailDocument(id){
//	var dataString = 'id='+id; 
	var urlstring = "<?php echo site_url() ?>"+'documents/ajaxMailALLDocument/'; 
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
 	if(confirm('Do you want to Delete?'))
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
			?>
				<li>
					<div class="img">
						<?php if($document['documentImage']!='') { ?>
							<img width="75" alt="" src="<?php echo site_url()."public/upload/user".$this->session->userdata('userid')."/documents/thumb/".$document['documentImage'];?>">
						<?php } ?>
					</div>
					<div class="cont">
						<h1><a href="#"><?php echo $document['documentName'];  echo " (".$catDetails[$document['documentCategoryId']].")";?></a></h1>
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
			} 
		}
		else
		{ ?>
			<li>
			<div class="img"></div>
			<div class="cont">
				<h1>No Documents Uploaded Yet.</h1>
			</div>
		</li>
		<?php }
		?>
	</ul>
</div>
<div class="bot_but">
	<?php if($documentDetails){ ?>
	<button class="left_but" onclick="onchange=emailDocument();">
		<span>Email your Documents</span>
	</button>
	<?php } ?>
	<button onclick="window.location.href='<?php echo site_url("/documents/add/"); ?>'" class="right_but">
		<span>Add New Documents</span>
	</button>
</div>