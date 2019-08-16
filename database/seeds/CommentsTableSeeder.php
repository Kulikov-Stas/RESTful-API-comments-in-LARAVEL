<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Comment::create(
            [
                'name'=>'Yoda',
                'email'=>'yoda@gmail.com',
                'text'=>'Yoda, a Force-sensitive male being belonging to a mysterious species, was a legendary Jedi Master who witnessed the rise and fall of the Galactic Republic, followed by the rise of the Galactic Empire. Small in stature but revered for his wisdom and power, Yoda trained generations of Jedi, ultimately serving as the Grand Master of the Jedi Order. Having lived through nine centuries of galactic history, he played integral roles in the Clone Wars, the rebirth of the Jedi through Luke Skywalker, and unlocking the path to immortality.',
                'created_at'=>'2019-06-10 11:26:25'
            ]);

        Comment::create(
            [
                'name'=>'Darth Sidious',
                'email'=>'simpledarck@gmail.com',
                'text'=>'Darth Sidious, a Force-sensitive human male, was the Dark Lord of the Sith and Galactic Emperor who ruled the galaxy from the fall of the Galactic Republic to the rise of the Galactic Empire. Rising to power in the Galactic Senate as Senator Sheev Palpatine, he was elected to the office of Supreme Chancellor and, during the Clone Wars, accumulated wartime powers in the name of security. As the Emperor, he dropped the facade of Palpatine, no longer needing to cultivate two identities, and henceforth ruled as Darth Sidious in thought and action. His machinations brought an end to the last era of peace in galactic history, replaced a millennium of democracy with New Order fascism, and restored the Sith to power through the destruction of the Jedi Order.',
                'created_at'=>'2019-07-08 19:20:19',
            ]);

        Comment::create(
            [
                'name'=>'Obi-Wan «Ben» Kenobi',
                'email'=>'ObiWanBenKenobi@gmail.com',
                'text'=>'Obi-Wan Kenobi, a Force-sensitive human male, was a legendary Jedi Master and member of the Jedi High Council during the Fall of the Republic. During the Age of the Empire, he went by the alias of Ben Kenobi in order to hide from the regime that drove the Jedi to near extinction in the aftermath of the Clone Wars. A nobleman known for his skills with the Force, Kenobi trained Anakin Skywalker as his Padawan, served as a Jedi General in the Grand Army of the Republic, and became a mentor to Luke Skywalker prior to his death in 0 BBY.',
                'parent_id'=>'1',
                'created_at'=>'2019-07-01 14:38:33'
            ]);

        Comment::create(
            [
                'name'=>'Darth Vader',
                'email'=>'DarthVader@gmail.com',
                'text'=>'Darth Vader is a fictional character in the Star Wars franchise. He is a primary antagonist in the original trilogy, but, as Anakin Skywalker, is the main protagonist of the prequel trilogy. Star Wars creator George Lucas has collectively referred to the first six episodic films of the franchise as "the tragedy of Darth Vader."',
                'parent_id'=>'1',
                'created_at'=>'2019-07-01 14:38:33'
            ]);

        Comment::create(
            [
                'name'=>'Luke Skywalker',
                'email'=>'LukeSkywalker@gmail.com',
                'text'=>'Luke Skywalker, a Force-sensitive human male, was a legendary Jedi Master who fought in the Galactic Civil War during the reign of the Galactic Empire. Along with his companions, Princess Leia Organa and Captain Han Solo, Skywalker served on the side of the Alliance to Restore the Republic—an organization committed to the downfall of Emperor Palpatine and the restoration of democracy. Following the war, Skywalker became a living legend, and was remembered as one of the greatest Jedi in galactic history.',
                'parent_id'=>'4',
                'created_at'=>'2019-07-01 14:38:33'
            ]);
    }
}
