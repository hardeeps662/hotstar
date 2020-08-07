<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
       $category=[
                  ['name'=>'Tv'],
                  ['name'=>'Movies'],
                  ['name'=>'Sports']
              ];
              foreach ($category as $key => $value) {
                  DB::table('categories')->insert($value);
              }

              $subcategory=[
                  ['name'=>'star plus','category_id'=>1],
                  ['name'=>'Fox History','category_id'=>1],
                  ['name'=>'NDTV','category_id'=>1],
                  ['name'=>'Imagine','category_id'=>1],
                  ['name'=>'Life OK','category_id'=>1],
                  ['name'=>'Sony Tv','category_id'=>1],
                  ['name'=>'Star Utsav','category_id'=>1],

                  ['name'=>'Hindi','category_id'=>2],
                  ['name'=>'English','category_id'=>2],
                  ['name'=>'Punjabi','category_id'=>2],
                  ['name'=>'Bengali','category_id'=>2],
                  ['name'=>'Marathi','category_id'=>2],
                  ['name'=>'Tamil','category_id'=>2],
                  ['name'=>'Kannnada','category_id'=>2],

                  ['name'=>'Cricket','category_id'=>3],
                  ['name'=>'Hockey','category_id'=>3],
                  ['name'=>'Football','category_id'=>3],
                  ['name'=>'Tennis','category_id'=>3],
                  ['name'=>'Wrestling','category_id'=>3],
                  ['name'=>'Formula 1','category_id'=>3],
                  ['name'=>'Water Sports','category_id'=>3],
                  ['name'=>'Table Tennis','category_id'=>3],

              ];
              foreach ($subcategory as $key => $value) {
                  DB::table('subcategories')->insert($value);
              }

        $videos=[
        	//movies
['name'=>'Titanic','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Thriller','image'=>'about_2.jpg','video'=>'khet.mp4','subcategory_id'=>9,'category_id'=>2],
['name'=>'3 Idiots','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'about_3.jpg','video'=>'12.mp4','subcategory_id'=>8,'category_id'=>2],
['name'=>'Inception','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Romance','image'=>'img_1.jpg','video'=>'13.mp4','subcategory_id'=>9,'category_id'=>2],
['name'=>'Gravity','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'img_2.jpg','video'=>'14.mp4','subcategory_id'=>9,'category_id'=>2],
['name'=>'Thor','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Romance','image'=>'img_3.jpg','video'=>'15.mp4','subcategory_id'=>9,'category_id'=>2],
['name'=>'Iron Man','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'img_4.jpg','video'=>'16.mp4','subcategory_id'=>9,'category_id'=>2],
['name'=>'Jatt Boyz','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Romance','image'=>'about_2.jpg','video'=>'12.mp4','subcategory_id'=>10,'category_id'=>2],
['name'=>'Dhoom','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Romance','image'=>'person_1.jpg','video'=>'15.mp4','subcategory_id'=>8,'category_id'=>2],
['name'=>'Pk','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama','image'=>'person_2.jpg','video'=>'khet.mp4','subcategory_id'=>8,'category_id'=>2],
['name'=>'Gazni','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'person_3.jpg','video'=>'13.mp4','subcategory_id'=>8,'category_id'=>2],
['name'=>'Ishq','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,family','image'=>'person_4.jpg','video'=>'12.mp4','subcategory_id'=>8,'category_id'=>2],
['name'=>'sardar ji','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Action','image'=>'hero_bg_3.jpg','video'=>'khet.mp4','subcategory_id'=>10,'category_id'=>2],

//Tv shows
['name'=>'Ramayan','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'about_2.jpg','video'=>'khet.mp4','subcategory_id'=>1,'category_id'=>1],
['name'=>'Sai Baba','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Family','image'=>'about_3.jpg','video'=>'12.mp4','subcategory_id'=>1,'category_id'=>1],
['name'=>'Sanjiwani','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'Devteerth.jpg','video'=>'13.mp4','subcategory_id'=>1,'category_id'=>1],
['name'=>'Universe','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'imd.jpeg','video'=>'14.mp4','subcategory_id'=>2,'category_id'=>1],
['name'=>'Ancient Alien','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology,Family','image'=>'imf.jpeg','video'=>'15.mp4','subcategory_id'=>2,'category_id'=>1],
['name'=>'Planets','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'img.jpeg','video'=>'16.mp4','subcategory_id'=>2,'category_id'=>1],
['name'=>'Kasauti 2','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'imh.jpeg','video'=>'khet.mp4','subcategory_id'=>3,'category_id'=>1],
['name'=>'mahabharat','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Action,Thriller','image'=>'ims.jpeg','video'=>'12.mp4','subcategory_id'=>3,'category_id'=>1],
['name'=>'partigeya','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'imk.jpeg','video'=>'13.mp4','subcategory_id'=>3,'category_id'=>1],
['name'=>'Snake Mayea','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'as.jpeg','video'=>'14.mp4','subcategory_id'=>1,'category_id'=>1],
['name'=>'Pukaar','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'about_2.jpg','video'=>'15.mp4','subcategory_id'=>4,'category_id'=>1],
['name'=>'Bavre','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'person_2.jpg','video'=>'16.mp4','subcategory_id'=>4,'category_id'=>1],
['name'=>'Savdhaan India','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'person_3.jpg','video'=>'khet.mp4','subcategory_id'=>5,'category_id'=>1],
['name'=>'Raja ji','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'imd.jpeg','video'=>'khet.mp4','subcategory_id'=>5,'category_id'=>1],

//Sports
['name'=>'World Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'hero_b1_1.jpg','video'=>'khet.mp4','subcategory_id'=>15,'category_id'=>3],
['name'=>'Test Match','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'hero_bg_2.jpg','video'=>'12.mp4','subcategory_id'=>15,'category_id'=>3],
['name'=>'ODI','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'hero_bg_3.jpg','video'=>'13.mp4','subcategory_id'=>15,'category_id'=>3],
['name'=>'Hockey Premier','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Mythology','image'=>'about_3.jpg','video'=>'14.mp4','subcategory_id'=>15,'category_id'=>3],
['name'=>'Hockey Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'Kids,Superhero','image'=>'imd.jpeg','video'=>'15.mp4','subcategory_id'=>16,'category_id'=>3],
['name'=>'Domestic Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Hero','image'=>'imf.jpeg','video'=>'16.mp4','subcategory_id'=>16,'category_id'=>3],
['name'=>'Punjab Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Action','image'=>'imk.jpeg','video'=>'khet.mp4','subcategory_id'=>16,'category_id'=>3],
['name'=>'Football Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Thriller','image'=>'person_3.jpg','video'=>'12.mp4','subcategory_id'=>17,'category_id'=>3],
['name'=>'FIFA Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Thriller','image'=>'person_2.jpg','video'=>'13.mp4','subcategory_id'=>17,'category_id'=>3],
['name'=>'India Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Action','image'=>'person_4.jpg','video'=>'khet.mp4','subcategory_id'=>18,'category_id'=>3],
['name'=>'Tennis Cup','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Thriller','image'=>'as.jpeg','video'=>'khet.mp4','subcategory_id'=>18,'category_id'=>3],
['name'=>'WWW','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Action','image'=>'Devteerth.jpg','video'=>'14.mp4','subcategory_id'=>19,'category_id'=>3],
['name'=>'WWW II','details'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt','tag'=>'drama,Emotion','image'=>'about_2.jpg','video'=>'12.mp4','subcategory_id'=>19,'category_id'=>3],


                ];
                foreach ($videos as $value) {
                   $file = new File('public/images/'.$value['image']);
                   $extension=$file->extension();
                   $image_Name=uniqid().'.'.$extension;
                   Storage::putFileAs('public/images', new File('public/images/'.$value['image']), $image_Name);

                   $video_file = new File('public/video/'.$value['video']);
                   $video_extension=$video_file->extension();
                   $video_Name=uniqid().'.'.$video_extension;
                   Storage::putFileAs('public/videos', new File('public/video/'.$value['video']), $video_Name);

                    DB::table('videos')->insert([
                       'name'           =>    $value['name'],
                       'details'        =>    $value['details'],
                       'tag'            =>    $value['tag'],
                       'image'          =>    $image_Name,
                       'video'          =>    $video_Name,
                       'subcategory_id' =>    $value['subcategory_id'],
                       'category_id'    =>    $value['category_id'],
                       'created_at'     =>    Carbon::now(),
                       'updated_at'     =>   Carbon::now(),
                    ]);
                }  




        
    }
}
