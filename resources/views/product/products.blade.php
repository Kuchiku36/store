@extends('layouts.store')

@section('content')
<div >
    <ul class="category">
        @foreach ($categories as $rowCategory)
        <li>
            <a href="">{{$rowCategory->name}}</a>
        </li>
        @endforeach
    </ul>
    <x-product-card :products="$products"/>
</div>
@endsection