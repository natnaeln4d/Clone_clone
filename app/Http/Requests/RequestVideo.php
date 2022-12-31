<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\video;

class RequestVideo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // if($this->method()=='PUT'){

        //     return[
        //         'title'=>'required'
        //     ];
        // }
        return [
            'file'=>['required','mimes:mp4,avi,m4a,webm'],
            'title'=>'nullable',
        
            'discription' => ['nullable'],
            'thumbnail'=>['nullable','mimes:jpeg,bmp,png,svg'],
           
        ];
    }
       public function getdata()
    {
       $data=$this->validated() + [
           'user_id'=>1
       ];
       if($this->hasFile('file')){
           $directory=video::makeDirectory(); //create the directory
           $data['file']=$this->file->store($directory); //put's file on data variable
           $data['dimention']=video::getDimention($data['file']);

       }
    //    if($title=$data['title']){
    //        $data['slug']=$this->getSlug($title);
    //    }
       return $data;   // return the directory
       
    }
    
}
