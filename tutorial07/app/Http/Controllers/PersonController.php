<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Order alfabética ordenando primeiro pelo primeiro nome, e caso tenha igual, ordena pelo sobrenome
        $people = Person::orderBy("firstname")->orderBy("lastname")->get();

        return view("person.index")->with("people", $people);
        // view("person.index")->with("people", $people) or view("person.index", [$people])
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::select(["id", "business_name"])->orderBy("id")->get();

        return view("person.create")->with("businesses", $businesses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "firstname"     => "required",
            "lastname"      => "required",
            "email"         => "nullable|email",
            "phone"         => "nullable",
            "business_id"   => "nullable|integer|numeric"
        ]);

        $person = new Person();
        $person->firstname      = $request->input("firstname");
        $person->lastname       = $request->input("lastname");
        $person->email          = $request->input("email");
        $person->phone          = $request->input("phone");
        $person->business_id    = $request->input("business_id");
        $person->save();

        return redirect(route("person.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view("person.show")->with("person", $person);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $businesses = Business::select(["id", "business_name"])->orderBy("id")->get();

        $data = [
            "person"        => $person,
            "businesses"    => $businesses
        ];

        return view("person.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            "firstname"     => "required",
            "lastname"      => "required",
            "email"         => "nullable|email",
            "phone"         => "nullable",
            "business_id"   => "nullable|integer|numeric"
        ]);

        $person->firstname      = $request->input("firstname");
        $person->lastname       = $request->input("lastname");
        $person->email          = $request->input("email");
        $person->phone          = $request->input("phone");
        $person->business_id    = $request->input("business_id");
        $person->save();

        return redirect(route("person.index"));
    }

    public function delete(Person $person)
    {
        //Um dado só melhor usar with(flash data to view), vários usa array de dados com índice os nomes desejados
        return view("person.delete")->with("person", $person);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->deleteOrFail();

        return redirect(route("person.index"));
    }
}
