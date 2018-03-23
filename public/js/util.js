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