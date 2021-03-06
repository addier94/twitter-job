<?php

namespace App\Http\Controllers\api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    // auth
    public function index(Request $request)
    {
        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->paginate(5);

        return new TweetCollection($tweets);
    }
}
