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

            $this->triggerSuccess();

            if (!$emailExists) {
                Client::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                ]);
            }

            $this->reset();
        }

        public function triggerSuccess(): void
        {
            // Emit an event to trigger the toaster notification
            $this->dispatch('toast', [
                'title' => 'Success!',
                'description' => 'Email was send successfully.',
                'type' => 'success',
                'iconSVG' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-green-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
            ]);
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
