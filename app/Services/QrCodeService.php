<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Generator;

class QrCodeService
{
    /**
     * @var string
     */
    private $result;

    /**
     * @var string
     */
    private $format;

    /**
     * @var FileService
     */
    private $fileService;

    /**
     * QrCodeService constructor.
     */
    public function __construct()
    {
        $this->fileService = new FileService(true);
    }

    /**
     * @param string $content
     * @param int $size
     * @param string $format
     * @return $this
     */
    public function generate(string $content, int $size = 600, string $format = 'png')
    {
        $this->format = $format;
        $qrCode = new Generator();
        $this->result = $qrCode->size($size)
            ->format($this->format)
            ->margin(2)
            ->generate($content);
        return $this;
    }

    /**
     * @return array
     * @param string $path
     * @param string $fileName
     */
    public function upload($path = null, $fileName = null)
    {
        if (!$fileName) {
            $fileName = time() . '.' . $this->format;
        } else {
            $fileName .= '-' . time() . '.' . $this->format;
        }

        $response = $this->fileService->saveToStorage($this->result, 'qr-codes/' . $path, $fileName);
        return $response;
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getResultAsBase64()
    {
        return base64_encode($this->result);
    }
}
