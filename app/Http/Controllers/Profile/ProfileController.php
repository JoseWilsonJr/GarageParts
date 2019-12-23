<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Garage\Timeline;
use App\Models\Garage\Image_profile;
use App\Http\Requests\Profile\ProfileUpdareRequest;
use App\Http\Requests\Profile\ImageUpdateRequest;
use User;

class ProfileController extends Controller
{
    public function index ()
    {      
        return view('profile.index');
    }

    public function profileUpdate(ProfileUpdareRequest $request, Timeline $timeline)
    {
        $tipo_registro = 'atualizar_perfil';
        $user = auth()->user();
        $dataForm = $request->all();
      
        $senha = $dataForm["senha"];

        //Verificar validade da senha no banco 
        if(Hash::check($senha, auth()->user()->password)){

            $response = $user->updateUser($dataForm);
 
            if ($response['success'])
                //$response2 = $timeline->timelineAtualizarProfile($tipo_registro);
                return redirect()
                    ->route( 'profile' )
                    ->with('success', $response['message']);

            return redirect()
                        ->back()
                        ->with('error', $response['message']);
            
        } else{
            return redirect()
                ->back()
                ->withErrors('A senha informada não condiz com a senha do usuário!');
        }


    }

    public function imageUpdate(ImageUpdateRequest $request, Timeline $timeline, Image_Profile $imageProfile)
    {
        $tipo_registro = 'atualizar_imagem_perfil';
        $user = auth()->user();
        $data = $request->all();
        $dateTime = date('Ymd-His');

        if ($request->hasFile('image') && $request->file('image')->isvalid()) {
            if ($user->image != $data['image']){
                $name = $user->id.kebab_case($user->name);
                $extension = $request->image->extension();
                $nameFile = "{$name}-{$dateTime}.{$extension}";
            }else{
                $nameFile = $user->image;
            }
        
            $data['image'] = $nameFile;

            $upload = $request->image->storeAs('users', $nameFile);
    
            if(!$upload)
                return redirect()
                        ->route('profile')
                        ->with('error', 'Falha ao fazer upload da imagem.');
                                             
        } else {
            return redirect()
            ->route('profile')
            ->with('warning', 'Nenhum arquivo de imagem foi selecionado.');
        }

        $response = $user->updateUserImage($data);

        if ($response['success'])
            //$response2 = $timeline->timelineAtualizarImagemProfile($tipo_registro);

            //$timelineRef = Timeline::where('image', '=', $nameFile)->get();

            //$response3 = $imageProfile->timelineHistoricImageProfile($timelineRef);
            return redirect()
                    ->route( 'profile' )
                    ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('error', $response['message']);
    }
    
}
