$(document).ready(function(){
    base_url = $("#base_url").val();
    
    $("#searchAwardtInput").keypress(function(event){
        if (event.keyCode == 13) {
            $("#searchAwardBtn").click();
        }
    })
    
    $("#searchAwardBtn").live("click", function(){
        var key = $("#searchAwardtInput").val();
        $.post(base_url+"sales/home/ajaxSearchAward", {key:key, client_no:$("#hid_client_no").val()}, function(data){
            json = $.parseJSON(data);
            str = '<thead>'
            str = str + '<tr>'
            str = str + '<th>Trans No.</th>'
            str = str + '<th>Award Name</th>'
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
                    str = str + '<button type="button" class="btn btn-mini edit-award-btn" edit-id="'+item.trans_no+'"><i class="icon-edit"></i></button>'
                    str = str + ' <button type="button" del-id="'+item.trans_no+'" class="btn btn-mini btn-danger delete-award-btn"><i class="icon-trash icon-white"></i></button>'
                    str = str + '</td>'
                    str = str + '</tr>';
                })
            } else {
                str = str + '<tr><td colspan="5">No results found.</td></tr>'
            }
            
            $("#tblAwards").html(str);            
        })
    })
})
