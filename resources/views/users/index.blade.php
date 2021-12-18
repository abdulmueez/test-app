<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}

            <div class="float-right mb-4">
                <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                   href="{{ route('users.create') }}">Add New User</a>
            </div>
        </h2>

    </x-slot>

          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">

                        @if(session()->has('success'))

                            <div class="px-4 py-3 leading-normal text-green-700 bg-blue-100 rounded-lg" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif


                        <div class="w-full">
                            <div class="border-b border-gray-200 shadow">
                                <table class="divide-y divide-gray-300 ">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-12 py-2 text-xs text-gray-500">
                                            ID
                                        </th>
                                        <th class="px-20 py-2 text-xs text-gray-500">
                                            Name
                                        </th>
                                        <th class="px-12 py-2 text-xs text-gray-500">
                                            Email
                                        </th>
                                        <th class="px-18 py-2 text-xs text-gray-500">
                                            Purchased Credits
                                        </th>
                                        <th class="px-12 py-2 text-xs text-gray-500">
                                            Status
                                        </th>
                                        <th class="px-12 py-2 text-xs text-gray-500">
                                            view
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300">

                                    @foreach($users as $user)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-12 py-4 text-sm text-gray-500">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-20 py-4">
                                                <div class="text-sm text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td class="px-12 py-4">
                                                <div class="text-sm text-gray-500"> {{ $user->email }}</div>
                                            </td>
                                            <td class="px-18 py-4 text-sm text-gray-500">
                                                {{ $user->purchased_credits }}
                                            </td>

                                            <td class="px-12 py-4">
                                                <form method="POST" action="{{ route('users.update',$user) }}">
                                                   @csrf
                                                   @method('PUT')
                                                    <label class="text-gray-700">
                                                        <input type="checkbox" name="enabled" value="1" {{ $user->enabled ? 'checked' : '' }} onclick="event.preventDefault();
                                                    this.closest('form').submit(); "/>
                                                    </label>
                                                </form>
                                            </td>

                                            <td class="px-12 py-4">
                                                <a class="inline-flex items-center h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800" href="{{ route('user-packages.show', $user) }}">View / Assign Package</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


