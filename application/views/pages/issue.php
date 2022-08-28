<div class="ui clearing segment red">
	<h3 class="ui left floated blue header"><?=$this->lang->line('issue')?></h3>
	<a href="create-issue" class="ui right floated button red">
	    <i class="icon plus circle"></i> <?=$this->lang->line('new')?>
	</a>	
</div>

<div class="data">
	<table class="ui table" id="dataTable">
		<thead>
			<tr>
				<th class="ui right aligned">#</th>
				<th><?=$this->lang->line('issue_date')?></th>
				<th><?=$this->lang->line('item_code')?></th>
				<th><?=$this->lang->line('item_name')?></th>
				<th><?=$this->lang->line('warehouse').' ( '.$this->lang->line('from').' )'?></th>
				<th class="ui right aligned"><?=$this->lang->line('quantity')?></th>
				<th><?=$this->lang->line('issue_by')?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				foreach($issue as $row):
			?>	
				<tr>
					<td class="ui right aligned"><?=$i?></td>
					<td><?=date('d-m-Y',strtotime($row->issueDate))?></td>
					<td><?=$row->codeNumber?></td>
					<td><?=$row->itemName?></td>
					<td><?=$row->warehouseName?></td>
					<td class="ui right aligned"><?=$row->qty?></td>
					<td><?=$this->ignite_model->get_username($row->issueBy)?></td>
					<td>
						<a href="edit-issue/<?=$row->issueId?>" class="ui button circular orange tiny icon"><i class="ui icon cog"></i></a>
						<a href="javascript:void(0)" class="ui button circular red tiny icon" id="delete" data-url="delete-issue/<?=$row->issueId?>"><i class="ui icon remove"></i></a>
					</td>
				</tr>
			<?php 
				$i++;
				endforeach; 
			?>
		</tbody>
	</table>
</div>