<?php

namespace App\Services;

class FileService {
    /**
     * @var StorageService
     */
    private $storage;

    /**
     * @var
     */
    private $fromString;

    /**
     * FileService constructor.
     * @param string $storageType
     * @param bool $fromString
     */
    public function __construct(bool $fromString = false, string $storageType = 'public')
    {
        $this->storage = new StorageService($storageType, $fromString);
        $this->fromString = $fromString;
    }

    private function getFileName($file, $customName = NULL)
    {
        $fileName = time();
        if ($customName) {
            $fileName .= '-' . $customName . '.' . $file->getClientOriginalExtension();
        } else {
            $fileName .= '.' . $file->getClientOriginalExtension();
        }
        return $fileName;
    }

    /**
     * @param $file
     * @param string|NULL $path
     * @param string|NULL $fileName
     * @param string $permission
     * @return array
     */
    public function saveToStorage($file, string $path = NULL, string $fileName = NULL, string $permission = 'public')
    {
        if (!$fileName && !$this->fromString) {
            $fileName = $this->getFileName($file);
        }
        if (!$path) {
            $path .= '/';
        }
        $filePath = $path . $fileName;
        $url = $this->storage->save($filePath, $file, $permission);

        return [
            'file_name' => $fileName,
            'url' => $url
        ];
    }

    /**
     * @param string $url
     */
    public function deleteFromStorage(string $url)
    {
        $totalSlash = 4;
        if (env('USE_CUSTOM_STORAGE_URL') === 1) {
            $totalSlash = 3;
        }
        $split = explode('/', $url);
        for ($i = 0; $i < $totalSlash; $i++) {
            array_shift($split);
        }
        $path = join('/', $split);
        $this->storage->delete($path);
    }
}
