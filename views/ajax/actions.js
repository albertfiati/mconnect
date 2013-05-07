function deleteRecord(table,id) {
	var deleteJSON = {
		table : table,
		id : id
	};
	
	$.post('controllers/delete.php', deleteJSON, function(data, status) {
			
	});	
}
