<?php namespace App;

use Symfony\Component\HttpFoundation\Response;

class StorageBridge
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Sientase libre de modificar esta función a su conveniencia
     *
     * @return Response
     */
    public function response()
    {
        // Search imagen file
        $filename = '../storage/test.png';
        
        // Generate response
        $response = new Response();

        // Set headers
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-type', mime_content_type($filename));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($filename) . '";');
        $response->headers->set('Content-length', filesize($filename));

        // Send headers before outputting anything
        $response->sendHeaders();

        $response->setContent(file_get_contents($filename));

        return $response;
    }

    /**
     * Get the value of filePath
     */ 
    public function getFilePath()
    {
        return $this->filePath;
    }
}