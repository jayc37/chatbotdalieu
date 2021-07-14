<?php

namespace App\Http\Controllers;

use App\Models\inbox;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Mockery\Exception\InvalidOrderException;

class WebhookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $token;

    public function __construct()
    {
        $this->token = env('VERIFY_TOKEN');
    }
    public function verify_token(Request $request)
    {

        $mode  = $request->get('hub_mode');
        $token = $request->get('hub_verify_token');

        if ($mode === "subscribe" && $this->token and $token === $this->token) {
            return response($request->get('hub_challenge'));
        }

        return response("Invalid token!", 400);
    }

    public function handle_query(Request $request)
    {
        try {
            $entry = $request->get('entry');
            if (!empty($entry)) {
                $sender  = Arr::get($entry, '0.messaging.0.sender.id');
                $message = Arr::get($entry, '0.messaging.0.message');
                $is_echo = Arr::get($entry, '0.messaging.0.message.is_echo');
                $content_type = empty(Arr::get($entry, '0.messaging.0.message.text')) ? 'text' : Arr::get($entry, '0.messaging.0.message.attachments.0.type');
                $meta_id = empty($is_echo) ? 1 : 2;
                $create_by = Arr::get($request->get('entry'), '0.messaging.0.sender.id');
                $send_to = Arr::get($entry, '0.id');
                inbox::insert([
                    'id' => Arr::get($entry, '0.messaging.0.message.mid'),
                    'content' => json_encode($message),
                    'content_type' => $content_type,
                    'meta_id' => $meta_id,
                    'create_by' => $create_by,
                    'status' => 201,
                    'meta_data' => json_encode($entry),
                    'send_to' => $send_to
                ]);
                if (users::find($sender)) {
                    users::create([
                        'id' => $sender,
                        'facebook_id' => $sender,
                        'status' => 201,
                        'channel_id' => 103290628701785,
                        'meta_id' => 1
                    ]);
                }
                return response('sucess', 200);
            }
            return response('false', 404);
        } catch (InvalidOrderException $e) {
            $sender  = Arr::get($entry, '0.messaging.0.sender.id');
            return response("flase:$entry", 404);
        }
    }
    protected function dispatchResponse($id, $response)
    {
        $access_token = env('PAGE_ACCESS_TOKEN');
        $url = "https://graph.facebook.com/v2.6/me/messages?access_token={$access_token}";
        $data = json_encode([
            'recipient' => ['id' => $id],
            'message'   => ['text' => $response]
        ]);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return view('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}