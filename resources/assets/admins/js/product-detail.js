TABLE_PRO = {
    imgDel:[],
    priceDel:[],
    skuDel:[],
    attrDel:[],
    addCol: function(tID){
        var bElement = "#"+tID;
        var dataNoAdd = $(bElement+" .r_clone").attr("data-no-add");
        $(bElement + " .r_clone").attr("data-no-add",dataNoAdd*1+1);
        var htmlClone = "<tr id='"+tID+"_row_"+dataNoAdd+"' class='"+tID+"_row'>" +
            $(bElement + " .r_clone").html().replace(new RegExp('--row--','g'),dataNoAdd*1) +
            "</tr>";
        $(htmlClone).show().appendTo(bElement);
    },
    delCol: function(e){
        var tr =$(e).closest("tr");
        var id = tr.find('input[type="hidden"]').val();
        var tblName = $(e).closest("table").attr('id');
        if(id){
            if(tblName=="t_pro_image")
                this.imgDel.push(id);
            if(tblName=="t_pro_price")
                this.priceDel.push(id);
            if(tblName=="t_pro_sku")
                this.skuDel.push(id);
            if(tblName=="t_pro_attr")
                this.attrDel.push(id);
        }
        tr.remove();
    },
    readURL: function(e) {
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            var id = "#"+$(e).closest('tr').attr('id')+' #img_pro';
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
};