<?php

    namespace App\View\Components\Ui;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class InputTextarea extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(public ?string $name, public ?string $id, public ?int $rows = 4, public ?int $cols = 80) {}

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.ui.input-textarea');
        }

        /**
         * @return string
         */
        public function fallback(): string
        {
            return $this->name ?? $this->id;
        }
    }
