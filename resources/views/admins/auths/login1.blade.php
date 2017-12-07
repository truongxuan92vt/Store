<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Pure CSS Blurred Video Background Login Box. (fork)</title>



    <link rel="stylesheet" href="css/style.css">


</head>

<body>
<div class="vid-container">
    <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
        <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
    </video>
    <div class="inner-container">
        <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
            <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
        </video>
        <div class="box">
            <h1>Login</h1>
            <input type="text" placeholder="Username"/>
            <input type="text" placeholder="Password"/>
            <button>Login</button>
            <p>Not a member? <span>Sign Up</span></p>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src="js/index.js"></script>

</body>
<script>
    // Easy way to wait for all videos to load before start playing

    var promises = [];
    function makePromise(i, video) {
        promises[i] = new $.Deferred();
        // This event tells us video can be played all the way through, without stopping or buffering
        video.oncanplaythrough = function() {
            // Resolve the promise
            promises[i].resolve();
        }
    }
    // Pause all videos and create the promise array
    $('video').each(function(index){
        this.pause();
        makePromise(index, this);
    })

    // Wait for all promises to resolve then start playing
    $.when.apply(null, promises).done(function () {
        $('video').each(function(){
            this.play();
        });
    });
</script>
<style>
    body{
        padding:0;
        margin:0;
    }
    .vid-container{
        position:relative;
        height:100vh;
        overflow:hidden;
    }
    .bgvid.back {
        position: fixed; right: 0; bottom: 0;
        min-width: 100%; min-height: 100%;
        width: auto; height: auto; z-index: -100;
    }
    .inner {
        position: absolute;
    }
    .inner-container{
        width:400px;
        height:400px;
        position:absolute;
        top:calc(50vh - 200px);
        left:calc(50vw - 200px);
        overflow:hidden;
    }
    .bgvid.inner{
        top:calc(-50vh + 200px);
        left:calc(-50vw + 200px);
        filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
        -webkit-filter:blur(10px);
        -ms-filter: blur(10px);
        -o-filter: blur(10px);
        filter:blur(10px);
    }
    .box{
        position:absolute;
        height:100%;
        width:100%;
        font-family:Helvetica;
        color:#fff;
        background:rgba(0,0,0,0.13);
        padding:30px 0px;
    }
    .box h1{
        text-align:center;
        margin:30px 0;
        font-size:30px;
    }
    .box input{
        display:block;
        width:300px;
        margin:20px auto;
        padding:15px;
        background:rgba(0,0,0,0.2);
        color:#fff;
        border:0;
    }
    .box input:focus,.box input:active,.box button:focus,.box button:active{
        outline:none;
    }
    .box button{
        background:#742ECC;
        border:0;
        color:#fff;
        padding:10px;
        font-size:20px;
        width:330px;
        margin:20px auto;
        display:block;
        cursor:pointer;
    }
    .box button:active{
        background:#27ae60;
    }
    .box p{
        font-size:14px;
        text-align:center;
    }
    .box p span{
        cursor:pointer;
        color:#666;
    }
</style>
</html>
