<?php

    namespace App\Listeners;

    use App\Events\QuoteSubmittedEvent;
    use App\Mail\QuoteAdmin;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Support\Facades\Mail;
    use function config;

    class SendQuoteToAdminListener implements ShouldQueue
    {

        use InteractsWithQueue;

        /**
         * Create the event listener.
         */
        public function __construct() {}

        /**
         * Handle the event.
         */
        public function handle(QuoteSubmittedEvent $event): void
        {
            Mail::to(
                new Address(config('contact-details.users.claude.email'),
                    config('contact-details.users.claude.name')))
                ->queue(new QuoteAdmin((array)$event));
        }
    }
