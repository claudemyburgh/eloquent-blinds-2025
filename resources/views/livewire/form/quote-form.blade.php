<div class="p-6 rounded-default border bg-gray-50/75 dark:bg-gray-900/75 border-gray-300 dark:border-gray-800">

    <form class="space-y-4" wire:submit="send" method="post">
        @csrf
        @method('POST')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-ui.input-label for="first_name" required="true"/>
                <x-ui.input-text type="text" wire:model="first_name" id="first_name" name="first_name" autocomplete="given-name"/>
                <x-ui.input-error error="first_name"/>
            </div>

            <div>
                <x-ui.input-label for="last_name" required="true"/>
                <x-ui.input-text type="text" wire:model="last_name" id="last_name" name="last_name" autocomplete="family-name"/>
                <x-ui.input-error error="last_name"/>
            </div>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-ui.input-label for="email" required="true"/>
                <x-ui.input-text type="email" wire:model="email" id="email" name="email" autocomplete="email"/>
                <x-ui.input-error error="email"/>
            </div>
            <div>
                <x-ui.input-label for="phone" required="true"/>
                <x-ui.input-text type="tel" wire:model="phone" id="phone" name="phone" autocomplete="tel"/>
                <x-ui.input-error error="phone"/>
            </div>
        </div>

        <div>
            <x-ui.input-label for="subject" required="true"/>
            <x-ui.input-text type="text" wire:model="subject" id="subject" name="subject"/>
            <x-ui.input-error error="subject"/>
        </div>

        <div>
            <x-ui.input-label for="message" required="true"/>
            <x-ui.input-textarea x-data x-autosize wire:model="message" id="message" name="message" rows="8"/>
            <x-ui.input-error error="message"/>
        </div>
        <div class="flex space-x-2 items-center">
            <button class="btn border-gray-300 dark:border-gray-800 hover:bg-gray-500/10 border" type="submit">
                <span>Send</span>
                <x-heroicon-o-paper-airplane class="size-3 ml-2"/>
            </button>
            <div wire:loading>
                <div class="flex space-x-2 text-gray-500/75 items-center">
                    <x-heroicon-s-arrow-path class="size-5 animate-spin"/>
                    <span>Sending</span>
                </div>
            </div>
        </div>
    </form>

</div>
