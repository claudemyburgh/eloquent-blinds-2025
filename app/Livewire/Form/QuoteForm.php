<?php

    namespace App\Livewire\Form;

    use App\Events\QuoteSubmittedEvent;
    use Illuminate\View\View;
    use Livewire\Component;
    use function event;

    class QuoteForm extends Component
    {

        public string $name = '';
        public string $email = '';
        public string $phone = '';
        public string $message = '';
        public string $representative = '';

//        public string $subject = '';

        public function __construct(public ?string $subject = '') {}

        public function messages(): array
        {
            return [
                'phone' => 'The :attribute field must be a valid number.',
            ];
        }

        public function send(): void
        {
            $this->validate();

            session()->flash('status', 'Email send successfully');
            event(new QuoteSubmittedEvent($this->validate()));
            $this->reset();
        }

        public function render(): View
        {
            return view('livewire.form.quote-form');
        }

        protected function rules(): array
        {
            return [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:10|phone:ZA',
                'subject' => 'required',
                'message' => 'required',
//                'representative' => 'required',
            ];
        }
    }
