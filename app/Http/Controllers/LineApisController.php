<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Model\TextMessage;
use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use LINE\Constants\MessageType;
use App\Models\Apis;
use Illuminate\Support\Facades\Session; 
use Exception;

class LineApisController extends Controller
{
    protected $messagingApi;
    protected $channel_secret;
    
    protected $destination;
    protected $events; 
    protected $channel_access_token;

    public function __construct()
    {
        $this->channel_secret = env('LINE_CHANNEL_SECRET');
        $this->channel_access_token = env('LINE_CHANNEL_ACCESS_TOKEN');

        // Initialize the MessagingApiApi client
        $client = new Client();
        $config = new Configuration();
        $config->setAccessToken($this->channel_access_token);
        
        $this->messagingApi = new MessagingApiApi(
            client: $client,
            config: $config
        );
    }
      public function getUserId($event): mixed
    {
        if (isset($event['source']['userId'])) {
            return $event['source']['userId'];
        }
        return null; // Return null if userId is not found
    }
    public function webhook(Request $request)
    {
        try {
            $body = $request->getContent();
            $decodedBody = json_decode($body, true);
    
            if (!isset($decodedBody['events']) || !is_array($decodedBody['events'])) {
                return response()->json(['message' => 'No events'], 200);
            }
    
            foreach ($decodedBody['events'] as $event) {
                $userId = $this->getUserId($event);
                if ($userId) {
                    \Log::info('Extracted User ID: ' . $userId);
                    Session::put('line_user_id', $userId); 
                    // ðŸ”¹ Save to database
                    Apis::create([
                        'line_user_id' => $userId,
                        'events' => json_encode($event)
                    ]);

    
                    \Log::info('User saved to database');
                }
            }
    
            return response()->json(['message' => 'OK'], 200);
    
        } catch (Exception $e) {
            \Log::error('Exception: ' . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }
}