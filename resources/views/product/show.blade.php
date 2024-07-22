@extends('layouts.store')

@section('content')

{{ $product->isFavori->where('user_id', auth()->user()->id)}}
<div class="container">
    <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
        <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">

            <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
                <div class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-quick-preview-02-detail.jpg" alt="Two each of gray, white, and black shirts arranged on table." class="object-cover object-center">
                </div>
                <div class="sm:col-span-8 lg:col-span-7">
                    <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{$product->name}}</h2>

                    <section aria-labelledby="information-heading" class="mt-2">
                        <h3 id="information-heading" class="sr-only">Product information</h3>

                        <p class="text-2xl text-gray-900">{{$product->price}} €</p>

                        <!-- Reviews -->
                        <div class="mt-6">
                            <h4 class="sr-only">Reviews</h4>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="sr-only">3.9 out of 5 stars</p>
                                <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
                            </div>
                        </div>
                    </section>

                    <section aria-labelledby="options-heading" class="mt-10">
                    <h3 id="options-heading" class="sr-only">Product options</h3>
                    <!-- Colors -->
                    <fieldset aria-label="Choose a color">
                        <legend class="text-sm font-medium text-gray-900">Description</legend>
                        <div class="mt-4 flex items-center space-x-3">
                            <p class="text-sm font-medium text-black">{{$product->description}}</p>
                        </div>
                    </fieldset>


                    <a href="{{route('panier.ajouter', $product)}}" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</a>
                    
                    
                    @if (count($product->isFavori->where('user_id', auth()->user()->id) )>0 )
                    
                    <a href="{{route('favori.edit', $product)}}" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">enlever des favori</a>
                    @else
                    <a href="{{route('favori.edit', $product)}}" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">favori</a>
                    
                    @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<x-product-card :products="$products"/>
@endsection