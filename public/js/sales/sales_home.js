$(document).ready(function(){
   var base_url = $("#base_url").val();    
   
   // search client
   $("#search-btn").click(function(){
       var key = $("#search-input").val();
       json = $.parseJSON(getPostResponse(base_url+"sales/home/ajaxSearchClient", {key:key}));
       console.log(json.result);
   });
    
});

function getPostResponse(url, post)
{
    $.post(url, post, function(data){
       return data;
    });
}
