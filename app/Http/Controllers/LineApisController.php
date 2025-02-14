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

    public function getMessageTemplate($template, array $params = [])
    {
        $templates = [
            'purchase_confirmation' => "🛍️ Thank you for your purchase!\n\n" .
                "Order ID: {order_id}\n" .
                "Total Amount: ${total_amount}\n\n" .
                "Items purchased:\n{items}\n" .
                "Thank you for shopping with us! 🙏",

            'shipping_notification' => "📦 Your order is on the way!\n\n" .
                "Order ID: {order_id}\n" .
                "Tracking Number: {tracking_number}\n" .
                "Estimated Delivery: {delivery_date}\n\n" .
                "Track your package here: {tracking_url}",

            'welcome_message' => "👋 Welcome to our store, {customer_name}!\n\n" .
                "We're excited to have you here. Browse our latest collections and enjoy shopping!",

            'order_status' => "ℹ️ Order Status Update\n\n" .
                "Order ID: {order_id}\n" .
                "Status: {status}\n" .
                "Updated: {update_time}",

            'custom' => "{message}" // For completely custom messages
        ];

        if (!isset($templates[$template])) {
            throw new Exception("Template '{$template}' not found");
        }

        $message = $templates[$template];

        // Replace placeholders with actual values
        foreach ($params as $key => $value) {
            // Special handling for items list in purchase confirmation
            if ($key === 'items' && is_array($value)) {
                $itemsList = '';
                foreach ($value as $item) {
                    $itemsList .= "- {$item['name']} ($" . number_format($item['price'], 2) . ")\n";
                }
                $value = $itemsList;
            }
            
            $message = str_replace("{{$key}}", $value, $message);
        }

        return $message;
    }

}