<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
        $listings = Listing::latest()->filter(request(['tag', 'search']))->paginate(10);

        return view('listings.index', compact('listings'));
    }
//    public function index()
//    {
//        $data = ['listings' => Listing::latest()->filter(request(['tag', 'search']))->get()];
//        return view('listings.index')->with($data);
//    }

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
     * @param \Illuminate\Http\Request $request
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
            'description' => 'required',
            'logo' => 'sometimes|image|max:1024|mimes:jpeg,png,jpg,svg|dimensions:max_width=350,max_height=250'
        ]);

        if ($validator->fails()) {
            return redirect('listings/create')->with('message', "Listing not created")
                ->withErrors($validator)
                ->withInput();
        }
        $listings = Listing::create($request->only(['title',
            'company',
            'location',
            'website',
            'email',
            'tags',
            'description']));

        if ($request->hasFile('logo')) {
            $listings['logo'] = $request->file('logo')->store('listing-logos', 'public');
        }
        $listings->save();
        return redirect('/')->with('message', "New listing created!");
//
//    }
//        $title = $request->get('title');
//        $company = $request->get('company');
//        $location = $request->get('location');
//        $website = $request->get('website');
//        $email = $request->get('email');
//        $tags = $request->get('tags');
//        $description = $request->get('description');
//
//        Listing::create([
//            'title' => $title,
//            'company' => $company,
//            'location' => $location,
//            'website' => $website,
//            'email' => $email,
//            'tags' => $tags,
//            'description' => $description
//        ]);
//        return redirect('/')->with('message', "Listing created");
//    }
    }

    /**
     * Display the specified resource.
     *
     * @param Listing $listing
     * @return Application|Factory|View
     */
    public function show(Listing $listing)
    {

        return view('listings.show', compact('listing'));
        //  $data = ['listing' => Listing::find($id)];
        // return view('listings.show')->with($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Listing $listing
     * @return Application|Factory|View
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Listing $listing
     * @return RedirectResponse
     */
    public function update(Request $request, Listing $listing)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|image|max:1024|mimes:jpeg,png,jpg,svg|dimensions:max_width=350,max_height=250'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message', "Listing not created")
                ->withErrors($validator)
                ->withInput();
        }
        $listing->update($request->only(['title',
            'company',
            'location',
            'website',
            'email',
            'tags',
            'description']));

        if ($request->hasFile('logo')) {
            $listing['logo'] = $request->file('logo')->store('listing-logos', 'public');
        }
        $listing->save();
        return back()->with('message', "Listing updated successfully!");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
