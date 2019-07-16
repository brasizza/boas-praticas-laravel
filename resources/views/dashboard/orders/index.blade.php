@extends('layouts.app')
@section('content')
<a href="{{route('orders.index', ['status'=>'pending'])}}" class="btn btn-warning">Pedidos pendentes</a>
<a href="{{route('orders.index',['status'=>'delivered'])}}" class="btn btn-primary">Pedidos enviados</a>
<a href="{{route('orders.index',['paid'=>1])}}" class="btn btn-success">Pedidos pagos</a>
<a href="{{route('orders.index')}}" class="btn btn-light">Limpar filtro</a>
<hr>
<a href="{{route('orders.create')}}" class="btn btn-primary">Novo</a>
<table class="table table-hover">
    <thead>
        <th>#</th>
        <th>Status</th>
        <th>Paga</th>
        <th>Track code </th>
    </thead>
    <tbody>
    @foreach ($orders as $item)
    <tr>
        <td>{{$item->id}} </td>
        <td>{{$item->formatted_status}} </td>
        <td>{{$item->status_paid}} </td>
        <td>{{$item->track_code}} </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
