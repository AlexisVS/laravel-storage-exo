@extends("backend.template.index")
@section('content')
    <h1>Home</h1>
    <h2>Upload avec MediaLibrary</h2>
    {{-- <form method="POST">
        @csrf

        <input id="name" name="name">

        <x-media-library-attachment name="avatar" />

        <button type="submit">Submit</button>
    </form> --}}
    <h2>Files</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="w-50" scope="col">Document</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fichiers as $fichier)
                <tr style="height: 500px">
                    <th scope="row">{{ $fichier->id }}</th>
                    <td>
                        @if (Str::contains($fichier->fileName, ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.avif']))
                            <img class="w-100" src="{{ asset('storage/img/' . $fichier->fileName) }}" alt="">
                        @endif
                        @if (Str::contains($fichier->fileName, ['.txt', '.md', '.doc', '.docx']))
                            <iframe class="w-100" src="{{ asset('storage/text/' . $fichier->fileName) }}"
                                frameborder="0"></iframe>
                        @endif
                        @if (!Str::contains($fichier->fileName, ['.png', '.jpg', '.jpeg', '.gif', '.webp', '.avif', '.txt', '.md', '.doc', '.docx']))
                            <p>{{ $fichier->fileName }}</p>
                        @endif
                    </td>
                    <td>{{ $fichier->fileName }}</td>
                    <td>
                        <a class="btn btn-primary text-white"
                            href="/backend/fichier/{{ $fichier->id }}/download">Download</a>
                    </td>
                    <td>
                        <a class="btn btn-primary text-white mx-3"
                            href="/backend/fichier/{{ $fichier->id }}/edit">Edit</a>
                    </td>
                    <td>
                        <form action="/backend/fichier/{{ $fichier->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger text-white" name="delete" value="X">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
