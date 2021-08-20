@extends("frontend.template.index")
@section('content')
    <div class="container-fluid">
        <h1 class="fw-bold display-4">Fichier Image</h1>
        <div class="row row-cols-3">
            @foreach ($fichiers as $fichier)
                @if (Str::contains($fichier->fileName, ['.png', '.jpg', '.jpeg', 'webp']))
                    <h2 class="">{{$fichier->fileName }}</h2>
                    <div class="col w-50 justify-content-center pt-5 mt-5">
                        <img class="w-100 h-100" src="{{ asset('storage/img/' . $fichier->fileName) }}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <h1 class="fw-bold display-4">Fichier texte</h1>
        @foreach ($fichiers as $fichier)
            @if (Str::contains($fichier->fileName, ['.txt', '.md']))
                <h2>{{$fichier->fileName }}</h2>
                <div class="row">
                    <div class="col">
                        <iframe class="w-100" style="height: auto" src="{{ asset('storage/text/' . $fichier->fileName) }}"
                            frameborder="0"></iframe>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
