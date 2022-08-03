<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resource:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создает ресурс';
    protected function getFileExample($name): string
    {
        $example =
            "<?php
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class {$name}Resource extends ResourceCollection
{
    
    public function toArray()
    {
        return [
            'data' => [],
        ];
    }
}";
        return $example;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $name = $this->ask('Введите название Resource');
        $path = "app/Http/Resources";
        if (!file_exists($path)) {
            mkdir($path, 0700, true);
        }
        $fp = fopen($path . "/{$name}Resource.php", "w");
        fwrite($fp, $this->getFileExample($name));
        fclose($fp);
        $this->info('Ресурс создан в ' . $path);
    }
}
