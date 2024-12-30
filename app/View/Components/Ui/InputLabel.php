<?php

    namespace App\View\Components\Ui;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\Support\Str;
    use Illuminate\View\Component;
    use function str_replace;

    class InputLabel extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(public ?string $for, public ?bool $required) {}

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.ui.input-label');
        }

        /**
         * @return string
         */
        public function fallback(): string
        {
            return Str::title(str_replace('_', ' ', $this->for));
        }


    }
