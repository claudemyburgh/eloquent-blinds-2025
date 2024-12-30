<?php

    namespace App\View\Components\Ui;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class InputText extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(public ?string $name, public ?string $id) {}

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.ui.input-text');
        }

        /**
         * @return string
         */
        public function fallback(): string
        {
            return $this->name ?? $this->id;
        }

    }
