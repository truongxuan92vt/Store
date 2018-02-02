<?php
    use \App\Http\Controllers\Admin\FunctionController;
    $function = new FunctionController();
    $menu = $function->getMenu();
    $url = Route::current()->uri;
    $active = $function->getActiveMenu($url);
?>
<script>
    var data = {{$active}}
    $(document).ready(function(){
        $('.sidebar-menu li').removeClass('active');
        for(i=0; i<data.length;i++){
            $('#m_'+data[i]).addClass("active");
        }
    });
</script>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="margin-top: 5%;margin-left: 3%;">
                <img src="{{!empty(Auth::user()->image)?'../upload/avatar/'.Auth::user()->image:'../image/avatar.jpeg'}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->username }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >
            <li class="header">MAIN NAVIGATION</li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree" style="height: calc(100vh - 135px); overflow-y: scroll;-webkit-overflow-scrolling: touch;">

            @foreach($menu as $item)
                @if(count($item['subs'])>0)
                    <li class="treeview" id="m_{{$item['id']}}">
                        <a href="#">
                            <i class="{{$item['icon']}}"></i> <span>{{$item['function_name']}}</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($item['subs'] as $subL1)
                                @if(count($subL1['subs'])>0)
                                <li class="treeview" id="m_{{$subL1['id']}}">
                                    <a href="#">
                                        <i class="{{$subL1['icon']}}"></i> <span>{{$subL1['function_name']}}</span>
                                        <span class="pull-right-container">
                                          <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @foreach($subL1['subs'] as $subL2)
                                            @if(count($subL2['subs'])>0)
                                                <li class="treeview" id="m_{{$subL2['id']}}">
                                                    <a href="#">
                                                        <i class="{{$subL2['icon']}}"></i> <span>{{$subL2['function_name']}}</span>
                                                        <span class="pull-right-container">
                                                          <i class="fa fa-angle-left pull-right"></i>
                                                        </span>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        @foreach($subL2['subs'] as $subL3)
                                                            <li id="m_{{$subL3['id']}}">
                                                                <a href="{{$subL3['url']}}">
                                                                    <i class="{{$subL3['icon']}}"></i> <span>{{$subL3['function_name']}}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li id="m_{{$subL2['id']}}">
                                                    <a href="{{$subL2['url']}}">
                                                        <i class="{{$subL2['icon']}}"></i> <span>{{$subL2['function_name']}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                    <li id="m_{{$subL1['id']}}">
                                        <a href="{{$subL1['url']}}">
                                            <i class="{{$subL1['icon']}}"></i> <span>{{$subL1['function_name']}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li id="m_{{$item['id']}}">
                        <a href="{{$item['url']}}">
                            <i class="{{$item['icon']}}"></i> <span>{{$item['function_name']}}</span>
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>