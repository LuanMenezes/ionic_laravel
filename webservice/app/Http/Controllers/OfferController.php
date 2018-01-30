<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers', $offers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $ext = $img->guessClientExtension();

            // Save with BASE64
//            $base64 = 'data:image/'.$ext.';base64,'.base64_encode(file_get_contents($img));
//            $data['img'] = $base64;

            // Save in directory
            $directory = "img/";
            $nameImg = 'img_' . rand(21, 999) . '.' . $ext;
            $img->move($directory, $nameImg);
            $data['img'] = $directory . $nameImg;
        }
        $data['price_f'] = 'R$ ' . number_format($data['price'], 2, ',', '.');

        Offer::create($data);

        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        return view('offers.edit', compact('offer', $offer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $ext = $img->guessClientExtension();
            // Save in directory
            $directory = "img/";
            $nameImg = 'img_' . rand(21, 999) . '.' . $ext;
            $img->move($directory, $nameImg);
            $data['img'] = $directory . $nameImg;
        }
        $data['price_f'] = 'R$ ' . number_format($data['price'], 2, ',', '.');

        Offer::find($id)->update($data);
        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::destroy($id);
        return redirect()->route('offers.index');
    }
}
