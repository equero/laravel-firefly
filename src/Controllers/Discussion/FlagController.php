<?php

namespace Bitporch\Firefly\Controllers\Discussion;

use Bitporch\Firefly\Controllers\Controller;
use Bitporch\Firefly\Models\Discussion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param Request    $request
     * @param Discussion $discussion
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        if ($request->has('is_locked')) {
            $discussion->update(['locked_at' => $discussion->locked_at ? null : Carbon::now()]);
        }

        if ($request->has('is_stickied')) {
            $discussion->update(['stickied_at' => $discussion->stickied_at ? null : Carbon::now()]);
        }

        return redirect()->route('firefly.discussions.show', $discussion->slug);
    }
}
