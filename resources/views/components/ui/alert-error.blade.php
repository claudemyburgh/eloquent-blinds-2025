@if($errors->any())
    <div class="rounded-md bg-red-50 dark:bg-red-600 p-4" x-data="{open: true}" x-show="open">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <x-heroicon-s-exclamation-circle aria-hidden="true" class="size-7 text-red-600 dark:text-red-50"/>

            </div>
            <div class="ml-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm font-medium text-red-600 dark:text-red-200 ">{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" @click="open = false" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-600 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: solid/x -->
                        <x-heroicon-s-x-mark aria-hidden="true" class="size-5"/>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
