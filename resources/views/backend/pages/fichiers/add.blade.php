@extends("backend.template.index")
@section("content")
  <h1>Ajouter un fichier</h1>

  <form action="/backend/fichier" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    <input type="file" name="fileName" id="fileName">
    <input type="submit" value="Sauver">
  </form>
@endsection