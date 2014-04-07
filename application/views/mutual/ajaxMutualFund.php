<li>
	<label for="portfolioMutualFundId">Fund -</label>
	<?php
		$dataFund = "id=portfolioMutualFundId class='required' ";
		echo form_dropdown('portfolioMutualFundId', $fundDetails,'',$dataFund);
	?>
</li>