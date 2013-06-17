$(document).ready(function(){
    base_url = $("#base_url").val();
    
    $("#searchAgreementInput").keypress(function(event){
        if (event.keyCode == 13) {
            $("#searchAgreementBtn").click();
        }
    })
    
    $("#searchAgreementBtn").live("click", function(){
        var key = $("#searchAgreementInput").val();
        $.post(base_url+"sales/home/ajaxSearchAgreement", {key:key, client_no:$("#hid_client_no").val()}, function(data){
            json = $.parseJSON(data);
            str = '<thead>'
            str = str + '<tr>'
            str = str + '<th>Trans No.</th>'
            str = str + '<th>Agreement Name</th>'
            str = str + '<th>Client</th>'
            str = str + '<th>Date of Quotation</th>'
            str = str + '<th>Action</th>'
            str = str + '</tr>'
            str = str + '</thead>'
            if (json.is_found) {
                $.each(json.result, function(i, item){
                    str = str + '<tr>';
                    str = str + '<td>'+item.trans_no+'</td>'
                    str = str + '<td>'+item.transaction_name+'</td>'
                    str = str + '<td>'+item.company_name+'</td>'
                    str = str + '<td>'+item.date_of_quotation+'</td>'
                    str = str + '<td>'
                    str = str + '<div class="btn-group">'+
                    '<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">'+
                    'Action <span class="caret"></span>'+
                    '</a>'+
                    '<ul class="dropdown-menu pull-right">'+
                    '<li><a href="#" class="edit-award-btn" edit-id="'+item.trans_no+'"><i class="icon-edit"></i> Edit</a></li>'+
                    '<li>'+
                    '<a target="_blank" href="'+base_url+'reports/rate_confirmation/print_client/'+item.trans_no+'">'+
                    '<i class="icon-print"></i> Rate Confirmation'+
                    '</a>'+
                    '</li>'+
                    '<li>'+
                    '<a target="_blank" href="'+base_url+'reports/allowance/print_client/'+item.trans_no+'">'+
                    '<i class="icon-print"></i> Allowance'+
                    '</a>'+
                    '</li>'+
                    '<li>'+
                    '<a target="_blank" href="'+base_url+'reports/paycharge_rate/print_client/'+item.trans_no+'">'+
                    '<i class="icon-print"></i> Pay and Charge Rate Schedule'+
                    '</a>'+
                    '</li>'+
                    '<li>'+
                    '<a href="#" class="delete-award-btn" del-id="'+item.trans_no+'"><i class="icon-trash"></i> Delete</a>'+
                    '</li>'+
                    '</ul>'+
                    '</div>';
                    str = str + '</td>'
                    str = str + '</tr>';
                })
            } else {
                str = str + '<tr><td colspan="5">No results found.</td></tr>'
            }
            
            $("#tblAgreement").html(str);            
        })
    })
})
