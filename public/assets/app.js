var _process=  '<div class="progress">'
    + '<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">'
    + '<span class="sr-only">Vui lòng chờ trong giây lát</span>'
    + '</div>'
    + '</div>';
function openPopup(){
    $('.modal-body').load('user/detail',function(){
        $('#myModal').modal({show:true});
    });
}
var Maximinepopup = function ()
{
    if ($('#windowpopup_size_hidden_maximine').val() == 'min') {
        $('#windowpopup_size').css(
            {
                width: function () {
                    return "100%";
                },
                height: function () {
                    return "100%";
                }
            });
        $('#windowpopup_size_hidden_maximine').val('max');
        $('.popup_maximine').removeClass('glyphicon-resize-full');
        $('.popup_maximine').addClass('glyphicon-resize-small');
    }
    else {
        $('#windowpopup_size').css(
            {
                width: function () {
                    return "80%";
                },
                height: function () {
                    return "80%";
                }
            });
        $('#windowpopup_size_hidden_maximine').val('min');
        $('.popup_maximine').removeClass('glyphicon-resize-small');
        $('.popup_maximine').addClass('glyphicon-resize-full');
    }
}
//Hàm mở popup
var loadpopup = function (url, title, width, isblank)
{
    var _para = '';
    if (checkparameterURL(url)==true)
    {
        _para = '&_isbl=' + isblank;
    }
    else
    {
        _para = '?_isbl=' + isblank;
    }
    url = url + _para;
    if (isblank == false) {


        $('#windowpopup_content').html(_process);
        $('#windowpopup_title').html(title);
        $('#windowpopup_content').load(url);
        //$('modal-body-iframe').attr("src", url);
        // $('#windowpopup').modal();
        $('#windowpopup').modal({
            backdrop: 'static',
            keyboard: false
        })
        if (width != "none") {
            $('#windowpopup_size').css(
                {
                    width: function () {
                        if (width == "") {
                            return "80%";
                        }
                        else {
                            return width;
                        }
                    }
                });
        }
    }
    else {
        var w = 630, h = 440; // default sizes
        if (window.screen) {
            w = window.screen.availWidth * 85 / 100;
            h = window.screen.availHeight * 85 / 100;
        }
        //  javascript: OpenWindow(url, title, "channelmode=1,scrollbars=1,status=0,titlebar=0,toolbar=0,resizable=1,menubar=no,resizable=1,top=20,left=20,fullscreen=yes,location=yes,Width=" + w + ",height=" + h + "");

        //  var randomnumber = Math.floor((Math.random() * 100) + 1);
        //  window.open(url, "_blank", title,  "channelmode = 1, scrollbars = 1, status = 0, titlebar = 0, toolbar = 0, resizable = 1, menubar = no, resizable = 1, top = 20, left = 20, fullscreen = yes, location = yes, Width = " + w + ", height = " + h + "");
        //  window.open(url, title, "channelmode=1,scrollbars=1,status=0,titlebar=0,toolbar=0,resizable=1,menubar=no,resizable=1,top=20,left=20,fullscreen=yes,location=yes,Width=" + w + ",height=" + h + "");
        //javascript: OpenWindow(url, title, "channelmode=1,scrollbars=1,status=0,titlebar=0,toolbar=0,resizable=1,menubar=no,resizable=1,top=20,left=20,fullscreen=yes,location=yes,Width=" + w + ",height=" + h + "");
        var d = new Date();
        var n = d.getTime();
        title = title + n;
        var _window = window.open(url, title, "channelmode=1,scrollbars=1,status=0,titlebar=0,toolbar=0,resizable=1,menubar=no,resizable=1,top=20,left=20,fullscreen=yes,location=yes,Width=" + w + ",height=" + h + "");
        _window.focus();
    }
}
var checkparameterURL = function (url)
{
    if (url.indexOf("?") > 0)
    {
        return true;
    }
    return false;
}
var ClosePopup = function () {
    // alert('t');
    //this.submit();
    $(".modal:visible").modal('toggle');
    // $('#windowpopup').removeData();
    // // $('#windowpopup').remove();
    // $('#windowpopup').data('modal', null);
}
var onclickMenu = function(url){
    $.ajax({
        type: "get",
        url: url,
        success: function(content){
            $(".wrapper").html(content);
        }
    });
}

function ChangeToSlug()
{
    var title, slug;

    //Lấy text từ thẻ input title
    title = document.getElementById("title").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}

function to_slug(str)
{
    // Chuyển hết sang chữ thường
    str = str.toLowerCase();

    // xóa dấu
    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    // Xóa ký tự đặc biệt
    str = str.replace(/([^0-9a-z-\s])/g, '');

    // Xóa khoảng trắng thay bằng ký tự -
    str = str.replace(/(\s+)/g, '-');

    // xóa phần dự - ở đầu
    str = str.replace(/^-+/g, '');

    // xóa phần dư - ở cuối
    str = str.replace(/-+$/g, '');

    // return
    return str;
}