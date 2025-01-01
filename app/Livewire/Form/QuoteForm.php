<?php

    namespace App\Livewire\Form;

    use App\Events\QuoteSubmittedEvent;
    use App\Models\Client;
    use DB;
    use Illuminate\View\View;
    use Livewire\Component;
    use function event;

    class QuoteForm extends Component
    {

        public bool $was_send = false;

        public string $first_name = '';
        public string $last_name = '';
        public string $email = '';
        public string $phone = '';
        public string $message = '';
        public string $representative = '';


        public function __construct(public ?string $subject = '') {}

        public function messages(): array
        {
            return [
                'phone' => 'The :attribute field must be a valid number.',
            ];
        }

        public function send(): void
        {
            $data = $this->validate();

            event(new QuoteSubmittedEvent($this->validate()));

            $emailExists = Client::where('email', $data['email'])->count() > 0;

            if (!$emailExists) {
                Client::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                ]);
            }

            $this->reset();
            $this->was_send = true;
        }


        public function render(): View
        {
            return view('livewire.form.quote-form');
        }

        protected function rules(): array
        {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:10|phone:ZA',
                'subject' => 'required',
                'message' => 'required',
            ];
        }
    }
