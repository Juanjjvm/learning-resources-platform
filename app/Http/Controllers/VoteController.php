<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Resource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class voteController extends Controller
{
    public function __invoke(Request $request, Resource $resource)
    {
        // buscar o crear al votante
        $voter = Voter::getOrCreateVoter($request);

        // toggle del voto
        $resource->votes()->toggle($voter->id);
        
        // devolverle el resource actualizado con su recuento de votos
        return $resource->load('votes', 'category');
    }
}