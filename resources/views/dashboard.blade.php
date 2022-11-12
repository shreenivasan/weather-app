<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-8"><h2 class="text-success">Login Temperatures</h2></div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"><hr></div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-3"><button class="btn btn-dark">Hottest First</button></div>
                        <div class="col-3"><button class="btn btn-info">Reset Order</button></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-4">
                            <table class="table">
                                <thead>
                                    <td colspan="3">
                                        Mumbai
                                    </td>
                                </thead>
                                <tbody>
                                    @foreach( $display_data['M'] as $value )
                                    <tr>
                                        <td>{{ $value['created_at'] }}</td>
                                        <td>{{ $value['temp_in_degree']." in degree" }}</td>
                                        <td>{{ $value['temp_in_far']." in far" }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-4">
                            <table class="table">
                                <thead>
                                    <td colspan="3">
                                        Paris
                                    </td>
                                </thead>
                                <tbody>
                                    @foreach( $display_data['P'] as $value )
                                    <tr>
                                        <td>{{ $value['created_at'] }}</td>
                                        <td>{{ $value['temp_in_degree']." in degree" }}</td>
                                        <td>{{ $value['temp_in_far']." in far" }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
