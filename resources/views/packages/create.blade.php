<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Package') }}
        </h2>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if(session()->has('success'))

                    <div class="px-4 py-3 leading-normal text-green-700 bg-blue-100 rounded-lg" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if($errors->any())

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif


                <form class="space-y-4 text-gray-700 space-x-2" action="{{ route('packages.store') }}" method="POST">

                    @csrf
                    <div class="flex flex-wrap space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_name">Name </label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" name="name" value="{{old('name')}}"/>
                        </div>
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_last">Commitment Period</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" name="commitment_period" value="{{old('commitment_period')}}"/>
                        </div>
                    </div>

                    <div class="flex flex-wrap space-y-4 md:space-y-0">

                        <div class="w-full px-2">
                            <label class="block mb-1" for="formGridCode_name">Description </label>
                            <textarea class="w-full h-16 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" name="description">{{ old('description') }}</textarea>

                        </div>
                   </div>
                    <div class="flex flex-wrap space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_month">Credits</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" name="credits" value="{{ old('credits') }}" />
                        </div>

                        <div class="w-full px-2 md:w-1/2">
                            <label class="text-gray-700">
                                <input type="radio" name="enabled" value="1" {{ old('enabled') == 1  ? 'checked' : '' }}/>
                                <span class="ml-1">Active</span>
                            </label>
                            <label class="text-gray-700">
                                <input type="radio" name="enabled" value="0" {{ old('enabled') == 0  ? 'checked' : '' }} />
                                <span class="ml-1">Disable</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-wrap space-y-4 md:space-y-0 space-x-4">
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_month">Sell Limit</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" name="sell_limit" value="{{ old('sell_limit') }}" />
                        </div>
                    </div>

                    <input  type="submit" value="Create Package" class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
