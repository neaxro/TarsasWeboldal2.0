$(document).ready(function(){
    $("#kereso").on("input", function(event){
        let szoveg = $("#kereso")[0].value.toUpperCase();

        if(szoveg.length > 0){
            $(".card").hide();
            $(".card:contains("+szoveg+")").show();
        }
        else{
            $(".card").show();
        }
    })
});