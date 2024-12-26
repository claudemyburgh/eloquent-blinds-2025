<?php

    namespace App\View\Components;

    use Closure;
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class ShuttersComparison extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct()
        {
            //
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View|Closure|string
        {
            $comparison = (object)[
                (object)[
                    'name' => 'ShutterGuard® Aluminium Security Shutters',
                    'link' => 'shutterguard-aluminium-security-shutters',
                    'details' => (object)[
                        'Internal Use' => true,
                        'External Use' => true,
                        'Rust Proof' => true,
                        'Security' => true,
                        'Patented Security Lock' => true,
                        'Custom Colours' => true,
                    ],
                    'warranty' => 10,
                    'turn_around_time' => '2-3 Weeks Turnaround Time',
                ],
                (object)[
                    'name' => 'ShutterStyle® Aluminium Barrier Security Shutters',
                    'link' => 'shutterstyle-aluminium-barrier-security-shutters',
                    'details' => (object)[
                        'Internal Use' => true,
                        'External Use' => true,
                        'Rust Proof' => true,
                        'Security' => true,
                        'Patented Security Lock' => true,
                        'Custom Colours' => true,
                    ],
                    'warranty' => 5,
                    'turn_around_time' => '2-3 Weeks Turnaround Time',
                ],
                (object)[
                    'name' => 'Hurricane Aluminium Shutters',
                    'link' => 'hurricane-aluminium-shutters',
                    'details' => (object)[
                        'Internal Use' => true,
                        'External Use' => true,
                        'Rust Proof' => true,
                        'Security' => false,
                        'Patented Security Lock' => false,
                        'Custom Colours' => true,
                    ],
                    'warranty' => 10,
                    'turn_around_time' => '2-3 Weeks Turnaround Time',
                ],
                (object)[
                    'name' => 'Timber Wood Shutters',
                    'link' => 'timber-wood-shutters',
                    'details' => (object)[
                        'Internal Use' => true,
                        'External Use' => true,
                        'Rust Proof' => true,
                        'Security' => false,
                        'Patented Security Lock' => false,
                        'Custom Colours' => true,
                    ],
                    'warranty' => 5,
                    'turn_around_time' => '4-5 Weeks Turnaround Time',
                ],
                (object)[
                    'name' => 'Thermowood® Shutters',
                    'link' => 'thermowood-shutters',
                    'details' => (object)[
                        'Internal Use' => true,
                        'External Use' => false,
                        'Rust Proof' => true,
                        'Security' => false,
                        'Patented Security Lock' => false,
                        'Custom Colours' => false,
                    ],
                    'warranty' => 3,
                    'turn_around_time' => '2-3 Weeks Turnaround Time',
                ],
            ];

            return view('components.shutters-comparison', compact('comparison'));
        }
    }
