<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Domains;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetDomainsArrayAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(): array
    {
        $res = $this->recurse(config_path());
        $res1 = $this->collapse($res);
<<<<<<< HEAD
        $res2 = [];
        foreach ($res1 as $key => $value) {
            $keyStr = is_string($key) ? $key : (string) $key;
            $res2[$keyStr] = [
                'id' => $value,
                'name' => $value,
            ];
        }
=======
        $res2 = Arr::map($res1, fn (string $value) => [
            'id' => $value,
            'name' => $value,
        ]);
>>>>>>> 0f9bf43 (.)

        return $res2;
    }

    /**
     * @return array<string, mixed>
     */
    public function recurse(string $path): array
    {
        $filesystem = new Filesystem;
        $directories = $filesystem->directories($path);
        $res = [];
        foreach ($directories as $dir) {
<<<<<<< HEAD
            if (! is_string($dir)) {
                continue;
            }
=======
>>>>>>> 0f9bf43 (.)
            $name = Str::after($dir, $path.'/');
            if (\in_array($name, ['lang'], true)) {
                continue;
            }
            $res[$name] = $this->recurse($dir);
        }

        return $res;
    }

    /**
     * @return array<string, mixed>
     */
    public function collapse(array $data, string $k = ''): array
    {
        $res = [];
        foreach ($data as $k0 => $v0) {
<<<<<<< HEAD
            $k0Str = is_string($k0) ? $k0 : (string) $k0;
            $newkey = $k === '' ? $k0Str : ($k0Str.'.'.$k);
=======
            $newkey = $k === '' ? $k0 : ($k0.'.'.$k);
>>>>>>> 0f9bf43 (.)
            if ($v0 === []) {
                $res[$newkey] = $newkey;
            }

            if (is_array($v0)) {
                $collapsed = $this->collapse($v0, $newkey);
                foreach ($collapsed as $ck => $cv) {
                    $ckStr = is_string($ck) ? $ck : (string) $ck;
                    $res[$ckStr] = $cv;
                }
            }
        }

        return $res;
    }
}
