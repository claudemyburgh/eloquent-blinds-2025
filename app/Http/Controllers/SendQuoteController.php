<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class SendQuoteController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'message' => 'required'
            ]);
            dd($request);
        }
    }
