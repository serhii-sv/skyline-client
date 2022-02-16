<?php

namespace App\Http\Controllers\AccountPanel;

use App\Http\Controllers\Controller;
use App\Models\NftItems;
use Illuminate\Http\Request;

class NftController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('adminos.pages.nft.index', [
            'items' => NftItems::all()
        ]);
    }
}
