@extends('backend.template.index')
@section("content")
<form action="/backend/fichier/{{ $fichier->id }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method("PUT")
  <input type="file" name="fileName" id="fileName">
  <input type="submit" value="Sauver">
</form>
@endsection