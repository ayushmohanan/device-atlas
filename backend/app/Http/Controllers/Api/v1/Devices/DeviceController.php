<?php
namespace App\Http\Controllers\Api\v1\Devices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeviceDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


final class DeviceController extends Controller
{

    #Retrieve the data
    public function index(Request $request)
    {
        try {
            # Fetch all device details
            $devices = DeviceDetail::where('primary_hardware_type', 'Tablet')
            ->get();
            # Check if the data is empty
            if ($devices->isEmpty()) {
                return response()->json([
                    'statusCode' => 404,
                    'status'  => 'failed',
                    'message' => 'No devices found',
                    'data'    => [],
                ]);
            }
            # if feach the device details return
            return response()->json([
                'statusCode' => 200,
                'status' => 'success',
                'message' => 'Device details fetched successfully',
                'data' => $devices
            ]);

        } catch (\Exception $e) {

            Log::error('Error fetching device details', ['error' => $e->getMessage()]); # Log error message
            return response()->json([
                'statusCode' => 500,
                'status'  => 'failed',
                'message' => 'Internal Server Error',
                'data' => []
            ]);
        }
    }

    #Store the Data
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'useragent' => 'required|string',
        ]);
        #if fails
        if ($validator->fails()) {
            return response()->json([
                'statusCode' => 422,
                'status' => 'failed',
                'message' => 'Validation Error',
                'data' => ['status' => false, 'device' => [], 'validation' => $validator->errors()]
            ]);
        }
        \Log::info($request->all()); # Log error message
        try {
            #request
            $url = "{$this->baseUrl}?licencekey={$this->licenseKey}&useragent=" . urlencode($request->useragent);
            $response = $this->client->get($url);

            $deviceData = json_decode($response->getBody(), true);

            if (!isset($deviceData['properties'])) {

                \Log::error('Invalid response from DeviceAtlas'); # Log error message
                #return
                return response()->json([
                    'statusCode' => 400,
                    'status' => 'failed',
                    'message' => 'Invalid response from DeviceAtlas',
                    'data' => ['status' => false, 'device' => [], 'validation' => '']
                ]);
            }
            $properties = $deviceData['properties'];
            #validate unique os version
            $existingDevice = DeviceDetail::where('model', $properties['model'] ?? null)
            ->where('os_version', $properties['osVersion'] ?? null)
            ->first();

            if ($existingDevice) {
                return response()->json([
                    'statusCode' => 422,
                    'status'  => 'failed',
                    'message' => 'Device already exists',
                    'data' => ['status' => false, 'device' => $existingDevice, 'validation' => 'osVersion already exists in the db']
                ]);
            }

            #store the details
            $device = DeviceDetail::create([
                'primary_hardware_type' => $properties['primaryHardwareType'] ?? null,
                'os_version' => $properties['osVersion'] ?? null,
                'vendor' => $properties['vendor'] ?? null,
                'browser_name' => $properties['browserName'] ?? null,
                'model' => $properties['model'] ?? null,
                'os_name' => $properties['osName'] ?? null,
                'browser_rendering_engine' => $properties['browserRenderingEngine'] ?? null,
            ]);
            #reposnse
            return response()->json([
                'statusCode' => 200,
                'status' => 'success',
                'message' => 'Device details added successfully',
                'data' => ['status' => true, 'device' => $device, 'validation' => '']
            ]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage()); # Log error message
            return response()->json([
                'statusCode' => 500,
                'status' => 'failed',
                'message' => 'Internal Server Error',
                'data' => ['status' => false, 'device' => [], 'validation' => '']
            ]);
        }
    }
}
