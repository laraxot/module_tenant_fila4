<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Domains;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetDomainsArrayAction
{
    use QueueableAction;

    public function execute(): array
    {
        $res = $this->recurse(config_path());
        $res1 = $this->collapse($res);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
        $res2 = Arr::map($res1, fn(string $value) => [
            'id' => $value,
            'name' => $value,
        ]);
<<<<<<< HEAD
=======
        $res2 = Arr::map($res1, function (string $value) {
            return [
                'id' => $value,
                'name' => $value,
            ];
        });
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)

        return $res2;
    }

    public function recurse(string $path): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
        $filesystem = new Filesystem();
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
            $name = Str::after($dir, $path . '/');
<<<<<<< HEAD
=======
        $filesystem = new Filesystem;
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
            $name = Str::after($dir, $path.'/');
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
            if (\in_array($name, ['lang'], true)) {
                continue;
            }
            $res[$name] = $this->recurse($dir);
        }

        return $res;
    }

    public function collapse(array $data, string $k = ''): array
    {
        $res = [];
        foreach ($data as $k0 => $v0) {
<<<<<<< HEAD
<<<<<<< HEAD
            $newkey = $k === '' ? $k0 : ($k0 . '.' . $k);
=======
            $newkey = ($k === '') ? $k0 : $k0.'.'.$k;
>>>>>>> 15079c8 (.)
=======
            $newkey = $k === '' ? $k0 : ($k0 . '.' . $k);
>>>>>>> 764bbef (.)
            if ($v0 === []) {
                $res[] = $newkey;
            }

            $res = array_merge($res, $this->collapse($v0, $newkey));
        }

        return $res;
    }
}
