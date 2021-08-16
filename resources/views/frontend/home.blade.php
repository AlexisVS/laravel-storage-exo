@extends("frontend.template.index")
@section('content')
    <div class="container-fluid">
        <h1>Fichier Image</h1>
        <div class="row row-cols-3">
            @foreach ($fichiers as $fichier)
                @if (Str::contains($fichier->fileName, ['.png', '.jpg', '.jpeg', 'webp']))
                    <div class="col">
                        <img class="w-100 h-100" src="{{ asset('storage/img/' . $fichier->fileName) }}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <h1>Fichier texte</h1>
        <div class="row row-cols-3">
            @foreach ($fichiers as $fichier)
                @if (Str::contains($fichier->fileName, ['.txt', '.md']))
                    <div class="col">
                        <p>{{ $fichier->fileName }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
