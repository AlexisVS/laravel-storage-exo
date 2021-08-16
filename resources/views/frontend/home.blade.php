@extends("frontend.template.index")
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-3">
            @foreach ($fichiers as $fichier)
                <div class="col">
                    <img class="w-100 h-100" src="{{ asset('storage/img/' . $fichier->fileName) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>

@endsection
