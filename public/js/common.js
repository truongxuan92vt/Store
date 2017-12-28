function openPopup(url){
    $('.modal-body').load(url,function(){
        $('#myModal').modal({show:true});
    });
}