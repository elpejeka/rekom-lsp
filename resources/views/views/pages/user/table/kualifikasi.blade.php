@extends('layouts.app')
@section('page-header')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Tabel Klasifikasi dan Subklasifikasi</h4>
    </div>
  </div>

  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="icon-home2 position-left"></i> Home</a></li>
      <li class="active">Tabel Klasifikasi dan Subklasifikasi</li>
    </ul>
  </div>
</div>
@endsection

@section('content')

<div class="panel panel-flat">
  <div class="panel-heading">
    <h5 class="panel-title">Data Klasifikasi</h5>
    <div class="heading-elements">
      <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
              </ul>
            </div>
  </div>

  <div class="panel-body">
    
  </div>
{{-- @if($item->status_submit == null) --}}
  <table class="table datatable-show-all">
    <thead>
        <tr>
          <th>No</th>
          <th colspan="2">Klasifikasi</th>
          <th colspan="2">Subklasifikasi</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>   
          @foreach ($data as $item)
        <tr>
          <td>#</td>
          <td colspan="">{{$item->klasifikasi}}</td>
          <td></td>
          <td>{{$item->sub_klasifikasi}}</td>
          <td></td>
          <td class="text-center">
            <form action="{{route('delete.klasifikasi', $item->id)}}" method="post" class="d-inline">
                @csrf
                @method('delete')
              <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
              </form>
        </td>
        </tr>
        @endforeach
      </tbody>
  </table>
{{-- @else
<table class="table datatable-show-all">
  <thead>
      <tr>
        <th>No</th>
        <th colspan="2">Klasifikasi</th>
        <th colspan="2">Subklasifikasi</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>   
        @foreach ($data as $item)
      <tr>
        <td>#</td>
        <td colspan="">{{$item->klasifikasi}}</td>
        <td></td>
        <td>{{$item->sub_klasifikasi}}</td>
        <td></td>
        <td class="text-center">
          <div class="btn btn-sm btn-success"> Submitted</div>
      </td>
      </tr>
      @endforeach
    </tbody>
</table>
@endif --}}
</div>
@endsection
