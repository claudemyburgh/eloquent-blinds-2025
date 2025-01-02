@php




    @endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{--{{ dd($meta) }}--}}
{{--  HTML Meta Main Tags--}}
<title>{{ $meta['meta_title'] ?? $meta['title']  }} | {{ config('app.name') }}</title>
<meta name="description" content="{{ $meta['meta_description'] ?? $meta['description']  }}"/>
<meta name="keywords" content="{{ implode(", ", $meta['meta_keywords'] ?? $meta['keywords']) }}">

<meta property="fb:app_id" content="{{ config('social-media.facebook.app_id') }}"/>
{{--  HTML Meta Tags--}}
<meta property="og:url" content="{{  URL::current() }}"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="Eloquent Blinds | {{ $meta['meta_title'] ?? $meta['title'] }}">
<meta property="og:description" content="{{ $meta['meta_description'] ?? $meta['description'] }}">
<meta property="og:image" content="{{ $meta['meta_image'] ?? Vite::asset('resources/img/meta/eloquent.jpg')  }}">

{{--  Twitter Meta Tags --}}
<meta name="twitter:card" content="summary_large_image"/>
<meta property="twitter:domain" content="eloquentblinds.co.za"/>
<meta property="twitter:url" content="{{ URL::current() }}"/>
<meta name="twitter:title" content="Eloquent Blinds | {{ $meta['meta_title']  ?? $meta['title']   ?? 'Supplier and installer of Shutters and Blinds.' }}">
<meta name="twitter:description" content="{{ $meta['meta_description'] ?? $meta['description']   }}">
<meta name="twitter:image" content="{{ $meta['meta_image'] ?? $meta['image'] ?? Vite::asset('resources/img/meta/eloquent.jpg') }}">
