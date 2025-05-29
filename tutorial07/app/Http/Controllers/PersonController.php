<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();

        return view("person.index")->with("people", $people);
        // view("person.index")->with("people", $people) or view("person.index", [$people])
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("person.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "firstname" => "required",
            "lastname"  => "required",
            "email"     => "nullable|email",
            "phone"     => "nullable"
        ]);

        $person = new Person();
        $person->firstname = $request->input("firstname");
        $person->lastname  = $request->input("lastname");
        $person->email     = $request->input("email");
        $person->phone     = $request->input("phone");
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
        return view("person.edit")->with("person", $person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            "firstname" => "required",
            "lastname"  => "required",
            "email"     => "nullable|email",
            "phone"     => "nullable"
        ]);

        $person->firstname = $request->input("firstname");
        $person->lastname  = $request->input("lastname");
        $person->email     = $request->input("email");
        $person->phone     = $request->input("phone");
        $person->save();

        return redirect(route("person.index"));
    }

    public function delete(Person $person)
    {
        $data = [
            "person" => $person
        ];

        return view("person.delete", $data);
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
