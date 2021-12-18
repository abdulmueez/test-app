<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
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


                <form class="space-y-4 text-gray-700 space-x-2" action="{{ route('users.store') }}" method="POST">

                    @csrf
                    <div class="flex flex-wrap space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_name">Name </label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" name="name" value="{{old('name')}}"/>
                        </div>
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_last">Email Address</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="email" name="email" value="{{old('email')}}"/>
                        </div>
                    </div>

                    <div class="flex flex-wrap space-y-4 md:space-y-0">
                        <div class="w-full px-2 md:w-1/2">
                            <label class="block mb-1" for="formGridCode_month">Purchased Credits</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="number" name="purchased_credits" value="{{ old('purchased_credits') }}" />
                        </div>

                        <div class="w-full px-2 md:w-1/2">
                            <label class="text-gray-700">
                                <input type="radio" name="enabled" value="1" {{ old('enabled') == 1  ? 'checked' : '' }}/>
                                <span class="ml-1">Active</span>
                            </label>
                            <label class="text-gray-700">
                                <input type="radio" name="enabled" value="0" {{ old('enabled') == 0  ? 'checked' : '' }}/>
                                <span class="ml-1">Disable</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-wrap space-y-4 md:space-y-0 space-x-4">
                        <label class="text-gray-700">
                            <input type="checkbox" name="is_admin" value=""/>
                            <span class="ml-1">Is Administrator</span>
                        </label>
                    </div>

                    <input  type="submit" value="Create User" class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
