@extends('admins.layouts.master')
{{--@section('title', 'Product')
@section('controller', 'Product')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection--}}
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Product')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection
@section('header-button')
    <input id='btn_save' type="button" class="btn btn-success btn-sm" value="Save">
    <input id='btn_cancel' type="button" class="btn btn-default btn-sm" value="Cancel">
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{plugin_path('/easyui/themes/bootstrap/easyui.css')}}">
    <script type="text/javascript" src="{{plugin_path('/easyui/jquery.easyui.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/ckeditor.js"></script>--}}
    {{--<script type="text/javascript" src="{{URL::to('/')}}/node_modules/ckeditor-full/adapters/jquery.js"></script>--}}

    <script type="text/javascript" src="{{URL::to('/')}}/node_modules/tinymce/tinymce.js"></script>

    <link href="{{module_path()}}/select2/dist/css/select2.css" rel="stylesheet"/>
    <script src="{{module_path()}}/select2/dist/js/select2.js"></script>
    <form class="product-container" id="frm_product" name="frm_product" autocomplete="off">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#pro-general">General</a></li>
            <li><a data-toggle="tab" href="#pro-sku">Sku</a></li>
            <li><a data-toggle="tab" href="#pro-image">Images</a></li>
            <li><a data-toggle="tab" href="#pro-price">Price</a></li>
            <li><a data-toggle="tab" href="#pro-attr">Attribute</a></li>
            <li><a data-toggle="tab" href="#pro-inv">Inventory</a></li>
        </ul>
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <?php $image = isset($data->image)?$data->image:''?>
        <div class="tab-content">
            <div id="pro-general" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-3">
                        <div id="frm_uploadFile" style="width: 100%;">
                            <img id="imageView" src="{{empty($image)?URL::to('/').'/image/no_image.jpg':$image}}">
                            <label id="lbl_image" title="{{!empty($image)?$image:'No file select'}}">Choose file...</label>
                            <input type="file" id="image" name="image" onchange="readURL(this)" style="display: none" value="{{$image}}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <label class="col-md-2">Product name</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_name_detail" name="name" value="{{isset($data->name)?$data->name:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Product Code</label>
                            <div class="col-md-10">
                                <input  class="pro-input" type="text" id="txt_code_detail" name="code" value="{{isset($data->code)?$data->code:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Category</label>
                            <div class="col-md-10">
                                <div class="row" style="padding: 0px !important;">
                                    <div class="col-md-5">
                                        <input id="cbo_category_detail" class="pro-input" name="category_id" value="{{isset($data->category_id)?$data->category_id:''}}" style="width: 100%">
                                    </div>
                                    <label class="col-md-2" style="text-align: center">Status</label>
                                    <div class="col-md-5" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <select class="pro-input" id="cbo_status_detail" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            {{--<option value="0" selected="">Select a Status</option>--}}
                                            @foreach($statusList as $item)
                                                <option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Manuafactuer</label>
                            <div class="col-md-10">
                                <div class="row" style="padding: 0px !important;">
                                    <div class="col-md-5">
                                        <select class="pro-input" id="cbo_manufactuer_detail" name="manufacturer_id" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            <option value="0" selected="">Select a manufacturer</option>
                                            {{--@foreach($statusList as $item)--}}
                                                {{--<option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                    <label class="col-md-2" style="text-align: center">Priority</label>
                                    <div class="col-md-5" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <input id="txt_priority_detail" class="pro-input" name="priority" value="{{isset($data->priority)?$data->priority:''}}" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Meta title</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_title_detail" name="title" value="{{isset($data->title)?$data->title:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Tags</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_tag_detail" name="tag" value="{{isset($data->tag)?$data->tag:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">URL SEO</label>
                            <div class="col-md-10">
                                <input class="pro-input" type="text" id="txt_url_seo_detail" name="url_seo" value="{{isset($data->url_seo)?$data->url_seo:''}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Short description</label>
                    <div class="col-md-10">
                        <textarea class="pro-input" id="txt_short_desc_detail" name="short_desc">{{isset($data->desc->short_desc)?$data->desc->short_desc:''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Full description</label>
                    <div class="col-md-10">
                        <textarea class="pro-input" id="txt_long_desc_detail" name="long_desc">{{isset($data->desc->long_desc)?$data->desc->long_desc:''}}</textarea>
                    </div>
                </div>
            </div>
            <div id="pro-image" class="tab-pane fade">
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_image" width="100%">
                        <colgroup>
                            <col style="width: 25%">
                            <col style="width: 10%">
                            <col style="width: 20%">
                            <col style="width: 20%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>File</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Priority</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="r_clone" class="r_clone" data-no-add="0" style="display: none">
                                <input type="hidden" name="t_pro_image[--row--][id]" value="" />
                                <td class="t_pro_image_picture" style="text-align: center">
                                    <img id="img_pro" src="{{URL::to("/image/no_image.png")}}" alt="your image" style="max-width: 200px"/>
                                </td>
                                <td class="t_pro_image_file">
                                    <input type='file' name="t_pro_image[--row--][file]" onchange="TABLE_PRO.readURL(this)" />
                                </td>
                                <td class="t_pro_image_color">
                                    <select class="t-cbo-color" name="t_pro_image[--row--][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                        <option value="" selected="">No color</option>
                                        @if(isset($data->colors))
                                            @foreach($data->colors as $item)
                                                <option value="{{$item->color->id??""}}">{{$item->color->name??""}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td class="t_pro_image_size">
                                    <select class="t-cbo-size" name="t_pro_image[--row--][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                        <option value="" selected="">No size</option>
                                        @if(isset($data->sizes))
                                            @foreach($data->sizes as $item)
                                                <option value="{{$item->size->id??""}}">{{$item->fullName()??""}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td class="t_pro_image_priority">
                                    <input type="text" name="t_pro_image[--row--][priority]" value="0"/>
                                </td>
                                <td class="t_pro_image_none">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                </td>
                            </tr>
                            @if(isset($data->images) && count($data->images)>0)
                                @foreach($data->images as $k=>$v)
                                    <tr id="t_pro_image_row_{{$k}}" class="t_pro_image_row">
                                        <input type="hidden" name="t_pro_image[{{$k}}][id]" value="{{$v->id}}" />
                                        <td class="t_pro_image_picture" style="text-align: center">
                                            <img id="img_pro" src="{{$v->url}}" alt="your image" style="max-width: 200px"/>
                                        </td>
                                        <td class="t_pro_image_file">
                                            <input type='file' name="t_pro_image[{{$k}}][file]" onchange="TABLE_PRO.readURL(this)" />
                                        </td>
                                        <td class="t_pro_image_color">
                                            <select class="t-cbo-color" name="t_pro_image[{{$k}}][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                                <option value="" selected="">No color</option>
                                                {{--@foreach($data->colors as $item)--}}
                                                    {{--@if(!empty($item->color))--}}
                                                        {{--<option value="{{$item->color->id??''}}" @if(isset($item->color->id) && $item->color->id == $v->color_id) selected @endif>{{$item->color->name??''}}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                        <td class="t_pro_image_size">
                                            <select class="t-cbo-size" name="t_pro_image[{{$k}}][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                                <option value="" selected="">No size</option>
                                                {{--@foreach($data->sizes as $item)--}}
                                                    {{--@if(!empty($item->size))--}}
                                                        {{--<option value="{{$item->size->id??''}}" @if(isset($item->size->id) && $item->size->id == $v->size_id) selected @endif>{{$item->fullName()??''}}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                        <td class="t_pro_image_priority">
                                            <input type="text" name="t_pro_image[{{$k}}][priority]" value="{{$v->priority}}"/>
                                        </td>
                                        <td class="t_pro_image_none">
                                            <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: center">
                                    <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_PRO.addRow("t_pro_image")'>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="pro-sku" class="tab-pane fade">
                <div class="row">
                    <label class="col-md-1">Color</label>
                    <div class="col-md-11">
                        <select id="colors" name="colors[]" multiple style="width: 100%">
                            {{--@foreach($colors as $item)--}}
                                {{--{{$isSelected = ''}}--}}
                                {{--@if(isset($data->colors))--}}
                                    {{--@foreach($data->colors as $color)--}}
                                        {{--@if($color->color_id == $item->id)--}}
                                            {{--{{$isSelected = 'selected'}}--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--<option value="{{$item->id}}" {{$isSelected}}>{{$item->text}} </option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-1">Size</label>
                    <div class="col-md-11">
                        <select id="sizes" name="sizes[]" multiple style="width: 100%">
                            {{--@foreach($sizes as $item)--}}
                                {{--{{$isSelected = ''}}--}}
                                {{--@if(isset($data->sizes))--}}
                                    {{--@foreach($data->sizes as $size)--}}
                                        {{--@if($size->size_id == $item->id)--}}
                                            {{--{{$isSelected = 'selected'}}--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--<option value="{{$item->id}}" {{$isSelected}}>{{$item->text}} </option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
                <h4>List SKU:</h4>
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_sku" width="100%">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 20%">
                            <col style="width: 20%">
                            <col style="width: 20%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Sku</th>
                                <th>Upc</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="r_clone" class="r_clone" data-no-add="0" style="display: none">
                                <input type="hidden" name="t_pro_sku[--row--][id]" value="" />
                                <td style="text-align: center;"><span>--row--</span></td>
                                <td class="t_pro_sku_color">
                                    <select class="t-cbo-color" name="t_pro_sku[--row--][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                        <option value="" selected="">No color</option>
                                        @if(isset($data->colors))
                                            @foreach($data->colors as $item)
                                                <option value="{{$item->color->id??""}}">{{$item->color->name??""}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td class="t_pro_sku_size">
                                    <select class="t-cbo-size" name="t_pro_sku[--row--][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                        <option value="" selected="">No size</option>
                                        @if(isset($data->sizes))
                                            @foreach($data->sizes as $item)
                                                <option value="{{$item->size->id??""}}">{{$item->fullName()??""}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td class="t_pro_sku_sku">
                                    <input type="text" name="t_pro_sku[--row--][sku]" value=""/>
                                </td>
                                <td class="t_pro_sku_upc">
                                    <input type="text" name="t_pro_sku[--row--][upc]" value=""/>
                                </td>
                                <td class="t_pro_sku_none">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                </td>
                            </tr>
                            @if(isset($data->skus))
                                @foreach($data->skus as $k=>$v)
                                    <tr id="t_pro_sku_row_{{$k}}" class="t_pro_sku_row">
                                        <input type="hidden" name="t_pro_sku[{{$k}}][id]" value="{{$v->id}}" />
                                        <td style="text-align: center;"><span>{{$k+1}}</span></td>
                                        <td class="t_pro_sku_color">
                                            <select class="t-cbo-color" name="t_pro_sku[{{$k}}][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                                <option value="" selected="">No color</option>
                                                {{--@foreach($data->colors as $item)--}}
                                                    {{--@if(!empty($item->color))--}}
                                                        {{--<option value="{{$item->color->id??''}}" @if(isset($item->color->id) && $item->color->id == $v->color_id) selected @endif>{{$item->color->name??''}}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                        <td class="t_pro_sku_size">
                                            <select class="t-cbo-size" name="t_pro_sku[{{$k}}][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                                <option value="" selected="">No size</option>
                                                {{--@foreach($data->sizes as $item)--}}
                                                    {{--@if(!empty($item->size))--}}
                                                        {{--<option value="{{$item->size->id??''}}" @if(isset($item->size->id) && $item->size->id == $v->size_id) selected @endif>{{$item->fullName()??''}}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                        <td class="t_pro_sku_sku">
                                            <input type="text" name="t_pro_sku[{{$k}}][sku]" value="{{$v->sku}}"/>
                                        </td>
                                        <td class="t_pro_sku_upc">
                                            <input type="text" name="t_pro_sku[{{$k}}][upc]" value="{{$v->upc}}"/>
                                        </td>
                                        <td class="t_pro_sku_none">
                                            <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: center">
                                    <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_PRO.addRow("t_pro_sku")'>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="pro-price" class="tab-pane fade">
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_price" width="100%">
                        <colgroup>
                            <col style="width: 4%">
                            <col style="width: 12%">
                            <col style="width: 18%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 15%">
                            <col style="width: 15%">
                            <col style="width: 6%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity From</th>
                            <th>Quantity To</th>
                            <th>Import Price</th>
                            <th>Normal Price</th>
                            <th>Sale Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="r_clone" class="r_clone" data-no-add="0" style="display: none">
                            <input type="hidden" name="t_pro_price[--row--][id]" value="" />
                            <td style="text-align: center;"><span>--row--</span></td>
                            <td class="t_pro_price_color">
                                <select class="t-cbo-color" name="t_pro_price[--row--][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                    <option value="" selected="">No color</option>
                                    {{--@if(isset($data->colors))--}}
                                        {{--@foreach($data->colors as $item)--}}
                                            {{--<option value="{{$item->color->id??""}}">{{$item->color->name??""}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                </select>
                            </td>
                            <td class="t_pro_price_size">
                                <select class="t-cbo-size" name="t_pro_price[--row--][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                    <option value="" selected="">No size</option>
                                    {{--@if(isset($data->sizes))--}}
                                        {{--@foreach($data->sizes as $item)--}}
                                            {{--<option value="{{$item->size->id??""}}">{{$item->fullName()??""}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                </select>
                            </td>
                            <td class="t_pro_price_qty_from">
                                <input type="text" name="t_pro_price[--row--][qty_from]" value=""/>
                            </td>
                            <td class="t_pro_price_qty_to">
                                <input type="text" name="t_pro_price[--row--][qty_to]" value=""/>
                            </td>
                            <td class="t_pro_price_price_in">
                                <input type="text" name="t_pro_price[--row--][import_price]" value=""/>
                            </td>
                            <td class="t_pro_price_price_in">
                                <input type="text" name="t_pro_price[--row--][normal_price]" value=""/>
                            </td>
                            <td class="t_pro_price_price">
                                <input type="text" name="t_pro_price[--row--][price]" value=""/>
                            </td>
                            <td class="t_pro_price_none">
                                <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                            </td>
                        </tr>
                        @if(isset($data->prices))
                            @foreach($data->prices as $k=>$v)
                                <tr id="t_pro_price_row_{{$k}}" class="t_pro_price_row">
                                    <input type="hidden" name="t_pro_price[{{$k}}][id]" value="{{$v->id}}" />
                                    <td style="text-align: center;"><span>{{$k+1}}</span></td>
                                    <td class="t_pro_price_color">
                                        <select class="t-cbo-color" name="t_pro_price[{{$k}}][color_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            <option value="" selected="">No color</option>
                                            {{--@foreach($data->colors as $item)--}}
                                                {{--@if(!empty($item->color))--}}
                                                    {{--<option value="{{$item->color->id??''}}" @if(isset($item->color->id) && $item->color->id == $v->color_id) selected @endif>{{$item->color->name??''}}</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </td>
                                    <td class="t_pro_price_size">
                                        <select class="t-cbo-size" name="t_pro_price[{{$k}}][size_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            <option value="" selected="">No size</option>
                                            {{--@foreach($data->sizes as $item)--}}
                                                {{--@if(!empty($item->size))--}}
                                                    {{--<option value="{{$item->size->id??''}}" @if(isset($item->size->id) && $item->size->id == $v->size_id) selected @endif>{{$item->fullName()??''}}</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </td>
                                    <td class="t_pro_price_qty_from">
                                        <input type="text" name="t_pro_price[{{$k}}][qty_from]" value="{{$v->qty_from}}"/>
                                    </td>
                                    <td class="t_pro_price_qty_to">
                                        <input type="text" name="t_pro_price[{{$k}}][qty_to]" value="{{$v->qty_to}}"/>
                                    </td>
                                    <td class="t_pro_price_price_in">
                                        <input type="text" name="t_pro_price[{{$k}}][import_price]" value="{{$v->import_price}}"/>
                                    </td>
                                    <td class="t_pro_price_price_in">
                                        <input type="text" name="t_pro_price[{{$k}}][normal_price]" value="{{$v->normal_price}}"/>
                                    </td>
                                    <td class="t_pro_price_price">
                                        <input type="text" name="t_pro_price[{{$k}}][price]" value="{{$v->price}}"/>
                                    </td>
                                    <td class="t_pro_price_none">
                                        <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: center">
                                <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_PRO.addRow("t_pro_price")'>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="pro-attr" class="tab-pane fade">
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_attr" width="100%">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 20%">
                            <col style="width: 20%">
                            <col style="width: 20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="r_clone" class="r_clone" data-no-add="0" style="display: none">
                                <input type="hidden" name="t_pro_attr[--row--][id]" value="" />
                                <td style="text-align: center;"><span>--row--</span></td>
                                <td class="t_pro_attr">
                                    <input type="text" name="t_pro_attr[--row--][name]" value=""/>
                                </td>
                                <td class="t_pro_attr">
                                    <input type="text" name="t_pro_attr[--row--][desc]" value=""/>
                                </td>
                                <td class="t_pro_attr_none">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                </td>
                            </tr>
                            @if(isset($data->attrs))
                                @foreach($data->attrs as $k=>$v)
                                    <tr id="t_pro_attr_row_{{$k}}" class="t_pro_attr_row">
                                        <input type="hidden" name="t_pro_attr[{{$k}}][id]" value="{{$v->id}}" />
                                        <td style="text-align: center;"><span>{{$k+1}}</span></td>
                                        <td class="t_pro_attr">
                                            <input type="text" name="t_pro_attr[{{$k}}][name]" value="{{$v->name}}"/>
                                        </td>
                                        <td class="t_pro_attr">
                                            <input type="text" name="t_pro_attr[{{$k}}][desc]" value="{{$v->desc}}"/>
                                        </td>
                                        <td class="t_pro_attr_none">
                                            <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_PRO.delRow(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_PRO.addRow("t_pro_attr")'>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </form>
    <style>
        div.mce-fullscreen {
            z-index: 1050;
        }
    </style>
    <script>
        $('#colors').on('change',function (e) {
            $('.t-cbo-color').empty();
            var html = '<option value="" selected="">No size</option>';
            $.ajax({
                url:"{{route('admin.master.color-by-id')}}",
                data: {"ids":$(this).val()},
                type: 'GET',
                dataType:"json",
                success: function (res) {
                    console.log(res);
                    res.forEach(function(e){
                        html += '<option value="'+e.id+'">'+e.text+'</option>';
                    });
                    $(html).show().appendTo(".t-cbo-color");
                },
                error: function (res) {
                    console.log(res);
                }
            });
        });
        $('#sizes').on('change',function (e) {
            $('.t-cbo-size').empty();
            var html = '<option value="" selected="">No color</option>';
            $.ajax({
                url:"{{route('admin.master.size-by-id')}}",
                data: {"ids":$(this).val()},
                type: 'GET',
                dataType:"json",
                success: function (res) {
                    res.forEach(function(e){
                        html += '<option value="'+e.id+'">'+e.text+'</option>';
                    });
                    $('.t-cbo-size').empty();
                    $(html).show().appendTo(".t-cbo-size");
                },
                error: function (res) {
                    console.log(res);
                }
            });
        })
        $(function(){
            $('#sizes').select2({
                placeholder: 'Select option',
            });
            $('#colors').select2({
                placeholder: 'Select option'
            });
        })
        $('#cbo_category_detail').combotree({
            url: "{{route('admin.category.option')}}",
            method:'GET',
            // data: JSON.parse('[{"id":1,"text":"City","children":[{"id":11,"text":"Wyoming","children":[{"id":111,"text":"Albin"}]}]}]'),
            // required: true
        });
        $('#frm_uploadFile label').click(function(){ $('#image').trigger('click');});
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageView').attr('src', e.target.result);
                    $('#lbl_image').attr('title', input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        tinymce.init({
            selector: '#txt_short_desc_detail',
            height: 100,
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar: 'codesample |  fontselect fontsizeselect bold italic strikethrough forecolor backcolor | link | hr alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            baseURL:"{{URL::to('/')}}/node_modules/tinymce/",
            maxCharacters : 250,
            menubar: false,
            // setup: function (editor) {
            //     editor.on('change', function () {
            //         alert(editor.getContent({format: 'raw'}));
            //         // $(“txt_short_desc_detail”).text(editor.getContent());
            //     });
            // }
        });
        tinymce.init({
            selector: '#txt_long_desc_detail',
            height: 500,
            // theme: 'modern',
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            // toolbar: 'formatselect |  fontselect fontsizeselect bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            toolbar: 'codesample |  fontselect fontsizeselect bold italic strikethrough forecolor backcolor | link | hr alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            // toolbar: 'codesample | bold italic sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code',
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
            image_advtab: true,
            baseURL:"{{URL::to('/')}}/node_modules/tinymce/",
            // templates: [
            //     { title: 'Test template 1', content: 'Test 1' },
            //     { title: 'Test template 2', content: 'Test 2' }
            // ],
            // content_css: [
            //     '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            //     '//www.tinymce.com/css/codepen.min.css'
            // ]
        });
        // $( '#txt_long_desc_detail' ).ckeditor( function( textarea ) {},{
        //         filebrowserBrowseUrl: '/plugin/ckfinder/ckfinder.html',
        //         filebrowserImageBrowseUrl: '/plugin/ckfinder/ckfinder.html?Type=Images',
        //         filebrowserUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        //         filebrowserImageUploadUrl: '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        //         filebrowserWindowWidth : '1000',
        //         filebrowserWindowHeight : '700'
        // });
        function backToIndex(){
            document.location.href="{{route('admin.product.index')}}";
        }
        $('#btn_cancel').click(function(){
            backToIndex();
        });
        $('#btn_save').on('click',function(){
            tinymce.triggerSave();
            // alert($('#txt_short_desc_detail').val());
            var frm_product = document.getElementById('frm_product');
            var form_data = new FormData(frm_product);
            // form_data.append('short_desc',$('#txt_short_desc_detail').val());
            // form_data.append('long_desc',$('#txt_long_desc_detail').val());
            form_data.append('imgDel',TABLE_PRO.imgDel);
            form_data.append('priceDel',TABLE_PRO.priceDel);
            form_data.append('skuDel',TABLE_PRO.skuDel);
            form_data.append('attrDel',TABLE_PRO.attrDel);
            $.ajax({
                url:"{{route('admin.product.save')}}",
                // dataType: 'text', // what to expect back from the PHP script
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    // console.log(res);
                    if(res['status']){
                        backToIndex();
                        toastr.success(res['message']);
                    }
                    else{
                        message = res['message'].replace(/\\n/g, "<br />");
                        toastr.error(message);
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });
            // console.log(form_data);
        });
    </script>
@endsection
