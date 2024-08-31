<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Token;
use Carbon\Carbon;
use Database\Seeders\customer2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $tokenAsociado = Token::where('email', $email)

            ->orderBy('created_at', 'desc')
            ->first();

        if (!$tokenAsociado) {

            return response()->json([

                'error' => 'Access denied no found',
            ], 400);
        }

        if ($tokenAsociado->expiracion < Carbon::now()) {


            return response()->json([

                'sucess' => false,
                'message' => 'Token  expired out time'
            ], 400);
        }


        return response()->json([

            'sucess' => true,
            'message' => 'Valid',
            'access' => true,
            'token' => $tokenAsociado,


        ], 200);
    }



    public function authenticateDNI(Request $request)
    {
        $request->validate([
            'dni' => 'required|string',
        ]);

        $dni = $request->input('dni');

        $customer = Customer::where('dni', $dni)->first();

        if (!$customer) {
            return response()->json([
                'error' => 'Customer not found',
            ], 404);
        }

        $tokenAsociado = Token::where('email', $customer->email)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$tokenAsociado) {
            return response()->json([
                'error' => 'Access denied, token not found',
            ], 400);
        }

        if ($tokenAsociado->expiracion < Carbon::now()) {
            return response()->json([
                'success' => false,
                'message' => 'Token expired',
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Authentication successful',
            'access' => true,
            'token' => $tokenAsociado,
            'dni' => $dni,


        ], 200);
    }




    public function index(Request $request)
    {
        // Obtener el DNI del parámetro de consulta
        $dni = $request->query('dni');

        if (!$dni) {
            return response()->json([
                'message' => 'DNI is required',
                'success' => false,
            ], 400);
        }

        // Realizar la consulta filtrando por el DNI
        $customerTable = Customer::select(
            'customers.dni as dni',
            'customers.name as name',
            'customers.last_name as last_name',
            'customers.address as address',
            'customers.status as status',
            'customers.email as email',
            'regions.id_reg as region_id',
            'regions.description as region_description',
            'communes.id_com as commune_id',
            'communes.description as commune_description',
            'communes.status as commune_status'
        )
        ->join('regions', 'regions.id_reg', '=', 'customers.id_reg')
        ->join('communes', 'communes.id_com', '=', 'customers.id_com')
        ->where('customers.status', 'A')
        ->where('customers.dni', $dni) // Filtra por el DNI proporcionado
        ->get();

        $siesNull = $customerTable->map(function($item) {
            $item->address = $item->address ?: null;
            return $item;
        });

        return response()->json([
            'message' => 'Successfully fetched customers',
            'data' => $siesNull,
            'success' => true,
        ], 200);
    }


    public function store(Request $request)
    {
        $reglas = [
            'name' => 'required',
            'last_name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'address' => 'nullable|string', // Corregido 'nulleable' a 'nullable'
            'id_com' => 'required',  // Corregido 'nulleable' a 'nullable'
            'id_reg' => 'required',  // Corregido 'nulleable' a 'nullable'
            'status' => 'required',  // Corregido 'nulleable' a 'nullable'
            'date_reg' => 'required',  // Corregido 'nulleable' a 'nullable'

        ];

        try {
            $request->validate($reglas);

            $customer = new customer();
            $customer->dni = $request->input('dni');
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->last_name = $request->input('last_name');
            $customer->address = $request->input('address');
            $customer->id_reg = $request->input('id_reg');
            $customer->id_com = $request->input('id_com');
            $customer->status = $request->input('status');
            $customer->date_reg = $request->input('date_reg');


            $tokenRamdom = rand(200, 500);
            $tokenSha1 = sha1($tokenRamdom);

            Token::create([
                'token' => $tokenSha1,
                'email' => $customer->email,
                'date_logged' => $customer->date_reg,
                'expiracion' => Carbon::now()->addHours(2),

            ]);

            $customer->save();
            return response()->json([
                'sucess' => true,
                'message' => 'Successful registration',
                'token' => $tokenSha1

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'sucess' => false,
                'message' => 'Fill all the fields',
                'error' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile()
            ], 400);
        }



    }


    public function delete($dni)
    {
        // Busca el cliente por DNI
        $customer = Customer::where('dni', $dni)->first();


        if (!$customer) {
            return response()->json([

                'succes'=>false,
                'error' => '“Registro no existe'], 404);
        }


        $revocar = Token::where('email', $customer->email)->delete();

        $customer->delete();

        if($revocar){


            return response()->json([

                'message' =>' Token revoked',
                'sucess' =>true,
            ],200);
        }else{


            return response()->json([
                'message'=>'Token not found',
                'sucess'=>false,
            ]);
        }

    }

}
