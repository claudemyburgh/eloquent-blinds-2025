<?php

    namespace App\View\Components\Ui;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class InputError extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(public ?string $error) {}

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.ui.input-error');
        }

        /**
         * @return string
         */
        public function fallback(): string
        {
            return $this->error;
        }

    }
