<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeRequest;
use App\Jobs\FileUploadJob;

class WelcomeController extends Controller
{
    public function upload(WelcomeRequest $request)
    {
        try {
            $data = $request->validated();

            foreach ($data['files'] as $file) {
                $fileName     = $file->getClientOriginalName();
                $fileContents = base64_encode(file_get_contents($file->getRealPath()));
                FileUploadJob::dispatch($fileName, $fileContents);
            }
            return back()->with("success", "Arquivos colocados na fila com sucesso!");
        } catch (\Exception $exception) {
            return back()->with("error", $exception->getMessage());
        }

    }
}
