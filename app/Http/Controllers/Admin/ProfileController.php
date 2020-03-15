<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        //  PHP/Laravel 14 課題　6
        $this->validate($request, Profile::$rules);
    
        $profile = new profile;
        $form = $request->all();
    
        unset($form['_token']);
        unset($form['image']);
    
        $profile->fill($form);
        $profile->save();
     
        return redirect('admin/profile/create');
    }


    //  PHP/Laravel 16 課題　1

    public function edit(Request $request)
    {
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile=Profile::find($request->id);
        $profile_form=$request->all();
        unset($profile_form['token']);
        
        $profile->fill($profile_form)->save();
        
        return redirect('admin/profile/');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
