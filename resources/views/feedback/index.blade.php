<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (Auth::user()->role == 0)
                {{ __('Add Your Feedback') }}
            @else
                {{ __('All Feedbacks') }}
            @endif

        </h2>
    </x-slot>

    @if (Auth::user()->role == 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white-900 dark:text-gray-100">

                        @if (session('sattus'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ url('feedback/insert') }}" class="max-w-sm mx-auto">
                            @csrf
                            <div class="mb-5">
                                <label for="Name"
                                    class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Add Your
                                    Comment / Suggestion / Feedback / Complain</label>
                                <textarea maxlength="200" required id="review" name="review" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add
                                Review</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-white-500 dark:text-gray-400">
                            <thead
                                class=" font-medium text-white-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        SL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User Mail
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User Review
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($feedbacks as $feedback)
                                        <tr>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                                {{ $loop->index + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ App\Models\User::find($feedback->added_by)->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ App\Models\User::find($feedback->added_by)->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $feedback->review }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($feedback->status == 1)
                                                    Approved
                                                @else
                                                    <a href="{{ url('/feedback/update') }}/{{ $feedback->id }}">
                                                        Approve</a>
                                                @endif
                                                <a href="{{ url('/feedback/delete') }}/{{ $feedback->id }}">
                                                    Delete</a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Review to show</td>
                                        </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endif


</x-app-layout>
