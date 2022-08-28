<div class="ui clearing segment teal">
	<h3 class="ui teal left floated header"><?=$this->lang->line('itemPrice')?></h3>
	<a href="new-item/~" class="ui right floated button teal <?=$this->auth->checkModify($this->session->userdata('Id'), 'items-price/0')?'':'disabled'?>">
	    <i class="icon plus circle"></i> <?=$this->lang->line('new')?>
	</a>
</div>


<table class="ui teal table" id="">
	<thead>
		<tr>
			<th>#</th>
			<th><?=$this->lang->line('item_name')?></th>
			<th><?=$this->lang->line('item_count_type')?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$cat = "";
			foreach($items as $item):
		?>
			
			<tr>
				<td><?=$item['codeNumber']?></td>
				<td><?=$item['itemName']?></td>
				<td><?=$item['countType']?></td>
				<td>
					<?php 
						$checkPrice = $this->ignite_model->checkPrice($item['itemId']);
					 ?>
					<a href="define-price/<?=$item['itemId']?>/~" class="ui button icon tiny circular <?=$checkPrice ? 'green' : 'yellow'?> <?=$this->auth->checkModify($this->session->userdata('Id'), 'items-price/0')?'':'disabled'?>" data-content="Update Price"><i class="ui icon money bill alternate outline"></i></a>
					<a href="edit-item/<?=$item['itemId']?>" class="ui icon button tiny orange circular <?=$this->auth->checkModify($this->session->userdata('Id'), 'items-price/0')?'':'disabled'?>"><i class="ui icon cog"></i></a>
					<a href="javascript:void(0)" class="ui icon button tiny red circular <?=$this->auth->checkModify($this->session->userdata('Id'), 'items-price/0')?'':'disabled'?>" id="delete" data-url="ignite/deleteItem/<?=$item['itemId']?>"><i class="ui icon remove"></i></a>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>

<div class="ui pagination center aligned">
	<?=$this->pagination->create_links();?>
</div>


<!-- Image Modal -->
<div class="ui tiny modal imgPreview">
	<div class="header">
	    Preview Image
	</div>
	<div class="content centered" id="imgContent">
	    
	</div>
</div>

