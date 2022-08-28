<h3><?=$this->lang->line('edit_issue')?></h3>
<div class="ui divider"></div>

<div class="ui grid">
	<div class="ten wide column">
	<?=form_open('ignite/updateIssue/'.$issue->issueId, 'class="ui form" id="formStockOut" ')?>
    <div class="field">
    	<?=form_label($this->lang->line('warehouse'))?>
    	<div class="ui grid">
			<div class="eight wide column">
				<select name="warehouseFrom" class="ui search dropdown" id="warehouseIssue" required>
					<option value="">Select</option>
					<?php foreach($warehouses as $warehouse): ?>
						<option value="<?=$warehouse['warehouseId']?>" <?=$issue->warehouseId == $warehouse['warehouseId']?'selected':''?>><?=$warehouse['warehouseName']?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
    </div>
    
    <div class="field">
		<?=form_label($this->lang->line('item_name'))?>
		<div class="ui grid">
			<div class="eight wide column">
				<select name="item" class="ui search dropdown" id="itemIssue" required>
					<option value="">Select</option>
					<?php foreach($items as $item):?>
					<option value="<?=$item['codeNumber']?>" <?=$item['itemId'] == $issue->itemId?'selected':''?>><?=$item['itemName']?> ( <?=$item['categoryName']?> ) </option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>

    <div class="field">
        <label><?=$this->lang->line('item_code')?></label>
        <div class="ui grid">
            <div class="eight wide column">
                <?=form_input('itemCode', $itemDetail->codeNumber,'placeholder="'.$this->lang->line('item_code').'" id="itemCode" readonly')?>
            </div>
        </div>
    </div>

    <div class="field">
        <label><?=$this->lang->line('sale_date')?></label>
        <div class="ui grid">
        	<div class="eight wide column">
        		<?=form_input('iDate', $issue->issueDate,'placeholder="'.$this->lang->line('purchase_date').'" id="datepicker" required')?>
        	</div>
        </div>
    </div>
    <div class="field">
        <label><?=$this->lang->line('quantity')?></label>
        <div class="ui grid">
        	<div class="eight wide column">
        	<?=form_number('qty', $issue->qty,'placeholder="'.$this->lang->line('quantity').'" min="1" id="qtyIssue" required')?>
        	</div>
        	<div class="eight wide column">
        		<span id="qtyErr"></span>
        	</div>
    	</div>
    </div>
    <div class="field">
        <div class="ui grid">
            <div class="ten wide column">
                <label><?=$this->lang->line('remark')?> ( Optional )</label>
                <?=form_textarea('remark', $issue->remark,'placeholder="'.$this->lang->line('remark').'"')?>
            </div>
        </div>
    </div>
    <div class="field">
        <?=anchor('issue',$this->lang->line('cancel'),'class="ui button"')?>
        <?=form_submit('save',$this->lang->line('update'),'class="ui button blue"')?>
    </div>
	<?=form_close()?>
	</div>
</div>

