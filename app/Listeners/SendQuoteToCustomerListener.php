<?php

    namespace App\Listeners;

    use App\Events\QuoteSubmittedEvent;

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
            //
        }
    }
