<?php


function zipFile($fileAddPath, $fileZipPath)
{
      $zip = new ZipArchive;
    if ($zip->open($fileZipPath, ZipArchive::CREATE || ZipArchive::OVERWRITE) === TRUE) {
         $zip->addFile($fileAddPath);
       $zip->close();
      echo 'ok';
   } else {
    echo 'failed';
   }
}