<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Model\PushMessageRequest;
use LINE\Clients\MessagingApi\Model\StickerMessage;
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

    public function sendPushNotification($userId, $message)
    {
        try {
            $textMessage = new TextMessage(data: [
                'type' => MessageType::TEXT,
                'text' => $message
            ]);
            
            $request = new PushMessageRequest([
                'to' => $userId,
                'messages' => [$textMessage]
            ]);
            
            $response = $this->messagingApi->pushMessage($request);
            
            \Log::info('Push notification sent successfully', [
                'userId' => $userId,
                'message' => $message
            ]);

            return [
                'success' => true,
                'message' => 'Notification sent successfully'
            ];

        } catch (Exception $e) {
            \Log::error('Failed to send push notification', [
                'error' => $e->getMessage(),
                'userId' => $userId
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }


}