<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\DB;


class PersonController extends Controller
{
    protected static $defaultLimit = 100;
    protected static $defaultOffset = 0;

    public function index(Request $request)
    {
        $query = DB::table('people');

        $fillables = (new Person())->getFillable();

        foreach($fillables as $fillable) {

            if(!empty($request->input($fillable))) {
                $query = $query->where($fillable, 'like', "%" . $request->input($fillable) . "%");
            }
        }

        if(!empty($request->input('offset'))) {
            $offset = $request->input('offset');
        } else {
            $offset = self::$defaultOffset;
        }

        if(!empty($request->input('limit'))) {
            $limit = $request->input('limit');
        } else {
            $limit = self::$defaultLimit;
        }

        return $query
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public function show(Person $person)
    {
        return $person;
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    public function update(Request $request, Person $person)
    {
        $person->update($request->all());

        return response()->json($person, 200);
    }

    public function delete(Request $request, Person $person)
    {
        $person->delete();

        return response()->json(null, 204);
    }
}
