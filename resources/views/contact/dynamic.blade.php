@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kantor {{ ucfirst($city) }} - {{ strtoupper(str_replace('-', ' ', $region)) }}</h1>
    <p>Informasi kontak untuk kantor di {{ ucfirst($city) }} (Region: {{ strtoupper($region) }})</p>

    <h4>Daftar Lokasi {{ strtoupper($region) }}:</h4>
    <ul>
        @foreach ($locations as $loc)
            <li>
                <a href="{{ route('contact.show', [$region, $loc]) }}">
                    {{ ucfirst(str_replace('-', ' ', $loc)) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
