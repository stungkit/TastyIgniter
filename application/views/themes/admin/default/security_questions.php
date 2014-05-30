<div id="box-content">
	<div id="notification">
		<?php if (validation_errors()) { ?>
			<?php echo validation_errors('<span class="error">', '</span>'); ?>
		<?php } ?>
		<?php if (!empty($alert)) { ?>
			<?php echo $alert; ?>
		<?php } ?>
	</div>

	<div class="box">
	<div id="update-box" class="content">
	<form accept-charset="utf-8" method="post" action="<?php echo current_url(); ?>">
		<table class="list sorted_table">
			<thead>
				<tr>
					<th width="2"></th>
					<th class="action action-one"></th>
					<th>Question</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $table_row = 0; ?>
				<?php foreach ($questions as $question) { ?>
				<tr id="table-row<?php echo $table_row; ?>">
					<td><i class="handle"></i></td>
					<td class="action action-one"></td>
					<td><input type="hidden" name="questions[<?php echo $table_row; ?>][question_id]" value="<?php echo set_value('questions[$table_row][question_id]', $question['question_id']); ?>"/>
					<input type="text" name="questions[<?php echo $table_row; ?>][text]" value="<?php echo set_value('questions[$table_row][text]', $question['text']); ?>" class="textfield" size="40" /></td>
					<td></td>
				</tr>
				<?php $table_row++; ?>
				<?php } ?>  
			</tbody>
			<tfoot>
				<tr id="tfoot">
					<td></td>
					<td class="action action-one"><i class="icon icon-add" onclick="addQuestion();"></i></td>
					<td colspan="2"></td>
				</tr>		 
			</tfoot>
		</table>
	</form>
	</div>
	</div>
</div>
<script type="text/javascript"><!--
var table_row = <?php echo $table_row; ?>;

function addQuestion() {	
	html  = '<tr id="table-row' + table_row + '">';
    html += '	<td><i class="handle"></i></td>';
	html += '	<td class="action action-one"><a onclick="$(this).parent().parent().remove();"><i class="icon icon-delete"></i></a></td>';
	html += '	<td><input type="hidden" name="questions[' + table_row + '][question_id]" value="<?php echo set_value("questions[' + table_row + '][question_id]", "0"); ?>"/>';
	html += '	<input type="text" name="questions[' + table_row + '][text]" value="<?php echo set_value('questions[$table_row][text]'); ?>" class="textfield" size="40" /></td>';
	html += '	<td></td>';
	html += '</tr>';
	
	$('.sorted_table tbody').append(html);
	
	table_row++;
}
//--></script>
<script src="<?php echo base_url("assets/js/jquery-sortable.js"); ?>"></script>
<script type="text/javascript"><!--
$(function  () {
	$('.sorted_table').sortable({
		containerSelector: 'table',
		itemPath: '> tbody',
		itemSelector: 'tr',
		placeholder: '<tr class="placeholder"><td colspan="3"></td></tr>',
		handle: '.handle'
	})
})
//--></script> 