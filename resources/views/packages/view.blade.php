<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Package to User') . $user->name }}
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
                        <div class="w-full px-2 md:w-1/3">
                            <label class="block mb-1" for="formGridCode_last">Select Package</label>
                                <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" name="package_id" placeholder="Select Package">

                                   @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                                </div>
                         </div>
                        <div class="w-full px-2 md:w-1/3">
                            <label class="block mb-1" for="formGridCode_last">Start Date</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="date" name="start_date" value="{{old('start_date')}}"/>
                        </div>
                        <div class="w-full px-2 md:w-1/3">
                            <label class="block mb-1" for="formGridCode_last">End Date</label>
                            <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="date" name="end_date" value="{{old('end_date')}}"/>
                        </div>
                    </div>

                    <input  type="submit" value="Update User Packages" class="w-full h-12 px-6 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
