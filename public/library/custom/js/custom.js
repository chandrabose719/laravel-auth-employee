$(document).ready(function(){
    
    

});

var baseUrl = 'http://localhost:8000/';


function filterCustomer(){
	var keyword = $('#filter_keyword').val();
	if(keyword != '' && keyword != undefined && keyword != null){
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
			},
			url: baseUrl+'filter-customer',
			type: 'POST',
			data: { keyword: keyword },
			success: function(data){
	            $('.dashboard-content').html(data);
	        }
		});
	}	
}
