<?php

    namespace App\View\Components;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;
    use function array_merge;
    use function config;

    class MetaTags extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(public array $meta = [])
        {
            $this->meta = array_merge([
                ...config('seo-meta')
            ], $this->meta);
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            return view('components.meta-tags');
        }
    }
