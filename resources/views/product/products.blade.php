@extends('layouts.store')

@section('content')
<ul class="bg-red-300">
    @foreach ($categories as $rowCategory)
        <li>
            <a href="">{{$rowCategory->name}}</a>
        </li>
    @endforeach
</ul>
<x-product-card :products="$products"/>
@endsection