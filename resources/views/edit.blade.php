<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session()->has('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session()->has('fail'))
        <x-alert type="fail" :message="session('fail')" />
    @endif
    <x-search></x-search>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class=" ml-autoflex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    {{-- add Article button --}}
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0 ">
                        <button id="addArticleBtn" type="button"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Article
                        </button>
                        {{-- form --}}

                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">

                                </ul>
                                <div class="py-1">
                                    <a href="javascript:void(0);"
                                        onclick="if(confirm('Are you sure you want to delete all post?')) { event.preventDefault(); document.getElementById('delete-all').submit(); }"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Delete all
                                    </a>
                                    <form id="delete-all" action="/posts/all" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Article name</th>
                                <th scope="col" class="px-4 py-3">Author</th>
                                <th scope="col" class="px-4 py-3">Category</th>
                                <th scope="col" class="px-4 py-3">Release</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="/posts/{{ $post['slug'] }}"
                                            class="hover:underline">{{ Str::limit($post['title'], 30) }}</a>
                                    </th>
                                    <td class="px-4 py-3">
                                        <a href="/posts?author={{ $post->author->username }}"
                                            class="hover:underline">{{ $post->author->name }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="/posts?category={{ $post->category->slug }}">
                                            <span
                                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                {{ $post->category->name }}
                                            </span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">{{ $post->created_at->format('l, j F Y') }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ $post->id }}" data-dropdown-toggle="apple-imac-27-dropdown"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="apple-imac-27-dropdown"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="apple-imac-27-dropdown-button">

                                                <li>
                                                    <a href="javascript:void(0);"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white editPostBtn"
                                                        data-post='@json($post)'>
                                                        Edit
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('Are you sure you want to delete this post?')) { event.preventDefault(); document.getElementById('delete-post-{{ $post->id }}').submit(); }"
                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    Delete
                                                </a>
                                            </div>
                                            <form id="delete-post-{{ $post->id }}"
                                                action="/posts/{{ $post->id }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center font-semibold text-xl my-4 py-4">
                                        You have not posted an Article yet!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </section>
    <div id="overlay" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
        <div class="relative bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6 max-w-8xl w-full h-auto">
            <button id="closeForm"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:hover:text-white"
                aria-label="Close">&times;</button>

            <h2 id="formTitle" class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                Add a New Article
            </h2>

            <form id="postForm" method="POST">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Title</label>
                        <input type="text" name="title" id="title"
                            class="@error('title') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Type article title" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="" disabled>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="body"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="body" name="body" rows="6"
                            class="@error('body') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        @error('body')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Save Post
                </button>
            </form>
        </div>
    </div>

    <script>
        const addArticleBtn = document.getElementById('addArticleBtn');
        const overlay = document.getElementById('overlay');
        const closeForm = document.getElementById('closeForm');
        const formTitle = document.getElementById('formTitle');
        const postForm = document.getElementById('postForm');
        const formMethod = document.getElementById('formMethod');

        // Function to reset the form fields and configuration
        function resetForm() {
            formTitle.textContent = 'Add a New Article';
            postForm.action = `/posts`; // Set action for creating new post
            formMethod.value = 'POST'; // Reset the method to POST
            document.getElementById('title').value = '';
            document.getElementById('category_id').value = '';
            document.getElementById('body').value = '';
        }

        // Show overlay and form when Add Article is clicked
        addArticleBtn.addEventListener('click', function() {
            resetForm(); // Reset form to Add mode
            overlay.classList.remove('hidden');
        });

        // Hide overlay and form when Close (X) button is clicked
        closeForm.addEventListener('click', function() {
            overlay.classList.add('hidden');
        });

        // Handle Edit Post button clicks
        document.querySelectorAll('.editPostBtn').forEach(button => {
            button.addEventListener('click', function() {
                const post = JSON.parse(button.getAttribute('data-post'));

                // Update the form title and method for editing
                formTitle.textContent = 'Update Article';
                postForm.action = `/posts/${post.id}`;
                formMethod.value = 'PUT';

                // Pre-fill the form fields with the post's data
                document.getElementById('title').value = post.title;
                document.getElementById('category_id').value = post.category_id;
                document.getElementById('body').value = post.body;

                // Show the overlay
                overlay.classList.remove('hidden');
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: '#body', // Use the id of your textarea
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                document.getElementById('overlay').classList.remove('hidden'); // Keep the form open
            @endif
        });
    </script>


</x-layout>
