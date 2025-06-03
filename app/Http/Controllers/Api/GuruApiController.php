<?php

namespace App\Http\Controllers\Api;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruApiController extends Controller
{
    public function index()
    {
        return response()->json(Guru::all());
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|string|unique:guru',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:guru',
        ]);

        $guru = Guru::create($validated);
        return response()->json($guru, 201);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string',
            'nip' => 'sometimes|required|string|unique:guru,nip,' . $id,
            'gender' => 'sometimes|required|in:L,P',
            'alamat' => 'sometimes|required|string',
            'kontak' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:guru,email,' . $id,
        ]);

        $guru->update($validated);
        return response()->json($guru);
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return response()->json(['message' => 'Guru deleted successfully.']);
    }
}
