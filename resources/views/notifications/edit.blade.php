<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form action="{{ route('notifications.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div></div>

                            <div class="flex items-center">
                                @foreach($notificationChannels as $notificationChannel)
                                    <div class="w-24 flex items-center justify-center font-semibold text-gray-800">
                                        {{ $notificationChannel->title }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @foreach($notificationGroups as $notificationGroup)
                            <div class="border-b border-b-gray-100 last:border-b-0 pb-8">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-semibold text-gray-800">
                                        {{ $notificationGroup->title }}
                                    </div>
                                </div>

                                <div class="space-y-1.5 mt-4">
                                    @foreach($notificationGroup->notifications as $notification)
                                        <div class="flex items-center justify-between">
                                            <div>
                                                {{ $notification->title }}
                                            </div>

                                            <div class="flex items-center">
                                                @foreach($notificationChannels as $notificationChannel)
                                                    <div class="w-24 flex items-center justify-center">
                                                        <input type="checkbox" class="rounded"
                                                            name="notifications[{{ $notification->id }}][]"
                                                            value="{{ $notificationChannel->type }}"
                                                            @checked(in_array($notificationChannel->type, auth()->user()->notificationPreferences->find($notification->id)?->pivot->channels ?? []))
                                                        >
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
