<?php

namespace Database\Seeders;

use App\Models\channel;
use App\Models\channels;
use App\Models\inbox;
use App\Models\metainbox;
use App\Models\metausers;
use App\Models\role;
use App\Models\source;
use App\Models\statuses;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        role::insert(
            [
                [
                    'id' => 102,
                    'type' => 'outer',
                    'name' => 'DENY',
                    'description' => 'Block users',
                    'status' => 201
                ],
                [
                    'id' => 101,
                    'type' => 'outer',
                    'description' => 'Users can send messages',
                    'name' => 'ACCESS',
                    'status' => 201
                ],
                [
                    'id' => 107,
                    'type' => 'inner',
                    'name' => 'ALL',
                    'description' => 'Users can reply messages',

                    'status' => 201
                ],
                [
                    'id' => 103,
                    'type' => 'inner',
                    'name' => 'DENY',
                    'description' => 'Users can not reply messages',
                    'status' => 201
                ]
            ]
        );
        source::insert([[
            'name' => 'facebook',
            'status' => 201
        ], [
            'name' => 'web',
            'status' => 202
        ]]);
        statuses::insert(
            [
                [
                    'id' => 203,
                    'name' => 'is delete from guests',
                    'lines' => 'chat,comment'
                ],
                [
                    'id' => 204,
                    'name' => 'is delete from admin',
                    'lines' => 'chat,comment'
                ],
                [
                    'id' => 205,
                    'name' => 'is read from guests',
                    'lines' => 'chat,comment'
                ],
                [
                    'id' => 206,
                    'name' => 'is read from admin',
                    'lines' => 'chat,comment'
                ],
                [
                    'id' => 207,
                    'name' => 'is read from guests',
                    'lines' => 'chat,comment'
                ],

                [
                    'id' => 208,
                    'name' => 'is read from admin',
                    'lines' => 'chat,comment'
                ],
                [
                    'id' => 201,
                    'name' => 'visible',
                    'lines' => 'users,channel,source'
                ],
                [
                    'id' => 202,
                    'name' => 'invisible',
                    'lines' => 'users,channel,source'
                ]
            ]
        );
        channels::insert([[
            'id' => '103290628701785',
            'name' => 'Hai Ninh Food',
            'source'  => 1,
            'meta_data' => '',
            'create_by' => 0,
            'status' => 201,
            'token' => 'EAA4pNBf95LMBAF9HpsuylypGyrVfQtRFPTvYZAXhPdcNZCw0czzOnBx5Mi0WZB9ZBNGPCPQzUaKgVQuLTszrBIiqD0cWesvEya1RX03CodKzqunTvF8MQZAGShc9auXhthtGyG6ZB826G7EAreNZCW1f8jXnrZCwRpRJdSJJZApW2VDM8hVkSMj7DQg154HItI2WslMicLAZBrkwZDZD'
        ], [
            'id' => '105604204852687',
            'name' => 'Beer Hub',
            'source'  => 1,
            'create_by' => 0,

            'meta_data' => '',
            'status' => 201,
            'token' => 'EAA4pNBf95LMBAJZBcpBuZBZAAzqzN1JKfZAUOXhd8zglsoUj9iAKwq7JrBC3Gf9WZBds7hNvqF6cu6DDAZADtIXAZAxEseJz9uzUjfVBHrwLH38CTx7oI5APNXCqNYRR0MifXZC2FZAAjMQ3HJG2UBoN9RI2FoZCSAjqoZCFs92TBJet95OYHA8W92ne1hN8tiOeg0f5AKLvQYVEQZDZD'
        ]]);
        metainbox::insert([
            [
                'id'    => 2,
                'name' => 'comment'
            ],
            [
                'id'    => 1,
                'name' => 'message'
            ]
        ]);
        metausers::insert([[
            'name' => 'outer',
            'role'  => 102,
        ], [
            'name' => 'inner',
            'role'  => 107
        ]]);
        // inbox::create([
        //     'id' => 'm_bV5wwjulcYok_kaEfp4nT87Yr94qY8dt8uInHxUKx-A4SZr2RwFhI5n6IPHXQfbCzID_cES5_qdDbXK8OQlJJA',
        //     'content' => '{"mid": "m_bV5wwjulcYok_kaEfp4nT87Yr94qY8dt8uInHxUKx-A4SZr2RwFhI5n6IPHXQfbCzID_cES5_qdDbXK8OQlJJA", "attachments": [{"type": "image", "payload": {"url": "https://scontent.xx.fbcdn.net/v/t39.1997-6/cp0/39178562_1505197616293642_5411344281094848512_n.png?_nc_cat=1&ccb=1-3&_nc_sid=ac3552&_nc_ohc=2tmZFsu3yrsAX8WOsr_&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=9be262c1715feb87c318a418f4f96d65&oe=60F3E509", "sticker_id": 369239263222822}}]}}]}]}',
        //     'content_type' => 'text',
        //     'meta_id' => 1,
        //     'create_by' => 123555,
        //     'status' => 201,
        //     'meta_data' => '[{"id": "103290628701785", "time": 1626236247130, "messaging": [{"sender": {"id": "4134977549884764"}, "recipient": {"id": "103290628701785"}, "timestamp": 1626236247018, "message": {"mid": "m_bV5wwjulcYok_kaEfp4nT87Yr94qY8dt8uInHxUKx-A4SZr2RwFhI5n6IPHXQfbCzID_cES5_qdDbXK8OQlJJA", "attachments": [{"type": "image", "payload": {"url": "https://scontent.xx.fbcdn.net/v/t39.1997-6/cp0/39178562_1505197616293642_5411344281094848512_n.png?_nc_cat=1&ccb=1-3&_nc_sid=ac3552&_nc_ohc=2tmZFsu3yrsAX8WOsr_&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=9be262c1715feb87c318a418f4f96d65&oe=60F3E509", "sticker_id": 369239263222822}}]}}]}]',
        //     'send_to' => 123
        // ]);
    }
}



// {"object": "page", "entry": [{"id": "103290628701785", "time": 1626236247130, "messaging": [{"sender": {"id": "4134977549884764"}, "recipient": {"id": "103290628701785"}, "timestamp": 1626236247018, "message": {"mid": "m_bV5wwjulcYok_kaEfp4nT87Yr94qY8dt8uInHxUKx-A4SZr2RwFhI5n6IPHXQfbCzID_cES5_qdDbXK8OQlJJA", "attachments": [{"type": "image", "payload": {"url": "https://scontent.xx.fbcdn.net/v/t39.1997-6/cp0/39178562_1505197616293642_5411344281094848512_n.png?_nc_cat=1&ccb=1-3&_nc_sid=ac3552&_nc_ohc=2tmZFsu3yrsAX8WOsr_&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=9be262c1715feb87c318a418f4f96d65&oe=60F3E509", "sticker_id": 369239263222822}}]}}]}]}