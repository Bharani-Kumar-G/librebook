<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Libre Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row justify-center" id="cover_img_div">
                        <img src="{{ $user->profile->cover_image }}">
                        <div class="row justify-center">
                            <div id="profile_image" class="col-2 -mt-[115px] flex justify-center"><img class="rounded-full" style="width: 150px" src="{{ asset($user->profile->profile_image ?? "storage/profile.jpg") }}" alt=""></div>
                            <div class="col-4 flex justify-center">
                                <div class="text-center">@if(auth()->user()->id !== $user->id)</div>
                                <a href="/message/{{ $user->id }}"><button>Message</button></a>
                                @endif

                                <div>{{ $user->name}}</div>
                                <div>{{ $user->profile->bio }}</div>
                                <a href="{{ $user->profile->url }}" style="text-decoration: none"><div>{{ $user->profile->url }}</div></a>
                                <div class="flex">
                                    <div class="pr-5"><strong>{{ $postCount ?? 0 }}</strong> posts</div>
                                    <div class="pr-5"><strong>{{ $followersCount ?? 0 }}</strong> followers</div>
                                    <div class="pr-5"><strong>{{ $followingCount ?? 0}}</strong> following</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-profile-image-cropper />
</x-app-layout>
