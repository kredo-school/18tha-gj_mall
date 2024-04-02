<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inquiries\Inquiry;


class InquirySeeder extends Seeder
{
    private $table;

    public function __construct(Inquiry $table)
    {
        $this->table = $table;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inquiries = [
            [
                'title' => 'Lorem ipsum dolor sit amet?',
                'content' => 'Non aperiam doloribus iusto, quia repellendus itaque maxime vero nesciunt voluptatum totam dolores quidem nemo unde ab mollitia ex esse velit aut!
                Voluptatibus aut, veniam laudantium ducimus rerum cumque facilis explicabo vero reiciendis est illo praesentium odio quibusdam fuga distinctio perferendis hic. Illum eligendi tempora ipsa repellat voluptatem architecto earum nesciunt voluptate.',
                'answer' => '',
                'translated_answer' => '',
                'customer_id' => '1',
                'genre_id' => '1',
                'inquiry_status_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lorem ipsum dolor?',
                'content' => 'Modi, natus vel! Deserunt voluptas eum sapiente blanditiis esse sint at totam repudiandae a, itaque fuga, rem atque commodi eveniet nihil minus!
                Et magni unde, natus itaque voluptatem at possimus dolorum obcaecati, consequatur perspiciatis voluptas mollitia neque dicta sapiente reprehenderit, laborum commodi temporibus quia consequuntur. Quasi itaque cumque omnis, hic nostrum nulla.
                Doloremque amet eum laboriosam optio esse assumenda omnis veritatis accusantium distinctio praesentium ab aperiam sit facilis, maxime rerum tenetur illum quo similique laborum officiis voluptatum ratione? Illo libero veniam eius.',
                'answer' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'translated_answer' => '',
                'customer_id' => '2',
                'genre_id' => '2',
                'inquiry_status_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet consectetur?',
                'content' => ' Dolores quibusdam alias id qui, dolorum possimus nemo explicabo. Debitis assumenda quisquam commodi nam, nobis ullam fuga cum.
                Expedita quam voluptate, soluta sunt maiores eveniet cumque magni doloremque aliquam eaque quisquam, possimus nisi eum at accusamus distinctio animi repellat ipsa. Maxime itaque amet accusantium, quibusdam ad explicabo odit.',
                'answer' => '',
                'translated_answer' => '',
                'customer_id' => '3',
                'genre_id' => '3',
                'inquiry_status_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet?',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda deleniti sed officiis quas perspiciatis animi libero fugit, quod neque tenetur consectetur architecto nobis, exercitationem ut! Minus, ab assumenda? Eum, minima.',
                'answer' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'translated_answer' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'customer_id' => '1',
                'genre_id' => '4',
                'inquiry_status_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->table->insert($inquiries); // insert the values to inquiry table
    }
}
