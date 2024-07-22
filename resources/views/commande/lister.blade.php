<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Commande") }}
                </div>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $commandes as $commande )
                            <tr>
                                <td>{{$commande->numero}}</td>
                                <td>{{$commande->total}}€</td>
                                <td>{{$commande->created_at}}</td>
                                <td>Detail</td>
                            </tr>
                        @empty
                            vous n'avez pas de commande
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
