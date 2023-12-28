<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Location;


class VoitureController extends Controller
{
    //
    public function home()
    {
        $voitures = Voiture::select()
                    ->limit(6)
                    ->where('location', 0) 
                    ->get();

        return view('home.home')->with('voitures', $voitures);
    }
    public function voituredispo()
    {
        $voitures = Voiture::select()
                    ->where('location', 0) 
                    ->get();
        

        return view('home.voiture')->with('voitures', $voitures);
    }

    public function detailvoiture($id)
    {
        $voiture = Voiture::select()
                            ->where('id_voiture', $id)
                            ->first();
        
        return view('home.detailvoiture')->with('voiture', $voiture);
    }
    public function users()
    {
        $users = User::all() ;
        return view('admin.users')->with('users', $users);
    }

    public function addvoiture()
    {
        return view('admin.addvoiture');
    }
    public function savevoiture(Request $request)
    {
        $this->validate($request, ['nomvoiture' => 'required',
                                    'annee'=>'required',
                                    'types'=>'required',
                                    'kilo'=>'required',
                                    'prix'=>'required',
                                    'description'=>'required',
                                    'image'=>'image|required|max:1999']);

        $fileNameWithExt = $request->file('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
        $extension = $request->file('image')->getClientOriginalExtension();
    
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    
        $path = $request->file('image')->storeAs('public/imagevoiture', $fileNameToStore);

        $voiture = new Voiture();
        $voiture->nomvoiture = $request->input('nomvoiture');
        $voiture->annee = $request->input('annee');
        $voiture->kilo = $request->input('kilo');
        $voiture->prix = $request->input('prix');
        $voiture->types = $request->input('types');
        $voiture->description = $request->input('description');
        $voiture->images = $fileNameToStore;
        $voiture->save();

        return back()->with('status','La voiture a été enregistré avec succès');
    }
    public function voitures()
    {
        $voitures = Voiture::all() ;
        return view('admin.voitures')->with('voitures', $voitures);
    }
    public function editvoiture($id)
    {
        $voiture = Voiture::select()
                            ->where('id_voiture', $id)
                            ->first();
        
        return view('admin.editvoiture')->with('voiture', $voiture);
    }
    public function updatevoiture(Request $request)
    {
        $this->validate($request, ['nomvoiture' => 'required',
        'annee'=>'required',
        'types'=>'required',
        'kilo'=>'required',
        'prix'=>'required',
        'image'=>'image|required|max:1999']);

        $fileNameWithExt = $request->file('image')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('image')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $path = $request->file('image')->storeAs('public/imagevoiture', $fileNameToStore);

        $voiture = Voiture::findOrFail($request->input('id'));
        $voiture->nomvoiture = $request->input('nomvoiture');
        $voiture->annee = $request->input('annee');
        $voiture->kilo = $request->input('kilo');
        $voiture->prix = $request->input('prix');
        $voiture->types = $request->input('types');
        $voiture->images = $fileNameToStore;
        $voiture->update();

        return redirect('/voitures')->with('status','La voiture a été modifié avec succès');
    }
    public function deletevoiture($id)
    {
        $voiture = Voiture::findOrFail($id);
        $voiture->delete();

        return back()->with('status','La voiture a été supprimée avec succès');
    }

    public function louer($id)
    {
        $rent = Voiture::findOrFail($id, 'id_voiture');
        $rent->location = 1;
        $rent->update();

        $loca = new Location();
        $loca->id_user = auth()->user()->id;
        $loca->id_voiture = $id;
        $loca->date_loc = date('Y-m-d H:i:s');
        $loca->save();

        return redirect("/mes-locations");
        
    }
    public function rendre($id)
    {
        $rendre = Location::findOrFail($id, 'id_loc');
        $rendre->rendu = 1;
        $rendre->update();

        $info = Location::select()
                            ->where('id_loc', $id)
                            ->first();
        $id_voi = $info->id_voiture;

        $rent = Voiture::findOrFail($id_voi, 'id_voiture');
        $rent->location = 0;
        $rent->update();

        return back()->with('status','La voiture a été rendu avec succès');
        

    }
    public function meslocations()
    {

        $voitures = Location::select()
                        ->join("voitures", "voitures.id_voiture","=","locations.id_voiture")
                        ->where('id_user',auth()->user()->id)->get();

        return view('home.meslocations')->with('voitures', $voitures);
    }
    public function locations()
    {

        $voitures = Location::select()
                        ->join("voitures", "voitures.id_voiture","=","locations.id_voiture")
                        ->join("users", "users.id","=","locations.id_user")
                        ->get();

        return view('admin.locations')->with('voitures', $voitures);
    }
    
}
