<?php

namespace App\Http\Controllers;

use App\Models\Endpoint;
use App\Services\EndpointRequestService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct(private EndpointRequestService $endpointRequestService) {}

    public function endpoint(Request $request, Endpoint $endpoint)
    {
        $inputs = $this->endpointRequestService->extractInputs($endpoint->prompt->prompt);

        $validation = [];

        foreach ($inputs as $input) {
            $validation[$input] = 'required';
        }

        $validatedInputs = $request->validate($validation);

        $data = json_decode($this->endpointRequestService->endpoint($endpoint, $validatedInputs));

        return response()->json($data);

    }
}
