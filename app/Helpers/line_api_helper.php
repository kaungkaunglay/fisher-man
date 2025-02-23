<?php

use GuzzleHttp\Client;
use LINE\Clients\MessagingApi\Api\MessagingApiApi;
use LINE\Clients\MessagingApi\Configuration;
use LINE\Clients\MessagingApi\Model\PushMessageRequest;
use LINE\Clients\MessagingApi\Model\TextMessage;
use LINE\Constants\MessageType;

if (!function_exists('send_push_notification')) {
    function send_push_notification($userId, $message)
    {
        try {
            $channelAccessToken = env('LINE_CHANNEL_ACCESS_TOKEN');

            // Initialize the MessagingApiApi client
            $client = new Client();
            $config = new Configuration();
            $config->setAccessToken($channelAccessToken);

            $messagingApi = new MessagingApiApi(
                client: $client,
                config: $config
            );

            $textMessage = new TextMessage([
                'type' => MessageType::TEXT,
                'text' => $message
            ]);

            $request = new PushMessageRequest([
                'to' => $userId,
                'messages' => [$textMessage]
            ]);

            $response = $messagingApi->pushMessage($request);

            \Log::info('Push notification sent successfully', [
                'userId' => $userId,
                'message' => $message
            ]);

            return [
                'success' => true,
                'message' => 'Notification sent successfully'
            ];

        } catch (\Exception $e) {
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