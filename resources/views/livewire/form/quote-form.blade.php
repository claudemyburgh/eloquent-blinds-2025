<div class="p-6 rounded-default border bg-gray-50/75 dark:bg-gray-900/75 border-gray-300 dark:border-gray-800">


    <form class="space-y-4" wire:submit="send" method="post">
        @csrf
        @method('POST')
        <x-ui.alert-success/>
        <div>
            <x-ui.input-label for="name" :required/>
            <x-ui.input-text type="text" wire:model="name" id="name" name="name"/>
            <x-ui.input-error error="name"/>
        </div>

        {{--        <div>--}}
        {{--            <x-ui.input-label for="representative" :required/>--}}
        {{--            <x-ui.input-select--}}
        {{--                wire:model="representative"--}}
        {{--                id="representative"--}}
        {{--                name="representative"--}}
        {{--                :options="{{ collect(config('contact-details.users')) }}"--}}
        {{--            />--}}
        {{--            <x-ui.input-error error="representative"/>--}}
        {{--        </div>--}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-ui.input-label for="email" :required/>
                <x-ui.input-text type="email" wire:model="email" id="email" name="email"/>
                <x-ui.input-error error="email"/>
            </div>
            <div>
                <x-ui.input-label for="phone" :required/>
                <x-ui.input-text type="tel" wire:model="phone" id="phone" name="phone"/>
                <x-ui.input-error error="phone"/>
            </div>
        </div>

        <div>
            <x-ui.input-label for="subject" :required/>
            <x-ui.input-text type="text" wire:model="subject" id="subject" name="subject"/>
            <x-ui.input-error error="subject"/>
        </div>

        <div>
            <x-ui.input-label for="message" :required/>
            <x-ui.input-textarea x-data x-autosize wire:model="message" id="message" name="message" rows="8"/>
            <x-ui.input-error error="message"/>
        </div>
        <div>
            <button class="btn border-gray-300 dark:border-gray-800 hover:bg-gray-500/10 border" type="submit">
                <span>Send</span>
                <x-heroicon-o-paper-airplane class="size-3 ml-2"/>
            </button>
        </div>
    </form>

</div>
