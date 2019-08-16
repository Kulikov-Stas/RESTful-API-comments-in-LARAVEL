# RESTful-API-comments-in-LARAVEL
# Шаг за шагом, ничего не пропуская

- laravel new comments-api
- Создаём базу данных comments_api
- в .env
```bash
    DB_DATABASE=comments_api
	DB_USERNAME=[db username]
	DB_PASSWORD=[db password]
```
и в config/database.php

```bash
     'database' => env('DB_DATABASE', 'comments_api'),
     'username' => env('DB_USERNAME', [db username]),
     'password' => env('DB_PASSWORD', [db password]),
```
- добавляем домен к локальному серверу
	comments-api папка домена /comments-api/public
- переходим по урлу http://comments-api/
- cd comments-api
- php artisan make:model Comment -crmf
```bash
    Model created successfully.
	Factory created successfully.
	Created Migration: 2019_08_15_173525_create_comments_table
	Controller created successfully.
```
- прописываем up миграции create_comments_table
```bash
public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->text('text');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
        });
    }
```
- php artisan migrate
- composer dump-autoload
- php artisan make:seeder CommentsTableSeeder
- наполняем CommentsTableSeeder
- php artisan db:seed --class=CommentsTableSeeder
- php artisan make:resource CommentResource
- php artisan make:resource CommentsResource --collection
- меняем /comments-api/app/Http/Resources/CommentResource.php
```bash
public function toArray($request)
    {
        return [
            'type'          => 'comments',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->name,
                'email' => $this->email,
                'text' => $this->text,
                'created_at' => $this->created_at,
            ],
        ];
    }
```
- добавляем в /comments-api/app/Http/Resources/CommentController.php
```bash
use App\Http\Resources\CommentResource;
...
public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }
```
- composer require --dev barryvdh/laravel-ide-helper
- Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class, в config/app.php
- php artisan ide-helper:generate
- в /routes/api.php
```bash
	route::resource('comments', 'CommentController');
```
- убеждаемся в браузере или postman, что получаем json в ответ
```bash
	http://comments-api/api/comments/1
	http://comments-api/api/comments/2
	http://comments-api/api/comments/3 
	http://comments-api/api/comments/4
	http://comments-api/api/comments/5
```
- в App\Http\Resources\CommentResource@show добавляем CommentResource::withoutWrapping();
- добавляем в /comments-api/app/Http/Resources/CommentResource.php
```bash
	'links'         => [
                'self' => route('comments.show', ['comment' => $this->id]),
                'parent' => route('comments.show', ['comment' => $this->parent_id]),
            ],
```
- в /comments-api/app/Http/Resources/CommentController.php в index
```bash
	return new CommentsResource(Comment::paginate());
```
- в /comments-api/app/Http/Resources/CommentsResource
```bash
public function toArray($request)
    {
        return [
            'data' => CommentResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('comments.index'),
            ],
        ];
    }
```
- видим, что получаем json с http://comments-api/api/comments


- Добавляем создание, обновление, удаление комментариев
- в /routes/api.php
```bash
Route::post('comments', 'CommentController@store');
Route::put('comments/{comment}', 'CommentController@update');
Route::delete('comments/{comment}', 'CommentController@delete');
```

- в /comments-api/app/Http/Controllers/CommentController.php
```bash
public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }
```
- в модели Comment
```bash
	/**
    	 * Indicates if the IDs are auto-incrementing.
     	*
     	* @var bool
     	*/
    	public $incrementing = true;
    	/**
     	* The attributes that are mass assignable.
     	*
    	* @var array
     	*/
    	protected $fillable = [
        	'name',
        	'email',
        	'text',
        	'parent_id'
    	];
```
- кидаем Postman post [post](https://villa-pinia.com/wp-content/uploads/design-library/post.jpg)
- добавление проходит успешно [post success](https://villa-pinia.com/wp-content/uploads/design-library/post-success.jpg)

- делаем обновление
```bash
public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return response()->json($comment, 200);
    }
```
- кидаем Postman put [put](https://villa-pinia.com/wp-content/uploads/design-library/put.jpg)
- апдейт проходит успешно [put success](https://villa-pinia.com/wp-content/uploads/design-library/put-success.jpg)

- делаем удаление
```bash
public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
```
- кидаем Postman delete [delete](https://villa-pinia.com/wp-content/uploads/design-library/delete.jpg)
- удаление проходит успешно [delete success](https://villa-pinia.com/wp-content/uploads/design-library/delete-success.jpg)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
