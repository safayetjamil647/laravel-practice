<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $filename=$request->image->getClientOriginalName();
            $this->deleteOldImage();
            if(auth()->user()->avatar)
            
            $request->image->storeAs('images',$filename,'public');
            auth()->user()->update(['avatar'=>$filename]);
            

        }
            return redirect()->back();
    }
    protected function deleteOldImage()
    {
        {
                
            Storage::delete('/public/images/' . auth()->user()->avatar);

        }
    }
    public function index()
    {
        return 'user controller';
    }
}
