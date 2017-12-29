@extends('admins.layouts.master')
@section('title', 'Function')
@section('controller', 'Function')
@section('action', 'Index')
@section('parent', 'Home')
@section('parent2', 'Admin Management')
@section('parent3', 'Function')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th width="1%"></th>
            <th width="30%">Function Name</th>
            <th width="15%">Url</th>
            <th width="10%">Icon</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{{$item['function_name']}}</td>
                    <td>{{$item['url']}}</td>
                    <td><i class="{{$item['icon']}}" aria-hidden="true"></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-responsive table-hover">
        <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
        </thead>
        <tbody>
        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1">
            <td><i class="fa fa-plus" aria-hidden="true"></i></td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
        </tr>
        </tbody>
        <tbody id="group-of-rows-1" class="collapse">
        <tr>
            <td>- child row</td>
            <td>data 1</td>
            <td>data 1</td>
            <td>data 1</td>
        </tr>
        <tr>
            <td>- child row</td>
            <td>data 1</td>
            <td>data 1</td>
            <td>data 1</td>
        </tr>
        </tbody>
        <tbody>
        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-2" aria-expanded="false" aria-controls="group-of-rows-2">
            <td><i class="fa fa-plus" aria-hidden="true"></i></td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
        </tr>
        </tbody>
        <tbody id="group-of-rows-2" class="collapse">
        <tr>
            <td>- child row</td>
            <td>data 2</td>
            <td>data 2</td>
            <td>data 2</td>
        </tr>
        <tr>
            <td>- child row</td>
            <td>data 2</td>
            <td>data 2</td>
            <td>data 2</td>
        </tr>
        </tbody>
    </table>
    <script>
        /* fix = code from bootstrap 3 */
        tbody.collapse.in {
            display: table-row-group;
        }
    </script>
@endsection