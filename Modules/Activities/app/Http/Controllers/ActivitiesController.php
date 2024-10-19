<?php

namespace Modules\Activities\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Activities\Services\ActivityService;

class ActivitiesController extends Controller
{
    private $activityService;

    public function __construct(
        ActivityService $activityService,
    ) {
        $this->activityService = $activityService;
    }

    public function index(int $id)
    {
        return view('activities::list')
            ->with('mainTitle', 'List of Users')
            ->with('headerTitle', 'List of Users')
            ->with('users', $this->activityService->getAll($id));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('activities::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('activities::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
