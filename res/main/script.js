$(document).ready(function(){
    $("#kereso").on("input", function(event){
        let szoveg = $("#kereso")[0].value.toUpperCase();

        if(szoveg.length > 0){
            $(".card").hide();
            $(".card").each(function (index){
                let adottSzoveg = $(this).find(".card-body > h5").text().toUpperCase();
                
                if(adottSzoveg.includes(szoveg)){
                    $(this).show();
                }
            });
        }
        else{
            $(".card").show();
        }
    })
});