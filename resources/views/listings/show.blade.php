@extends('layout')


@section('content')

    <a href="{{route('listings.index')}}" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i>
    </a>
    <a class="container mx-auto">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-20 mr-6 mb-6"
                    src="{{$listing->logo ? asset('/storage/' . $listing->logo) : asset('images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

                <x-listing-tags :tagsCsv="$listing->tags"/>

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{$listing->description}}
                        </p>
                        <a href="mailto:{{$listing->email}}"
                           class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a href="{{$listing->website}}"
                           target="_blank"

                           class="block bg-black text-white py-2 rounded-xl hover:opacity-80 "
                        ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        </x-card>
        <div class="pt-4">
            <a href="/listings/{{$listing->id}}/edit"
               class="bg-gray-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                Edit Job</a>
        </div>
@endsection
