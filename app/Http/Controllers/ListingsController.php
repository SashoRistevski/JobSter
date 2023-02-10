<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = ['listings' => Listing::latest()->filter(request(['tag','search']))->get()];
        return view('listings.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'company' => 'required|unique:listings',
            'title' => 'required',
            'location' => 'required',
            'email' => 'unique:listings,email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('listings/create')
                ->withErrors($validator)
                ->withInput();
        }
        $title = $request->get('title');
        $company = $request->get('company');
        $location = $request->get('location');
        $website = $request->get('website');
        $email = $request->get('email');
        $tags = $request->get('tags');
        $description = $request->get('description');

        Listing::create([
            'title' => $title,
            'company' => $company,
            'location' => $location,
            'website' => $website,
            'email' => $email,
            'tags' => $tags,
            'description' => $description
        ]);


        return redirect('/')->with('message', "Listing created");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {

        $data = ['listing' => Listing::find($id)];

        return view('listings.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
