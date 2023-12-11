<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend/Feature/Skill/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['skills'] = Skill::all();
        return view('backend/Feature/Skill/index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $skill = new Skill();
            $skill->name = $request->name;
            $skill->save();

            return response()->json(['status' => 'success']);
        } catch (Exception  $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $item = Skill::find($id);
            if ($item) {
                $item->delete();
                return response()->json(['status' => 'success', 'message' => 'Item deleted successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Item not found'], 404);
            }
        } catch (Exception  $e) {
            return $e->getMessage();
        }
    }
}
