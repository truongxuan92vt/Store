@extends('admins.layouts.master')
{{--@section('title', 'Item')
@section('controller', 'Item')
@section('action'){{isset($data->id)?'Detail':'New'}}@endsection--}}
@section('parent', 'Home')
@section('parent2', 'Master Data')
@section('parent3', 'Item')
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
    <form class="item-container" id="frm_item" name="frm_item" autocomplete="off">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#item-general">General</a></li>
            <li><a data-toggle="tab" href="#item-variant">Variant</a></li>
            <li><a data-toggle="tab" href="#item-sku">Sku</a></li>
            <li><a data-toggle="tab" href="#item-image">Images</a></li>
            <li><a data-toggle="tab" href="#item-price">Price</a></li>
            <li><a data-toggle="tab" href="#item-attr">Attribute</a></li>
            <li><a data-toggle="tab" href="#item-invt">Inventory</a></li>
        </ul>
        <input type="hidden" id="txt_id" name="id" value="{{isset($data->id)?$data->id:''}}">
        <?php $image = isset($data->image)?$data->image:''?>
        <div class="tab-content">
            <div id="item-general" class="tab-pane fade in active">
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
                            <label class="col-md-2">Item name</label>
                            <div class="col-md-10">
                                <input class="item-input" type="text" id="txt_name_detail" name="name" value="{{isset($data->name)?$data->name:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Item Code</label>
                            <div class="col-md-10">
                                <input  class="item-input" type="text" id="txt_code_detail" name="code" value="{{isset($data->code)?$data->code:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Category</label>
                            <div class="col-md-10">
                                <div class="row" style="padding: 0px !important;">
                                    <div class="col-md-5">
                                        <input id="cbo_category_detail" class="item-input" name="category_id" value="{{isset($data->category_id)?$data->category_id:''}}">
                                    </div>
                                    <label class="col-md-2" style="text-align: center">Status</label>
                                    <div class="col-md-5" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <select class="item-input" id="cbo_status_detail" name="status" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
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
                            <label class="col-md-2">Manufacturer</label>
                            <div class="col-md-10">
                                <div class="row" style="padding: 0px !important;">
                                    <div class="col-md-5">
                                        <select class="item-input" id="cbo_manufactuer_detail" name="manufacturer_id" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                            <option value="0" selected="">Select a manufacturer</option>
                                            {{--@foreach($statusList as $item)--}}
                                                {{--<option value="{{$item['value']}}" @if(isset($data->status) && $item['value']==$data->status) selected="selected" @endif>{{$item['text']}} </option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                    <label class="col-md-2" style="text-align: center">Priority</label>
                                    <div class="col-md-5" style="padding-left: 0px; padding-right: 0px; height: 30px;">
                                        <input id="txt_priority_detail" class="item-input" name="priority" value="{{isset($data->priority)?$data->priority:''}}" style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Meta title</label>
                            <div class="col-md-10">
                                <input class="item-input" type="text" id="txt_title_detail" name="title" value="{{isset($data->title)?$data->title:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Tags</label>
                            <div class="col-md-10">
                                <input class="item-input" type="text" id="txt_tag_detail" name="tag" value="{{isset($data->tag)?$data->tag:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">URL SEO</label>
                            <div class="col-md-10">
                                <input class="item-input" type="text" id="txt_url_seo_detail" name="url_seo" value="{{isset($data->url_seo)?$data->url_seo:''}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Short description</label>
                    <div class="col-md-10">
                        <textarea class="item-input" id="txt_short_desc_detail" name="short_desc">{{isset($data->desc->short_desc)?$data->desc->short_desc:''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Full description</label>
                    <div class="col-md-10">
                        <textarea class="item-input" id="txt_long_desc_detail" name="long_desc">{{isset($data->desc->long_desc)?$data->desc->long_desc:''}}</textarea>
                    </div>
                </div>
            </div>
            <div id="item-variant" class="tab-pane fade ">
                <h4>List of Option:</h4>
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_variant" width="100%">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 20%">
                            <col style="width: 65%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Variant</th>
                            <th>Value</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="r_clone" class="r_clone" data-no-add="0" style="display:none">
                            <input type="hidden" name="t_pro_variant[--row--][id]" value="" />
                            <td style="text-align: center;"><span>--row--</span></td>
                            <td class="t_pro_variant_id">
                                <select id="t_pro_variant_--row--" class="t-cbo-variant" name="t_pro_variant[--row--][variant_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;" onchange="changeVariant(this)" placeholder="">
                                    <option selected>No Variant</option>
                                    <?php
                                        $variants = \App\Models\Variant::get();
                                        foreach ($variants as $row){
                                            echo "<option value='{$row->id}'>{$row->name}</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="t_pro_variant_value">
                                <select id="t_pro_variant_value_--row--" class="t-cbo-variant-value" name="t_pro_variant[--row--][values][]" multiple="multiple" style="width: 100%" placeholder="No Variant Value">
                                </select>
                            </td>
                            <td class="t_pro_variant_none">
                                <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                            </td>
                        </tr>
                        @if(isset($data->variants))
                            @foreach($data->variants as $k=>$v)
                            <tr id="t_pro_variant_row_{{$k}}" class="t_pro_variant_row">
                                <input type="hidden" name="t_pro_variant[{{$k}}][id]" value="" />
                                <td style="text-align: center;"><span>{{$k}}</span></td>
                                <td class="t_pro_variant_id">
                                    <select id="t_pro_variant_{{$k}}" class="t-cbo-variant" name="t_pro_variant[{{$k}}][variant_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;" onchange="changeVariant(this)" placeholder="">
                                        <option value={{$v['variant_id']}} selected>{{$v['variant_name']}}</option>
                                    </select>
                                </td>
                                <td class="t_pro_variant_value">
                                    <select id="t_pro_variant_value_{{$k}}" class="t-cbo-variant-value" name="t_pro_variant[{{$k}}][values][]" multiple="multiple" style="width: 100%" placeholder="No Variant Value">
                                        @if(isset($v['values']))
                                            @foreach($v['values'] as $value)
                                                <option value={{$value['variant_value_id']}} selected>{{$value['variant_value_name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <script>
                                        $(function() {
                                            $('#t_pro_variant_value_{{$k}}').select2({
                                                placeholder: 'Select option',
                                            });
                                        })
                                    </script>
                                </td>
                                <td class="t_pro_variant_none">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        <tfoot>
                        <tr>
                            <td colspan="6" style="text-align: center">
                                <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_ITEM.addRow("t_pro_variant",true,"#t_pro_variant_value_")'>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="item-sku" class="tab-pane fade ">
                <h4>List of SKU:</h4>
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_sku" width="100%">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 20%">
                            <col style="width: 35%">
                            <col style="width: 30%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Sku</th>
                            <th>Variant Value</th>
                            <th>UPC</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data->skus))
                            @foreach($data->skus as $k=>$v)
                                <tr id="t_pro_sku_row_{{$k}}" class="t_pro_sku_row">
                                    <input type="hidden" name="t_pro_sku[{{$k}}][id]" value="{{$v['id']??null}}" />
                                    <td style="text-align: center;"><span>{{$k+1}}</span></td>
                                    <td style="text-align: center;">
                                        <span>{{$v['sku']}}</span>
                                    </td>
                                    <td>
                                        <input type="hidden" name="t_pro_sku[{{$k}}][sku_id]" value="{{$v['id']}}">
                                        <select id="t_pro_sku_variant_{{$k}}" class="t-cbo-sku-variant" multiple="multiple" style="width: 100%" placeholder="No Variant" disabled>
                                            @if(isset($v['variant_values']))
                                                @foreach($v['variant_values'] as $sku)
                                                    <option value={{$sku['variant_value_id']}} selected>{{$sku['variant_value_name']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <script>
                                            $(function() {
                                                $('#t_pro_sku_variant_{{$k}}').select2({});
                                            })
                                        </script>
                                    </td>
                                    <td style="text-align: center;">
                                        <input type="text" name="t_pro_sku[{{$k}}][upc]" value="{{$v['upc']??''}}">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="item-image" class="tab-pane fade">
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_image" width="100%">
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 20%">
                            <col style="width: 30%">
                            <col style="width: 15%">
                            <col style="width: 10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>File</th>
                                <th>Variant</th>
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
                                    <input type='file' name="t_pro_image[--row--][file]" onchange="TABLE_ITEM.readURL(this)" />
                                </td>
                                <td class="t_pro_image_variant">
                                    <select name="t_pro_image[--row--][item_sku_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                        @if(isset($data->skus))
                                            @foreach($data->skus as $sku)
                                                <option value="{{$sku['id']??""}}">{{$sku['sku']??""}} - {{$sku['variant_value_name']??""}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td class="t_pro_image_priority">
                                    <input type="text" name="t_pro_image[--row--][priority]" value="0"/>
                                </td>
                                <td class="t_pro_image_none">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                                </td>
                            </tr>
                            @if(isset($data->images) && count($data->images)>0)
                                @foreach($data->images as $k=>$v)
                                    <tr id="t_pro_image_row_{{$k}}" class="t_pro_image_row">
                                        <input type="hidden" name="t_pro_image[{{$k}}][id]" value="{{$v->id}}" />
                                        <td class="t_pro_image_picture" style="text-align: center">
                                            <img id="img_pro" src="{{$v->url??URL::to("/image/no_image.png")}}" alt="your image" style="max-width: 200px"/>
                                        </td>
                                        <td class="t_pro_image_file">
                                            <input type='file' name="t_pro_image[{{$k}}][file]" onchange="TABLE_ITEM.readURL(this)" />
                                        </td>
                                        <td class="t_pro_image_variant">
                                            <select name="t_pro_image[{{$k}}][item_sku_id]" style="padding-top: 2px; padding-bottom: 2px; height: 29px;">
                                                @if(isset($data->skus))
                                                    @foreach($data->skus as $sku)
                                                        {{$selected = ""}}
                                                        @if($sku['id'] == $v->item_sku_id)
                                                            {{$selected = "selected"}}
                                                        @endif
                                                        <option value="{{$sku['id']??""}}" {{$selected}}>{{$sku['sku']??""}} - {{$sku['variant_value_name']??""}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td class="t_pro_image_priority">
                                            <input type="text" name="t_pro_image[{{$k}}][priority]" value="0"/>
                                        </td>
                                        <td class="t_pro_image_none">
                                            <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: center">
                                    <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_ITEM.addRow("t_pro_image")'>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="item-price" class="tab-pane fade">
                <div style="width:100%;height:400px;overflow-y:auto;z-index:0">
                    <table id="t_pro_price" width="100%">
                        <colgroup>
                            <col style="width: 4%">
                            <col style="width: 20%">
                            <col style="width: 18%">
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 15%">
                            <col style="width: 15%">
                            <col style="width: 6%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>SKU</th>
                            <th>Customer Group</th>
                            <th>Quantity From</th>
                            <th>Quantity To</th>
                            <th>Import Price</th>
                            <th>Normal Price</th>
                            <th>Sale Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data->prices))
                            @foreach($data->prices as $k=>$v)
                                <tr id="t_pro_price_row_{{$k}}" class="t_pro_price_row">
                                    <input type="hidden" name="t_pro_price[{{$k}}][id]" value="{{$v['id']??null}}" />
                                    <td style="text-align: center;"><span>{{$k+1}}</span></td>
                                    <td class="t_pro_price_variant">
                                        <input type="hidden" name="t_pro_price[{{$k}}][item_sku_id]" value="{{$v['item_sku_id']}}"/>
                                        @if(isset($data->skus))
                                            @foreach($data->skus as $sku)
                                                @if($sku['id'] == $v['item_sku_id'])
                                                    {{$sku['sku']??''}} -  {{$sku['variant_value_name']}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="t_pro_price_customer_group_id">
                                        <input type="text" name="t_pro_price[{{$k}}][customer_group_id]" value="{{$v['customer_group_id']??null}}"/>
                                    </td>
                                    <td class="t_pro_price_qty_from">
                                        <input type="text" name="t_pro_price[{{$k}}][qty_from]" value="{{$v['qty_from']??null}}"/>
                                    </td>
                                    <td class="t_pro_price_qty_to">
                                        <input type="text" name="t_pro_price[{{$k}}][qty_to]" value="{{$v['qty_to']??null}}"/>
                                    </td>
                                    <td class="t_pro_price_price_in">
                                        <input type="text" name="t_pro_price[{{$k}}][import_price]" value="{{$v['import_price']??null}}"/>
                                    </td>
                                    <td class="t_pro_price_price_in">
                                        <input type="text" name="t_pro_price[{{$k}}][normal_price]" value="{{$v['normal_price']??null}}"/>
                                    </td>
                                    <td class="t_pro_price_price">
                                        <input type="text" name="t_pro_price[{{$k}}][price]" value="{{$v['price']??null}}"/>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="item-attr" class="tab-pane fade">
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
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
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
                                            <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_ITEM.addRow("t_pro_attr")'>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="item-invt" class="tab-pane fade">
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
                                <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
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
                                        <input type="button" class="btn btn-danger" value="Delete" onclick="TABLE_ITEM.delRow(this)">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: center">
                                <input type="button" class="btn btn-primary" value="Add more rows..." style="width: 200px;" onclick='TABLE_ITEM.addRow("t_pro_attr")'>
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
        function changeVariant(e){
            variantId = $(e).val();
            variantValue = $(e).parent().parent().find('.t-cbo-variant-value');
            variantValue.empty();
            var html = '';
            $.ajax({
                url:"{{route('admin.option.variant-value')}}",
                data: {"variant_id":variantId},
                type: 'GET',
                dataType:"json",
                success: function (res) {
                    console.log(res);
                    res.forEach(function(row){
                        html += '<option value="'+row.id+'">'+row.name+'</option>';
                    });
                    $(html).show().appendTo(variantValue);
                },
                error: function (res) {
                    console.log(res);
                }
            });
        }
        /*$(function(){
            $('#sizes').select2({
                placeholder: 'Select option',
            });
            $('#t-cbo-option-value').select2({
                placeholder: 'Select option',
            });
            $('#colors').select2({
                placeholder: 'Select option'
            });
        })*/
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
            document.location.href="{{route('admin.item.index')}}";
        }
        $('#btn_cancel').click(function(){
            backToIndex();
        });
        $('#btn_save').on('click',function(){
            tinymce.triggerSave();
            // alert($('#txt_short_desc_detail').val());
            var frm_item = document.getElementById('frm_item');
            var form_data = new FormData(frm_item);
            // form_data.append('short_desc',$('#txt_short_desc_detail').val());
            // form_data.append('long_desc',$('#txt_long_desc_detail').val());
            form_data.append('imgDel',TABLE_ITEM.imgDel);
            form_data.append('priceDel',TABLE_ITEM.priceDel);
            form_data.append('skuDel',TABLE_ITEM.skuDel);
            form_data.append('attrDel',TABLE_ITEM.attrDel);
            $.ajax({
                url:"{{route('admin.item.save')}}",
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
