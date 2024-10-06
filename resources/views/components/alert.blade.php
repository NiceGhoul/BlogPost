<div id="alert-border-{{ $type }}" class="flex items-center p-4 mb-4 text-{{ $textColor }} border-t-4 border-{{ $borderColor }} bg-{{ $bgColor }} dark:text-{{ $darkTextColor }} dark:bg-gray-800 dark:border-{{ $darkBorderColor }} rounded-lg" role="alert">
    <svg class="flex-shrink-0 w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="text-sm font-medium">
        {{ $message }}
    </div>
    <button type="button" class="ml-auto bg-{{ $bgColor }} text-{{ $textColor }} rounded-lg focus:ring-2 focus:ring-{{ $focusColor }} p-1.5 hover:bg-{{ $hoverBgColor }} inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-{{ $darkTextColor }} dark:hover:bg-gray-700" data-dismiss-target="#alert-border-{{ $type }}" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
