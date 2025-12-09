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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
        $res2 = Arr::map($res1, fn(string $value) => [
            'id' => $value,
            'name' => $value,
        ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
        $res2 = Arr::map($res1, function (string $value) {
            return [
                'id' => $value,
                'name' => $value,
            ];
        });
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

        return $res2;
    }

    public function recurse(string $path): array
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        $filesystem = new Filesystem();
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
            $name = Str::after($dir, $path . '/');
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $filesystem = new Filesystem;
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
            $name = Str::after($dir, $path.'/');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        $filesystem = new Filesystem();
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
            $name = Str::after($dir, $path . '/');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
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
            $newkey = $k === '' ? $k0 : ($k0 . '.' . $k);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            $newkey = $k === '' ? $k0 : ($k0 . '.' . $k);
=======
            $newkey = ($k === '') ? $k0 : $k0.'.'.$k;
>>>>>>> a12f125f4a (.)
=======
            $newkey = $k === '' ? $k0 : ($k0 . '.' . $k);
>>>>>>> b93ef594b4 (.)
=======
            $newkey = ($k === '') ? $k0 : $k0.'.'.$k;
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            if ($v0 === []) {
                $res[] = $newkey;
            }

            $res = array_merge($res, $this->collapse($v0, $newkey));
        }

        return $res;
    }
}
