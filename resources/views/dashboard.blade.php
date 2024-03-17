<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-12 gap-4 p-6 text-gray-900 dark:text-gray-100">
                    @foreach($users as $user)
                    <div class="sm:col-span-3 bg-gray-100 border p-4">
                        <p class="mb-3 font-bold">{{$user->name}}</p>
                        <p class="">{{$user->email}}</p>
                        @if(count($sent_requests->where('receiver_id', $user->id)) > 0)
                            <a type="button" href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7 disabled">
                                {{ count($sent_requests->where('receiver_id', $user->id)->where('status', 0)) > 0 ? 'Request Sent' : 'Friend' }}
                            </a>
                        @elseif(count($received_requests->where('sender_id', $user->id)) > 0)
                            <a type="button" href="{{route('connects.accept', $user->id)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-7">
                                {{count($received_requests->where('sender_id', $user->id)->where('status', 0)) > 0 ? 'Accept' : 'Friend'}}
                            </a>
                        @else
                        <a type="button" href="{{route('connects.request', $user->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">
                            Request
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
