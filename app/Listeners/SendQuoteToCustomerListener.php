<?php

    namespace App\Listeners;

    use App\Events\QuoteSubmittedEvent;
    use App\Mail\QuoteCustomer;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Support\Facades\Mail;

    class SendQuoteToCustomerListener
    {
        /**
         * Create the event listener.
         */
        public function __construct()
        {
            //
        }

        /**
         * Handle the event.
         */
        public function handle(QuoteSubmittedEvent $event): void
        {

            Mail::to(
                new Address(
                    $event->data['email'],
                    $event->data['first_name']
                ))
                ->queue(new QuoteCustomer((array)$event));
        }
    }
