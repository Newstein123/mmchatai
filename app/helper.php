<?php

use App\Models\GeneralSetting;
use App\Models\Chat;
use App\Models\UserChat;

    function generalSetting($name) {
        $setting = GeneralSetting::where('name', $name)->first();
        return $setting->value;
    }

    // getImageUrl 
    function getImageURL($directory,String $image){
      if(isset($image) && ($image != '') && file_exists($directory.$image)){
        return url($directory.$image);
      }elseif(isset($image) && ($image != '') && file_exists('public/'.$directory.$image)){
        return url('public/'.$directory.$image);
      }else{
        return url('frontend/images/default-300x200.png');
      }
    }

    // uploadImage 
    function uploadImage($image, $directory) {
      $filename = time() .'_'.$image->getClientOriginalName();
            $path = public_path($directory);
            $img = Image::make($image->path());
            $img->fit(400,300, function ($constraint) {
				$constraint->aspectRatio();
			})->save($path.'/'.$filename);
      $image->move(public_path('img/original'), $filename);
      return $filename;
    }

    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ$@#&!';
      $randomString = '';
  
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
  
      return $randomString;
    }
    
    function getUserTokens($user_id, $name) {
      $data = 0;
      $chats = UserChat::where('user_id', $user_id)->get();
      foreach ($chats as $chat) {
          $data += Chat::select($name)->where('conversation_id', $chat->conversation_id)->sum($name);
      }
      return $data;
    }

    function getConversationCount($user_id) {
      $data = 0;
      $chats = UserChat::where('user_id', $user_id)->get();
      foreach ($chats as $chat) {
          $data += Chat::select('id')->where('conversation_id', $chat->conversation_id)->count();
      }
      return $data;
    }




  
