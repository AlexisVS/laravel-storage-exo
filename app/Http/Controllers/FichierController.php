<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use App\Models\MediaLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.fichiers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $request->file("fileName")->hashName();

        if (Str::contains($request->file('fileName')->hashName(), ['.txt', '.md']) == true) {
            Storage::put("public/text/", $request->file("fileName"));
        }
        if (Str::contains($request->file('fileName')->hashName(), ['.jpg', '.jpeg', ".png", ".webp"]) == true) {
            Storage::put("public/img/", $request->file("fileName"));
        }

        $store = new Fichier;
        $store->fileName = $fileName;
        $store->save();


        // $store = Fichier::create();

        // $store
        //     ->addMediaFromRequest("fileName")
        //     ->toMediaCollection();



        return redirect("/backend");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier)
    {
        return view('backend.pages.fichiers.edit', compact('fichier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {

        if (Str::contains($request->file('fileName')->hashName(), ['.txt', '.md']) == true) {
            Storage::put("public/text/", $request->file("fileName"));
        }

        if (Str::contains($request->file('fileName')->hashName(), ['.jpg', '.jpeg', ".png", ".webp"]) == true) {
            Storage::put("public/img/", $request->file("fileName"));
        }

        Storage::delete([
            'public/img/' . $fichier->fileName,
            'public/text/' . $fichier->fileName,
        ]);

        $fichier->fileName = $request->file('fileName')->hashName();
        $fichier->save();

        return redirect('/backend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier)
    {
        Storage::delete([
            'public/img/' . $fichier->fileName,
            'public/text/' . $fichier->fileName,
        ]);

        $fichier->delete();

        return redirect('/backend');
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function download(Fichier $fichier)
    {

        if (Str::contains($fichier->fileName, ['.txt', '.md']) == true) {
            return Storage::download("public/text/" . $fichier->fileName);
        }

        if (Str::contains($fichier->fileName, ['.jpg', '.jpeg', ".png", ".webp"]) == true) {
            return Storage::download("public/img/" . $fichier->fileName);
        }
    }
}
