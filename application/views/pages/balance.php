<div class="ui clearing segment blue">
	<h3 class="ui left floated blue header"><?=$this->lang->line('stocks')?></h3>
	
	<a href="export-excel" class="ui right floated button olive">
	    <i class="icon file excel outline"></i> Export Excel
	</a>
	<a href="export-pdf/stocks-balance" target="_blank" class="ui right floated button red">
	    <i class="icon file pdf outline"></i> Export PDF
	</a>
</div>

<div class="ui top attached tabular menu grey">
  	<div class="item active" data-tab="all">All</div>
  	<div class="item" data-tab="non-zero">Non Zero Balance</div>
  	<div class="item" data-tab="zero">Zero Balance</div>
</div>

<div class="ui bottom attached active tab segment" data-tab="all">
	<table class="ui celled table" id="dataTable">
		<thead>
			<tr>
				<th class="ui right aligned">#</th>
				<th><?=$this->lang->line('item_code')?></th>
				<th><?=$this->lang->line('item_name')?></th>
				
				<!-- Loop for warehouse -->
				<?php foreach($warehouse as $row): ?>
					<th class="ui right aligned"><?=$row->warehouseName?></th>
				<?php endforeach; ?>
				<!-- End of warehouse loop -->
				<th class="ui right aligned">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php 
				foreach($items as $item): 
			?>
				<tr>
					<td class="ui right aligned"><?=$i?></td>
					<td><?=$item->codeNumber?></td>
					<td><?=$item->itemName?></td>

					<!-- Loop for warehouse -->
					<?php $totalQty = 0; ?>
					<?php foreach($warehouse as $row): ?>
						<?php 
							$balance = $this->ignite_model->get_limit_datas('stocks_balance_tbl', ['itemId' => $item->itemId, 'warehouseId' => $row->warehouseId])->row();
							if(isset($balance->qty)){
								$totalQty += $balance->qty;
							}
						?>
						<td class="ui right aligned"><?=isset($balance->qty)?$balance->qty:0?></td>
					<?php endforeach; ?>
					<!-- End of warehouse loop -->
					<td class="ui right aligned <?=$totalQty<5?'negative':'positive'?>"><strong><?=$totalQty?></strong></td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
			
		</tbody>
	</table>
</div>

<div class="ui bottom attached tab segment" data-tab="non-zero">
	<table class="ui celled table" id="dataTable2">
		<thead>
			<tr>
				<th class="ui right aligned">#</th>
				<th><?=$this->lang->line('item_code')?></th>
				<th><?=$this->lang->line('item_name')?></th>
				<!-- Loop for warehouse -->
				<?php foreach($warehouse as $row): ?>
					<th class="ui right aligned"><?=$row->warehouseName?></th>
				<?php endforeach; ?>
				<!-- End of warehouse loop -->
				<th class="ui right aligned">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php 
				foreach($items as $item): 
					$checkQty = 0;
					foreach($warehouse as $row){						
						$balance = $this->ignite_model->get_limit_datas('stocks_balance_tbl', ['itemId' => $item->itemId, 'warehouseId' => $row->warehouseId])->row();
						if(isset($balance->qty)){
							$checkQty += $balance->qty;
						}						
					}
					if($checkQty > 0):
			?>
				<tr>
					<td class="ui right aligned"><?=$i?></td>
					<td><?=$item->codeNumber?></td>
					<td><?=$item->itemName?></td>

					<!-- Loop for warehouse -->
					<?php $totalQty = 0; ?>
					<?php foreach($warehouse as $row): ?>
						<?php 
							$balance = $this->ignite_model->get_limit_datas('stocks_balance_tbl', ['itemId' => $item->itemId, 'warehouseId' => $row->warehouseId])->row();
							if(isset($balance->qty)){
								$totalQty += $balance->qty;
							}
						?>
						<td class="ui right aligned"><?=isset($balance->qty)?$balance->qty:0?></td>
					<?php endforeach; ?>
					<!-- End of warehouse loop -->
					<td class="ui right aligned <?=$totalQty<5?'negative':'positive'?>"><strong><?=$totalQty?></strong></td>
				</tr>
				<?php endif; ?>
				<?php $i++; ?>
			<?php endforeach; ?>
			
		</tbody>
	</table>
</div>

<div class="ui bottom attached tab segment" data-tab="zero">
	<table class="ui celled table" id="dataTable3">
		<thead>
			<tr>
				<th class="ui right aligned">#</th>
				<th><?=$this->lang->line('item_code')?></th>
				<th><?=$this->lang->line('item_name')?></th>
				
				<!-- Loop for warehouse -->
				<?php foreach($warehouse as $row): ?>
					<th class="ui right aligned"><?=$row->warehouseName?></th>
				<?php endforeach; ?>
				<!-- End of warehouse loop -->
				<th class="ui right aligned">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php 
				foreach($items as $item): 
					$retailPrice = $this->ignite_model->get_sellPrice($item->itemId, 'R')->row();
					$wholeSalePrice = $this->ignite_model->get_sellPrice($item->itemId, 'W')->row();
					$checkQty = 0;
					foreach($warehouse as $row){						
						$balance = $this->ignite_model->get_limit_datas('stocks_balance_tbl', ['itemId' => $item->itemId, 'warehouseId' => $row->warehouseId])->row();
						if(isset($balance->qty)){
							$checkQty += $balance->qty;
						}						
					}
					if($checkQty == 0):
			?>
				<tr>
					<td class="ui right aligned"><?=$i?></td>
					<td><?=$item->codeNumber?></td>
					<td><?=$item->itemName?></td>
					

					<!-- Loop for warehouse -->
					<?php $totalQty = 0; ?>
					<?php foreach($warehouse as $row): ?>
						<?php 
							$balance = $this->ignite_model->get_limit_datas('stocks_balance_tbl', ['itemId' => $item->itemId, 'warehouseId' => $row->warehouseId])->row();
							if(isset($balance->qty)){
								$totalQty += $balance->qty;
							}
						?>
						<td class="ui right aligned"><?=isset($balance->qty)?$balance->qty:0?></td>
					<?php endforeach; ?>
					<!-- End of warehouse loop -->
					<td class="ui right aligned <?=$totalQty<5?'negative':'positive'?>"><strong><?=$totalQty?></strong></td>
				</tr>
				<?php endif; ?>
				<?php $i++; ?>
			<?php endforeach; ?>
			
		</tbody>
	</table>
</div>


<!-- Image Modal -->
<div class="ui tiny modal imgPreview">
	<div class="header">
	    Preview Image
	</div>
	<div class="content centered" id="imgContent">
	    
	</div>
</div>