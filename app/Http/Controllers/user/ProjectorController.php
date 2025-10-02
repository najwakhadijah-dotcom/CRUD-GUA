<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Projector;
use Illuminate\Http\Request;

class ProjectorController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua merk unik untuk filter
        $merks = Projector::getMerks();
        
        // Query dengan filter
        $projectors = Projector::query()
            ->when($request->search, function($query, $search) {
                return $query->search($search);
            })
            ->when($request->status, function($query, $status) {
                return $query->status($status);
            })
            ->when($request->merk, function($query, $merk) {
                return $query->merk($merk);
            })
            ->when($request->sort, function($query, $sort) {
                return $query->sort($sort);
            }, function($query) {
                return $query->orderBy('created_at', 'desc');
            })
            ->paginate(12)
            ->withQueryString();

        // Hitung statistik
        $totalCount = Projector::count();
        $tersediaCount = Projector::where('status', 'tersedia')->count();
        $dipinjamCount = Projector::where('status', 'dipinjam')->count();
        $rusakCount = Projector::where('status', 'rusak')->count();

        return view('user.projectors.index', compact(
            'projectors',
            'merks',
            'totalCount',
            'tersediaCount',
            'dipinjamCount',
            'rusakCount'
        ));
    }

    public function show($id)
    {
        $projector = Projector::findOrFail($id);
        return view('user.projectors.show', compact('projector'));
    }
}