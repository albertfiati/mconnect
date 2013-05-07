$(document).ready(function(){
	intiQuickSearch();
})

function intiQuickSearch(){
	myQuickSearch('input#memberSearch','table');
}

function myQuickSearch(searchField,table){
	$('input#memberSearch').quicksearch('table#memberTable tbody tr');
}
