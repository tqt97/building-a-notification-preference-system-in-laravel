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
                                {{--Notification channels--}}
                                <div class="w-24 flex items-center justify-center font-semibold text-gray-800">
                                    Channel
                                </div>
                                {{--/Notification channels--}}
                            </div>
                        </div>

                        {{--Notification groups--}}
                        <div class="border-b border-b-gray-100 last:border-b-0 pb-8">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-semibold text-gray-800">
                                    Group
                                </div>
                            </div>

                            <div class="space-y-1.5 mt-4">
                                {{--Notifications--}}
                                <div class="flex items-center justify-between">
                                    <div>
                                        Notification title
                                    </div>

                                    <div class="flex items-center">
                                        {{--Notification channel checkboxes--}}
                                        <div class="w-24 flex items-center justify-center">
                                            <input type="checkbox" class="rounded">
                                        </div>
                                        {{--/Notification channel checkboxes--}}
                                    </div>
                                </div>
                                {{--/Notifications--}}
                            </div>
                        </div>
                        {{--/Notification groups--}}
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
